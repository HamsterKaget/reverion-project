<?php

namespace App\Http\Controllers;

use App\Models\TopupTransaction;
use App\Models\Donation;
use App\Models\Leaderboard;
use App\Models\DragonNest\DnMembership\DnAccount;
use App\Models\DragonNest\DnMembership\DnCashIncome;
use App\Models\MasterAffiliator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TopUpWebhookController extends Controller
{
    /**
     * Handle webhook dari Midtrans
     */
    public function handle(Request $request)
    {
        try {
            $data = $request->all();

            // Log webhook request untuk debugging
            Log::info('Midtrans Webhook Received', [
                'payload' => $data,
                'ip' => $request->ip(),
            ]);

            // Validasi minimal - pastikan ada order_id dan transaction_status
            if (!isset($data['order_id']) || !isset($data['transaction_status'])) {
                Log::warning('Midtrans Webhook: Missing required fields', ['data' => $data]);
                return response()->json(['status' => 'error', 'message' => 'Missing required fields'], 400);
            }

            $orderId = $data['order_id'];
            $transactionStatus = $data['transaction_status'];

            // Cek apakah ini donation (order_id dengan prefix DON-)
            if (str_starts_with($orderId, 'DON-')) {
                return $this->handleDonation($orderId, $transactionStatus, $data, $request);
            }

            // Cari transaksi berdasarkan order_id
            $transaction = TopupTransaction::where('order_id', $orderId)->first();

            if (!$transaction) {
                Log::warning('Midtrans Webhook: Transaction not found', ['order_id' => $orderId]);
                return response()->json(['status' => 'error', 'message' => 'Transaction not found'], 404);
            }

            // Log webhook callback
            $transaction->createLog(
                'webhook_callback',
                $transactionStatus,
                'Webhook received from Midtrans',
                $data,
                $request->ip(),
                $request->userAgent()
            );

            // Prevent duplicate processing
            // Cek apakah status sudah settlement atau capture
            if ($transaction->isSettled()) {
                Log::info('Midtrans Webhook: Transaction already settled', [
                    'order_id' => $orderId,
                    'current_status' => $transaction->status,
                ]);
                // Return success meskipun sudah di-process (idempotent)
                return response()->json(['status' => 'success', 'message' => 'Already processed']);
            }

            // Cek apakah CashIncome sudah pernah di-insert
            if (DnCashIncome::hasBeenProcessed($orderId)) {
                Log::info('Midtrans Webhook: CashIncome already processed', ['order_id' => $orderId]);
                // Update status transaksi jika belum
                if (!in_array($transaction->status, ['settlement', 'capture'])) {
                    $this->updateTransactionStatus($transaction, $transactionStatus, $data);
                }
                return response()->json(['status' => 'success', 'message' => 'Already processed']);
            }

            // Update status transaksi
            $this->updateTransactionStatus($transaction, $transactionStatus, $data);

            // Jika status settlement atau capture, process cash income
            if (in_array($transactionStatus, ['settlement', 'capture'])) {
                $this->processCashIncome($transaction, $data);
            }

            return response()->json(['status' => 'success', 'message' => 'Webhook processed']);

        } catch (\Exception $e) {
            Log::error('Midtrans Webhook Error', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'payload' => $request->all(),
            ]);

            return response()->json([
                'status' => 'error',
                'message' => 'Internal server error'
            ], 500);
        }
    }

    /**
     * Update status transaksi
     */
    private function updateTransactionStatus(TopupTransaction $transaction, string $status, array $data): void
    {
        $updateData = [
            'status' => $this->mapMidtransStatus($status),
            'midtrans_response' => $data,
        ];

        if (isset($data['transaction_id'])) {
            $updateData['midtrans_transaction_id'] = $data['transaction_id'];
        }

        if (isset($data['payment_type'])) {
            $updateData['midtrans_payment_type'] = $data['payment_type'];
        }

        if (in_array($status, ['settlement', 'capture']) && !$transaction->settlement_time) {
            $updateData['settlement_time'] = now();
        }

        $transaction->update($updateData);

        // Log status change
        $transaction->createLog(
            'status_changed',
            $transaction->status,
            "Status changed to: {$transaction->status}",
            $data
        );
    }

    /**
     * Process cash income - insert ke CashIncome di SQL Server
     */
    private function processCashIncome(TopupTransaction $transaction, array $data): void
    {
        // Gunakan database transaction untuk ensure atomicity
        DB::beginTransaction();
        DB::connection('sqlsrv_dn_member')->beginTransaction();

        try {
            // Cek lagi apakah sudah pernah di-process (double check)
            if (DnCashIncome::hasBeenProcessed($transaction->order_id)) {
                Log::info('Midtrans Webhook: CashIncome already processed (double check)', [
                    'order_id' => $transaction->order_id,
                ]);
                DB::connection('sqlsrv_dn_member')->rollBack();
                DB::rollBack();
                return;
            }

            // Ambil username dari transaksi
            $username = $transaction->username;

            // Cari DnAccount berdasarkan AccountName (username)
            $dnAccount = DnAccount::where('AccountName', $username)->first();

            if (!$dnAccount) {
                throw new \Exception("DnAccount not found for username: {$username}");
            }

            // Load plan untuk mendapatkan amount
            $transaction->load('plan');
            if (!$transaction->plan) {
                throw new \Exception("Plan not found for transaction: {$transaction->id}");
            }

            // Hitung total cash: amount dari plan + bonus_amount (jika ada)
            $cashAmount = (int) ($transaction->plan->amount + $transaction->bonus_amount);

            // Set SQL Server options yang diperlukan untuk INSERT
            // Harus di-set sebelum INSERT untuk tabel dengan indexed views
            $connection = DB::connection('sqlsrv_dn_member');
            $connection->statement('SET ANSI_NULLS ON');
            $connection->statement('SET CONCAT_NULL_YIELDS_NULL ON');
            $connection->statement('SET ANSI_WARNINGS ON');
            $connection->statement('SET ANSI_PADDING ON');

            // Insert ke CashIncome untuk user pembeli
            $connection->insert('
                INSERT INTO [CashIncome] ([AccountID], [CashIncomeCode], [PGCode], [PGKey], [CashAmount], [IncomeDate])
                VALUES (?, ?, ?, ?, ?, ?)
            ', [
                $dnAccount->AccountID,
                1, // CashIncomeCode - Default untuk top up
                null, // PGCode - nullable
                $transaction->order_id, // PGKey - Order ID untuk tracking dan prevent duplicate
                $cashAmount,
                now()->format('Y-m-d H:i:s'),
            ]);

            // Process komisi affiliator jika ada
            if ($transaction->affiliator_id && $transaction->commission_amount > 0) {
                $transaction->load('affiliator');
                if ($transaction->affiliator) {
                    // Update statistik affiliator
                    $transaction->affiliator->incrementStats(
                        $transaction->final_price,
                        $transaction->commission_amount
                    );

                    // Cari DnAccount affiliator berdasarkan user_id
                    $affiliatorUser = $transaction->affiliator->user;
                    if ($affiliatorUser) {
                        $affiliatorDnAccount = DnAccount::where('AccountName', $affiliatorUser->username)->first();

                        if ($affiliatorDnAccount) {
                            // Insert komisi ke CashIncome untuk affiliator
                            $commissionAmount = (int) $transaction->commission_amount;
                            $affiliatorOrderId = $transaction->order_id . '-AFF'; // Suffix untuk tracking

                            // Cek apakah sudah pernah di-insert (prevent duplicate)
                            if (!DnCashIncome::hasBeenProcessed($affiliatorOrderId)) {
                                $connection->insert('
                                    INSERT INTO [CashIncome] ([AccountID], [CashIncomeCode], [PGCode], [PGKey], [CashAmount], [IncomeDate])
                                    VALUES (?, ?, ?, ?, ?, ?)
                                ', [
                                    $affiliatorDnAccount->AccountID,
                                    1, // CashIncomeCode - Default untuk top up
                                    null, // PGCode - nullable
                                    $affiliatorOrderId, // PGKey - Order ID dengan suffix AFF
                                    $commissionAmount,
                                    now()->format('Y-m-d H:i:s'),
                                ]);
                            }

                            // Buat transaksi untuk affiliator (dengan harga 0)
                            $affiliatorTransaction = TopupTransaction::create([
                                'order_id' => $affiliatorOrderId,
                                'user_id' => $affiliatorUser->id,
                                'username' => $affiliatorUser->username,
                                'email' => $affiliatorUser->email,
                                'plan_id' => $transaction->plan_id,
                                'coupon_id' => null,
                                'affiliator_id' => null, // Affiliator tidak punya affiliator
                                'price' => 0,
                                'discount_amount' => 0,
                                'final_price' => 0,
                                'currency' => $transaction->currency,
                                'bonus_amount' => 0,
                                'commission_amount' => 0,
                                'status' => $transaction->status, // Status sama dengan transaksi utama
                                'midtrans_transaction_id' => null,
                                'midtrans_payment_type' => null,
                                'midtrans_response' => [
                                    'description' => 'bonus affiliate top up',
                                    'original_order_id' => $transaction->order_id,
                                    'commission_amount' => $commissionAmount,
                                ],
                                'snap_token' => null,
                                'settlement_time' => $transaction->settlement_time,
                            ]);

                            // Log transaksi affiliator
                            $affiliatorTransaction->createLog(
                                'affiliate_commission_processed',
                                $affiliatorTransaction->status,
                                "Affiliate commission processed: {$commissionAmount} cash added to affiliator account",
                                [
                                    'original_order_id' => $transaction->order_id,
                                    'commission_amount' => $commissionAmount,
                                    'affiliator_account_id' => $affiliatorDnAccount->AccountID,
                                ]
                            );
                        }
                    }
                }
            }

            // Commit transactions
            DB::connection('sqlsrv_dn_member')->commit();
            DB::commit();

            // Log success
            $transaction->createLog(
                'cash_income_processed',
                $transaction->status,
                "Cash income processed: {$cashAmount} cash added to account",
                [
                    'account_id' => $dnAccount->AccountID,
                    'cash_amount' => $cashAmount,
                    'order_id' => $transaction->order_id,
                ]
            );

            Log::info('Midtrans Webhook: CashIncome processed successfully', [
                'order_id' => $transaction->order_id,
                'account_id' => $dnAccount->AccountID,
                'cash_amount' => $cashAmount,
            ]);

        } catch (\Exception $e) {
            // Rollback semua perubahan
            DB::connection('sqlsrv_dn_member')->rollBack();
            DB::rollBack();

            Log::error('Midtrans Webhook: Failed to process cash income', [
                'order_id' => $transaction->order_id,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            // Log error ke transaction
            $transaction->createLog(
                'cash_income_error',
                $transaction->status,
                "Failed to process cash income: {$e->getMessage()}",
                ['error' => $e->getMessage()]
            );

            throw $e;
        }
    }

    /**
     * Map Midtrans status ke status internal
     */
    private function mapMidtransStatus(string $midtransStatus): string
    {
        $statusMap = [
            'pending' => 'pending',
            'settlement' => 'settlement',
            'capture' => 'capture',
            'deny' => 'deny',
            'cancel' => 'cancel',
            'expire' => 'expire',
            'refund' => 'refund',
            'partial_refund' => 'partial_refund',
            'chargeback' => 'chargeback',
        ];

        return $statusMap[$midtransStatus] ?? 'pending';
    }

    /**
     * Handle donation webhook
     */
    private function handleDonation(string $orderId, string $transactionStatus, array $data, Request $request)
    {
        try {
            // Cari donation berdasarkan order_id
            $donation = Donation::where('order_id', $orderId)->first();

            if (!$donation) {
                Log::warning('Midtrans Webhook: Donation not found', ['order_id' => $orderId]);
                return response()->json(['status' => 'error', 'message' => 'Donation not found'], 404);
            }

            // Prevent duplicate processing
            if ($donation->isSettled()) {
                Log::info('Midtrans Webhook: Donation already settled', [
                    'order_id' => $orderId,
                    'current_status' => $donation->status,
                ]);
                return response()->json(['status' => 'success', 'message' => 'Already processed']);
            }

            // Update status donation
            $this->updateDonationStatus($donation, $transactionStatus, $data);

            // Jika status settlement atau capture, update leaderboard
            if (in_array($transactionStatus, ['settlement', 'capture'])) {
                $this->updateDonationLeaderboard($donation);
            }

            Log::info('Midtrans Webhook: Donation processed successfully', [
                'order_id' => $orderId,
                'status' => $donation->status,
            ]);

            return response()->json(['status' => 'success', 'message' => 'Donation webhook processed']);

        } catch (\Exception $e) {
            Log::error('Midtrans Webhook: Donation processing error', [
                'order_id' => $orderId,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return response()->json([
                'status' => 'error',
                'message' => 'Internal server error'
            ], 500);
        }
    }

    /**
     * Update status donation
     */
    private function updateDonationStatus(Donation $donation, string $status, array $data): void
    {
        $updateData = [
            'status' => $this->mapMidtransStatus($status),
            'midtrans_response' => $data,
        ];

        if (isset($data['transaction_id'])) {
            $updateData['midtrans_transaction_id'] = $data['transaction_id'];
        }

        if (isset($data['payment_type'])) {
            $updateData['midtrans_payment_type'] = $data['payment_type'];
        }

        if (in_array($status, ['settlement', 'capture']) && !$donation->settlement_time) {
            $updateData['settlement_time'] = now();
        }

        $donation->update($updateData);

        Log::info('Midtrans Webhook: Donation status updated', [
            'order_id' => $donation->order_id,
            'status' => $donation->status,
        ]);
    }

    /**
     * Update leaderboard when donation is settled
     */
    private function updateDonationLeaderboard(Donation $donation): void
    {
        try {
            // Cek apakah sudah ada di leaderboard
            $leaderboard = Leaderboard::where('username', $donation->name)
                ->where('type', 'donation')
                ->first();

            if ($leaderboard) {
                // Update score (tambah amount baru)
                $leaderboard->update([
                    'score' => $leaderboard->score + $donation->amount,
                ]);
            } else {
                // Hitung rank baru (jumlah donator + 1)
                $maxRank = Leaderboard::type('donation')->max('rank') ?? 0;
                $newRank = $maxRank + 1;

                // Buat entry baru
                Leaderboard::create([
                    'username' => $donation->name,
                    'rank' => $newRank,
                    'score' => $donation->amount,
                    'type' => 'donation',
                    'is_active' => true,
                ]);
            }

            // Recalculate ranks (sort by score descending)
            $this->recalculateDonationRanks();

            Log::info('Midtrans Webhook: Leaderboard updated for donation', [
                'order_id' => $donation->order_id,
                'name' => $donation->name,
                'amount' => $donation->amount,
            ]);
        } catch (\Exception $e) {
            Log::error('Midtrans Webhook: Failed to update leaderboard', [
                'order_id' => $donation->order_id,
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Recalculate donation ranks based on total score
     */
    private function recalculateDonationRanks(): void
    {
        // Get all donations leaderboard, sorted by score descending
        $leaderboards = Leaderboard::type('donation')
            ->active()
            ->orderBy('score', 'desc')
            ->get();

        // Update ranks
        $rank = 1;
        foreach ($leaderboards as $leaderboard) {
            $leaderboard->update(['rank' => $rank]);
            $rank++;
        }
    }
}
