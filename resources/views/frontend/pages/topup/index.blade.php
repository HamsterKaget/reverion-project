@extends('frontend.layouts.app')

@section('seo')
    <title>Top Up - Dragon Nest Private Server</title>
    <meta name="description" content="Top up your account with our premium packages. Get Gold Ingots, Silver Ingots, and exclusive bonuses!">
@endsection

@section('body')
    <!-- Hero Section -->
    {{-- <section class="relative min-h-[60vh] flex items-center justify-center overflow-hidden">
        <!-- Background Image -->
        <div class="absolute inset-0 w-full h-full">
            <img src="{{ asset('assets/bg-1.jpeg') }}" alt="Background" class="w-full h-full object-cover">
        </div>

        <!-- Dark Overlay dengan opacity 85% -->
        <div class="absolute inset-0 bg-black/90 z-10"></div>

        <!-- Red Accent Overlay untuk efek dual tone -->
        <div class="absolute inset-0 bg-gradient-to-br from-red-950/20 via-transparent to-black/40 z-10"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_30%_50%,rgba(220,38,38,0.15),transparent_70%)] z-10"></div>

        <!-- Content Container -->
        <div class="relative z-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-30 w-full text-center">
            <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold mb-6 leading-tight">
                <span class="text-white">Top Up Your</span>
                <br>
                <span class="text-red-500">Adventure</span>
            </h1>
            <p class="text-lg sm:text-xl text-gray-300 max-w-3xl mx-auto leading-relaxed">
                Enhance your gameplay with premium packages. Get Gold Ingots, Silver Ingots, and exclusive bonuses to power up your journey!
            </p>
        </div>
    </section> --}}

    <!-- Top-Up Packages Section -->
    <section class="section-animate relative py-16 lg:py-32 overflow-hidden">
        <!-- Background Image -->
        {{-- <div class="absolute inset-0 w-full h-full">
            <img src="{{ asset('assets/bg-2.jpeg') }}" alt="Background" class="w-full h-full object-cover">
        </div>
        <!-- Dark Overlay dengan opacity 70% -->
        <div class="absolute inset-0 bg-black/95 z-10"></div> --}}
        <!-- Red Accent Overlay -->
        <div class="absolute inset-0 bg-gradient-to-br from-red-950/15 via-transparent to-black/30 z-10"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_30%_50%,rgba(220,38,38,0.1),transparent_70%)] z-10"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-12">
                <h2 class="text-4xl sm:text-5xl font-bold text-white mb-4">
                    Top Up <span class="text-red-500">Packages</span>
                </h2>
                <p class="text-lg text-gray-300 max-w-2xl mx-auto">
                    Choose the perfect package for your adventure
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
                        <button class="w-full bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white py-3 px-6 rounded-lg font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg shadow-red-900/50">
                            Purchase Now
                        </button>
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
                        <button class="w-full bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white py-3 px-6 rounded-lg font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg shadow-red-900/50">
                            Purchase Now
                        </button>
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
                        <button class="w-full bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white py-3 px-6 rounded-lg font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg shadow-red-900/50">
                            Purchase Now
                        </button>
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
                        <button class="w-full bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white py-3 px-6 rounded-lg font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg shadow-red-900/50">
                            Purchase Now
                        </button>
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
                        <button class="w-full bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white py-3 px-6 rounded-lg font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg shadow-red-900/50">
                            Purchase Now
                        </button>
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
                        <button class="w-full bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white py-3 px-6 rounded-lg font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg shadow-red-900/50">
                            Purchase Now
                        </button>
                    </div>
                </div>
            </div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 mt-20">
                <div class="text-center mb-12">
                    <h2 class="text-4xl sm:text-5xl font-bold text-white mb-4">
                        Accepted <span class="text-red-500">Payment Methods</span>
                    </h2>
                    <p class="text-lg text-gray-300 max-w-2xl mx-auto">
                        We accept various payment methods for your convenience
                    </p>
                </div>

                <!-- Credit Cards -->
                <div class="mb-12">
                    <h3 class="text-2xl font-bold text-white mb-6 text-center">Credit Cards</h3>
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-6 max-w-4xl mx-auto">
                        <!-- VISA -->
                        <div class="flex items-center justify-center">
                            <img src="{{ asset('assets/payment_method/visa.png') }}" alt="VISA" class="w-32 h-20 object-contain transition-all duration-300 transform hover:scale-110">
                        </div>

                        <!-- Mastercard -->
                        <div class="flex items-center justify-center">
                            <img src="{{ asset('assets/payment_method/mastercard.png') }}" alt="Mastercard" class="w-32 h-20 object-contain transition-all duration-300 transform hover:scale-110">
                        </div>

                        <!-- American Express -->
                        <div class="flex items-center justify-center">
                            <img src="{{ asset('assets/payment_method/amx.png') }}" alt="American Express" class="w-32 h-20 object-contain transition-all duration-300 transform hover:scale-110">
                        </div>

                        <!-- JCB -->
                        <div class="flex items-center justify-center">
                            <img src="{{ asset('assets/payment_method/jcb.png') }}" alt="JCB" class="w-32 h-20 object-contain transition-all duration-300 transform hover:scale-110">
                        </div>
                    </div>
                </div>

                <!-- Local Payment Methods -->
                <div>
                    <h3 class="text-2xl font-bold text-white mb-6 text-center">Local Payment (Indonesia)</h3>
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-6 max-w-4xl mx-auto">
                        <!-- Gopay -->
                        <div class="flex items-center justify-center">
                            <img src="{{ asset('assets/payment_method/gopay.png') }}" alt="Gopay" class="w-32 h-20 object-contain transition-all duration-300 transform hover:scale-110">
                        </div>

                        <!-- QRIS -->
                        <div class="flex items-center justify-center">
                            <img src="{{ asset('assets/payment_method/qris.png') }}" alt="QRIS" class="w-32 h-20 object-contain transition-all duration-300 transform hover:scale-110">
                        </div>

                        <!-- ShopeePay -->
                        <div class="flex items-center justify-center">
                            <img src="{{ asset('assets/payment_method/shopeepay.png') }}" alt="ShopeePay" class="w-32 h-20 object-contain transition-all duration-300 transform hover:scale-110">
                        </div>

                        <!-- Dana -->
                        <div class="flex items-center justify-center">
                            <img src="{{ asset('assets/payment_method/Dana.png') }}" alt="Dana" class="w-32 h-20 object-contain transition-all duration-300 transform hover:scale-110">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Payment Methods Section -->
    {{-- <section class="section-animate relative py-16 lg:py-24 overflow-hidden">
        <!-- Background Image -->
        <div class="absolute inset-0 w-full h-full">
            <img src="{{ asset('assets/bg-2.jpeg') }}" alt="Background" class="w-full h-full object-cover">
        </div>
        <!-- Dark Overlay dengan opacity 50% -->
        <div class="absolute inset-0 bg-black/50 z-10"></div>
        <!-- Red Accent Overlay -->
        <div class="absolute inset-0 bg-gradient-to-tr from-red-950/8 via-transparent to-black/15 z-10"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_30%_50%,rgba(220,38,38,0.05),transparent_70%)] z-10"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-12">
                <h2 class="text-4xl sm:text-5xl font-bold text-white mb-4">
                    Accepted <span class="text-red-500">Payment Methods</span>
                </h2>
                <p class="text-lg text-gray-300 max-w-2xl mx-auto">
                    We accept various payment methods for your convenience
                </p>
            </div>

            <!-- Credit Cards -->
            <div class="mb-12">
                <h3 class="text-2xl font-bold text-white mb-6 text-center">Credit Cards</h3>
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-6 max-w-4xl mx-auto">
                    <!-- VISA -->
                    <div class="flex items-center justify-center">
                        <img src="{{ asset('assets/payment_method/visa.png') }}" alt="VISA" class="w-32 h-20 object-contain transition-all duration-300 transform hover:scale-110">
                    </div>

                    <!-- Mastercard -->
                    <div class="flex items-center justify-center">
                        <img src="{{ asset('assets/payment_method/mastercard.png') }}" alt="Mastercard" class="w-32 h-20 object-contain transition-all duration-300 transform hover:scale-110">
                    </div>

                    <!-- American Express -->
                    <div class="flex items-center justify-center">
                        <img src="{{ asset('assets/payment_method/amx.png') }}" alt="American Express" class="w-32 h-20 object-contain transition-all duration-300 transform hover:scale-110">
                    </div>

                    <!-- JCB -->
                    <div class="flex items-center justify-center">
                        <img src="{{ asset('assets/payment_method/jcb.png') }}" alt="JCB" class="w-32 h-20 object-contain transition-all duration-300 transform hover:scale-110">
                    </div>
                </div>
            </div>

            <!-- Local Payment Methods -->
            <div>
                <h3 class="text-2xl font-bold text-white mb-6 text-center">Local Payment (Indonesia)</h3>
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-6 max-w-4xl mx-auto">
                    <!-- Gopay -->
                    <div class="flex items-center justify-center">
                        <img src="{{ asset('assets/payment_method/gopay.png') }}" alt="Gopay" class="w-32 h-20 object-contain transition-all duration-300 transform hover:scale-110">
                    </div>

                    <!-- QRIS -->
                    <div class="flex items-center justify-center">
                        <img src="{{ asset('assets/payment_method/qris.png') }}" alt="QRIS" class="w-32 h-20 object-contain transition-all duration-300 transform hover:scale-110">
                    </div>

                    <!-- ShopeePay -->
                    <div class="flex items-center justify-center">
                        <img src="{{ asset('assets/payment_method/shopeepay.png') }}" alt="ShopeePay" class="w-32 h-20 object-contain transition-all duration-300 transform hover:scale-110">
                    </div>

                    <!-- Dana -->
                    <div class="flex items-center justify-center">
                        <img src="{{ asset('assets/payment_method/Dana.png') }}" alt="Dana" class="w-32 h-20 object-contain transition-all duration-300 transform hover:scale-110">
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- Donate Section -->
    <section class="section-animate relative py-16 lg:py-24 rpg-pattern overflow-hidden">
        <!-- Background Image -->
        <div class="absolute inset-0 w-full h-full">
            <img src="{{ asset('assets/bg-2.jpeg') }}" alt="Background" class="w-full h-full object-cover">
        </div>
        <!-- Dark Overlay dengan opacity 60% -->
        <div class="absolute inset-0 bg-black/85 z-10"></div>
        <!-- Red Accent Overlay -->
        <div class="absolute inset-0 bg-gradient-to-br from-red-950/10 via-transparent to-black/20 z-10"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_30%_50%,rgba(220,38,38,0.08),transparent_70%)] z-10"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Left: Floating Image -->
                <div class="flex justify-center lg:justify-start">
                    <div class="relative">
                        <img src="{{ asset('assets/dragon-nest-player.png') }}" alt="Dragon Nest Player" class="w-full max-w-md h-auto object-contain floating-player">
                    </div>
                </div>

                <!-- Right: Content -->
                <div class="space-y-6">
                    <h2 class="text-4xl sm:text-5xl font-bold text-white mb-4">
                        Support <span class="text-red-500">Our Server</span>
                    </h2>
                    <p class="text-lg text-gray-300 leading-relaxed">
                        Help us maintain and improve the server by making a donation. Your support keeps the server running smoothly and allows us to add new features and content regularly.
                    </p>
                    <div class="space-y-4">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-12 h-12 rounded-lg bg-gradient-to-br from-red-600 to-red-700 flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold text-white mb-1">Exclusive Discord Role</h3>
                                <p class="text-gray-300">Get a special role in our Discord server as a token of appreciation for your support.</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-12 h-12 rounded-lg bg-gradient-to-br from-red-600 to-red-700 flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold text-white mb-1">Priority Support</h3>
                                <p class="text-gray-300">Receive priority support from our team for any issues or questions you may have.</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-12 h-12 rounded-lg bg-gradient-to-br from-red-600 to-red-700 flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold text-white mb-1">Server Development</h3>
                                <p class="text-gray-300">Your donations directly contribute to server improvements, new features, and better gameplay experience.</p>
                            </div>
                        </div>
                    </div>
                    <div class="pt-4">
                        <a href="#donate" class="inline-flex items-center gap-2 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white px-8 py-4 rounded-full text-lg font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg shadow-red-900/50 hover:shadow-red-900/70">
                            Donate Now
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

