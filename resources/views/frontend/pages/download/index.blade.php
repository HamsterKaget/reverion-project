@extends('frontend.layouts.app')

@section('seo')
    <title>Download Client - Dragon Nest Private Server</title>
    <meta name="description" content="Download the Reverion Dragon Nest client for Windows, Mac, or Linux. Join thousands of players in this epic adventure!">
@endsection

@section('body')
    <!-- About Server Section -->
    <section class="section-animate relative py-16 lg:py-36 rpg-pattern overflow-hidden">
        <!-- Decorative Dragon Background -->
        <div class="absolute right-0 top-1/2 -translate-y-1/2 w-96 h-96 opacity-10 pointer-events-none hidden lg:block">
            <img src="{{ asset('assets/dragon.png') }}" alt="Dragon" class="w-full h-full object-contain floating-dragon">
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 gap-12 items-center">
                <!-- Left: About Server -->
                <div class="space-y-6 relative">
                    <!-- Decorative Element -->
                    <div class="absolute -left-8 top-0 w-24 h-24 opacity-10 pointer-events-none hidden lg:block">
                        <img src="{{ asset('assets/dragon-nest-player.png') }}" alt="Player" class="w-full h-full object-contain">
                    </div>
                    <h2 class="text-4xl sm:text-5xl font-bold text-white mb-4 relative z-10">
                        Welcome to <span class="text-red-500">Reverion</span>
                    </h2>
                    <p class="text-lg text-gray-300 leading-relaxed relative z-10">
                        Experience the ultimate Dragon Nest private server with enhanced features, balanced gameplay, and an active community. Join thousands of players in this epic adventure.
                    </p>
                    <div class="space-y-4">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-12 h-12 rounded-lg bg-gradient-to-br from-red-600 to-red-700 flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold text-white mb-1">Enhanced Gameplay</h3>
                                <p class="text-gray-300">Custom rates, balanced PvP, and exclusive content</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-12 h-12 rounded-lg bg-gradient-to-br from-red-600 to-red-700 flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold text-white mb-1">Active Community</h3>
                                <p class="text-gray-300">Join a thriving community of dedicated players</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-12 h-12 rounded-lg bg-gradient-to-br from-red-600 to-red-700 flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold text-white mb-1">Secure & Stable</h3>
                                <p class="text-gray-300">24/7 uptime with regular updates and maintenance</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Download Section -->
    <section class="section-animate relative py-16 lg:py-24 bg-gray-900/50 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-12">
                <h2 class="text-4xl sm:text-5xl font-bold text-white mb-4">
                    Download <span class="text-red-500">Client</span>
                </h2>
                <p class="text-lg text-gray-300 max-w-2xl mx-auto">
                    Choose your operating system and start your adventure
                </p>
            </div>

            <!-- OS Selection Card -->
            <div class="flex justify-center mb-12 max-w-5xl mx-auto">
                <!-- Windows -->
                <div class="download-os-card backdrop-blur-xl bg-gradient-to-br from-red-950/40 via-red-900/30 to-red-950/40 border-2 border-red-500/30 rounded-xl p-6 shadow-xl shadow-red-900/20 hover:border-red-500/60 hover:shadow-red-900/40 transition-all duration-300 transform hover:scale-105 cursor-pointer" data-os="windows">
                    <div class="text-center">
                        <div class="w-20 h-20 mx-auto mb-4 bg-gradient-to-br from-blue-600 to-blue-700 rounded-xl flex items-center justify-center">
                            <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M3 12V6.75l6-1.32v6.48L3 12zm17-9v8.75l-10 .15V5.21L20 3zM3 13l6 .09v6.81l-6-1.15V13zm17 .25V22l-10-1.78v-7.03l10 .26z"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-2">Windows</h3>
                        <p class="text-gray-300 text-sm mb-4">Windows 10/11</p>
                        <div class="flex items-center justify-center gap-2 text-red-500 font-semibold">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"></path>
                            </svg>
                            <span>6.2 GB</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Download Details (Hidden by default, shown when OS selected) -->
            <div id="download-details" class="max-w-4xl mx-auto hidden">
                <div class="backdrop-blur-xl bg-gradient-to-br from-black/40 via-red-950/30 to-black/40 border-2 border-red-500/40 rounded-2xl p-8 shadow-2xl shadow-red-900/30 relative overflow-hidden">
                    <!-- Glow Effect -->
                    <div class="absolute inset-0 bg-gradient-to-br from-red-600/10 via-transparent to-transparent pointer-events-none"></div>
                    <div class="absolute -inset-1 bg-gradient-to-r from-red-600/20 to-transparent blur-xl opacity-50"></div>

                    <div class="relative z-10">
                        <div class="text-center mb-6">
                            <h3 class="text-3xl font-bold text-white mb-2" id="selected-os-title">Windows Client</h3>
                            <p class="text-gray-300">Version <span id="selected-os-version" class="text-red-500 font-semibold">v2.0.1</span></p>
                        </div>

                        <div class="space-y-4 mb-6">
                            <div class="flex items-center justify-between p-4 backdrop-blur-sm bg-black/30 rounded-lg border border-red-500/20">
                                <div class="flex items-center gap-3">
                                    <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"></path>
                                    </svg>
                                    <span class="text-white font-medium">File Size</span>
                                </div>
                                <span class="text-gray-300" id="selected-os-size">6.2 GB</span>
                            </div>
                            <div class="flex items-center justify-between p-4 backdrop-blur-sm bg-black/30 rounded-lg border border-red-500/20">
                                <div class="flex items-center gap-3">
                                    <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    <span class="text-white font-medium">File Format</span>
                                </div>
                                <span class="text-gray-300" id="selected-os-format">.exe</span>
                            </div>
                            <div class="flex items-center justify-between p-4 backdrop-blur-sm bg-black/30 rounded-lg border border-red-500/20">
                                <div class="flex items-center gap-3">
                                    <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span class="text-white font-medium">Last Updated</span>
                                </div>
                                <span class="text-gray-300">January 14, 2026</span>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <a href="https://drive.google.com/file/d/1ujb0EM3H7KkjlYPimggOwMRnj8Dj_IjK/view?usp=drive_link" target="_blank" id="download-primary-link" class="block w-full bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white text-center py-4 px-6 rounded-xl font-bold text-lg transition-all duration-300 transform hover:scale-105 shadow-lg shadow-red-900/50 hover:shadow-red-900/70">
                                <div class="flex items-center justify-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                    </svg>
                                    <span>Download</span>
                                </div>
                            </a>
                            <a href="https://drive.google.com/file/d/1ujb0EM3H7KkjlYPimggOwMRnj8Dj_IjK/view?usp=drive_link" target="_blank" id="download-alternative-link" class="block w-full backdrop-blur-sm bg-black/40 border-2 border-red-500/40 hover:border-red-500/60 text-white text-center py-4 px-6 rounded-xl font-bold text-lg transition-all duration-300 transform hover:scale-105 shadow-lg shadow-red-900/20 hover:shadow-red-900/40">
                                <div class="flex items-center justify-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                    </svg>
                                    <span>Alternative Link</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Server Features Section -->
    <section id="features" class="section-animate relative py-16 lg:py-24 bg-gray-900/50 overflow-hidden">
        <!-- Decorative Background Elements -->
        <div class="absolute left-0 top-0 w-64 h-64 opacity-5 pointer-events-none hidden lg:block">
            <img src="{{ asset('assets/reverion_logo.png') }}" alt="Reverion" class="w-full h-full object-contain">
        </div>
        <div class="absolute right-0 bottom-0 w-64 h-64 opacity-5 pointer-events-none hidden lg:block">
            <img src="{{ asset('assets/reverion_logo.png') }}" alt="Reverion" class="w-full h-full object-contain">
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-12">
                <h2 class="text-4xl sm:text-5xl font-bold text-white mb-4">
                    Server <span class="text-red-500">Features</span>
                </h2>
                <p class="text-lg text-gray-300 max-w-2xl mx-auto">
                    Discover what makes Reverion the ultimate Dragon Nest experience
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Feature 1 -->
                <div class="backdrop-blur-xl bg-gradient-to-br from-red-950/40 via-red-900/30 to-red-950/40 border border-red-500/30 rounded-xl p-6 shadow-xl shadow-red-900/20 hover:border-red-500/50 hover:shadow-red-900/30 transition-all duration-300 transform hover:scale-105">
                    <div class="w-14 h-14 rounded-lg bg-gradient-to-br from-red-600 to-red-700 flex items-center justify-center mb-4">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Custom Rates</h3>
                    <p class="text-sm text-gray-300 leading-relaxed">Optimized experience rates for faster progression and balanced gameplay</p>
                </div>

                <!-- Feature 2 -->
                <div class="backdrop-blur-xl bg-gradient-to-br from-red-950/40 via-red-900/30 to-red-950/40 border border-red-500/30 rounded-xl p-6 shadow-xl shadow-red-900/20 hover:border-red-500/50 hover:shadow-red-900/30 transition-all duration-300 transform hover:scale-105">
                    <div class="w-14 h-14 rounded-lg bg-gradient-to-br from-red-600 to-red-700 flex items-center justify-center mb-4">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Balanced PvP</h3>
                    <p class="text-sm text-gray-300 leading-relaxed">Fair and competitive PvP system with regular balance updates</p>
                </div>

                <!-- Feature 3 -->
                <div class="backdrop-blur-xl bg-gradient-to-br from-red-950/40 via-red-900/30 to-red-950/40 border border-red-500/30 rounded-xl p-6 shadow-xl shadow-red-900/20 hover:border-red-500/50 hover:shadow-red-900/30 transition-all duration-300 transform hover:scale-105">
                    <div class="w-14 h-14 rounded-lg bg-gradient-to-br from-red-600 to-red-700 flex items-center justify-center mb-4">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Exclusive Content</h3>
                    <p class="text-sm text-gray-300 leading-relaxed">Unique events, items, and features exclusive to Reverion</p>
                </div>

                <!-- Feature 4 -->
                <div class="backdrop-blur-xl bg-gradient-to-br from-red-950/40 via-red-900/30 to-red-950/40 border border-red-500/30 rounded-xl p-6 shadow-xl shadow-red-900/20 hover:border-red-500/50 hover:shadow-red-900/30 transition-all duration-300 transform hover:scale-105">
                    <div class="w-14 h-14 rounded-lg bg-gradient-to-br from-red-600 to-red-700 flex items-center justify-center mb-4">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">24/7 Support</h3>
                    <p class="text-sm text-gray-300 leading-relaxed">Round-the-clock support from our dedicated team</p>
                </div>

                <!-- Feature 5 -->
                <div class="backdrop-blur-xl bg-gradient-to-br from-red-950/40 via-red-900/30 to-red-950/40 border border-red-500/30 rounded-xl p-6 shadow-xl shadow-red-900/20 hover:border-red-500/50 hover:shadow-red-900/30 transition-all duration-300 transform hover:scale-105">
                    <div class="w-14 h-14 rounded-lg bg-gradient-to-br from-red-600 to-red-700 flex items-center justify-center mb-4">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Regular Updates</h3>
                    <p class="text-sm text-gray-300 leading-relaxed">Frequent content updates and bug fixes to keep the game fresh</p>
                </div>

                <!-- Feature 6 -->
                <div class="backdrop-blur-xl bg-gradient-to-br from-red-950/40 via-red-900/30 to-red-950/40 border border-red-500/30 rounded-xl p-6 shadow-xl shadow-red-900/20 hover:border-red-500/50 hover:shadow-red-900/30 transition-all duration-300 transform hover:scale-105">
                    <div class="w-14 h-14 rounded-lg bg-gradient-to-br from-red-600 to-red-700 flex items-center justify-center mb-4">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Guild System</h3>
                    <p class="text-sm text-gray-300 leading-relaxed">Form alliances and compete in guild wars and events</p>
                </div>
            </div>
        </div>
    </section>

    <!-- How to Play Section -->
    <section id="how-to-play" class="section-animate relative py-16 lg:py-24 rpg-pattern overflow-hidden">
        <!-- Decorative Player Image -->
        <div class="absolute left-0 top-1/2 -translate-y-1/2 w-80 h-80 opacity-10 pointer-events-none hidden lg:block">
            <img src="{{ asset('assets/dragon-nest-player.png') }}" alt="Dragon Nest Player" class="w-full h-full object-contain floating-player">
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-12">
                <h2 class="text-4xl sm:text-5xl font-bold text-white mb-4">
                    How to <span class="text-red-500">Play</span>
                </h2>
                <p class="text-lg text-gray-300 max-w-2xl mx-auto">
                    Get started in just a few simple steps
                </p>
            </div>

            <div class="max-w-4xl mx-auto">
                <div class="space-y-8">
                    <!-- Step 1 -->
                    <div class="flex flex-col md:flex-row gap-6 items-start">
                        <div class="flex-shrink-0 w-16 h-16 rounded-full bg-gradient-to-br from-red-600 to-red-700 flex items-center justify-center text-2xl font-bold text-white shadow-lg shadow-red-900/50">
                            1
                        </div>
                        <div class="flex-1 backdrop-blur-xl bg-gradient-to-br from-red-950/40 via-red-900/30 to-red-950/40 border border-red-500/30 rounded-xl p-6 shadow-xl shadow-red-900/20">
                            <h3 class="text-2xl font-bold text-white mb-2">Download Client</h3>
                            <p class="text-gray-300 leading-relaxed">Download and install the Reverion client from our official download page. The installation process is quick and straightforward.</p>
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="flex flex-col md:flex-row gap-6 items-start">
                        <div class="flex-shrink-0 w-16 h-16 rounded-full bg-gradient-to-br from-red-600 to-red-700 flex items-center justify-center text-2xl font-bold text-white shadow-lg shadow-red-900/50">
                            2
                        </div>
                        <div class="flex-1 backdrop-blur-xl bg-gradient-to-br from-red-950/40 via-red-900/30 to-red-950/40 border border-red-500/30 rounded-xl p-6 shadow-xl shadow-red-900/20">
                            <h3 class="text-2xl font-bold text-white mb-2">Create Account</h3>
                            <p class="text-gray-300 leading-relaxed">Register your account on our website. Choose a unique username and secure password to protect your character.</p>
                        </div>
                    </div>

                    <!-- Step 3 -->
                    <div class="flex flex-col md:flex-row gap-6 items-start">
                        <div class="flex-shrink-0 w-16 h-16 rounded-full bg-gradient-to-br from-red-600 to-red-700 flex items-center justify-center text-2xl font-bold text-white shadow-lg shadow-red-900/50">
                            3
                        </div>
                        <div class="flex-1 backdrop-blur-xl bg-gradient-to-br from-red-950/40 via-red-900/30 to-red-950/40 border border-red-500/30 rounded-xl p-6 shadow-xl shadow-red-900/20">
                            <h3 class="text-2xl font-bold text-white mb-2">Launch Game</h3>
                            <p class="text-gray-300 leading-relaxed">Launch the client and log in with your credentials. Complete the character creation process and choose your class.</p>
                        </div>
                    </div>

                    <!-- Step 4 -->
                    <div class="flex flex-col md:flex-row gap-6 items-start">
                        <div class="flex-shrink-0 w-16 h-16 rounded-full bg-gradient-to-br from-red-600 to-red-700 flex items-center justify-center text-2xl font-bold text-white shadow-lg shadow-red-900/50">
                            4
                        </div>
                        <div class="flex-1 backdrop-blur-xl bg-gradient-to-br from-red-950/40 via-red-900/30 to-red-950/40 border border-red-500/30 rounded-xl p-6 shadow-xl shadow-red-900/20">
                            <h3 class="text-2xl font-bold text-white mb-2">Start Your Adventure</h3>
                            <p class="text-gray-300 leading-relaxed">Begin your journey in the world of Dragon Nest. Complete quests, level up, and join other players in epic battles!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('post-js')
    <script>
        // OS Detection Function - Always return Windows
        function detectOS() {
            return 'windows';
        }

        // Function to select OS
        function selectOS(osType, cardElement = null) {
            const osCards = document.querySelectorAll('.download-os-card');
            const downloadDetails = document.getElementById('download-details');
            const selectedOsTitle = document.getElementById('selected-os-title');
            const selectedOsVersion = document.getElementById('selected-os-version');
            const selectedOsSize = document.getElementById('selected-os-size');
            const selectedOsFormat = document.getElementById('selected-os-format');
            const downloadPrimaryLink = document.getElementById('download-primary-link');
            const downloadAlternativeLink = document.getElementById('download-alternative-link');

            const osData = {
                windows: {
                    title: 'Windows Client',
                    version: 'v2.0.1',
                    size: '6.2 GB',
                    format: '.exe',
                    primaryLink: 'https://drive.google.com/file/d/1ujb0EM3H7KkjlYPimggOwMRnj8Dj_IjK/view?usp=drive_link',
                    alternativeLink: 'https://drive.google.com/file/d/1ujb0EM3H7KkjlYPimggOwMRnj8Dj_IjK/view?usp=drive_link'
                }
            };

            // Remove active state from all cards
            osCards.forEach(c => {
                c.classList.remove('border-red-500', 'border-2');
                c.classList.add('border-red-500/30');
            });

            // Find the card for the selected OS
            let targetCard = cardElement;
            if (!targetCard) {
                targetCard = document.querySelector(`.download-os-card[data-os="${osType}"]`);
            }

            // Add active state to selected card
            if (targetCard) {
                targetCard.classList.remove('border-red-500/30');
                targetCard.classList.add('border-red-500', 'border-2');
            }

            // Get data for selected OS
            const data = osData[osType];

            // Update download details
            selectedOsTitle.textContent = data.title;
            selectedOsVersion.textContent = data.version;
            selectedOsSize.textContent = data.size;
            selectedOsFormat.textContent = data.format;
            downloadPrimaryLink.href = data.primaryLink;
            downloadAlternativeLink.href = data.alternativeLink;

            // Show download details with animation
            downloadDetails.classList.remove('hidden');
            downloadDetails.style.opacity = '0';
            downloadDetails.style.transform = 'translateY(20px)';

            setTimeout(() => {
                downloadDetails.style.transition = 'all 0.3s ease';
                downloadDetails.style.opacity = '1';
                downloadDetails.style.transform = 'translateY(0)';
            }, 10);
        }

        // OS Selection
        document.addEventListener('DOMContentLoaded', function() {
            const osCards = document.querySelectorAll('.download-os-card');

            // Auto-detect and select OS on page load
            const detectedOS = detectOS();
            selectOS(detectedOS);

            // Add click event listeners to OS cards
            osCards.forEach(card => {
                card.addEventListener('click', function() {
                    const selectedOs = this.getAttribute('data-os');
                    selectOS(selectedOs, this);
                });
            });
        });
    </script>
@endsection

