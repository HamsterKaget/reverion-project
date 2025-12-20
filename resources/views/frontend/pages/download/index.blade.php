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
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
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

                <!-- Right: Download Stats -->
                <div class="relative">
                    <div class="backdrop-blur-xl bg-gradient-to-br from-black/40 via-red-950/30 to-black/40 border-2 border-red-500/40 rounded-2xl p-8 shadow-2xl shadow-red-900/30 relative overflow-hidden">
                        <!-- Decorative Background Image -->
                        <div class="absolute inset-0 opacity-5 pointer-events-none">
                            <img src="{{ asset('assets/reverion_red.jpeg') }}" alt="Reverion" class="w-full h-full object-cover">
                        </div>
                        <!-- Glow Effect -->
                        <div class="absolute inset-0 bg-gradient-to-br from-red-600/10 via-transparent to-transparent pointer-events-none"></div>
                        <div class="absolute -inset-1 bg-gradient-to-r from-red-600/20 to-transparent blur-xl opacity-50"></div>

                        <div class="relative z-10">
                            <div class="text-center mb-6">
                                <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-gradient-to-br from-red-600 to-red-700 mb-4 shadow-lg shadow-red-900/50">
                                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                    </svg>
                                </div>
                                <h3 class="text-3xl font-bold text-white mb-2">Total Downloads</h3>
                                <p class="text-gray-300">Join thousands of players worldwide</p>
                            </div>

                            <div class="text-center">
                                <div class="mb-4">
                                    <div class="text-5xl sm:text-6xl font-bold text-red-500 mb-2" id="download-counter">0</div>
                                    <p class="text-gray-300 text-sm">Downloads and counting...</p>
                                </div>
                                <div class="flex items-center justify-center gap-2 text-gray-400 text-sm">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                    </svg>
                                    <span>Live counter updates every second</span>
                                </div>
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

            <!-- OS Selection Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12 max-w-5xl mx-auto">
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
                            <span>2.5 GB</span>
                        </div>
                    </div>
                </div>

                <!-- Mac -->
                <div class="download-os-card backdrop-blur-xl bg-gradient-to-br from-red-950/40 via-red-900/30 to-red-950/40 border-2 border-red-500/30 rounded-xl p-6 shadow-xl shadow-red-900/20 hover:border-red-500/60 hover:shadow-red-900/40 transition-all duration-300 transform hover:scale-105 cursor-pointer" data-os="mac">
                    <div class="text-center">
                        <div class="w-20 h-20 mx-auto mb-4 bg-gradient-to-br from-gray-700 to-gray-800 rounded-xl flex items-center justify-center">
                            <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M18.71 19.5c-.83 1.24-1.71 2.45-3.05 2.47-1.34.03-1.77-.79-3.29-.79-1.53 0-2 .77-3.27.82-1.31.05-2.3-1.32-3.14-2.53C4.25 17 2.94 12.45 4.7 9.39c.87-1.52 2.43-2.48 4.12-2.51 1.28-.02 2.5.87 3.29.87.78 0 2.26-1.07 3.81-.91.65.03 2.47.26 3.64 1.98-.09.06-2.17 1.28-2.15 3.81.03 3.02 2.65 4.03 2.68 4.04-.03.07-.42 1.44-1.38 2.83M13 3.5c.73-.83 1.94-1.46 2.94-1.5.13 1.17-.34 2.35-1.04 3.19-.69.85-1.83 1.51-2.95 1.42-.15-1.15.41-2.35 1.05-3.11z"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-2">macOS</h3>
                        <p class="text-gray-300 text-sm mb-4">macOS 10.15+</p>
                        <div class="flex items-center justify-center gap-2 text-red-500 font-semibold">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"></path>
                            </svg>
                            <span>2.7 GB</span>
                        </div>
                    </div>
                </div>

                <!-- Linux -->
                <div class="download-os-card backdrop-blur-xl bg-gradient-to-br from-red-950/40 via-red-900/30 to-red-950/40 border-2 border-red-500/30 rounded-xl p-6 shadow-xl shadow-red-900/20 hover:border-red-500/60 hover:shadow-red-900/40 transition-all duration-300 transform hover:scale-105 cursor-pointer" data-os="linux">
                    <div class="text-center">
                        <div class="w-20 h-20 mx-auto mb-4 bg-gradient-to-br from-yellow-600 to-yellow-700 rounded-xl flex items-center justify-center">
                            <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12.504 0c-.155 0-.315.008-.48.021-4.226.333-3.105 4.807-3.17 6.298-.076 1.092-.3 1.953-1.05 3.02-.885 1.051-2.127 2.75-2.716 4.521-.278.832-.41 1.684-.287 2.489a.424.424 0 00-.11.135c-.26.26-.702.52-1.119.52-.449 0-.863-.187-1.138-.525a.469.469 0 00-.134-.11c.123-.805-.01-1.657-.287-2.489-.589-1.771-1.83-3.47-2.716-4.52-.75-1.068-1.043-1.93-1.05-3.021-.065-1.491-1.057-5.965-3.17-6.298-.165-.013-.325-.021-.48-.021-.155 0-.315.008-.48.021-2.113.333-3.105 4.807-3.17 6.298-.007 1.092-.3 1.953-1.05 3.02-.886 1.051-2.127 2.75-2.716 4.521-.278.832-.41 1.684-.287 2.489a.424.424 0 01.11.135c.26.26.702.52 1.119.52.449 0 .863-.187 1.138-.525a.469.469 0 01.134-.11c-.123.805.01 1.657.287 2.489.589 1.771 1.83 3.47 2.716 4.52.75 1.068 1.043 1.93 1.05 3.021.065 1.491 1.057 5.965 3.17 6.298.165.013.325.021.48.021.155 0 .315-.008.48-.021 2.113-.333 3.105-4.807 3.17-6.298.007-1.092.3-1.953 1.05-3.02.886-1.051 2.127-2.75 2.716-4.521.278-.832.41-1.684.287-2.489a.424.424 0 01-.11-.135c-.26-.26-.702-.52-1.119-.52-.449 0-.863.187-1.138.525a.469.469 0 01-.134.11c.123-.805-.01-1.657.287-2.489.589-1.771 1.83-3.47 2.716-4.52.75-1.068 1.043-1.93 1.05-3.021.065-1.491 1.057-5.965 3.17-6.298.165-.013.325-.021.48-.021zm0 3.239c.257 0 .511.029.758.085.96.215 1.597.955 2.309 2.346.597 1.165 1.253 2.403 2.958 2.403 1.705 0 2.361-1.238 2.958-2.403.712-1.391 1.349-2.131 2.309-2.346.247-.056.501-.085.758-.085s.511.029.758.085c.96.215 1.597.955 2.309 2.346.597 1.165 1.253 2.403 2.958 2.403 1.705 0 2.361-1.238 2.958-2.403.712-1.391 1.349-2.131 2.309-2.346.247-.056.501-.085.758-.085s.511.029.758.085c.96.215 1.597.955 2.309 2.346.597 1.165 1.253 2.403 2.958 2.403 1.705 0 2.361-1.238 2.958-2.403.712-1.391 1.349-2.131 2.309-2.346.247-.056.501-.085.758-.085s.511.029.758.085c.96.215 1.597.955 2.309 2.346.597 1.165 1.253 2.403 2.958 2.403 1.705 0 2.361-1.238 2.958-2.403.712-1.391 1.349-2.131 2.309-2.346.247-.056.501-.085.758-.085z"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-2">Linux</h3>
                        <p class="text-gray-300 text-sm mb-4">Ubuntu 20.04+</p>
                        <div class="flex items-center justify-center gap-2 text-red-500 font-semibold">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"></path>
                            </svg>
                            <span>2.6 GB</span>
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
                                <span class="text-gray-300" id="selected-os-size">2.5 GB</span>
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
                                <span class="text-gray-300">December 1, 2024</span>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <a href="#" id="download-primary-link" class="block w-full bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white text-center py-4 px-6 rounded-xl font-bold text-lg transition-all duration-300 transform hover:scale-105 shadow-lg shadow-red-900/50 hover:shadow-red-900/70">
                                <div class="flex items-center justify-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                    </svg>
                                    <span>Download</span>
                                </div>
                            </a>
                            <a href="#" id="download-alternative-link" class="block w-full backdrop-blur-sm bg-black/40 border-2 border-red-500/40 hover:border-red-500/60 text-white text-center py-4 px-6 rounded-xl font-bold text-lg transition-all duration-300 transform hover:scale-105 shadow-lg shadow-red-900/20 hover:shadow-red-900/40">
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
@endsection

