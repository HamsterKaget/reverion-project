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
        <div class="relative z-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 w-full">
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
                        <a href="#register" class="inline-flex items-center gap-2 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white px-8 py-4 rounded-full text-lg font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg shadow-red-900/50 hover:shadow-red-900/70">
                            Begin Your Quest
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Right Content - Feature Cards dengan Glassmorphism -->
                <div class="space-y-6">
                    <!-- Video Thumbnail Card -->
                    <div class="backdrop-blur-xl bg-black/30 border border-red-500/20 rounded-2xl overflow-hidden shadow-2xl shadow-red-900/20 hover:border-red-500/40 transition-all duration-300">
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
        <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 animate-bounce z-30">
            <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
            </svg>
        </div>
    </section>

    <!-- Counter Launch Section -->
    <section class="py-20 bg-gray-900 border-y border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl sm:text-4xl font-bold mb-4 text-white">
                <span class="gradient-text">Beta Launch Soon</span>
            </h2>
            <p class="text-gray-400 mb-8 text-lg">Get ready for an epic adventure starting on December 6th at 00:00</p>

            <div id="countdown" class="flex flex-wrap justify-center gap-4 sm:gap-8">
                <div class="bg-gray-800 border border-red-600 rounded-lg p-6 min-w-[80px] sm:min-w-[100px]">
                    <div data-days class="text-4xl sm:text-5xl font-bold text-red-500 mb-2">00</div>
                    <div class="text-sm text-gray-400 uppercase">Days</div>
                </div>
                <div class="bg-gray-800 border border-red-600 rounded-lg p-6 min-w-[80px] sm:min-w-[100px]">
                    <div data-hours class="text-4xl sm:text-5xl font-bold text-red-500 mb-2">00</div>
                    <div class="text-sm text-gray-400 uppercase">Hours</div>
                </div>
                <div class="bg-gray-800 border border-red-600 rounded-lg p-6 min-w-[80px] sm:min-w-[100px]">
                    <div data-minutes class="text-4xl sm:text-5xl font-bold text-red-500 mb-2">00</div>
                    <div class="text-sm text-gray-400 uppercase">Minutes</div>
                </div>
                <div class="bg-gray-800 border border-red-600 rounded-lg p-6 min-w-[80px] sm:min-w-[100px]">
                    <div data-seconds class="text-4xl sm:text-5xl font-bold text-red-500 mb-2">00</div>
                    <div class="text-sm text-gray-400 uppercase">Seconds</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Download Client Section -->
    <section id="download" class="py-20 bg-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl sm:text-4xl font-bold mb-4 text-white">
                    Download <span class="gradient-text">Client</span>
                </h2>
                <p class="text-gray-400 max-w-2xl mx-auto">
                    Get the latest game client and start your adventure. Available for Windows platform.
                </p>
            </div>

            <div class="max-w-md mx-auto">
                <div class="backdrop-blur-xl bg-gradient-to-br from-black/40 via-red-950/30 to-black/40 border border-red-500/20 rounded-2xl p-8 text-center shadow-2xl shadow-red-900/20 hover:border-red-500/40 transition-all duration-300">
                    <div class="mb-6">
                        <svg class="w-20 h-20 mx-auto text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-4">Game Client v1.0</h3>
                    <p class="text-gray-400 mb-6">Latest version with all features and optimizations</p>
                    <div class="space-y-3">
                        <a href="#" class="block w-full bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white px-6 py-3 rounded-full font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg shadow-red-900/50">
                            Download for Windows
                        </a>
                        <p class="text-sm text-gray-500">File size: ~6.2 GB</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Feature Server Section -->
    <section id="features" class="py-20 bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl sm:text-4xl font-bold mb-4 text-white">
                    Server <span class="gradient-text">Features</span>
                </h2>
                <p class="text-gray-400 max-w-2xl mx-auto">
                    Discover what makes our server unique and exciting
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="backdrop-blur-xl bg-gradient-to-br from-black/40 via-red-950/30 to-black/40 border border-red-500/20 rounded-xl p-6 shadow-xl shadow-red-900/20 hover:border-red-500/40 hover:shadow-red-900/30 transition-all duration-300 transform hover:scale-105">
                    <div class="w-12 h-12 bg-gradient-to-br from-red-600 to-red-700 rounded-lg flex items-center justify-center mb-4 shadow-lg shadow-red-900/50">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">High Rate Experience</h3>
                    <p class="text-gray-400">Enjoy increased EXP and drop rates for faster progression and more exciting gameplay.</p>
                </div>

                <div class="backdrop-blur-xl bg-gradient-to-br from-black/40 via-red-950/30 to-black/40 border border-red-500/20 rounded-xl p-6 shadow-xl shadow-red-900/20 hover:border-red-500/40 hover:shadow-red-900/30 transition-all duration-300 transform hover:scale-105">
                    <div class="w-12 h-12 bg-gradient-to-br from-red-600 to-red-700 rounded-lg flex items-center justify-center mb-4 shadow-lg shadow-red-900/50">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Active Community</h3>
                    <p class="text-gray-400">Join a vibrant community of players, participate in events, and make new friends.</p>
                </div>

                <div class="backdrop-blur-xl bg-gradient-to-br from-black/40 via-red-950/30 to-black/40 border border-red-500/20 rounded-xl p-6 shadow-xl shadow-red-900/20 hover:border-red-500/40 hover:shadow-red-900/30 transition-all duration-300 transform hover:scale-105">
                    <div class="w-12 h-12 bg-gradient-to-br from-red-600 to-red-700 rounded-lg flex items-center justify-center mb-4 shadow-lg shadow-red-900/50">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Secure & Stable</h3>
                    <p class="text-gray-400">Experience stable gameplay with advanced security measures and regular updates.</p>
                </div>

                <div class="backdrop-blur-xl bg-gradient-to-br from-black/40 via-red-950/30 to-black/40 border border-red-500/20 rounded-xl p-6 shadow-xl shadow-red-900/20 hover:border-red-500/40 hover:shadow-red-900/30 transition-all duration-300 transform hover:scale-105">
                    <div class="w-12 h-12 bg-gradient-to-br from-red-600 to-red-700 rounded-lg flex items-center justify-center mb-4 shadow-lg shadow-red-900/50">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Easy Top Up</h3>
                    <p class="text-gray-400">Convenient and secure top-up system with multiple payment methods available.</p>
                </div>

                <div class="backdrop-blur-xl bg-gradient-to-br from-black/40 via-red-950/30 to-black/40 border border-red-500/20 rounded-xl p-6 shadow-xl shadow-red-900/20 hover:border-red-500/40 hover:shadow-red-900/30 transition-all duration-300 transform hover:scale-105">
                    <div class="w-12 h-12 bg-gradient-to-br from-red-600 to-red-700 rounded-lg flex items-center justify-center mb-4 shadow-lg shadow-red-900/50">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Custom Events</h3>
                    <p class="text-gray-400">Participate in exclusive events, competitions, and special rewards throughout the year.</p>
                </div>

                <div class="backdrop-blur-xl bg-gradient-to-br from-black/40 via-red-950/30 to-black/40 border border-red-500/20 rounded-xl p-6 shadow-xl shadow-red-900/20 hover:border-red-500/40 hover:shadow-red-900/30 transition-all duration-300 transform hover:scale-105">
                    <div class="w-12 h-12 bg-gradient-to-br from-red-600 to-red-700 rounded-lg flex items-center justify-center mb-4 shadow-lg shadow-red-900/50">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">24/7 Support</h3>
                    <p class="text-gray-400">Get help anytime with our dedicated support team ready to assist you around the clock.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Counter Stats Section -->
    <section class="py-20 bg-gray-800 border-y border-gray-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="mb-4">
                        <svg class="w-16 h-16 mx-auto text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </div>
                    <div data-counter="12500" class="counter-number mb-2">0</div>
                    <h3 class="text-xl font-semibold text-gray-300">Total Registered</h3>
                </div>

                <div class="text-center">
                    <div class="mb-4">
                        <svg class="w-16 h-16 mx-auto text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div data-counter="3420" class="counter-number mb-2">0</div>
                    <h3 class="text-xl font-semibold text-gray-300">Players Today</h3>
                </div>

                <div class="text-center">
                    <div class="mb-4">
                        <svg class="w-16 h-16 mx-auto text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <div data-counter="8920" class="counter-number mb-2">0</div>
                    <h3 class="text-xl font-semibold text-gray-300">Players This Month</h3>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section id="faq" class="py-20 bg-gray-900">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl sm:text-4xl font-bold mb-4 text-white">
                    Frequently Asked <span class="gradient-text">Questions</span>
                </h2>
                <p class="text-gray-400">
                    Find answers to common questions about our server
                </p>
            </div>

            <div class="space-y-4">
                <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-gray-800 text-white" data-inactive-classes="bg-gray-800 text-gray-400">
                    <h2 id="accordion-flush-heading-1">
                        <button type="button" class="flex items-center justify-between w-full py-5 px-5 font-medium text-left border-b border-gray-700 hover:bg-gray-800" data-accordion-target="#accordion-flush-body-1" aria-expanded="false" aria-controls="accordion-flush-body-1">
                            <span>How do I register for the server?</span>
                            <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-flush-body-1" class="hidden" aria-labelledby="accordion-flush-heading-1">
                        <div class="py-5 px-5 border-b border-gray-700 bg-gray-800">
                            <p class="mb-2 text-gray-300">You can register by clicking the "Register Now" button in the hero section or navigation menu. Simply fill out the registration form with your desired username, email, and password.</p>
                        </div>
                    </div>

                    <h2 id="accordion-flush-heading-2">
                        <button type="button" class="flex items-center justify-between w-full py-5 px-5 font-medium text-left border-b border-gray-700 hover:bg-gray-800" data-accordion-target="#accordion-flush-body-2" aria-expanded="false" aria-controls="accordion-flush-body-2">
                            <span>What are the server rates?</span>
                            <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-flush-body-2" class="hidden" aria-labelledby="accordion-flush-heading-2">
                        <div class="py-5 px-5 border-b border-gray-700 bg-gray-800">
                            <p class="mb-2 text-gray-300">Our server features high rates for EXP (10x), drop rates (5x), and gold (3x) to provide a more exciting and faster-paced gameplay experience.</p>
                        </div>
                    </div>

                    <h2 id="accordion-flush-heading-3">
                        <button type="button" class="flex items-center justify-between w-full py-5 px-5 font-medium text-left border-b border-gray-700 hover:bg-gray-800" data-accordion-target="#accordion-flush-body-3" aria-expanded="false" aria-controls="accordion-flush-body-3">
                            <span>How do I top up my account?</span>
                            <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-flush-body-3" class="hidden" aria-labelledby="accordion-flush-heading-3">
                        <div class="py-5 px-5 border-b border-gray-700 bg-gray-800">
                            <p class="mb-2 text-gray-300">You can top up your account through our secure payment system. Visit the Top Up section in your account dashboard and choose from various payment methods including credit cards, e-wallets, and bank transfers.</p>
                        </div>
                    </div>

                    <h2 id="accordion-flush-heading-4">
                        <button type="button" class="flex items-center justify-between w-full py-5 px-5 font-medium text-left border-b border-gray-700 hover:bg-gray-800" data-accordion-target="#accordion-flush-body-4" aria-expanded="false" aria-controls="accordion-flush-body-4">
                            <span>When will the beta launch?</span>
                            <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-flush-body-4" class="hidden" aria-labelledby="accordion-flush-heading-4">
                        <div class="py-5 px-5 border-b border-gray-700 bg-gray-800">
                            <p class="mb-2 text-gray-300">The beta launch is scheduled for December 6th at 00:00. Check the countdown timer on our homepage for the exact time remaining until launch.</p>
                        </div>
                    </div>

                    <h2 id="accordion-flush-heading-5">
                        <button type="button" class="flex items-center justify-between w-full py-5 px-5 font-medium text-left border-b border-gray-700 hover:bg-gray-800" data-accordion-target="#accordion-flush-body-5" aria-expanded="false" aria-controls="accordion-flush-body-5">
                            <span>Is the server free to play?</span>
                            <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-flush-body-5" class="hidden" aria-labelledby="accordion-flush-heading-5">
                        <div class="py-5 px-5 bg-gray-800">
                            <p class="mb-2 text-gray-300">Yes, the server is completely free to play! You can enjoy all the core features without any cost. Top-ups are optional and provide additional convenience items and cosmetics.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section id="register" class="py-20 bg-gradient-to-br from-gray-900 via-red-900/20 to-gray-900">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl sm:text-4xl font-bold mb-6 text-white">
                Ready to Begin Your <span class="gradient-text">Adventure?</span>
            </h2>
            <p class="text-lg text-gray-300 mb-8 max-w-2xl mx-auto">
                Join thousands of players and experience the ultimate Dragon Nest private server. Register now and be part of an epic community!
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="#" class="bg-red-600 hover:bg-red-700 text-white px-8 py-4 rounded-lg text-lg font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg shadow-red-900/50">
                    Create Account
                </a>
                <a href="#download" class="bg-gray-800 hover:bg-gray-700 border-2 border-red-600 text-white px-8 py-4 rounded-lg text-lg font-semibold transition-all duration-300 transform hover:scale-105">
                    Download Client
                </a>
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

