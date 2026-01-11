@extends('frontend.layouts.app')

@section('seo')
    <title>Login - Dragon Nest Private Server</title>
    <meta name="description" content="Login to your Reverion account and continue your adventure.">
@endsection

@section('pre-css')
    @if(config('services.recaptcha.status', true) && config('services.recaptcha.site_key'))
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    @endif
@endsection

@section('body')
    <!-- Login Section -->
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
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <h2 class="text-3xl font-bold text-white mb-2">Login</h2>
                        <p class="text-gray-300">Sign in to your Reverion account</p>
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

                    <!-- Login Form -->
                    <form action="{{ route('login.post') }}" method="POST" class="space-y-6">
                        @csrf

                        <!-- Email/Username Field -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-300 mb-2">
                                Email or Username
                            </label>
                            <input 
                                type="text" 
                                id="email" 
                                name="email" 
                                value="{{ old('email') }}"
                                required
                                class="w-full px-4 py-3 bg-black/30 border border-red-500/30 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all"
                                placeholder="email@example.com or username"
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
                                placeholder="••••••••"
                            >
                        </div>

                        <!-- Remember Me & Forgot Password -->
                        <div class="flex items-center justify-between">
                            <label class="flex items-center">
                                <input 
                                    type="checkbox" 
                                    name="remember" 
                                    class="w-4 h-4 text-red-600 bg-black/30 border-red-500/30 rounded focus:ring-red-500 focus:ring-2"
                                >
                                <span class="ml-2 text-sm text-gray-300">Remember me</span>
                            </label>
                            <a href="#" class="text-sm text-red-400 hover:text-red-300 transition-colors">
                                Forgot password?
                            </a>
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
                            Login
                        </button>
                    </form>

                    <!-- Register Link -->
                    <div class="mt-6 text-center">
                        <p class="text-gray-300 text-sm">
                            Don't have an account? 
                            <a href="{{ route('register') }}" class="text-red-400 hover:text-red-300 font-semibold transition-colors">
                                Sign up now
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

