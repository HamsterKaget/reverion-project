<?php

namespace App\Http\Controllers;

use App\Models\Leaderboard;
use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.pages.home.index');
    }

    public function getLeaderboard(Request $request)
    {
        $type = $request->get('type', 'donation');
        $limit = $request->get('limit', 10);

        $leaderboards = Leaderboard::active()
            ->type($type)
            ->top($limit)
            ->get();

        return response()->json([
            'success' => true,
            'leaderboards' => $leaderboards,
        ]);
    }

    /**
     * Create donation snap payment
     */
    public function createDonationSnap(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'amount' => 'required|numeric|min:1000', // Minimum 1000 rupiah
            'email' => 'nullable|email',
        ]);

        $amount = (float) $request->amount;
        
        // Generate order ID dengan prefix DON-
        $orderId = 'DON-' . time() . '-' . strtoupper(substr(md5($request->name . $amount), 0, 8));

        // Prepare Midtrans request
        $serverKey = config('services.midtrans.server_key');
        $isProduction = config('services.midtrans.is_production', false);
        $baseUrl = $isProduction
            ? 'https://app.midtrans.com'
            : 'https://app.sandbox.midtrans.com';

        // Prepare item details
        $itemDetails = [
            [
                'id' => 'DONATION',
                'price' => $amount,
                'quantity' => 1,
                'name' => 'Donation to Reverion',
            ]
        ];

        // Customer details
        $customerDetails = [
            'first_name' => $request->name,
            'email' => $request->email ?? 'donor@example.com',
        ];

        // Transaction details
        $transactionDetails = [
            'order_id' => $orderId,
            'gross_amount' => $amount,
        ];

        // Prepare request payload
        $payload = [
            'transaction_details' => $transactionDetails,
            'item_details' => $itemDetails,
            'customer_details' => $customerDetails,
            'callbacks' => [
                'finish' => route('home') . '?status=success',
                'unfinish' => route('home') . '?status=pending',
                'error' => route('home') . '?status=error',
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
            // Make request to Midtrans
            $response = Http::withBasicAuth($serverKey, '')
                ->withHeaders([
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                ])
                ->post($baseUrl . '/snap/v1/transactions', $payload);

            if ($response->successful()) {
                $data = $response->json();

                // Simpan donation ke database
                $donation = Donation::create([
                    'name' => $request->name,
                    'description' => $request->description,
                    'amount' => $amount,
                    'order_id' => $orderId,
                    'user_id' => Auth::id(),
                    'email' => $request->email,
                    'status' => 'pending',
                ]);

                Log::info('Donation created', [
                    'order_id' => $orderId,
                    'name' => $request->name,
                    'amount' => $amount,
                ]);

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
            Log::error('Donation creation error', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'An error occurred while creating payment.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}

