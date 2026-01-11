<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
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
        return view('frontend.pages.topup.index');
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
            'package' => 'required|string',
            'cash' => 'required|string',
            'price' => 'required|numeric|min:0',
            'currency' => 'required|in:IDR,USD',
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

        // Prepare Midtrans request
        $serverKey = config('services.midtrans.server_key');
        $isProduction = config('services.midtrans.is_production', false);
        $baseUrl = $isProduction 
            ? 'https://app.midtrans.com' 
            : 'https://app.sandbox.midtrans.com';

        // Generate order ID
        $orderId = 'TOPUP-' . time() . '-' . strtoupper(substr(md5($request->username . $request->package), 0, 8));

        // Prepare item details
        $itemDetails = [
            [
                'id' => $request->package,
                'price' => (float) $request->price,
                'quantity' => 1,
                'name' => $request->cash . ' Reverion Cash',
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
            'gross_amount' => (float) $request->price,
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
                
                // Save transaction to database if user is logged in
                if (Auth::check()) {
                    // TODO: Save to transactions table when table is created
                    // Transaction::create([...]);
                }

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
}

