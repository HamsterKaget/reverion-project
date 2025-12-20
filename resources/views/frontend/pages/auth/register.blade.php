@extends('frontend.layouts.app')

@section('seo')
    <title>Register - Dragon Nest Private Server</title>
    <meta name="description" content="Create your Reverion account and start your adventure today.">
@endsection

@section('pre-css')
    @if(config('services.recaptcha.status', true) && config('services.recaptcha.site_key'))
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    @endif
@endsection

@section('body')
    <!-- Register Section -->
    <section class="section-animate relative min-h-screen flex items-center justify-center overflow-hidden py-20">
        <!-- Background Image -->
        <div class="absolute inset-0 w-full h-full">
            <div class="hero-bg-slide hero-bg-slide-active" style="background-image: url('{{ asset('assets/bg-1.jpeg') }}');"></div>
        </div>

        <!-- Dark Overlay -->
        <div class="absolute inset-0 bg-black/80 z-10"></div>

        <!-- Red Accent Overlay -->
        <div class="absolute inset-0 bg-gradient-to-br from-red-950/20 via-transparent to-black/40 z-10"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_30%_50%,rgba(220,38,38,0.15),transparent_70%)] z-10"></div>

        <!-- Content Container -->
        <div class="relative z-20 max-w-md w-full mx-auto px-4 sm:px-6 lg:px-8">
            <div class="backdrop-blur-xl bg-gradient-to-br from-black/40 via-red-950/30 to-black/40 border-2 border-red-500/40 rounded-2xl p-8 shadow-2xl shadow-red-900/30 relative overflow-hidden">
                <!-- Glow Effect -->
                <div class="absolute inset-0 bg-gradient-to-br from-red-600/10 via-transparent to-transparent pointer-events-none"></div>
                <div class="absolute -inset-1 bg-gradient-to-r from-red-600/20 to-transparent blur-xl opacity-50"></div>

                <div class="relative z-10">
                    <!-- Header -->
                    <div class="text-center mb-8">
                        <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-gradient-to-br from-red-600 to-red-700 mb-4 shadow-lg shadow-red-900/50">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                            </svg>
                        </div>
                        <h2 class="text-3xl font-bold text-white mb-2">Daftar</h2>
                        <p class="text-gray-300">Buat akun baru dan mulai petualangan Anda</p>
                    </div>

                    <!-- Success/Error Messages -->
                    @if(session('success'))
                        <div class="mb-6 p-4 bg-green-500/20 border border-green-500/50 rounded-lg text-green-300">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="mb-6 p-4 bg-red-500/20 border border-red-500/50 rounded-lg">
                            <ul class="list-disc list-inside text-red-300 text-sm space-y-1">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Register Form -->
                    <form action="{{ route('register.post') }}" method="POST" class="space-y-6">
                        @csrf

                        <!-- Name Field -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-300 mb-2">
                                Nama
                            </label>
                            <input 
                                type="text" 
                                id="name" 
                                name="name" 
                                value="{{ old('name') }}"
                                required
                                class="w-full px-4 py-3 bg-black/30 border border-red-500/30 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all"
                                placeholder="Nama lengkap"
                            >
                        </div>

                        <!-- Username Field with Check Button -->
                        <div>
                            <label for="username" class="block text-sm font-medium text-gray-300 mb-2">
                                Username
                            </label>
                            <div class="flex gap-2">
                                <input 
                                    type="text" 
                                    id="username" 
                                    name="username" 
                                    value="{{ old('username') }}"
                                    required
                                    class="flex-1 px-4 py-3 bg-black/30 border border-red-500/30 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all"
                                    placeholder="username (3-20 karakter)"
                                    pattern="[a-zA-Z0-9_-]{3,20}"
                                >
                                <button 
                                    type="button" 
                                    id="check-username-btn"
                                    class="px-6 py-3 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white rounded-lg font-semibold transition-all duration-300 whitespace-nowrap"
                                >
                                    Cek
                                </button>
                            </div>
                            <div id="username-check-result" class="mt-2 text-sm hidden"></div>
                        </div>

                        <!-- Email Field -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-300 mb-2">
                                Email
                            </label>
                            <input 
                                type="email" 
                                id="email" 
                                name="email" 
                                value="{{ old('email') }}"
                                required
                                class="w-full px-4 py-3 bg-black/30 border border-red-500/30 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all"
                                placeholder="nama@email.com"
                            >
                        </div>

                        <!-- Password Field -->
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-300 mb-2">
                                Password
                            </label>
                            <input 
                                type="password" 
                                id="password" 
                                name="password" 
                                required
                                class="w-full px-4 py-3 bg-black/30 border border-red-500/30 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all"
                                placeholder="Minimal 6 karakter"
                            >
                        </div>

                        <!-- Password Confirmation Field -->
                        <div>
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-300 mb-2">
                                Konfirmasi Password
                            </label>
                            <input 
                                type="password" 
                                id="password_confirmation" 
                                name="password_confirmation" 
                                required
                                class="w-full px-4 py-3 bg-black/30 border border-red-500/30 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all"
                                placeholder="Ulangi password"
                            >
                        </div>

                        <!-- Kode Referal Field (Optional) -->
                        <div>
                            <label for="kode_referal" class="block text-sm font-medium text-gray-300 mb-2">
                                Kode Referal <span class="text-gray-500 text-xs">(Opsional)</span>
                            </label>
                            <input 
                                type="text" 
                                id="kode_referal" 
                                name="kode_referal" 
                                value="{{ old('kode_referal') }}"
                                class="w-full px-4 py-3 bg-black/30 border border-red-500/30 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all"
                                placeholder="Masukkan kode referal jika ada"
                            >
                        </div>

                        <!-- reCAPTCHA -->
                        @if(config('services.recaptcha.status', true) && config('services.recaptcha.site_key'))
                            <div class="flex justify-center">
                                <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>
                            </div>
                            @error('g-recaptcha-response')
                                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        @endif

                        <!-- Submit Button -->
                        <button 
                            type="submit"
                            class="w-full bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white py-3 px-6 rounded-lg font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg shadow-red-900/50 hover:shadow-red-900/70"
                        >
                            Daftar
                        </button>
                    </form>

                    <!-- Login Link -->
                    <div class="mt-6 text-center">
                        <p class="text-gray-300 text-sm">
                            Sudah punya akun? 
                            <a href="{{ route('login') }}" class="text-red-400 hover:text-red-300 font-semibold transition-colors">
                                Login sekarang
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('post-js')
    <script>
        // Username check functionality
        document.getElementById('check-username-btn')?.addEventListener('click', function() {
            const usernameInput = document.getElementById('username');
            const username = usernameInput.value.trim();
            const resultDiv = document.getElementById('username-check-result');
            const checkBtn = this;

            if (!username) {
                resultDiv.className = 'mt-2 text-sm text-red-400';
                resultDiv.textContent = 'Masukkan username terlebih dahulu';
                resultDiv.classList.remove('hidden');
                return;
            }

            // Validate format
            if (!/^[a-zA-Z0-9_-]{3,20}$/.test(username)) {
                resultDiv.className = 'mt-2 text-sm text-red-400';
                resultDiv.textContent = 'Username hanya boleh mengandung huruf, angka, underscore (_), dan dash (-). Panjang 3-20 karakter.';
                resultDiv.classList.remove('hidden');
                return;
            }

            // Disable button and show loading
            checkBtn.disabled = true;
            checkBtn.textContent = 'Mengecek...';
            resultDiv.classList.add('hidden');

            // Check username availability
            fetch('{{ route("check.username") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ username: username })
            })
            .then(response => response.json())
            .then(data => {
                checkBtn.disabled = false;
                checkBtn.textContent = 'Cek';
                resultDiv.classList.remove('hidden');

                if (data.available) {
                    resultDiv.className = 'mt-2 text-sm text-green-400';
                    resultDiv.textContent = '✓ ' + data.message;
                    usernameInput.classList.remove('border-red-500');
                    usernameInput.classList.add('border-green-500');
                } else {
                    resultDiv.className = 'mt-2 text-sm text-red-400';
                    resultDiv.textContent = '✗ ' + data.message;
                    usernameInput.classList.remove('border-green-500');
                    usernameInput.classList.add('border-red-500');
                }
            })
            .catch(error => {
                checkBtn.disabled = false;
                checkBtn.textContent = 'Cek';
                resultDiv.className = 'mt-2 text-sm text-red-400';
                resultDiv.textContent = 'Terjadi kesalahan. Silakan coba lagi.';
                resultDiv.classList.remove('hidden');
            });
        });

        // Reset username check result when username changes
        document.getElementById('username')?.addEventListener('input', function() {
            const resultDiv = document.getElementById('username-check-result');
            resultDiv.classList.add('hidden');
            this.classList.remove('border-red-500', 'border-green-500');
        });
    </script>
@endsection

