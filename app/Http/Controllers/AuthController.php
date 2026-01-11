<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\DragonNest\DnMembership\DnAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Show login page
     */
    public function showLogin()
    {
        return view('frontend.pages.auth.login');
    }

    /**
     * Show register page
     */
    public function showRegister()
    {
        return view('frontend.pages.auth.register');
    }

    /**
     * Handle login request
     */
    public function login(Request $request)
    {
        $rules = [
            'email' => 'required|string', // Changed from 'required|email' to accept both email and username
            'password' => 'required|string|min:6',
        ];

        $messages = [
            'email.required' => 'Email or username is required',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 6 characters',
        ];

        // Add reCAPTCHA validation if enabled
        if (config('services.recaptcha.status', true)) {
            $rules['g-recaptcha-response'] = 'required';
            $messages['g-recaptcha-response.required'] = 'Please verify reCAPTCHA';
        }

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'errors' => $validator->errors()
                ], 422);
            }
            return back()
                ->withErrors($validator)
                ->withInput($request->except('password'));
        }

        // Verify reCAPTCHA
        $recaptchaResponse = $this->verifyRecaptcha($request->input('g-recaptcha-response'));
        if (!$recaptchaResponse) {
            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'errors' => ['g-recaptcha-response' => ['reCAPTCHA verification failed. Please try again.']]
                ], 422);
            }
            return back()
                ->withErrors(['g-recaptcha-response' => 'reCAPTCHA verification failed. Please try again.'])
                ->withInput($request->except('password'));
        }

        // Attempt login (can use email or username)
        // Find user by email or username
        $loginValue = $request->email;
        $isEmail = filter_var($loginValue, FILTER_VALIDATE_EMAIL);
        
        $user = null;
        if ($isEmail) {
            $user = User::where('email', $loginValue)->first();
        } else {
            $user = User::where('username', $loginValue)->first();
        }

        if (!$user || !Hash::check($request->password, $user->password)) {
            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'errors' => ['email' => ['Invalid email/username or password.']]
                ], 422);
            }
            return back()
                ->withErrors(['email' => 'Invalid email/username or password.'])
                ->withInput($request->except('password'));
        }

        // Login the user
        $remember = $request->has('remember');
        Auth::login($user, $remember);

        // Update last_login
        $user->update(['last_login' => now()]);

        $request->session()->regenerate();

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Login successful! Welcome back.',
                'redirect' => route('home')
            ]);
        }

        return redirect()->intended(route('home'))
            ->with('success', 'Login successful! Welcome back.');
    }

    /**
     * Handle register request
     * Dual database transaction: User (MariaDB) + DnAccount (SQL Server)
     */
    public function register(Request $request)
    {
        $rules = [
            'name' => 'nullable|string|max:255', // Optional, will be set to username if not provided
            'username' => 'required|string|min:3|max:20|regex:/^[a-zA-Z0-9_-]+$/',
            'email' => 'required|email',
            'password' => 'required|string|min:6|confirmed',
            'kode_referal' => 'nullable|string|max:255',
        ];

        $messages = [
            'name.required' => 'Nama wajib diisi',
            'name.max' => 'Nama maksimal 255 karakter',
            'username.required' => 'Username wajib diisi',
            'username.min' => 'Username minimal 3 karakter',
            'username.max' => 'Username maksimal 20 karakter',
            'username.regex' => 'Username hanya boleh mengandung huruf, angka, underscore (_), dan dash (-)',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 6 karakter',
            'password.confirmed' => 'Konfirmasi password tidak cocok',
        ];

        // Add reCAPTCHA validation if enabled
        if (config('services.recaptcha.status', true)) {
            $rules['g-recaptcha-response'] = 'required';
            $messages['g-recaptcha-response.required'] = 'Harap verifikasi reCAPTCHA';
        }

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'errors' => $validator->errors()
                ], 422);
            }
            return back()
                ->withErrors($validator)
                ->withInput($request->except('password', 'password_confirmation'));
        }

        // Verify reCAPTCHA
        $recaptchaResponse = $this->verifyRecaptcha($request->input('g-recaptcha-response'));
        if (!$recaptchaResponse) {
            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'errors' => ['g-recaptcha-response' => ['reCAPTCHA verification failed. Please try again.']]
                ], 422);
            }
            return back()
                ->withErrors(['g-recaptcha-response' => 'Verifikasi reCAPTCHA gagal. Silakan coba lagi.'])
                ->withInput($request->except('password', 'password_confirmation'));
        }

        // Validasi email dan username menggunakan helper (cek di database)
        if (email_exists($request->email)) {
            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'errors' => ['email' => ['Email is already registered']]
                ], 422);
            }
            return back()
                ->withErrors(['email' => 'Email sudah terdaftar'])
                ->withInput($request->except('password', 'password_confirmation'));
        }

        if (username_exists($request->username)) {
            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'errors' => ['username' => ['Username is already taken']]
                ], 422);
            }
            return back()
                ->withErrors(['username' => 'Username sudah digunakan'])
                ->withInput($request->except('password', 'password_confirmation'));
        }

        // Dual database transaction dengan AND GATE logic
        try {
            // Start transaction untuk MariaDB (User)
            DB::beginTransaction();

            // Create User di MariaDB
            // Set name = username (name field is hidden in form)
            $user = User::create([
                'name' => $request->name ?: $request->username,
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'last_password_change' => now(),
                'kode_referal' => $request->kode_referal ?? null,
            ]);

            // Start transaction untuk SQL Server (DnAccount)
            DB::connection('sqlsrv_dn_member')->beginTransaction();

            try {
                // Create DnAccount di SQL Server
                // Password di game server biasanya menggunakan MD5
                $dnAccount = DnAccount::create([
                    'AccountName' => $request->username,
                    'NxLoginPwd' => md5($request->password), // MD5 hash untuk game server
                    'AccountLevelCode' => 0, // Default level
                    'CharacterCreateLimit' => 4, // Default limit
                    'CharacterMaxCount' => 4, // Default max count
                    'RegisterDate' => now(),
                    'PublisherCode' => 4, // Default publisher
                    'LockFlag' => 0, // Active account
                ]);

                // Commit SQL Server transaction
                DB::connection('sqlsrv_dn_member')->commit();

                // Commit MariaDB transaction
                DB::commit();

            } catch (\Exception $e) {
                // Rollback SQL Server jika gagal
                DB::connection('sqlsrv_dn_member')->rollBack();
                // Rollback MariaDB
                DB::rollBack();

                // Log error untuk debugging
                \Log::error('DnAccount creation failed: ' . $e->getMessage());

                if ($request->expectsJson() || $request->ajax()) {
                    return response()->json([
                        'errors' => ['username' => ['Failed to create game account. Please try again or contact administrator.']]
                    ], 422);
                }
                return back()
                    ->withErrors(['username' => 'Gagal membuat akun game. Silakan coba lagi atau hubungi administrator.'])
                    ->withInput($request->except('password', 'password_confirmation'));
            }

        } catch (\Exception $e) {
            // Rollback MariaDB jika gagal
            if (DB::transactionLevel() > 0) {
                DB::rollBack();
            }

            // Rollback SQL Server jika masih ada transaction
            try {
                if (DB::connection('sqlsrv_dn_member')->transactionLevel() > 0) {
                    DB::connection('sqlsrv_dn_member')->rollBack();
                }
            } catch (\Exception $rollbackException) {
                // Ignore rollback error
            }

            // Log error untuk debugging
            \Log::error('User creation failed: ' . $e->getMessage());

            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'errors' => ['email' => ['Failed to create account. Please try again or contact administrator.']]
                ], 422);
            }
            return back()
                ->withErrors(['email' => 'Gagal membuat akun. Silakan coba lagi atau hubungi administrator.'])
                ->withInput($request->except('password', 'password_confirmation'));
        }

        // Auto login after registration
        Auth::login($user);

        // Update last_login
        $user->update(['last_login' => now()]);

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Registration successful! Welcome to Reverion.',
                'redirect' => route('home')
            ]);
        }

        return redirect()->route('home')
            ->with('success', 'Registrasi berhasil! Selamat bergabung dengan Reverion.');
    }

    /**
     * Handle logout request
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'You have been successfully logged out.',
                'redirect' => route('home')
            ]);
        }

        return redirect()->route('home')
            ->with('success', 'You have been successfully logged out.');
    }

    public function checkUsername(Request $request)
    {
        $username = $request->input('username');

        if (empty($username)) {
            return response()->json([
                'available' => false,
                'message' => 'Username cannot be empty'
            ], 400);
        }

        // Validate username format (alphanumeric, underscore, dash, 3-20 chars)
        if (!preg_match('/^[a-zA-Z0-9_-]{3,20}$/', $username)) {
            return response()->json([
                'available' => false,
                'message' => 'Username may only contain letters, numbers, underscores (_), and dashes (-). Length must be between 3 and 20 characters.'
            ], 400);
        }

        // Check in DnAccount using helper
        $exists = username_exists($username);

        return response()->json([
            'available' => !$exists,
            'message' => $exists ? 'Username is already taken' : 'Username is available'
        ]);
    }

    /**
     * Check email availability
     */
    public function checkEmail(Request $request)
    {
        $email = $request->input('email');

        if (empty($email)) {
            return response()->json([
                'available' => false,
                'message' => 'Email cannot be empty'
            ], 400);
        }

        // Validate email format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return response()->json([
                'available' => false,
                'message' => 'Invalid email format'
            ], 400);
        }

        // Check in User using helper
        $exists = email_exists($email);

        return response()->json([
            'available' => !$exists,
            'message' => $exists ? 'Email is already registered' : 'Email is available'
        ]);
    }


    /**
     * Show profile page
     */
    public function showProfile()
    {
        $user = Auth::user();
        return view('frontend.pages.auth.profile', compact('user'));
    }

    /**
     * Update profile (password only)
     */
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $rules = [
            'current_password' => 'required|string',
            'password' => 'required|string|min:6|confirmed',
        ];

        $messages = [
            'current_password.required' => 'Password saat ini wajib diisi',
            'password.required' => 'Password baru wajib diisi',
            'password.min' => 'Password baru minimal 6 karakter',
            'password.confirmed' => 'Konfirmasi password tidak cocok',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput($request->except('password', 'password_confirmation', 'current_password'));
        }

        // Verify current password
        if (!Hash::check($request->current_password, $user->password)) {
            return back()
                ->withErrors(['current_password' => 'Password saat ini tidak valid'])
                ->withInput($request->except('password', 'password_confirmation', 'current_password'));
        }

        // Dual database update: User (MariaDB) + DnAccount (SQL Server)
        try {
            // Start transaction untuk MariaDB (User)
            DB::beginTransaction();

            // Update User password di MariaDB
            $user->update([
                'password' => Hash::make($request->password),
                'last_password_change' => now(),
            ]);

            // Start transaction untuk SQL Server (DnAccount)
            DB::connection('sqlsrv_dn_member')->beginTransaction();

            try {
                // Update DnAccount password di SQL Server (MD5 hash)
                $dnAccount = DnAccount::where('AccountName', $user->username)->first();
                
                if ($dnAccount) {
                    $dnAccount->update([
                        'NxLoginPwd' => md5($request->password), // MD5 hash untuk game server
                    ]);
                }

                // Commit SQL Server transaction
                DB::connection('sqlsrv_dn_member')->commit();

                // Commit MariaDB transaction
                DB::commit();

            } catch (\Exception $e) {
                // Rollback SQL Server jika gagal
                DB::connection('sqlsrv_dn_member')->rollBack();
                // Rollback MariaDB
                DB::rollBack();

                // Log error untuk debugging
                \Log::error('DnAccount password update failed: ' . $e->getMessage());

                return back()
                    ->withErrors(['password' => 'Gagal mengupdate password game. Silakan coba lagi atau hubungi administrator.'])
                    ->withInput($request->except('password', 'password_confirmation', 'current_password'));
            }

        } catch (\Exception $e) {
            // Rollback MariaDB jika gagal
            if (DB::transactionLevel() > 0) {
                DB::rollBack();
            }

            // Rollback SQL Server jika masih ada transaction
            try {
                if (DB::connection('sqlsrv_dn_member')->transactionLevel() > 0) {
                    DB::connection('sqlsrv_dn_member')->rollBack();
                }
            } catch (\Exception $rollbackException) {
                // Ignore rollback error
            }

            // Log error untuk debugging
            \Log::error('User password update failed: ' . $e->getMessage());

            return back()
                ->withErrors(['password' => 'Gagal mengupdate password. Silakan coba lagi atau hubungi administrator.'])
                ->withInput($request->except('password', 'password_confirmation', 'current_password'));
        }

        return redirect()->route('profile.index')
            ->with('success', 'Password berhasil diubah.');
    }

    /**
     * Verify reCAPTCHA response
     */
    private function verifyRecaptcha($response)
    {
        // Skip verification if reCAPTCHA is disabled
        if (!config('services.recaptcha.status', true)) {
            return true;
        }

        if (empty($response)) {
            return false;
        }

        $secret = config('services.recaptcha.secret');
        if (empty($secret)) {
            return false;
        }

        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = [
            'secret' => $secret,
            'response' => $response,
            'remoteip' => request()->ip(),
        ];

        $options = [
            'http' => [
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($data),
            ],
        ];

        $context = stream_context_create($options);
        $result = @file_get_contents($url, false, $context);

        if ($result === false) {
            return false;
        }

        $json = json_decode($result, true);

        return isset($json['success']) && $json['success'] === true;
    }
}

