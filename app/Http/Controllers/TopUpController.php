<?php

namespace App\Http\Controllers;

use App\Models\MasterPlan;
use App\Models\MasterCoupon;
use App\Models\MasterAffiliator;
use App\Models\TopupTransaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Services\AccountValidationService;

class TopUpController extends Controller
{
    protected $accountValidationService;

    public function __construct(AccountValidationService $accountValidationService)
    {
        $this->accountValidationService = $accountValidationService;
    }

    public function index()
    {
        $packages = MasterPlan::active()->orderBy('sort_order')->get();
        return view('frontend.pages.topup.index', compact('packages'));
    }

    /**
     * Get all active packages (API)
     */
    public function getPackages()
    {
        $packages = MasterPlan::active()
            ->orderBy('sort_order')
            ->get()
            ->map(function ($plan) {
                return [
                    'id' => $plan->id,
                    'name' => $plan->name,
                    'price_idr' => (float) $plan->price_idr,
                    'discount_price_idr' => $plan->discount_price_idr ? (float) $plan->discount_price_idr : null,
                    'price_usd' => (float) $plan->price_usd,
                    'price_discount_usd' => $plan->price_discount_usd ? (float) $plan->price_discount_usd : null,
                    'item' => $plan->item,
                    'amount' => (float) $plan->amount,
                ];
            });

        return response()->json([
            'success' => true,
            'packages' => $packages,
        ]);
    }

    /**
     * Validate coupon and calculate discount
     */
    public function validateCoupon(Request $request)
    {
        $request->validate([
            'code' => 'required|string',
            'price' => 'required|numeric|min:0',
        ]);

        $coupon = MasterCoupon::where('code', $request->code)
            ->active()
            ->valid()
            ->first();

        if (!$coupon) {
            return response()->json([
                'success' => false,
                'message' => 'Coupon code is invalid or expired',
            ], 400);
        }

        $discount = $coupon->calculateDiscount($request->price);
        $finalPrice = max(0, $request->price - $discount);

        return response()->json([
            'success' => true,
            'coupon' => [
                'id' => $coupon->id,
                'code' => $coupon->code,
                'discount_type' => $coupon->discount_type,
                'discount_amount' => (float) $coupon->discount_amount,
            ],
            'discount' => (float) $discount,
            'final_price' => (float) $finalPrice,
        ]);
    }

    /**
     * Validate affiliator code
     */
    public function validateAffiliator(Request $request)
    {
        $request->validate([
            'code' => 'required|string',
        ]);

        // Cek di master_affiliator berdasarkan kode_referal
        $affiliator = MasterAffiliator::where('kode_referal', $request->code)->first();

        // Jika tidak ada di master_affiliator, cek di users.kode_referal
        if (!$affiliator) {
            $user = User::where('kode_referal', $request->code)->first();
            if ($user) {
                // Buat atau update master_affiliator untuk user ini
                $affiliator = MasterAffiliator::firstOrCreate(
                    ['user_id' => $user->id],
                    [
                        'kode_referal' => $user->kode_referal,
                        'total_referrals' => 0,
                        'total_transactions' => 0,
                        'total_revenue' => 0,
                        'total_commission' => 0,
                    ]
                );
            }
        }

        if (!$affiliator) {
            return response()->json([
                'success' => false,
                'message' => 'Affiliator code is invalid',
            ], 400);
        }

        return response()->json([
            'success' => true,
            'affiliator' => [
                'id' => $affiliator->id,
                'kode_referal' => $affiliator->kode_referal,
            ],
        ]);
    }

    /**
     * Check username existence for topup
     * For topup, username must exist (different from register which must not exist)
     */
    public function checkUsernameForTopup(Request $request)
    {
        $username = $request->input('username');

        if (empty($username)) {
            return response()->json([
                'exists' => false,
                'valid' => false,
                'message' => 'Username cannot be empty'
            ], 400);
        }

        // Validate username format (alphanumeric, underscore, dash, 3-20 chars)
        if (!preg_match('/^[a-zA-Z0-9_-]{3,20}$/', $username)) {
            return response()->json([
                'exists' => false,
                'valid' => false,
                'message' => 'Username may only contain letters, numbers, underscores (_), and dashes (-). Length must be between 3 and 20 characters.'
            ], 400);
        }

        // Check if username exists in DnAccount
        $exists = $this->accountValidationService->usernameExistsForTopup($username);

        return response()->json([
            'exists' => $exists,
            'valid' => true,
            'message' => $exists ? 'Username found' : 'Username not found. Please make sure you have registered an account first.'
        ]);
    }

