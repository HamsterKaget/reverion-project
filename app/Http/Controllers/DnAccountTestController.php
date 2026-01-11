<?php

namespace App\Http\Controllers;

use App\Models\DragonNest\DnMembership\DnAccount;
use App\Services\AccountValidationService;
use Illuminate\Http\Request;

class DnAccountTestController extends Controller
{
    /**
     * Menampilkan semua data DnAccount untuk testing
     */
    public function index()
    {
        try {
            // Get all accounts dengan pagination
            $accounts = DnAccount::orderBy('AccountID', 'desc')
                ->paginate(50);

            // Get total count
            $totalAccounts = DnAccount::count();
            $activeAccounts = DnAccount::active()->count();

            return view('frontend.pages.test.dn-account', [
                'accounts' => $accounts,
                'totalAccounts' => $totalAccounts,
                'activeAccounts' => $activeAccounts,
            ]);
        } catch (\Exception $e) {
            return view('frontend.pages.test.dn-account', [
                'error' => $e->getMessage(),
                'accounts' => collect(),
                'totalAccounts' => 0,
                'activeAccounts' => 0,
            ]);
        }
    }

    /**
     * Contoh penggunaan helper functions untuk validasi
     * Bisa diakses via: /test/dn-account/validate?email=test@example.com&username=testuser
     */
    public function validateExample(Request $request)
    {
        $email = $request->input('email');
        $username = $request->input('username');

        $results = [];

        // Contoh 1: Menggunakan helper functions (cara paling mudah)
        if ($email) {
            $results['email_exists'] = email_exists($email);
            $results['is_email_registered'] = is_email_registered($email);
        }

        if ($username) {
            $results['username_exists'] = username_exists($username);
            $results['is_username_taken'] = is_username_taken($username);
        }

        // Contoh 2: Menggunakan service class via dependency injection
        $validationService = app(AccountValidationService::class);
        if ($email) {
            $results['email_exists_via_service'] = $validationService->emailExists($email);
        }
        if ($username) {
            $results['username_exists_via_service'] = $validationService->usernameExists($username);
        }

        // Contoh 3: Menggunakan service class via constructor injection (di method lain)
        // public function __construct(AccountValidationService $validationService)
        // {
        //     $this->validationService = $validationService;
        // }

        return response()->json([
            'message' => 'Contoh penggunaan helper functions dan service class',
            'input' => [
                'email' => $email,
                'username' => $username,
            ],
            'results' => $results,
        ]);
    }
}
