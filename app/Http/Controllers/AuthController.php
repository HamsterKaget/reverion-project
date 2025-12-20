<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ];

        $messages = [
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 6 karakter',
        ];

        // Add reCAPTCHA validation if enabled
        if (config('services.recaptcha.status', true)) {
            $rules['g-recaptcha-response'] = 'required';
            $messages['g-recaptcha-response.required'] = 'Harap verifikasi reCAPTCHA';
        }

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput($request->except('password'));
        }

        // Verify reCAPTCHA
        $recaptchaResponse = $this->verifyRecaptcha($request->input('g-recaptcha-response'));
        if (!$recaptchaResponse) {
            return back()
                ->withErrors(['g-recaptcha-response' => 'Verifikasi reCAPTCHA gagal. Silakan coba lagi.'])
                ->withInput($request->except('password'));
        }

        // Attempt login (can use email or username)
        $loginField = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $credentials = [
            $loginField => $request->email,
            'password' => $request->password
        ];
        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            // Update last_login
            Auth::user()->update(['last_login' => now()]);

            $request->session()->regenerate();

            return redirect()->intended(route('home'))
                ->with('success', 'Login berhasil! Selamat datang kembali.');
        }

        return back()
            ->withErrors(['email' => 'Email atau password tidak valid.'])
            ->withInput($request->except('password'));
    }

    /**
     * Handle register request
     */
    public function register(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'username' => 'required|string|min:3|max:20|unique:users,username|regex:/^[a-zA-Z0-9_-]+$/',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'kode_referal' => 'nullable|string|max:255',
        ];

        $messages = [
            'name.required' => 'Nama wajib diisi',
            'name.max' => 'Nama maksimal 255 karakter',
            'username.required' => 'Username wajib diisi',
            'username.min' => 'Username minimal 3 karakter',
            'username.max' => 'Username maksimal 20 karakter',
            'username.unique' => 'Username sudah digunakan',
            'username.regex' => 'Username hanya boleh mengandung huruf, angka, underscore (_), dan dash (-)',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
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
            return back()
                ->withErrors($validator)
                ->withInput($request->except('password', 'password_confirmation'));
        }

        // Verify reCAPTCHA
        $recaptchaResponse = $this->verifyRecaptcha($request->input('g-recaptcha-response'));
        if (!$recaptchaResponse) {
            return back()
                ->withErrors(['g-recaptcha-response' => 'Verifikasi reCAPTCHA gagal. Silakan coba lagi.'])
                ->withInput($request->except('password', 'password_confirmation'));
        }

        // Create user
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'last_password_change' => now(),
            'kode_referal' => $request->kode_referal ?? null,
        ]);

        // Auto login after registration
        Auth::login($user);

        // Update last_login
        $user->update(['last_login' => now()]);

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

        return redirect()->route('home')
            ->with('success', 'Anda telah berhasil logout.');
    }

    /**
     * Check username availability
     */
    public function checkUsername(Request $request)
    {
        $username = $request->input('username');

        if (empty($username)) {
            return response()->json([
                'available' => false,
                'message' => 'Username tidak boleh kosong'
            ], 400);
        }

        // Validate username format (alphanumeric, underscore, dash, 3-20 chars)
        if (!preg_match('/^[a-zA-Z0-9_-]{3,20}$/', $username)) {
            return response()->json([
                'available' => false,
                'message' => 'Username hanya boleh mengandung huruf, angka, underscore (_), dan dash (-). Panjang 3-20 karakter.'
            ], 400);
        }

        $exists = User::where('username', $username)->exists();

        return response()->json([
            'available' => !$exists,
            'message' => $exists ? 'Username sudah digunakan' : 'Username tersedia'
        ]);
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

