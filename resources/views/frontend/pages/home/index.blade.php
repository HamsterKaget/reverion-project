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
                            <img src="{{ asset('assets/reverion_logo.png') }}" alt="Reverion" class="w-full h-full object-cover">
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
                                    <span class="text-gray-300">~6.2 GB</span>
                                </div>
                            </div>

                            <a href="https://drive.google.com/file/d/1ujb0EM3H7KkjlYPimggOwMRnj8Dj_IjK/view?usp=drive_link" target="_blank" class="block w-full bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white text-center py-4 px-6 rounded-xl font-bold text-lg transition-all duration-300 transform hover:scale-105 shadow-lg shadow-red-900/50 hover:shadow-red-900/70">
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

    <!-- Join Our Discord Section -->
    <section id="discord" class="section-animate relative py-16 lg:py-24 rpg-pattern overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="backdrop-blur-xl bg-gradient-to-br from-black/40 via-indigo-950/30 to-black/40 border-2 border-indigo-500/40 rounded-2xl p-8 lg:p-12 shadow-2xl shadow-indigo-900/30 relative overflow-hidden">
                <!-- Glow Effect -->
                <div class="absolute inset-0 bg-gradient-to-br from-indigo-600/10 via-transparent to-transparent pointer-events-none"></div>
                <div class="absolute -inset-1 bg-gradient-to-r from-indigo-600/20 to-transparent blur-xl opacity-50"></div>

                <div class="relative z-10 grid grid-cols-1 lg:grid-cols-3 gap-8 lg:gap-12 items-center">
                    <!-- Right: Discord Embed -->
                    <div class="flex justify-center lg:justify-start">
                        <iframe src="https://discord.com/widget?id=1441364744530559059&theme=dark" width="350" height="500" allowtransparency="true" frameborder="0" sandbox="allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts" class="rounded-lg w-full max-w-[350px]"></iframe>
                    </div>

                    <!-- Left: Title and Description -->
                    <div class="text-left lg:col-span-2">
                        <h2 class="text-4xl sm:text-5xl font-bold text-white mb-4">
                            Join Our <span class="text-indigo-400">Discord</span>
                        </h2>
                        <p class="text-lg text-gray-300 mb-8 leading-relaxed">
                            Connect with thousands of players, get the latest updates, participate in events, and join the conversation!
                        </p>
                        <a href="https://discord.gg/4ctVxdctHe" target="_blank" class="inline-flex items-center justify-center gap-2 bg-gradient-to-r from-indigo-600 to-indigo-700 hover:from-indigo-700 hover:to-indigo-800 text-white px-8 py-4 rounded-full text-lg font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg shadow-indigo-900/50 hover:shadow-indigo-900/70">
                            Join Discord Server
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20.317 4.37a19.791 19.791 0 0 0-4.885-1.515.074.074 0 0 0-.079.037c-.21.375-.444.864-.608 1.25a18.27 18.27 0 0 0-5.487 0 12.64 12.64 0 0 0-.617-1.25.077.077 0 0 0-.079-.037A19.736 19.736 0 0 0 3.677 4.37a.07.07 0 0 0-.032.027C.533 9.046-.32 13.58.099 18.057a.082.082 0 0 0 .031.057 19.9 19.9 0 0 0 5.993 3.03.078.078 0 0 0 .084-.028c.462-.63.874-1.295 1.226-1.994a.076.076 0 0 0-.041-.106 13.107 13.107 0 0 1-1.872-.892.077.077 0 0 1-.008-.128 10.2 10.2 0 0 0 .372-.292.074.074 0 0 1 .077-.01c3.928 1.793 8.18 1.793 12.062 0a.074.074 0 0 1 .078.01c.12.098.246.198.373.292a.077.077 0 0 1-.006.127 12.299 12.299 0 0 1-1.873.892.077.077 0 0 0-.041.107c.36.698.772 1.362 1.225 1.993a.076.076 0 0 0 .084.028 19.839 19.839 0 0 0 6.002-3.03.077.077 0 0 0 .032-.054c.5-5.177-.838-9.674-3.549-13.66a.061.061 0 0 0-.031-.03zM8.02 15.33c-1.183 0-2.157-1.085-2.157-2.419 0-1.333.956-2.419 2.157-2.419 1.21 0 2.176 1.096 2.157 2.42 0 1.333-.956 2.418-2.157 2.418zm7.975 0c-1.183 0-2.157-1.085-2.157-2.419 0-1.333.955-2.419 2.157-2.419 1.21 0 2.176 1.096 2.157 2.42 0 1.333-.946 2.418-2.157 2.418z"/>
                            </svg>
                        </a>
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
                    Top Up
                </h2>
                <p class="text-lg text-gray-300 max-w-2xl mx-auto">
                    Top up your account with our packages 1:1 ratio
                </p>
            </div>

            <!-- Packages Grid - Loaded from API -->
            <div id="packages-container" class="space-y-8">
                <div class="text-center py-8">
                    <p class="text-gray-400">Loading packages...</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Donation Section -->
    {{-- <section id="donation" class="section-animate relative py-16 lg:py-24 bg-gray-900/50 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Running Text -->
            <div class="mb-8 overflow-hidden">
                <div class="running-text-container backdrop-blur-xl bg-gradient-to-br from-red-950/40 via-red-900/30 to-red-950/40 border border-red-500/30 rounded-xl p-4 shadow-xl shadow-red-900/20">
                    <div class="running-text text-white text-lg font-semibold whitespace-nowrap">
                        <span class="text-red-500">🎉</span> Thank you for your support! Every donation helps us improve the server experience. <span class="text-red-500">🎉</span> Join our community and be part of the adventure! <span class="text-red-500">🎉</span> Your contributions make Reverion better every day!
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Left: Donation CTA -->
                <div class="backdrop-blur-xl bg-gradient-to-br from-black/40 via-red-950/30 to-black/40 border-2 border-red-500/40 rounded-2xl p-12 shadow-2xl shadow-red-900/30 relative overflow-hidden">
                    <!-- Glow Effect -->
                    <div class="absolute inset-0 bg-gradient-to-br from-red-600/10 via-transparent to-transparent pointer-events-none"></div>
                    <div class="absolute -inset-1 bg-gradient-to-r from-red-600/20 to-transparent blur-xl opacity-50"></div>

                    <div class="relative z-10 text-center">
                        <h2 class="text-4xl sm:text-5xl font-bold text-white mb-4">
                            Support <span class="text-red-500">Reverion</span>
                        </h2>
                        <p class="text-lg text-gray-300 mb-8 leading-relaxed">
                            Help us keep the server running and improve the gaming experience for everyone. Your support means the world to us!
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4 justify-center">
                            <button type="button" data-modal-show="donation-modal" class="inline-flex items-center justify-center gap-2 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white px-8 py-4 rounded-full text-lg font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg shadow-red-900/50 hover:shadow-red-900/70">
                                Make a Donation
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Right: Leaderboard -->
                <div class="backdrop-blur-xl bg-gradient-to-br from-black/40 via-red-950/30 to-black/40 border-2 border-red-500/40 rounded-2xl p-8 shadow-2xl shadow-red-900/30 relative overflow-hidden">
                    <!-- Glow Effect -->
                    <div class="absolute inset-0 bg-gradient-to-br from-red-600/10 via-transparent to-transparent pointer-events-none"></div>
                    <div class="absolute -inset-1 bg-gradient-to-r from-red-600/20 to-transparent blur-xl opacity-50"></div>

                    <div class="relative z-10">
                        <h3 class="text-2xl font-bold text-white mb-6 text-center">
                            Top <span class="text-red-500">Donators</span>
                        </h3>
                        <div class="space-y-3 max-h-96 overflow-y-auto">
                            <div id="leaderboard-container">
                                <div class="text-center py-8">
                                    <p class="text-gray-400">Loading leaderboard...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

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
                        <a href="https://drive.google.com/file/d/1ujb0EM3H7KkjlYPimggOwMRnj8Dj_IjK/view?usp=drive_link" target="_blank" class="inline-flex items-center justify-center gap-2 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white px-8 py-4 rounded-full text-lg font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg shadow-red-900/50 hover:shadow-red-900/70">
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

    <!-- Donation Modal -->
    <div id="donation-modal" class="hidden">
        <div id="donation-backdrop" class="fixed inset-0 bg-black/80 backdrop-blur-sm z-[60] hidden" data-modal-hide="donation-modal"></div>
        <div id="donation-wrapper" class="fixed inset-0 p-4 z-[70] pointer-events-none hidden">
            <div class="relative w-full max-w-md max-h-full overflow-y-auto pointer-events-auto">
                <div class="relative backdrop-blur-xl bg-gradient-to-br from-black/90 via-red-950/80 to-black/90 border-2 border-red-500/40 rounded-2xl shadow-2xl shadow-red-900/30 overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-br from-red-600/10 via-transparent to-transparent pointer-events-none"></div>
                    <div class="absolute -inset-1 bg-gradient-to-r from-red-600/20 to-transparent blur-xl opacity-50"></div>

                    <div class="relative z-10 p-6">
                        <div class="flex items-center justify-between mb-6">
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-12 rounded-full bg-gradient-to-br from-red-600 to-red-700 flex items-center justify-center">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-2xl font-bold text-white">Make a Donation</h3>
                                    <p class="text-sm text-gray-300">Support Reverion Server</p>
                                </div>
                            </div>
                            <button type="button" class="text-gray-400 hover:text-red-400 hover:bg-red-500/10 rounded-lg p-2 transition-all" data-modal-hide="donation-modal">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>

                        <div id="donation-errors" class="hidden mb-4 p-4 bg-red-500/20 border border-red-500/50 rounded-lg">
                            <ul class="list-disc list-inside text-red-300 text-sm space-y-1"></ul>
                        </div>

                        <form id="donation-form" class="space-y-4">
                            @csrf
                            <div>
                                <label for="donation-name" class="block text-sm font-medium text-gray-300 mb-2">Nama <span class="text-red-400">*</span></label>
                                <input type="text" id="donation-name" name="name" required class="w-full px-4 py-3 bg-black/30 border border-red-500/30 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all text-sm" placeholder="Masukkan nama Anda">
                            </div>
                            <div>
                                <label for="donation-description" class="block text-sm font-medium text-gray-300 mb-2">Pesan Donasi <span class="text-gray-500 text-xs">(Optional)</span></label>
                                <textarea id="donation-description" name="description" rows="3" class="w-full px-4 py-3 bg-black/30 border border-red-500/30 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all text-sm resize-none" placeholder="Tulis pesan dukungan Anda (opsional)"></textarea>
                            </div>
                            <div>
                                <label for="donation-amount" class="block text-sm font-medium text-gray-300 mb-2">Jumlah Donasi (Rupiah) <span class="text-red-400">*</span></label>
                                <div class="relative">
                                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">Rp</span>
                                    <input type="number" id="donation-amount" name="amount" required class="w-full pl-12 pr-4 py-3 bg-black/30 border border-red-500/30 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all text-sm" placeholder="10000">
                                </div>
                                <p class="mt-2 text-xs text-gray-400">Minimum donasi: Rp 1.000</p>
                            </div>
                            <div>
                                <label for="donation-email" class="block text-sm font-medium text-gray-300 mb-2">Email <span class="text-gray-500 text-xs">(Optional)</span></label>
                                <input type="email" id="donation-email" name="email" class="w-full px-4 py-3 bg-black/30 border border-red-500/30 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all text-sm" placeholder="email@example.com">
                                <p class="mt-2 text-xs text-gray-400">Untuk menerima bukti transaksi</p>
                            </div>
                            <button type="submit" id="donation-submit-btn" class="w-full bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white py-3 px-6 rounded-lg font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg shadow-red-900/50 text-sm">
                                Proceed to Payment
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('pre-js')
    @php
        $midtransUrl = config('services.midtrans.is_production', false)
            ? 'https://app.midtrans.com/snap/snap.js'
            : 'https://app.sandbox.midtrans.com/snap/snap.js';
    @endphp
    <script src="{{ $midtransUrl }}" data-client-key="{{ config('services.midtrans.client_key') }}"></script>
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

            // Load packages from API
            loadPackages();

            // Load leaderboard
            loadLeaderboard();

            // Initialize running text
            initRunningText();
        });

        // Load and render packages
        function loadPackages() {
            const container = document.getElementById('packages-container');
            if (!container) return;

            fetch('{{ route("topup.packages") }}')
                .then(response => response.json())
                .then(data => {
                    if (data.success && data.packages) {
                        renderPackages(data.packages);
                    } else {
                        container.innerHTML = '<div class="text-center py-8"><p class="text-red-400">Failed to load packages</p></div>';
                    }
                })
                .catch(error => {
                    console.error('Error loading packages:', error);
                    container.innerHTML = '<div class="text-center py-8"><p class="text-red-400">Error loading packages</p></div>';
                });
        }

        function renderPackages(packages) {
            const container = document.getElementById('packages-container');
            if (!container) return;

            // Default currency (bisa ditambahkan toggle nanti)
            const currentCurrency = 'IDR';

            // Group packages into rows of 3
            const rows = [];
            for (let i = 0; i < packages.length; i += 3) {
                rows.push(packages.slice(i, i + 3));
            }

            let html = '';
            rows.forEach((row, rowIndex) => {
                html += `<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">`;
                row.forEach(pkg => {
                    const priceIdr = pkg.discount_price_idr || pkg.price_idr;
                    const priceUsd = pkg.price_discount_usd || pkg.price_usd;
                    const priceDisplay = currentCurrency === 'IDR'
                        ? 'Rp ' + formatNumber(priceIdr)
                        : '$' + parseFloat(priceUsd).toFixed(2);

                    html += `
                        <div class="backdrop-blur-xl bg-gradient-to-br from-red-950/40 via-red-900/30 to-red-950/40 border border-red-500/30 rounded-xl p-6 shadow-xl shadow-red-900/20 hover:border-red-500/50 hover:shadow-red-900/30 transition-all duration-300 transform hover:scale-105">
                            <div class="text-center mb-4">
                                <h3 class="text-xl font-bold text-white mb-2">${pkg.name}</h3>
                                <p class="text-3xl font-bold text-red-500 mb-4">${priceDisplay}</p>
                            </div>
                            <div class="text-center mb-6">
                                <p class="text-lg font-semibold text-gray-300">
                                    <span class="text-[10px]">🪙</span> ${pkg.amount} ${pkg.item}
                                </p>
                            </div>
                            <a href="{{ route('topup.index') }}" class="block w-full bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white py-3 px-6 rounded-lg font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg shadow-red-900/50 text-center">
                                Purchase Now
                            </a>
                        </div>
                    `;
                });
                html += `</div>`;
            });

            // Add "View All Packages" link
            html += `
                <div class="text-center mt-12">
                    <a href="{{ route('topup.index') }}" class="inline-flex items-center gap-2 backdrop-blur-sm bg-black/40 border-2 border-red-500/40 hover:border-red-500/60 text-white px-8 py-4 rounded-full text-lg font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg shadow-red-900/20 hover:shadow-red-900/40">
                        View All Packages
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </a>
                </div>
            `;

            container.innerHTML = html;
        }

        function formatNumber(num) {
            return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }

        // Load leaderboard
        function loadLeaderboard() {
            const container = document.getElementById('leaderboard-container');
            if (!container) return;

            fetch('{{ route("leaderboard.api") }}?type=donation&limit=10')
                .then(response => response.json())
                .then(data => {
                    if (data.success && data.leaderboards && data.leaderboards.length > 0) {
                        renderLeaderboard(data.leaderboards);
                    } else {
                        container.innerHTML = '<div class="text-center py-8"><p class="text-gray-400">No leaderboard data yet</p></div>';
                    }
                })
                .catch(error => {
                    console.error('Error loading leaderboard:', error);
                    container.innerHTML = '<div class="text-center py-8"><p class="text-gray-400">No leaderboard data yet</p></div>';
                });
        }

        function renderLeaderboard(leaderboards) {
            const container = document.getElementById('leaderboard-container');
            if (!container) return;

            let html = '';
            leaderboards.forEach((item, index) => {
                const medal = index === 0 ? '🥇' : index === 1 ? '🥈' : index === 2 ? '🥉' : '';
                html += `
                    <div class="flex items-center justify-between p-3 backdrop-blur-sm bg-black/30 rounded-lg border border-red-500/20 hover:border-red-500/40 transition-all">
                        <div class="flex items-center gap-3">
                            <div class="flex-shrink-0 w-8 text-center">
                                <span class="text-lg">${medal || '#' + (index + 1)}</span>
                            </div>
                            <div class="flex-1">
                                <p class="text-white font-semibold">${item.username}</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-red-500 font-bold">Rp ${formatNumber(item.score)}</p>
                        </div>
                    </div>
                `;
            });

            container.innerHTML = html;
        }

        // Initialize running text animation
        function initRunningText() {
            const runningText = document.querySelector('.running-text');
            if (!runningText) return;

            // Duplicate text for seamless loop
            const text = runningText.textContent;
            runningText.textContent = text + ' ' + text + ' ' + text;

            // Animate
            let position = 0;
            const speed = 0.5; // pixels per frame (diperlambat dari 1 menjadi 0.5)

            function animate() {
                position -= speed;
                runningText.style.transform = `translateX(${position}px)`;

                // Reset position when text has scrolled completely
                if (Math.abs(position) >= runningText.scrollWidth / 3) {
                    position = 0;
                }

                requestAnimationFrame(animate);
            }

            animate();
        }

        // Donation modal handlers
        document.addEventListener('DOMContentLoaded', function() {
            // Handle donation modal show
            const donationModalTrigger = document.querySelector('[data-modal-show="donation-modal"]');
            if (donationModalTrigger) {
                donationModalTrigger.addEventListener('click', function(e) {
                    e.preventDefault();
                    const modalId = 'donation-modal';
                    const cleanId = modalId.replace('-modal', '');
                    const modalContainer = document.getElementById(modalId);
                    const backdrop = document.getElementById(cleanId + '-backdrop');
                    const wrapper = document.getElementById(cleanId + '-wrapper');

                    if (modalContainer) modalContainer.classList.remove('hidden');
                    if (backdrop) backdrop.classList.remove('hidden');
                    if (wrapper) {
                        wrapper.classList.remove('hidden');
                        wrapper.classList.add('flex', 'items-center', 'justify-center');
                        wrapper.style.display = 'flex';
                    }
                    document.body.style.overflow = 'hidden';
                });
            }

            // Handle donation modal hide
            document.querySelectorAll('[data-modal-hide="donation-modal"]').forEach(trigger => {
                trigger.addEventListener('click', function(e) {
                    e.preventDefault();
                    const modalId = 'donation-modal';
                    const cleanId = modalId.replace('-modal', '');
                    const modalContainer = document.getElementById(modalId);
                    const backdrop = document.getElementById(cleanId + '-backdrop');
                    const wrapper = document.getElementById(cleanId + '-wrapper');

                    if (backdrop) backdrop.classList.add('hidden');
                    if (wrapper) {
                        wrapper.classList.add('hidden');
                        wrapper.classList.remove('flex', 'items-center', 'justify-center');
                        wrapper.style.display = 'none';
                    }
                    if (modalContainer) modalContainer.classList.add('hidden');
                    document.body.style.overflow = '';
                });
            });

            // Close on backdrop click
            const donationBackdrop = document.getElementById('donation-backdrop');
            if (donationBackdrop) {
                donationBackdrop.addEventListener('click', function(e) {
                    if (e.target === this) {
                        const modalId = 'donation-modal';
                        const cleanId = modalId.replace('-modal', '');
                        const modalContainer = document.getElementById(modalId);
                        const backdrop = document.getElementById(cleanId + '-backdrop');
                        const wrapper = document.getElementById(cleanId + '-wrapper');

                        if (backdrop) backdrop.classList.add('hidden');
                        if (wrapper) {
                            wrapper.classList.add('hidden');
                            wrapper.classList.remove('flex', 'items-center', 'justify-center');
                        }
                        if (modalContainer) modalContainer.classList.add('hidden');
                        document.body.style.overflow = '';
                    }
                });
            }

            // Donation form submission
            const donationForm = document.getElementById('donation-form');
            if (donationForm) {
                donationForm.addEventListener('submit', function(e) {
                    e.preventDefault();

                    const form = this;
                    const submitBtn = document.getElementById('donation-submit-btn');
                    const errorDiv = document.getElementById('donation-errors');
                    const errorList = errorDiv?.querySelector('ul');

                    // Hide previous errors
                    if (errorDiv) {
                        errorDiv.classList.add('hidden');
                    }
                    if (errorList) {
                        errorList.innerHTML = '';
                    }

                    // Get form data
                    const formData = {
                        name: document.getElementById('donation-name').value.trim(),
                        description: document.getElementById('donation-description').value.trim(),
                        amount: parseFloat(document.getElementById('donation-amount').value),
                        email: document.getElementById('donation-email').value.trim() || null,
                    };

                    // Validation
                    if (!formData.name) {
                        showFormError(errorDiv, errorList, 'Nama harus diisi');
                        return;
                    }

                    if (!formData.amount || formData.amount <= 0) {
                        showFormError(errorDiv, errorList, 'Jumlah donasi harus lebih dari 0');
                        return;
                    }

                    // Disable submit button
                    const originalText = submitBtn.textContent;
                    submitBtn.disabled = true;
                    submitBtn.textContent = 'Processing...';

                    // Create donation snap payment
                    fetch('{{ route("donation.create-snap") }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}'
                        },
                        body: JSON.stringify(formData)
                    })
                    .then(async response => {
                        // Check if response is JSON
                        const contentType = response.headers.get('content-type');
                        if (contentType && contentType.includes('application/json')) {
                            return response.json();
                        } else {
                            // If not JSON, try to parse as text first
                            const text = await response.text();
                            throw new Error('Server returned non-JSON response. Status: ' + response.status);
                        }
                    })
                    .then(data => {
                        if (data.success && data.snap_token) {
                            // Close modal
                            const modalId = 'donation-modal';
                            const cleanId = modalId.replace('-modal', '');
                            const modalContainer = document.getElementById(modalId);
                            const backdrop = document.getElementById(cleanId + '-backdrop');
                            const wrapper = document.getElementById(cleanId + '-wrapper');

                            if (backdrop) backdrop.classList.add('hidden');
                            if (wrapper) {
                                wrapper.classList.add('hidden');
                                wrapper.classList.remove('flex', 'items-center', 'justify-center');
                                wrapper.style.display = 'none';
                            }
                            if (modalContainer) modalContainer.classList.add('hidden');
                            document.body.style.overflow = '';

                            // Open Midtrans snap
                            snap.pay(data.snap_token, {
                                onSuccess: function(result) {
                                    console.log('Donation payment success:', result);
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Donation Successful!',
                                        text: 'Terima kasih atas dukungan Anda!',
                                        confirmButtonColor: '#dc2626',
                                    }).then(() => {
                                        // Reload leaderboard
                                        loadLeaderboard();
                                        // Reset form
                                        donationForm.reset();
                                    });
                                },
                                onPending: function(result) {
                                    console.log('Donation payment pending:', result);
                                    Swal.fire({
                                        icon: 'info',
                                        title: 'Payment Pending',
                                        text: 'Silakan selesaikan pembayaran Anda.',
                                        confirmButtonColor: '#dc2626',
                                    }).then(() => {
                                        loadLeaderboard();
                                    });
                                },
                                onError: function(result) {
                                    console.log('Donation payment error:', result);
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Payment Failed',
                                        text: 'Silakan coba lagi.',
                                        confirmButtonColor: '#dc2626',
                                    });
                                    submitBtn.disabled = false;
                                    submitBtn.textContent = originalText;
                                },
                                onClose: function() {
                                    console.log('Donation payment popup closed');
                                    submitBtn.disabled = false;
                                    submitBtn.textContent = originalText;
                                }
                            });
                        } else {
                            // Handle validation errors
                            if (data.errors) {
                                const errorMessages = [];
                                Object.keys(data.errors).forEach(key => {
                                    data.errors[key].forEach(msg => errorMessages.push(msg));
                                });
                                showFormError(errorDiv, errorList, errorMessages.join('<br>'));
                            } else {
                                showFormError(errorDiv, errorList, data.message || 'Gagal membuat pembayaran. Silakan coba lagi.');
                            }
                            submitBtn.disabled = false;
                            submitBtn.textContent = originalText;
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        showFormError(errorDiv, errorList, 'Terjadi kesalahan. Silakan coba lagi atau pastikan jumlah donasi minimum Rp 1.000.');
                        submitBtn.disabled = false;
                        submitBtn.textContent = originalText;
                        showFormError(errorDiv, errorList, 'Terjadi kesalahan. Silakan coba lagi.');
                        submitBtn.disabled = false;
                        submitBtn.textContent = originalText;
                    });
                });
            }
        });

        function showFormError(errorDiv, errorList, message) {
            if (errorDiv && errorList) {
                errorDiv.classList.remove('hidden');
                errorList.innerHTML = '';
                const li = document.createElement('li');
                li.textContent = message;
                errorList.appendChild(li);
            }
        }
    </script>

    <style>
        .running-text-container {
            overflow: hidden;
            position: relative;
        }
        .running-text {
            display: inline-block;
            animation: scroll 60s linear infinite;
        }
        @keyframes scroll {
            0% {
                transform: translateX(100%);
            }
            100% {
                transform: translateX(-100%);
            }
        }
    </style>
@endsection