@section('post-js')
    <script>
        // Download Counter Animation
        document.addEventListener('DOMContentLoaded', function() {
            const counterElement = document.getElementById('download-counter');
            let currentCount = 12450; // Starting count
            const targetCount = 12500; // Target count (will keep incrementing)
            const increment = 1;
            const duration = 2000; // 2 seconds to reach target
            const steps = 50;
            const stepDuration = duration / steps;
            const stepIncrement = (targetCount - currentCount) / steps;

            function updateCounter() {
                currentCount += stepIncrement;
                counterElement.textContent = Math.floor(currentCount).toLocaleString();

                if (currentCount < targetCount) {
                    setTimeout(updateCounter, stepDuration);
                } else {
                    // Reset and continue counting
                    currentCount = targetCount;
                    setInterval(() => {
                        currentCount += increment;
                        counterElement.textContent = Math.floor(currentCount).toLocaleString();
                    }, 1000); // Increment every second
                }
            }

            // Start counter animation after a short delay
            setTimeout(updateCounter, 500);
        });

        // OS Detection Function
        function detectOS() {
            const userAgent = window.navigator.userAgent.toLowerCase();
            const platform = window.navigator.platform.toLowerCase();

            // Check for macOS
            if (platform.includes('mac') || userAgent.includes('mac')) {
                return 'mac';
            }

            // Check for Windows
            if (platform.includes('win') || userAgent.includes('windows')) {
                return 'windows';
            }

            // Check for Linux
            if (platform.includes('linux') || userAgent.includes('linux')) {
                return 'linux';
            }

            // Check for Android (might be using mobile browser)
            if (userAgent.includes('android')) {
                return 'linux'; // Default to Linux for Android
            }

            // Check for iOS
            if (userAgent.includes('iphone') || userAgent.includes('ipad')) {
                return 'mac'; // Default to Mac for iOS
            }

            // Default to Windows if can't detect
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
                    size: '2.5 GB',
                    format: '.exe',
                    primaryLink: '#',
                    alternativeLink: '#'
                },
                mac: {
                    title: 'macOS Client',
                    version: 'v2.0.1',
                    size: '2.7 GB',
                    format: '.dmg',
                    primaryLink: '#',
                    alternativeLink: '#'
                },
                linux: {
                    title: 'Linux Client',
                    version: 'v2.0.1',
                    size: '2.6 GB',
                    format: '.AppImage',
                    primaryLink: '#',
                    alternativeLink: '#'
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

