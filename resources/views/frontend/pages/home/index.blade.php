@extends('frontend.layouts.app')

@section('seo')
    <title>Dragon Nest Private Server - Beta Launch Soon</title>
    <meta name="description" content="Join the ultimate Dragon Nest private server experience. Beta launch coming soon!">
@endsection

@section('body')
    <!-- Hero Section -->
    <section class="hero-section relative min-h-screen flex items-center justify-center overflow-hidden">
        <!-- Background Carousel -->
        <div class="absolute inset-0 w-full h-full">
            <div class="hero-bg-slide hero-bg-slide-active" style="background-image: url('{{ asset('assets/bg-1.jpeg') }}');"></div>
            <div class="hero-bg-slide" style="background-image: url('{{ asset('assets/bg-2.jpeg') }}');"></div>
            <div class="hero-bg-slide" style="background-image: url('{{ asset('assets/bg-3.jpeg') }}');"></div>
        </div>

        <!-- Dark Overlay dengan opacity 80 -->
        <div class="absolute inset-0 bg-black/80 z-10"></div>

        <!-- Red Accent Overlay untuk efek dual tone -->
        <div class="absolute inset-0 bg-gradient-to-br from-red-950/20 via-transparent to-black/40 z-10"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_30%_50%,rgba(220,38,38,0.15),transparent_70%)] z-10"></div>

        <!-- Content Container -->
        <div class="relative z-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-20 w-full">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Left Content -->
                <div class="flex flex-col">
                    <h1 class="text-5xl sm:text-4xl md:text-5xl lg:text-6xl font-bold mb-6 leading-tight text-left">
                        <span class="text-white">START YOUR OWN</span>
                        <br>
                        <span class="text-red-500">JOURNEY ON REVERION</span>
                    </h1>
                    <p class="text-lg sm:text-xl text-gray-300 mb-8 leading-relaxed text-left">
                        Epic fantasy artwork of a hero standing before a vast realm. Enter a realm where every decision shapes your story. Battle fierce enemies, form alliances, and uncover mysteries hidden across vast kingdoms.
                    </p>
                    <div class="flex justify-start">
                        <a href="#register" class="desktop-auth-link inline-flex items-center gap-2 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white px-8 py-4 rounded-full text-lg font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg shadow-red-900/50 hover:shadow-red-900/70" data-modal-show="register-modal">
                            Begin Your Quest
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Right Content - Feature Cards dengan Glassmorphism -->
                <div class="space-y-6 py-12">
                    <!-- Video Thumbnail Card -->
                    <div class="backdrop-blur-xl bg-black/30 border border-red-500/20 rounded-2xl overflow-hidden shadow-2xl shadow-red-900/20 hover:border-red-500/40 transition-all duration-300 mt-4">
                        <div class="relative aspect-video bg-gray-900/50">
                            <img src="{{ asset('assets/bg-1.jpeg') }}" alt="Game Preview" class="w-full h-full object-cover opacity-60">
                            <div class="absolute inset-0 flex items-center justify-center">
                                <button class="w-20 h-20 bg-red-600/80 hover:bg-red-600 rounded-full flex items-center justify-center backdrop-blur-sm transition-all duration-300 transform hover:scale-110 shadow-lg shadow-red-900/50">
                                    <svg class="w-10 h-10 text-white ml-1" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M8 5v14l11-7z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Feature Cards Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <!-- Epic Quests Card -->
                        <div class="backdrop-blur-xl bg-gradient-to-br from-red-950/40 via-red-900/30 to-red-950/40 border border-red-500/30 rounded-xl p-6 shadow-xl shadow-red-900/20 hover:border-red-500/50 hover:shadow-red-900/30 transition-all duration-300 transform hover:scale-105">
                            <h3 class="text-xl font-bold text-white mb-2">Epic Quests</h3>
                            <p class="text-sm text-gray-300 leading-relaxed">Embark on story-driven journeys filled with danger and glory.</p>
                        </div>

                        <!-- Next-Gen Graphics Card -->
                        <div class="backdrop-blur-xl bg-gradient-to-br from-red-950/40 via-red-900/30 to-red-950/40 border border-red-500/30 rounded-xl p-6 shadow-xl shadow-red-900/20 hover:border-red-500/50 hover:shadow-red-900/30 transition-all duration-300 transform hover:scale-105">
                            <h3 class="text-xl font-bold text-white mb-2">Next-Gen Graphics</h3>
                            <p class="text-sm text-gray-300 leading-relaxed">Dive into visuals that blur the line between reality and fantasy.</p>
                        </div>

                        <!-- Endless Adventure Card -->
                        <div class="backdrop-blur-xl bg-gradient-to-br from-red-950/40 via-red-900/30 to-red-950/40 border border-red-500/30 rounded-xl p-6 shadow-xl shadow-red-900/20 hover:border-red-500/50 hover:shadow-red-900/30 transition-all duration-300 transform hover:scale-105">
                            <h3 class="text-xl font-bold text-white mb-2">Endless Adventure</h3>
                            <p class="text-sm text-gray-300 leading-relaxed">From campaign to PvP, every game mode brings new challenges.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-10 lg:bottom-20 left-1/2 transform -translate-x-1/2 animate-bounce z-30">
            <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
            </svg>
        </div>
    </section>

    <!-- About Server & Download Client Section -->
    <section id="about-download" class="section-animate relative py-16 lg:py-24 rpg-pattern overflow-hidden">
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

                <!-- Right: Download Client (Highlight) -->
                <div class="relative">
                    <div class="backdrop-blur-xl bg-gradient-to-br from-black/40 via-red-950/30 to-black/40 border-2 border-red-500/40 rounded-2xl p-8 shadow-2xl shadow-red-900/30 hover:border-red-500/60 hover:shadow-red-900/50 transition-all duration-300 relative overflow-hidden">
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
                                <h3 class="text-3xl font-bold text-white mb-2">Download Client</h3>
                                <p class="text-gray-300">Get started in minutes with our optimized client</p>
                            </div>

                            <div class="space-y-4 mb-6">
                                <div class="flex items-center justify-between p-4 backdrop-blur-sm bg-black/30 rounded-lg border border-red-500/20">
                                    <div class="flex items-center gap-3">
                                        <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                        <span class="text-white font-medium">Client Version</span>
                                    </div>
                                    <span class="text-red-500 font-semibold">v2.0.1</span>
                                </div>
                                <div class="flex items-center justify-between p-4 backdrop-blur-sm bg-black/30 rounded-lg border border-red-500/20">
                                    <div class="flex items-center gap-3">
                                        <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"></path>
                                        </svg>
                                        <span class="text-white font-medium">File Size</span>
                                    </div>
                                    <span class="text-gray-300">~2.5 GB</span>
                                </div>
                            </div>

                            <a href="#download" class="block w-full bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white text-center py-4 px-6 rounded-xl font-bold text-lg transition-all duration-300 transform hover:scale-105 shadow-lg shadow-red-900/50 hover:shadow-red-900/70">
                                Download Now
                                <svg class="w-5 h-5 inline-block ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="section-animate relative py-16 lg:py-24 bg-gray-900/50 overflow-hidden">
        <!-- Decorative Background Elements -->
        <div class="absolute left-0 top-0 w-64 h-64 opacity-5 pointer-events-none hidden lg:block">
            <img src="{{ asset('assets/reverion_red.jpeg') }}" alt="Reverion" class="w-full h-full object-contain">
        </div>
        <div class="absolute right-0 bottom-0 w-64 h-64 opacity-5 pointer-events-none hidden lg:block">
            <img src="{{ asset('assets/reverion_blue.jpeg') }}" alt="Reverion" class="w-full h-full object-contain">
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

    <!-- Top Up Preview Section -->
    <section id="top-up" class="section-animate relative py-16 lg:py-24 bg-gray-900/50 overflow-hidden">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-12">
                <h2 class="text-4xl sm:text-5xl font-bold text-white mb-4">
                    Top Up <span class="text-red-500">Preview</span>
                </h2>
                <p class="text-lg text-gray-300 max-w-2xl mx-auto">
                    Enhance your gameplay with our top-up packages
                </p>
            </div>

            <!-- Packages Grid - Maksimal 3 card per row -->
            <div class="space-y-8">
                <!-- Row 1: bag-mk0, bag-mk1, bag-mk2 -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Package 1: bag-mk0 -->
                    <div class="backdrop-blur-xl bg-gradient-to-br from-red-950/40 via-red-900/30 to-red-950/40 border border-red-500/30 rounded-xl p-6 shadow-xl shadow-red-900/20 hover:border-red-500/50 hover:shadow-red-900/30 transition-all duration-300 transform hover:scale-105">
                        <div class="text-center mb-4">
                            <div class="flex justify-center mb-4">
                                <img src="{{ asset('assets/rpg/bag-mk0.png') }}" alt="Bag MK0" class="w-24 h-24 object-contain">
                            </div>
                            <h3 class="text-xl font-bold text-white mb-2">Bag MK0</h3>
                            <p class="text-3xl font-bold text-red-500 mb-4">$1.99</p>
                        </div>
                        <ul class="space-y-2 mb-6 text-left">
                            <li class="flex items-center gap-2 text-gray-300">
                                <svg class="w-5 h-5 text-red-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>10 Gold Ingot</span>
                            </li>
                            <li class="flex items-center gap-2 text-gray-300">
                                <svg class="w-5 h-5 text-red-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>100 Silver Ingot <span class="text-red-400">(Bonus)</span></span>
                            </li>
                        </ul>
                        <a href="{{ route('topup.index') }}" class="block w-full bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white py-3 px-6 rounded-lg font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg shadow-red-900/50 text-center">
                            Purchase Now
                        </a>
                    </div>

                    <!-- Package 2: bag-mk1 -->
                    <div class="backdrop-blur-xl bg-gradient-to-br from-red-950/40 via-red-900/30 to-red-950/40 border border-red-500/30 rounded-xl p-6 shadow-xl shadow-red-900/20 hover:border-red-500/50 hover:shadow-red-900/30 transition-all duration-300 transform hover:scale-105">
                        <div class="text-center mb-4">
                            <div class="flex justify-center mb-4">
                                <img src="{{ asset('assets/rpg/bag-mk1.png') }}" alt="Bag MK1" class="w-24 h-24 object-contain">
                            </div>
                            <h3 class="text-xl font-bold text-white mb-2">Bag MK1</h3>
                            <p class="text-3xl font-bold text-red-500 mb-4">$4.99</p>
                        </div>
                        <ul class="space-y-2 mb-6 text-left">
                            <li class="flex items-center gap-2 text-gray-300">
                                <svg class="w-5 h-5 text-red-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>50 Gold Ingot</span>
                            </li>
                            <li class="flex items-center gap-2 text-gray-300">
                                <svg class="w-5 h-5 text-red-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>1000 Silver Ingot <span class="text-red-400">(Bonus)</span></span>
                            </li>
                        </ul>
                        <a href="{{ route('topup.index') }}" class="block w-full bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white py-3 px-6 rounded-lg font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg shadow-red-900/50 text-center">
                            Purchase Now
                        </a>
                    </div>

                    <!-- Package 3: bag-mk2 -->
                    <div class="backdrop-blur-xl bg-gradient-to-br from-red-950/40 via-red-900/30 to-red-950/40 border border-red-500/30 rounded-xl p-6 shadow-xl shadow-red-900/20 hover:border-red-500/50 hover:shadow-red-900/30 transition-all duration-300 transform hover:scale-105">
                        <div class="text-center mb-4">
                            <div class="flex justify-center mb-4">
                                <img src="{{ asset('assets/rpg/bag-mk2.png') }}" alt="Bag MK2" class="w-24 h-24 object-contain">
                            </div>
                            <h3 class="text-xl font-bold text-white mb-2">Bag MK2</h3>
                            <p class="text-3xl font-bold text-red-500 mb-4">$9.99</p>
                        </div>
                        <ul class="space-y-2 mb-6 text-left">
                            <li class="flex items-center gap-2 text-gray-300">
                                <svg class="w-5 h-5 text-red-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>100 Gold Ingot</span>
                            </li>
                            <li class="flex items-center gap-2 text-gray-300">
                                <svg class="w-5 h-5 text-red-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>2500 Silver Ingot <span class="text-red-400">(Bonus)</span></span>
                            </li>
                        </ul>
                        <a href="{{ route('topup.index') }}" class="block w-full bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white py-3 px-6 rounded-lg font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg shadow-red-900/50 text-center">
                            Purchase Now
                        </a>
                    </div>
                </div>

                <!-- Row 2: chest-mk0, chest-mk1, chest-mk2 -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Package 4: chest-mk0 -->
                    <div class="backdrop-blur-xl bg-gradient-to-br from-red-950/40 via-red-900/30 to-red-950/40 border border-red-500/30 rounded-xl p-6 shadow-xl shadow-red-900/20 hover:border-red-500/50 hover:shadow-red-900/30 transition-all duration-300 transform hover:scale-105">
                        <div class="text-center mb-4">
                            <div class="flex justify-center mb-4">
                                <img src="{{ asset('assets/rpg/chest-mk0.png') }}" alt="Chest MK0" class="w-24 h-24 object-contain">
                            </div>
                            <h3 class="text-xl font-bold text-white mb-2">Chest MK0</h3>
                            <p class="text-3xl font-bold text-red-500 mb-4">$19.99</p>
                        </div>
                        <ul class="space-y-2 mb-6 text-left">
                            <li class="flex items-center gap-2 text-gray-300">
                                <svg class="w-5 h-5 text-red-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>200 Gold Ingot</span>
                            </li>
                            <li class="flex items-center gap-2 text-gray-300">
                                <svg class="w-5 h-5 text-red-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>+ 20 Gold Ingot <span class="text-red-400">(Bonus)</span></span>
                            </li>
                            <li class="flex items-center gap-2 text-gray-300">
                                <svg class="w-5 h-5 text-red-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>+ 5000 Silver Ingot <span class="text-red-400">(Bonus)</span></span>
                            </li>
                        </ul>
                        <a href="{{ route('topup.index') }}" class="block w-full bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white py-3 px-6 rounded-lg font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg shadow-red-900/50 text-center">
                            Purchase Now
                        </a>
                    </div>

                    <!-- Package 5: chest-mk1 -->
                    <div class="backdrop-blur-xl bg-gradient-to-br from-red-950/40 via-red-900/30 to-red-950/40 border border-red-500/30 rounded-xl p-6 shadow-xl shadow-red-900/20 hover:border-red-500/50 hover:shadow-red-900/30 transition-all duration-300 transform hover:scale-105">
                        <div class="text-center mb-4">
                            <div class="flex justify-center mb-4">
                                <img src="{{ asset('assets/rpg/chest-mk1.png') }}" alt="Chest MK1" class="w-24 h-24 object-contain">
                            </div>
                            <h3 class="text-xl font-bold text-white mb-2">Chest MK1</h3>
                            <p class="text-3xl font-bold text-red-500 mb-4">$29.99</p>
                        </div>
                        <ul class="space-y-2 mb-6 text-left">
                            <li class="flex items-center gap-2 text-gray-300">
                                <svg class="w-5 h-5 text-red-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>300 Gold Ingot</span>
                            </li>
                            <li class="flex items-center gap-2 text-gray-300">
                                <svg class="w-5 h-5 text-red-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>+ 30 Gold Ingot <span class="text-red-400">(Bonus)</span></span>
                            </li>
                            <li class="flex items-center gap-2 text-gray-300">
                                <svg class="w-5 h-5 text-red-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>7500 Silver Ingot <span class="text-red-400">(Bonus)</span></span>
                            </li>
                        </ul>
                        <a href="{{ route('topup.index') }}" class="block w-full bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white py-3 px-6 rounded-lg font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg shadow-red-900/50 text-center">
                            Purchase Now
                        </a>
                    </div>

                    <!-- Package 6: chest-mk2 -->
                    <div class="backdrop-blur-xl bg-gradient-to-br from-red-950/40 via-red-900/30 to-red-950/40 border border-red-500/30 rounded-xl p-6 shadow-xl shadow-red-900/20 hover:border-red-500/50 hover:shadow-red-900/30 transition-all duration-300 transform hover:scale-105">
                        <div class="text-center mb-4">
                            <div class="flex justify-center mb-4">
                                <img src="{{ asset('assets/rpg/chest-mk2.png') }}" alt="Chest MK2" class="w-24 h-24 object-contain">
                            </div>
                            <h3 class="text-xl font-bold text-white mb-2">Chest MK2</h3>
                            <p class="text-3xl font-bold text-red-500 mb-4">$49.99</p>
                        </div>
                        <ul class="space-y-2 mb-6 text-left">
                            <li class="flex items-center gap-2 text-gray-300">
                                <svg class="w-5 h-5 text-red-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>500 Gold Ingot</span>
                            </li>
                            <li class="flex items-center gap-2 text-gray-300">
                                <svg class="w-5 h-5 text-red-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>+ 50 Gold Ingot <span class="text-red-400">(Bonus)</span></span>
                            </li>
                            <li class="flex items-center gap-2 text-gray-300">
                                <svg class="w-5 h-5 text-red-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>15000 Silver Ingot <span class="text-red-400">(Bonus)</span></span>
                            </li>
                        </ul>
                        <a href="{{ route('topup.index') }}" class="block w-full bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white py-3 px-6 rounded-lg font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg shadow-red-900/50 text-center">
                            Purchase Now
                        </a>
                    </div>
                </div>
            </div>

            <!-- View All Packages Link -->
            <div class="text-center mt-12">
                <a href="{{ route('topup.index') }}" class="inline-flex items-center gap-2 backdrop-blur-sm bg-black/40 border-2 border-red-500/40 hover:border-red-500/60 text-white px-8 py-4 rounded-full text-lg font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg shadow-red-900/20 hover:shadow-red-900/40">
                    View All Packages
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section id="cta" class="section-animate relative py-16 lg:py-24 rpg-pattern overflow-hidden">
        <!-- Decorative Dragon Background -->
        <div class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] opacity-5 pointer-events-none hidden lg:block">
            <img src="{{ asset('assets/dragon.png') }}" alt="Dragon" class="w-full h-full object-contain floating-dragon">
        </div>
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <div class="backdrop-blur-xl bg-gradient-to-br from-black/40 via-red-950/30 to-black/40 border-2 border-red-500/40 rounded-2xl p-12 shadow-2xl shadow-red-900/30 relative overflow-hidden">
                <!-- Glow Effect -->
                <div class="absolute inset-0 bg-gradient-to-br from-red-600/10 via-transparent to-transparent pointer-events-none"></div>
                <div class="absolute -inset-1 bg-gradient-to-r from-red-600/20 to-transparent blur-xl opacity-50"></div>

                <div class="relative z-10">
                    <h2 class="text-4xl sm:text-5xl font-bold text-white mb-4">
                        Ready to Begin Your <span class="text-red-500">Adventure?</span>
                    </h2>
                    <p class="text-lg text-gray-300 mb-8 max-w-2xl mx-auto leading-relaxed">
                        Join thousands of players in the ultimate Dragon Nest experience. Download now and start your journey today!
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="#download" class="inline-flex items-center justify-center gap-2 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white px-8 py-4 rounded-full text-lg font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg shadow-red-900/50 hover:shadow-red-900/70">
                            Download Client
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                            </svg>
                        </a>
                        <a href="#register" class="desktop-auth-link inline-flex items-center justify-center gap-2 backdrop-blur-sm bg-black/40 border-2 border-red-500/40 hover:border-red-500/60 text-white px-8 py-4 rounded-full text-lg font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg shadow-red-900/20 hover:shadow-red-900/40" data-modal-show="register-modal">
                            Create Account
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('post-js')
    <script>
        // Background Carousel dengan interval 3 detik
        document.addEventListener('DOMContentLoaded', function() {
            const slides = document.querySelectorAll('.hero-bg-slide');
            let currentSlide = 0;

            function nextSlide() {
                slides[currentSlide].classList.remove('hero-bg-slide-active');
                currentSlide = (currentSlide + 1) % slides.length;
                slides[currentSlide].classList.add('hero-bg-slide-active');
            }

            // Set interval 3 detik (3000ms)
            setInterval(nextSlide, 3000);
        });
    </script>
@endsection