    /**
     * Create Midtrans Snap payment
     */
    public function createSnapPayment(Request $request)
    {
        $request->validate([
            'plan_id' => 'required|integer|exists:master_plans,id',
            'username' => 'required|string',
            'email' => 'nullable|email',
            'promo_code' => 'nullable|string',
        ]);

        // Verify username exists
        if (!$this->accountValidationService->usernameExistsForTopup($request->username)) {
            return response()->json([
                'success' => false,
                'message' => 'Username not found. Please make sure you have registered an account first.'
            ], 400);
        }

        // Load plan dari database
        $plan = MasterPlan::findOrFail($request->plan_id);

        if (!$plan->is_active) {
            return response()->json([
                'success' => false,
                'message' => 'This package is not available.'
            ], 400);
        }

        // Tentukan currency (default IDR)
        $currency = $request->input('currency', 'IDR');
        $price = $plan->getPrice($currency);
        $originalPrice = $price;

        // Validasi dan apply coupon jika ada
        $coupon = null;
        $discountAmount = 0;
        if ($request->promo_code) {
            $coupon = MasterCoupon::where('code', $request->promo_code)
                ->active()
                ->valid()
                ->first();

            if ($coupon) {
                $discountAmount = $coupon->calculateDiscount($price);
                $price = max(0, $price - $discountAmount);
            }
        }

        // Validasi affiliator code (jika promo_code bukan coupon, cek sebagai affiliator)
        $affiliator = null;
        $bonusAmount = 0;
        $commissionAmount = 0;

        if ($request->promo_code && !$coupon) {
            // Cek apakah promo_code adalah affiliator code
            $affiliator = MasterAffiliator::where('kode_referal', $request->promo_code)->first();

            if (!$affiliator) {
                $user = User::where('kode_referal', $request->promo_code)->first();
                if ($user) {
                    $affiliator = MasterAffiliator::firstOrCreate(
                        ['user_id' => $user->id],
                        [
                            'kode_referal' => $user->kode_referal,
                            'total_referrals' => 0,
                            'total_transactions' => 0,
                            'total_revenue' => 0,
                            'total_commission' => 0,
                        ]
                    );
                }
            }

            if ($affiliator) {
                // Hitung bonus dan komisi (10% dari amount paket)
                $bonusAmount = $plan->amount * 0.1; // 10% untuk pembeli
                $commissionAmount = $plan->amount * 0.1; // 10% untuk affiliator
            }
        }

        // Generate order ID
        $orderId = 'TOPUP-' . time() . '-' . strtoupper(substr(md5($request->username . $plan->id), 0, 8));

        // Prepare Midtrans request
        $serverKey = config('services.midtrans.server_key');
        $isProduction = config('services.midtrans.is_production', false);
        $baseUrl = $isProduction
            ? 'https://app.midtrans.com'
            : 'https://app.sandbox.midtrans.com';

        // Prepare item details
        $itemDetails = [
            [
                'id' => $plan->id,
                'price' => (float) $price,
                'quantity' => 1,
                'name' => $plan->name . ' - ' . $plan->item,
            ]
        ];

        // Customer details
        $customerDetails = [
            'first_name' => $request->username,
            'email' => $request->email ?? 'customer@example.com',
        ];

        // Transaction details
        $transactionDetails = [
            'order_id' => $orderId,
            'gross_amount' => (float) $price,
        ];

        // Prepare request payload
        $payload = [
            'transaction_details' => $transactionDetails,
            'item_details' => $itemDetails,
            'customer_details' => $customerDetails,
            'callbacks' => [
                'finish' => route('topup.index') . '?status=success',
                'unfinish' => route('topup.index') . '?status=pending',
                'error' => route('topup.index') . '?status=error',
            ],
            // Enable all payment methods - user will choose in Midtrans modal
            'enabled_payments' => [
                'credit_card',
                'gopay',
                'dana',
                'ovo',
                'qris',
                'shopeepay',
                'linkaja',
                'bank_transfer',
                'echannel',
                'permata_va',
                'bca_va',
                'bni_va',
                'bri_va',
                'cimb_va',
                'mandiri_va',
                'other_va',
            ],
        ];

        try {
            // Make request to Midtrans
            $response = Http::withBasicAuth($serverKey, '')
                ->withHeaders([
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                ])
                ->post($baseUrl . '/snap/v1/transactions', $payload);

            if ($response->successful()) {
                $data = $response->json();

                // Simpan transaksi ke database
                $transaction = TopupTransaction::create([
                    'order_id' => $orderId,
                    'user_id' => Auth::id(),
                    'username' => $request->username,
                    'email' => $request->email,
                    'plan_id' => $plan->id,
                    'coupon_id' => $coupon?->id,
                    'affiliator_id' => $affiliator?->id,
                    'price' => $originalPrice,
                    'discount_amount' => $discountAmount,
                    'final_price' => $price,
                    'currency' => $currency,
                    'bonus_amount' => $bonusAmount,
                    'commission_amount' => $commissionAmount,
                    'status' => 'pending',
                    'snap_token' => $data['token'],
                ]);

                // Create log entry
                $transaction->createLog(
                    'created',
                    'pending',
                    'Transaction created',
                    [
                        'plan' => $plan->name,
                        'price' => $price,
                        'currency' => $currency,
                    ],
                    $request->ip(),
                    $request->userAgent()
                );

                return response()->json([
                    'success' => true,
                    'snap_token' => $data['token'],
                    'order_id' => $orderId,
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to create payment. Please try again.',
                    'error' => $response->json()
                ], 400);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while creating payment.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get transaction history
     */
    public function getHistory(Request $request)
    {
        // Gunakan leftJoin untuk memastikan transaksi dengan plan null tetap muncul
        $query = TopupTransaction::with(['plan', 'coupon', 'affiliator'])
            ->orderBy('created_at', 'desc');

        // Cek apakah user adalah affiliator
        $isAffiliator = false;
        if (Auth::check()) {
            $userId = Auth::id();
            $isAffiliator = MasterAffiliator::where('user_id', $userId)->exists();

            // Hanya tampilkan transaksi yang user_id-nya sama dengan user yang sedang login
            $query->where('user_id', $userId);
        } else {
            // Filter berdasarkan email atau username jika tidak login
            if ($request->email) {
                $query->where('email', $request->email);
            } elseif ($request->username) {
                $query->where('username', $request->username);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Please provide email or username, or login first.',
                ], 400);
            }
        }

        // Pagination: 5 items per page
        $page = (int) $request->input('page', 1);
        $perPage = 5;
        $total = $query->count();
        $transactions = $query->skip(($page - 1) * $perPage)->take($perPage)->get();

        $mappedTransactions = $transactions->map(function ($transaction) {
            // Deteksi transaksi bonus affiliator berdasarkan midtrans_response atau order_id yang mengandung -AFF
            $midtransResponse = $transaction->midtrans_response ?? [];
            $isAffiliateBonus = (isset($midtransResponse['description']) &&
                                $midtransResponse['description'] === 'bonus affiliate top up') ||
                                str_contains($transaction->order_id, '-AFF');

            // Commission amount sudah dalam bentuk cash (bukan rupiah)
            $commissionAmount = 0;
            if ($isAffiliateBonus && isset($midtransResponse['commission_amount'])) {
                $commissionAmount = (float) $midtransResponse['commission_amount'];
            } else {
                $commissionAmount = (float) $transaction->commission_amount;
            }

            // Handle jika plan tidak ada (untuk transaksi bonus affiliator)
            $planName = 'N/A';
            $planAmount = 0;
            if ($transaction->plan) {
                $planName = $transaction->plan->name ?? 'N/A';
                $planAmount = (float) ($transaction->plan->amount ?? 0);
            } else {
                // Jika plan tidak ada, coba ambil dari midtrans_response atau set default
                if ($isAffiliateBonus && isset($midtransResponse['commission_amount'])) {
                    $planAmount = (float) $midtransResponse['commission_amount'];
                    $planName = $planAmount . ' Cash (Commission)';
                }
            }

            return [
                'id' => $transaction->id,
                'order_id' => $transaction->order_id,
                'plan_name' => $planName,
                'amount' => $planAmount,
                'price' => (float) $transaction->final_price,
                'currency' => $transaction->currency,
                'status' => $transaction->status,
                'bonus_amount' => (float) $transaction->bonus_amount,
                'commission_amount' => $commissionAmount,
                'is_affiliate_bonus' => $isAffiliateBonus,
                'midtrans_response' => $transaction->midtrans_response,
                'created_at' => $transaction->created_at->toISOString(),
                'settlement_time' => $transaction->settlement_time?->toISOString(),
            ];
        });

        return response()->json([
            'success' => true,
            'transactions' => $mappedTransactions,
            'is_affiliator' => $isAffiliator,
            'pagination' => [
                'current_page' => $page,
                'per_page' => $perPage,
                'total' => $total,
                'last_page' => (int) ceil($total / $perPage),
            ],
        ]);
    }

    /**
     * Cancel transaction
     */
    public function cancelTransaction(Request $request)
    {
        $request->validate([
            'order_id' => 'required|string',
        ]);

        $transaction = TopupTransaction::where('order_id', $request->order_id)->first();

        if (!$transaction) {
            return response()->json([
                'success' => false,
                'message' => 'Transaction not found',
            ], 404);
        }

        // Cek apakah user yang request adalah owner transaksi
        if (Auth::check()) {
            if ($transaction->user_id !== Auth::id()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthorized',
                ], 403);
            }
        } else {
            // Untuk non-logged in, cek berdasarkan email atau username
            if ($request->email && $transaction->email !== $request->email) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthorized',
                ], 403);
            }
            if ($request->username && $transaction->username !== $request->username) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthorized',
                ], 403);
            }
        }

        // Hanya bisa cancel jika status masih pending
        if ($transaction->status !== 'pending') {
            return response()->json([
                'success' => false,
                'message' => 'Transaction cannot be cancelled. Status: ' . $transaction->status,
            ], 400);
        }

        // Update status ke cancel
        $transaction->update([
            'status' => 'cancel',
            'midtrans_response' => array_merge($transaction->midtrans_response ?? [], [
                'cancelled_at' => now()->toISOString(),
                'cancelled_by' => Auth::check() ? 'user' : 'guest',
            ]),
        ]);

        // Log cancellation
        $transaction->createLog(
            'cancelled',
            'cancel',
            'Transaction cancelled by user',
            [
                'cancelled_by' => Auth::check() ? Auth::id() : 'guest',
            ],
            $request->ip(),
            $request->userAgent()
        );

        return response()->json([
            'success' => true,
            'message' => 'Transaction cancelled successfully',
        ]);
    }

    /**
     * Pay pending transaction (reopen snap payment)
     */
    public function payPendingTransaction(Request $request)
    {
        $request->validate([
            'order_id' => 'required|string',
        ]);

        $transaction = TopupTransaction::where('order_id', $request->order_id)
            ->with('plan')
            ->first();

        if (!$transaction) {
            return response()->json([
                'success' => false,
                'message' => 'Transaction not found',
            ], 404);
        }

        // Cek apakah user yang request adalah owner transaksi
        if (Auth::check()) {
            if ($transaction->user_id !== Auth::id()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthorized',
                ], 403);
            }
        }

        // Hanya bisa pay jika status masih pending
        if ($transaction->status !== 'pending') {
            return response()->json([
                'success' => false,
                'message' => 'Transaction cannot be paid. Status: ' . $transaction->status,
            ], 400);
        }

        // Jika masih ada snap_token, gunakan yang lama
        if ($transaction->snap_token) {
            return response()->json([
                'success' => true,
                'snap_token' => $transaction->snap_token,
                'order_id' => $transaction->order_id,
            ]);
        }

        // Jika tidak ada snap_token, buat baru
        $serverKey = config('services.midtrans.server_key');
        $isProduction = config('services.midtrans.is_production', false);
        $baseUrl = $isProduction
            ? 'https://app.midtrans.com'
            : 'https://app.sandbox.midtrans.com';

        // Prepare item details
        $itemDetails = [
            [
                'id' => $transaction->plan->id,
                'price' => (float) $transaction->final_price,
                'quantity' => 1,
                'name' => $transaction->plan->name . ' - ' . $transaction->plan->item,
            ]
        ];

        // Customer details
        $customerDetails = [
            'first_name' => $transaction->username,
            'email' => $transaction->email ?? 'customer@example.com',
        ];

        // Transaction details
        $transactionDetails = [
            'order_id' => $transaction->order_id,
            'gross_amount' => (float) $transaction->final_price,
        ];

        // Prepare request payload
        $payload = [
            'transaction_details' => $transactionDetails,
            'item_details' => $itemDetails,
            'customer_details' => $customerDetails,
            'callbacks' => [
                'finish' => route('topup.index') . '?status=success',
                'unfinish' => route('topup.index') . '?status=pending',
                'error' => route('topup.index') . '?status=error',
            ],
            'enabled_payments' => [
                'credit_card',
                'gopay',
                'dana',
                'ovo',
                'qris',
                'shopeepay',
                'linkaja',
                'bank_transfer',
                'echannel',
                'permata_va',
                'bca_va',
                'bni_va',
                'bri_va',
                'cimb_va',
                'mandiri_va',
                'other_va',
            ],
        ];

        try {
            $response = Http::withBasicAuth($serverKey, '')
                ->withHeaders([
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                ])
                ->post($baseUrl . '/snap/v1/transactions', $payload);

            if ($response->successful()) {
                $data = $response->json();

                // Update snap_token
                $transaction->update([
                    'snap_token' => $data['token'],
                ]);

                return response()->json([
                    'success' => true,
                    'snap_token' => $data['token'],
                    'order_id' => $transaction->order_id,
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to create payment. Please try again.',
                    'error' => $response->json()
                ], 400);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while creating payment.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}

