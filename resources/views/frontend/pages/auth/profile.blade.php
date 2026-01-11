@extends('frontend.layouts.app')

@section('seo')
    <title>Profile - Dragon Nest Private Server</title>
    <meta name="description" content="Manage your Reverion account profile and settings.">
@endsection

@section('body')
    <!-- Profile Section -->
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
        <div class="relative z-20 max-w-2xl w-full mx-auto px-4 sm:px-6 lg:px-8 mt-20">
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
                        <h2 class="text-3xl font-bold text-white mb-2">Profile</h2>
                        <p class="text-gray-300">Kelola informasi akun Anda</p>
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

                    <!-- Profile Information (Read-only) -->
                    <div class="mb-8 space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">
                                Username
                            </label>
                            <input
                                type="text"
                                value="{{ $user->username }}"
                                disabled
                                class="w-full px-4 py-3 bg-black/20 border border-red-500/20 rounded-lg text-gray-400 cursor-not-allowed"
                            >
                            <p class="mt-1 text-xs text-gray-500">Username tidak dapat diubah</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">
                                Email
                            </label>
                            <input
                                type="email"
                                value="{{ $user->email }}"
                                disabled
                                class="w-full px-4 py-3 bg-black/20 border border-red-500/20 rounded-lg text-gray-400 cursor-not-allowed"
                            >
                            <p class="mt-1 text-xs text-gray-500">Email tidak dapat diubah</p>
                        </div>
                    </div>

                    <!-- Change Password Form -->
                    <div class="border-t border-red-500/30 pt-8">
                        <h3 class="text-xl font-bold text-white mb-6">Ubah Password</h3>
                        
                        <form action="{{ route('profile.update') }}" method="POST" class="space-y-6">
                            @csrf

                            <!-- Current Password -->
                            <div>
                                <label for="current_password" class="block text-sm font-medium text-gray-300 mb-2">
                                    Password Saat Ini <span class="text-red-400">*</span>
                                </label>
                                <input
                                    type="password"
                                    id="current_password"
                                    name="current_password"
                                    required
                                    class="w-full px-4 py-3 bg-black/30 border border-red-500/30 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all"
                                    placeholder="Masukkan password saat ini"
                                >
                                @error('current_password')
                                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- New Password -->
                            <div>
                                <label for="password" class="block text-sm font-medium text-gray-300 mb-2">
                                    Password Baru <span class="text-red-400">*</span>
                                </label>
                                <input
                                    type="password"
                                    id="password"
                                    name="password"
                                    required
                                    minlength="6"
                                    class="w-full px-4 py-3 bg-black/30 border border-red-500/30 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all"
                                    placeholder="Masukkan password baru (min. 6 karakter)"
                                >
                                @error('password')
                                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Confirm Password -->
                            <div>
                                <label for="password_confirmation" class="block text-sm font-medium text-gray-300 mb-2">
                                    Konfirmasi Password Baru <span class="text-red-400">*</span>
                                </label>
                                <input
                                    type="password"
                                    id="password_confirmation"
                                    name="password_confirmation"
                                    required
                                    minlength="6"
                                    class="w-full px-4 py-3 bg-black/30 border border-red-500/30 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all"
                                    placeholder="Konfirmasi password baru"
                                >
                            </div>

                            <!-- Submit Button -->
                            <div class="pt-4">
                                <button
                                    type="submit"
                                    class="w-full bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white px-6 py-3.5 rounded-lg font-semibold transition-all duration-300 shadow-lg shadow-red-500/30 hover:shadow-xl hover:shadow-red-500/40 transform hover:-translate-y-0.5"
                                >
                                    Ubah Password
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
