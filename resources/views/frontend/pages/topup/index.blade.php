@extends('frontend.layouts.app')

@section('seo')
    <title>Top Up - Dragon Nest Private Server</title>
    <meta name="description" content="Top up your account with our premium packages. Get Gold Ingots, Silver Ingots, and exclusive bonuses!">
@endsection

@section('pre-js')
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('services.midtrans.client_key') }}"></script>
@endsection

@section('body')
    <!-- Top-Up Checkout Form Section -->
    <section class="section-animate relative py-16 lg:py-32 overflow-hidden">
        <!-- Red Accent Overlay -->
        <div class="absolute inset-0 bg-gradient-to-br from-red-950/15 via-transparent to-black/30 z-10"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_30%_50%,rgba(220,38,38,0.1),transparent_70%)] z-10"></div>

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-12">
                <h2 class="text-4xl sm:text-5xl font-bold text-white mb-4">
                    Top Up <span class="text-red-500">Checkout</span>
                </h2>
                <p class="text-lg text-gray-300 max-w-2xl mx-auto">
                    Complete your purchase in a few simple steps
                </p>
            </div>

            <!-- Tabs: Top Up / History -->
            <div class="mb-6 border-b border-gray-700">
                <div class="flex gap-4">
                    <button class="tab-btn active px-4 py-2 text-white font-semibold border-b-2 border-red-500 transition-colors" data-tab="topup">
                        Top Up
                    </button>
                    <button class="tab-btn px-4 py-2 text-gray-400 hover:text-white font-semibold transition-colors" data-tab="history">
                        History
                    </button>
                </div>
            </div>

            <!-- Top Up Tab Content -->
            <div id="topup-tab" class="tab-content">
                <form id="topup-form" class="space-y-6">
                    <!-- Section 1: Select Amount -->
                    <div class="backdrop-blur-xl bg-gradient-to-br from-red-950/40 via-red-900/30 to-red-950/40 border border-red-500/30 rounded-xl p-6 shadow-xl shadow-red-900/20">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-2xl font-bold text-white">
                                <span class="text-red-500">1</span> Select Amount
                            </h3>
                            <!-- Currency Toggle -->
                            <div class="flex items-center gap-3">
                                <span class="text-sm text-gray-300">USD</span>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" id="currency-toggle" class="sr-only peer">
                                    <div class="w-11 h-6 bg-gray-600 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-red-500/20 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-red-600"></div>
                                </label>
                                <span class="text-sm text-gray-300">IDR</span>
                            </div>
                        </div>

                        <!-- Packages Grid - Simple cards with price and cash -->
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4" id="package-grid">
                            <!-- Package 1: 1K -->
                            <div class="package-card backdrop-blur-xl bg-gradient-to-br from-gray-800/50 via-gray-700/30 to-gray-800/50 border border-gray-600/30 rounded-xl p-6 cursor-pointer transition-all duration-300 hover:border-red-500/50 text-center"
                                 data-package="1k"
                                 data-price-idr="1000"
                                 data-price-usd="0.07"
                                 data-cash="1K">
                                <p class="text-xl font-bold text-white mb-2" data-price-display="idr">Rp 1.000</p>
                                <p class="text-sm font-semibold text-gray-300"> <span class="text-[10px]">🪙</span> 1K Cash </p>
                            </div>
                            <div class="package-card backdrop-blur-xl bg-gradient-to-br from-gray-800/50 via-gray-700/30 to-gray-800/50 border border-gray-600/30 rounded-xl p-6 cursor-pointer transition-all duration-300 hover:border-red-500/50 text-center"
                                 data-package="2k"
                                 data-price-idr="2000"
                                 data-price-usd="0.15"
                                 data-cash="2K">
                                <p class="text-xl font-bold text-white mb-2" data-price-display="idr">Rp 2.000</p>
                                <p class="text-sm font-semibold text-gray-300"> <span class="text-[10px]">🪙</span> 2K Cash </p>
                            </div>
                            <div class="package-card backdrop-blur-xl bg-gradient-to-br from-gray-800/50 via-gray-700/30 to-gray-800/50 border border-gray-600/30 rounded-xl p-6 cursor-pointer transition-all duration-300 hover:border-red-500/50 text-center"
                                 data-package="5k"
                                 data-price-idr="5000"
                                 data-price-usd="0.35"
                                 data-cash="1K">
                                <p class="text-xl font-bold text-white mb-2" data-price-display="idr">Rp 5.000</p>
                                <p class="text-sm font-semibold text-gray-300"> <span class="text-[10px]">🪙</span> 5K Cash </p>
                            </div>
                            <div class="package-card backdrop-blur-xl bg-gradient-to-br from-gray-800/50 via-gray-700/30 to-gray-800/50 border border-gray-600/30 rounded-xl p-6 cursor-pointer transition-all duration-300 hover:border-red-500/50 text-center"
                                 data-package="10k"
                                 data-price-idr="10000"
                                 data-price-usd="0.70"
                                 data-cash="10K">
                                <p class="text-xl font-bold text-white mb-2" data-price-display="idr">Rp 10.000</p>
                                <p class="text-sm font-semibold text-gray-300"> <span class="text-[10px]">🪙</span> 10K Cash </p>
                            </div>

                            <div class="package-card backdrop-blur-xl bg-gradient-to-br from-gray-800/50 via-gray-700/30 to-gray-800/50 border border-gray-600/30 rounded-xl p-6 cursor-pointer transition-all duration-300 hover:border-red-500/50 text-center"
                                 data-package="25k"
                                 data-price-idr="25000"
                                 data-price-usd="1.75"
                                 data-cash="25K">
                                <p class="text-xl font-bold text-white mb-2" data-price-display="idr">Rp 25.000</p>
                                <p class="text-sm font-semibold text-gray-300"> <span class="text-[10px]">🪙</span> 25K Cash </p>
                            </div>
                            <div class="package-card backdrop-blur-xl bg-gradient-to-br from-gray-800/50 via-gray-700/30 to-gray-800/50 border border-gray-600/30 rounded-xl p-6 cursor-pointer transition-all duration-300 hover:border-red-500/50 text-center"
                                 data-package="50k"
                                 data-price-idr="50000"
                                 data-price-usd="3.50"
                                 data-cash="50K">
                                <p class="text-xl font-bold text-white mb-2" data-price-display="idr">Rp 50.000</p>
                                <p class="text-sm font-semibold text-gray-300"> <span class="text-[10px]">🪙</span> 50K Cash </p>
                            </div>
                            <div class="package-card backdrop-blur-xl bg-gradient-to-br from-gray-800/50 via-gray-700/30 to-gray-800/50 border border-gray-600/30 rounded-xl p-6 cursor-pointer transition-all duration-300 hover:border-red-500/50 text-center"
                                 data-package="75k"
                                 data-price-idr="75000"
                                 data-price-usd="5.25"
                                 data-cash="75K">
                                <p class="text-xl font-bold text-white mb-2" data-price-display="idr">Rp 75.000</p>
                                <p class="text-sm font-semibold text-gray-300"> <span class="text-[10px]">🪙</span> 75K Cash </p>
                            </div>
                            <div class="package-card backdrop-blur-xl bg-gradient-to-br from-gray-800/50 via-gray-700/30 to-gray-800/50 border border-gray-600/30 rounded-xl p-6 cursor-pointer transition-all duration-300 hover:border-red-500/50 text-center"
                                 data-package="100k"
                                 data-price-idr="100000"
                                 data-price-usd="7.00"
                                 data-cash="100K">
                                <p class="text-xl font-bold text-white mb-2" data-price-display="idr">Rp 100.000</p>
                                <p class="text-sm font-semibold text-gray-300"> <span class="text-[10px]">🪙</span> 100K Cash </p>
                            </div>

                            <div class="package-card backdrop-blur-xl bg-gradient-to-br from-gray-800/50 via-gray-700/30 to-gray-800/50 border border-gray-600/30 rounded-xl p-6 cursor-pointer transition-all duration-300 hover:border-red-500/50 text-center"
                                 data-package="250k"
                                 data-price-idr="250000"
                                 data-price-usd="17.50"
                                 data-cash="250K">
                                <p class="text-xl font-bold text-white mb-2" data-price-display="idr">Rp 250.000</p>
                                <p class="text-sm font-semibold text-gray-300"> <span class="text-[10px]">🪙</span> 250K Cash </p>
                            </div>
                            <div class="package-card backdrop-blur-xl bg-gradient-to-br from-gray-800/50 via-gray-700/30 to-gray-800/50 border border-gray-600/30 rounded-xl p-6 cursor-pointer transition-all duration-300 hover:border-red-500/50 text-center"
                                 data-package="500k"
                                 data-price-idr="500000"
                                 data-price-usd="35.00"
                                 data-cash="500K">
                                <p class="text-xl font-bold text-white mb-2" data-price-display="idr">Rp 500.000</p>
                                <p class="text-sm font-semibold text-gray-300"> <span class="text-[10px]">🪙</span> 500K Cash </p>
                            </div>
                            <div class="package-card backdrop-blur-xl bg-gradient-to-br from-gray-800/50 via-gray-700/30 to-gray-800/50 border border-gray-600/30 rounded-xl p-6 cursor-pointer transition-all duration-300 hover:border-red-500/50 text-center"
                                 data-package="1000k"
                                 data-price-idr="1000000"
                                 data-price-usd="70.00"
                                 data-cash="1000K">
                                <p class="text-xl font-bold text-white mb-2" data-price-display="idr">Rp 1.000.000</p>
                                <p class="text-sm font-semibold text-gray-300"> <span class="text-[10px]">🪙</span> 1000K Cash </p>
                            </div>
                            <div class="package-card backdrop-blur-xl bg-gradient-to-br from-gray-800/50 via-gray-700/30 to-gray-800/50 border border-gray-600/30 rounded-xl p-6 cursor-pointer transition-all duration-300 hover:border-red-500/50 text-center"
                                 data-package="2000k"
                                 data-price-idr="2000000"
                                 data-price-usd="140.00"
                                 data-cash="2000K">
                                <p class="text-xl font-bold text-white mb-2" data-price-display="idr">Rp 2.000.000</p>
                                <p class="text-sm font-semibold text-gray-300"> <span class="text-[10px]">🪙</span> 2000K Cash </p>
                            </div>


                        </div>
                    </div>

                    <!-- Section 2: Enter Account Details -->
                    <div class="backdrop-blur-xl bg-gradient-to-br from-red-950/40 via-red-900/30 to-red-950/40 border border-red-500/30 rounded-xl p-6 shadow-xl shadow-red-900/20">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-2xl font-bold text-white">
                                <span class="text-red-500">2</span> Enter Account Details
                            </h3>
                            <a href="#" class="text-blue-400 hover:text-blue-300 text-sm font-medium transition-colors">Guide</a>
                        </div>

                        <div class="space-y-4">
                            <div>
                                <label for="username" class="block text-sm font-medium text-gray-300 mb-2">Username</label>
                                <div class="flex gap-3">
                                    <input type="text" id="username" name="username" required class="flex-1 px-4 py-3 bg-gray-800/50 border border-gray-600/30 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:border-red-500/50 focus:ring-2 focus:ring-red-500/20 transition-all" placeholder="Enter username">
                                    <button type="button" id="check-username-btn" class="px-6 py-3 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white rounded-lg font-semibold transition-all duration-300 shadow-lg shadow-red-900/50">
                                        Check
                                    </button>
                                </div>
                                <div id="username-check-result" class="mt-2 text-sm hidden"></div>
                                <p class="mt-2 text-sm text-gray-400">
                                    Open Profile in your game account, then enter your username (example: PlayerName#123).
                                    <a href="#" class="text-blue-400 hover:text-blue-300 ml-1">More details</a>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Section 3: Enter Contact Info -->
                    <div class="backdrop-blur-xl bg-gradient-to-br from-red-950/40 via-red-900/30 to-red-950/40 border border-red-500/30 rounded-xl p-6 shadow-xl shadow-red-900/20">
                        <h3 class="text-2xl font-bold text-white mb-6">
                            <span class="text-red-500">3</span> Enter Contact Info
                        </h3>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-300 mb-2">Email (optional)</label>
                            <input type="email" id="email" name="email" class="w-full px-4 py-3 bg-gray-800/50 border border-gray-600/30 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:border-red-500/50 focus:ring-2 focus:ring-red-500/20 transition-all" placeholder="Enter email">
                            <p class="mt-2 text-sm text-gray-400">
                                You can fill this in if you want to receive proof of transaction
                            </p>
                        </div>
                    </div>

                    <!-- Section 4: Enter Promo/Referral Code -->
                    <div class="backdrop-blur-xl bg-gradient-to-br from-red-950/40 via-red-900/30 to-red-950/40 border border-red-500/30 rounded-xl p-6 shadow-xl shadow-red-900/20">
                        <h3 class="text-2xl font-bold text-white mb-6">
                            <span class="text-red-500">4</span> Have a Promo Code?
                        </h3>

                        <div class="flex gap-3">
                            <input type="text" id="promo_code" name="promo_code" class="flex-1 px-4 py-3 bg-gray-800/50 border border-gray-600/30 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:border-red-500/50 focus:ring-2 focus:ring-red-500/20 transition-all" placeholder="Enter promo code if available">
                            <button type="button" id="apply-promo-btn" class="px-6 py-3 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white rounded-lg font-semibold transition-all duration-300 shadow-lg shadow-red-900/50">
                                Apply Promo
                            </button>
                        </div>
                    </div>

                    <!-- Section 5: Available Payment Methods -->
                    <div class="backdrop-blur-xl bg-gradient-to-br from-red-950/40 via-red-900/30 to-red-950/40 border border-red-500/30 rounded-xl p-6 shadow-xl shadow-red-900/20">
                        <h3 class="text-2xl font-bold text-white mb-6">
                            <span class="text-red-500">5</span> Available Payment Methods
                        </h3>
                        <p class="text-gray-300 mb-4">Choose your preferred payment method in the payment popup</p>

                        <!-- Payment Methods Display (Logo Only) -->
                        <div class="mb-6">
                            <h4 class="text-lg font-semibold text-white mb-4">E-Wallet and QRIS</h4>
                            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4" id="payment-methods">
                                <!-- Gopay -->
                                <div class="p-4 bg-gray-800/30 rounded-lg border border-gray-600/30 flex items-center justify-center">
                                    <img src="{{ asset('assets/payment_method/gopay.png') }}" alt="Gopay" class="w-16 h-10 object-contain">
                                </div>

                                <!-- DANA -->
                                <div class="p-4 bg-gray-800/30 rounded-lg border border-gray-600/30 flex items-center justify-center">
                                    <img src="{{ asset('assets/payment_method/Dana.png') }}" alt="DANA" class="w-16 h-10 object-contain">
                                </div>

                                <!-- OVO -->
                                <div class="p-4 bg-gray-800/30 rounded-lg border border-gray-600/30 flex items-center justify-center">
                                    <span class="text-white font-medium text-sm">OVO</span>
                                </div>

                                <!-- QRIS -->
                                <div class="p-4 bg-gray-800/30 rounded-lg border border-gray-600/30 flex items-center justify-center relative">
                                    <div class="absolute top-1 right-1 bg-red-500 text-white text-xs px-1.5 py-0.5 rounded">Cheapest</div>
                                    <img src="{{ asset('assets/payment_method/qris.png') }}" alt="QRIS" class="w-16 h-10 object-contain">
                                </div>

                                <!-- LinkAja -->
                                <div class="p-4 bg-gray-800/30 rounded-lg border border-gray-600/30 flex items-center justify-center">
                                    <span class="text-white font-medium text-sm">LinkAja</span>
                                </div>

                                <!-- ShopeePay -->
                                <div class="p-4 bg-gray-800/30 rounded-lg border border-gray-600/30 flex items-center justify-center relative">
                                    <div class="absolute top-1 right-1 bg-red-500 text-white text-xs px-1.5 py-0.5 rounded">Cheapest</div>
                                    <img src="{{ asset('assets/payment_method/shopeepay.png') }}" alt="ShopeePay" class="w-16 h-10 object-contain">
                                </div>

                                <!-- AstraPay -->
                                <div class="p-4 bg-gray-800/30 rounded-lg border border-gray-600/30 flex items-center justify-center">
                                    <span class="text-white font-medium text-sm">AstraPay</span>
                                </div>

                                <!-- Credit Cards -->
                                <div class="p-4 bg-gray-800/30 rounded-lg border border-gray-600/30 flex items-center justify-center">
                                    <span class="text-white font-medium text-sm">Credit Card</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-end">
                        <button type="submit" id="complete-purchase-btn" class="px-8 py-4 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white rounded-lg text-lg font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg shadow-red-900/50">
                            Complete Purchase
                        </button>
                    </div>
                </form>
            </div>

            <!-- History Tab Content -->
            <div id="history-tab" class="tab-content hidden">
                <div class="backdrop-blur-xl bg-gradient-to-br from-red-950/40 via-red-900/30 to-red-950/40 border border-red-500/30 rounded-xl p-6 shadow-xl shadow-red-900/20">
                    <h3 class="text-2xl font-bold text-white mb-6">Transaction History</h3>
                    <div id="history-list" class="space-y-4">
                        <!-- History items will be loaded here from cookies or API -->
                        <p class="text-gray-400 text-center py-8">No transaction history found</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('post-js')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Detect user country and set default currency
    let currentCurrency = 'IDR'; // Default to IDR
    const userCountry = getUserCountry();
    if (userCountry !== 'ID') {
        currentCurrency = 'USD';
        document.getElementById('currency-toggle').checked = false;
    } else {
        document.getElementById('currency-toggle').checked = true;
    }

    // Load saved transaction data from cookies
    loadTransactionFromCookies();

    // Tab switching
    const tabButtons = document.querySelectorAll('.tab-btn');
    const tabContents = document.querySelectorAll('.tab-content');

    tabButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            const targetTab = this.dataset.tab;

            // Update button states
            tabButtons.forEach(b => {
                b.classList.remove('active', 'border-red-500', 'text-white');
                b.classList.add('text-gray-400');
            });
            this.classList.add('active', 'border-red-500', 'text-white');
            this.classList.remove('text-gray-400');

            // Update content visibility
            tabContents.forEach(content => {
                content.classList.add('hidden');
            });
            document.getElementById(targetTab + '-tab').classList.remove('hidden');

            // Load history if switching to history tab
            if (targetTab === 'history') {
                loadHistory();
            }
        });
    });

    // Currency toggle
    const currencyToggle = document.getElementById('currency-toggle');
    currencyToggle.addEventListener('change', function() {
        currentCurrency = this.checked ? 'IDR' : 'USD';
        updatePackagePrices();
    });

    // Package selection
    const packageCards = document.querySelectorAll('.package-card');
    let selectedPackage = null;

    packageCards.forEach(card => {
        card.addEventListener('click', function() {
            // Remove selected state from all cards
            packageCards.forEach(c => {
                c.classList.remove('border-red-500', 'bg-red-950/40');
                c.classList.add('border-gray-600/30', 'bg-gray-800/50');
            });

            // Add selected state to clicked card
            this.classList.remove('border-gray-600/30', 'bg-gray-800/50');
            this.classList.add('border-red-500', 'bg-red-950/40');

            selectedPackage = {
                package: this.dataset.package,
                priceIdr: parseFloat(this.dataset.priceIdr),
                priceUsd: parseFloat(this.dataset.priceUsd),
                cash: this.dataset.cash,
                currency: currentCurrency
            };
        });
    });

    // Update package prices based on currency
    function updatePackagePrices() {
        packageCards.forEach(card => {
            const priceDisplay = card.querySelector('[data-price-display]');
            if (currentCurrency === 'IDR') {
                const price = parseFloat(card.dataset.priceIdr);
                priceDisplay.textContent = 'Rp ' + formatNumber(price);
            } else {
                const price = parseFloat(card.dataset.priceUsd);
                priceDisplay.textContent = '$' + price.toFixed(2);
            }
        });
    }

    // Payment prices no longer needed - user selects payment in Midtrans modal

    // Format number with dots for IDR
    function formatNumber(num) {
        return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    // Get user country (simplified - in production use proper geolocation)
    function getUserCountry() {
        // Try to get from timezone or language
        const timezone = Intl.DateTimeFormat().resolvedOptions().timeZone;
        if (timezone.includes('Jakarta') || timezone.includes('Asia/Jakarta')) {
            return 'ID';
        }
        // Default to ID for now, can be enhanced with IP geolocation
        return 'ID';
    }

    // Username check button
    const usernameInput = document.getElementById('username');
    const usernameResult = document.getElementById('username-check-result');
    const checkUsernameBtn = document.getElementById('check-username-btn');

    checkUsernameBtn.addEventListener('click', function() {
        const username = usernameInput.value.trim();

        if (!username) {
            usernameResult.className = 'mt-2 text-sm text-red-400';
            usernameResult.textContent = 'Please enter username first';
            usernameResult.classList.remove('hidden');
            usernameInput.classList.add('border-red-500');
            return;
        }

        // Validate format
        if (!/^[a-zA-Z0-9_-]{3,20}$/.test(username)) {
            usernameResult.className = 'mt-2 text-sm text-red-400';
            usernameResult.textContent = 'Username may only contain letters, numbers, underscores (_), and dashes (-). Length must be between 3 and 20 characters.';
            usernameResult.classList.remove('hidden');
            usernameInput.classList.add('border-red-500');
            return;
        }

        checkUsernameForTopup(username);
    });

    function checkUsernameForTopup(username) {
        checkUsernameBtn.disabled = true;
        checkUsernameBtn.textContent = 'Checking...';
        usernameResult.classList.add('hidden');

        fetch('{{ route("check.username.topup") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}'
            },
            body: JSON.stringify({ username: username })
        })
        .then(response => response.json())
        .then(data => {
            checkUsernameBtn.disabled = false;
            checkUsernameBtn.textContent = 'Check';
            usernameResult.classList.remove('hidden');

            if (!data.valid) {
                usernameResult.className = 'mt-2 text-sm text-red-400';
                usernameResult.textContent = '✗ ' + data.message;
                usernameInput.classList.remove('border-green-500');
                usernameInput.classList.add('border-red-500');
            } else if (data.exists) {
                usernameResult.className = 'mt-2 text-sm text-green-400';
                usernameResult.textContent = '✓ ' + data.message;
                usernameInput.classList.remove('border-red-500');
                usernameInput.classList.add('border-green-500');
            } else {
                usernameResult.className = 'mt-2 text-sm text-red-400';
                usernameResult.textContent = '✗ ' + data.message;
                usernameInput.classList.remove('border-green-500');
                usernameInput.classList.add('border-red-500');
            }
        })
        .catch(error => {
            checkUsernameBtn.disabled = false;
            checkUsernameBtn.textContent = 'Check';
            usernameResult.className = 'mt-2 text-sm text-red-400';
            usernameResult.textContent = 'An error occurred. Please try again.';
            usernameResult.classList.remove('hidden');
        });
    }

    // Payment methods are now display-only, selection happens in Midtrans modal

    // Save transaction to cookies
    function saveTransactionToCookies(transactionData) {
        const transactions = getTransactionsFromCookies();
        transactions.push({
            ...transactionData,
            timestamp: new Date().toISOString()
        });
        // Keep only last 10 transactions
        if (transactions.length > 10) {
            transactions.shift();
        }
        document.cookie = `topup_transactions=${JSON.stringify(transactions)}; path=/; max-age=${60 * 60 * 24 * 30}`; // 30 days
    }

    // Get transactions from cookies
    function getTransactionsFromCookies() {
        const cookies = document.cookie.split(';');
        const transactionCookie = cookies.find(c => c.trim().startsWith('topup_transactions='));
        if (transactionCookie) {
            try {
                return JSON.parse(decodeURIComponent(transactionCookie.split('=')[1]));
            } catch (e) {
                return [];
            }
        }
        return [];
    }

    // Load transaction from cookies (for form restoration)
    function loadTransactionFromCookies() {
        const savedData = getCookie('topup_form_data');
        if (savedData) {
            try {
                const data = JSON.parse(savedData);
                if (data.username) usernameInput.value = data.username;
                if (data.email) document.getElementById('email').value = data.email;
                if (data.promo_code) document.getElementById('promo_code').value = data.promo_code;
            } catch (e) {
                console.error('Error loading saved form data:', e);
            }
        }
    }

    // Save form data to cookies
    function saveFormDataToCookies() {
        const formData = {
            username: usernameInput.value,
            email: document.getElementById('email').value,
            promo_code: document.getElementById('promo_code').value
        };
        document.cookie = `topup_form_data=${JSON.stringify(formData)}; path=/; max-age=${60 * 60 * 24}`; // 1 day
    }

    // Get cookie helper
    function getCookie(name) {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${name}=`);
        if (parts.length === 2) return parts.pop().split(';').shift();
        return null;
    }

    // Load history
    function loadHistory() {
        const transactions = getTransactionsFromCookies();
        const historyList = document.getElementById('history-list');

        if (transactions.length === 0) {
            historyList.innerHTML = '<p class="text-gray-400 text-center py-8">No transaction history found</p>';
            return;
        }

        historyList.innerHTML = transactions.reverse().map((transaction, index) => {
            const date = new Date(transaction.timestamp).toLocaleString();
            const price = transaction.currency === 'IDR'
                ? 'Rp ' + formatNumber(transaction.price)
                : '$' + transaction.price.toFixed(2);
            const status = transaction.status || 'pending';
            const isPending = status.toLowerCase() === 'pending';

            return `
                <div class="p-4 bg-gray-800/30 rounded-lg border border-gray-600/20">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-white font-semibold">${transaction.cash} Reverion Cash</p>
                            <p class="text-sm text-gray-400">${date}</p>
                            ${transaction.order_id ? `<p class="text-xs text-gray-500 mt-1">Order ID: ${transaction.order_id}</p>` : ''}
                        </div>
                        <div class="text-right flex items-center gap-4">
                            <div>
                                <p class="text-white font-semibold">${price}</p>
                                <p class="text-sm ${isPending ? 'text-yellow-400' : 'text-gray-400'}">${status.charAt(0).toUpperCase() + status.slice(1)}</p>
                            </div>
                            ${isPending ? `
                                <button onclick="payPendingTransaction(${index})" class="px-4 py-2 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white rounded-lg text-sm font-semibold transition-all duration-300 shadow-lg shadow-red-900/50">
                                    Pay
                                </button>
                            ` : ''}
                        </div>
                    </div>
                </div>
            `;
        }).join('');
    }

    // Pay pending transaction from history
    window.payPendingTransaction = function(index) {
        const transactions = getTransactionsFromCookies();
        // Reverse to get latest first, then get by index
        const reversedTransactions = [...transactions].reverse();
        const transaction = reversedTransactions[index];

        if (!transaction) {
            alert('Transaction not found');
            return;
        }

        // Create transaction data for payment
        const transactionData = {
            package: transaction.package,
            cash: transaction.cash,
            price: transaction.price,
            currency: transaction.currency,
            username: transaction.username,
            email: transaction.email || '',
            promo_code: transaction.promo_code || '',
            status: 'pending'
        };

        // Create snap payment
        fetch('{{ route("topup.create-snap") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}'
            },
            body: JSON.stringify(transactionData)
        })
        .then(response => response.json())
        .then(data => {
            if (data.success && data.snap_token) {
                // Update transaction with new order_id if provided
                if (data.order_id) {
                    transaction.order_id = data.order_id;
                    transaction.timestamp = new Date().toISOString();
                    const allTransactions = getTransactionsFromCookies();
                    const transactionIndex = allTransactions.findIndex(t =>
                        t.timestamp === transaction.timestamp ||
                        (t.order_id && t.order_id === transaction.order_id)
                    );
                    if (transactionIndex !== -1) {
                        allTransactions[transactionIndex] = transaction;
                    } else {
                        allTransactions.push(transaction);
                    }
                    // Keep only last 10
                    if (allTransactions.length > 10) {
                        allTransactions.shift();
                    }
                    document.cookie = `topup_transactions=${JSON.stringify(allTransactions)}; path=/; max-age=${60 * 60 * 24 * 30}`;
                }

                // Open Midtrans snap
                snap.pay(data.snap_token, {
                    onSuccess: function(result) {
                        console.log('Payment success:', result);
                        // Update transaction status
                        updateTransactionStatus(data.order_id || transaction.order_id, 'success');
                        alert('Payment successful!');
                        loadHistory();
                    },
                    onPending: function(result) {
                        console.log('Payment pending:', result);
                        // Update transaction status
                        updateTransactionStatus(data.order_id || transaction.order_id, 'pending');
                        alert('Payment pending. Please complete your payment.');
                        loadHistory();
                    },
                    onError: function(result) {
                        console.log('Payment error:', result);
                        alert('Payment failed. Please try again.');
                    },
                    onClose: function() {
                        console.log('Payment popup closed');
                    }
                });
            } else {
                alert(data.message || 'Failed to create payment. Please try again.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred. Please try again.');
        });
    };

    // Update transaction status
    function updateTransactionStatus(orderId, status) {
        const transactions = getTransactionsFromCookies();
        const transaction = transactions.find(t => t.order_id === orderId);
        if (transaction) {
            transaction.status = status;
            document.cookie = `topup_transactions=${JSON.stringify(transactions)}; path=/; max-age=${60 * 60 * 24 * 30}`;
        }
    }

    // Form submission
    document.getElementById('topup-form').addEventListener('submit', function(e) {
        e.preventDefault();

        // Validate required fields
        if (!selectedPackage) {
            alert('Please select a package');
            return;
        }

        if (!usernameInput.value.trim()) {
            alert('Please enter your username');
            usernameInput.focus();
            return;
        }

        // Check if username is valid
        const usernameValid = usernameInput.classList.contains('border-green-500');
        if (!usernameValid) {
            alert('Please verify your username is correct');
            usernameInput.focus();
            return;
        }

        // Prepare transaction data
        const transactionData = {
            package: selectedPackage.package,
            cash: selectedPackage.cash,
            price: currentCurrency === 'IDR' ? selectedPackage.priceIdr : selectedPackage.priceUsd,
            currency: currentCurrency,
            username: usernameInput.value,
            email: document.getElementById('email').value,
            promo_code: document.getElementById('promo_code').value,
            status: 'pending'
        };

        // Save form data to cookies
        saveFormDataToCookies();

        // Disable submit button
        const submitBtn = document.getElementById('complete-purchase-btn');
        submitBtn.disabled = true;
        submitBtn.textContent = 'Processing...';

        // Create snap payment
        fetch('{{ route("topup.create-snap") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}'
            },
            body: JSON.stringify(transactionData)
        })
        .then(response => response.json())
        .then(data => {
            if (data.success && data.snap_token) {
                // Add order_id to transaction data
                transactionData.order_id = data.order_id;
                // Save transaction to cookies
                saveTransactionToCookies(transactionData);

                // Open Midtrans snap
                snap.pay(data.snap_token, {
                    onSuccess: function(result) {
                        console.log('Payment success:', result);
                        alert('Payment successful!');
                        // Reload or redirect
                        window.location.reload();
                    },
                    onPending: function(result) {
                        console.log('Payment pending:', result);
                        alert('Payment pending. Please complete your payment.');
                        window.location.reload();
                    },
                    onError: function(result) {
                        console.log('Payment error:', result);
                        alert('Payment failed. Please try again.');
                        submitBtn.disabled = false;
                        submitBtn.textContent = 'Complete Purchase';
                    },
                    onClose: function() {
                        console.log('Payment popup closed');
                        submitBtn.disabled = false;
                        submitBtn.textContent = 'Complete Purchase';
                    }
                });
            } else {
                alert(data.message || 'Failed to create payment. Please try again.');
                submitBtn.disabled = false;
                submitBtn.textContent = 'Complete Purchase';
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred. Please try again.');
            submitBtn.disabled = false;
            submitBtn.textContent = 'Complete Purchase';
        });
    });

    // Initial price update
    updatePackagePrices();
});
</script>
@endsection
