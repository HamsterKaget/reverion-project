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

                        <!-- Packages Grid - Loaded from API -->
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4" id="package-grid">
                            <div class="col-span-full text-center py-8">
                                <p class="text-gray-400">Loading packages...</p>
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
                            <span class="text-red-500">4</span> Have a Promo Code or Referral Code?
                        </h3>

                        <div class="flex gap-3">
                            <input type="text" id="promo_code" name="promo_code" class="flex-1 px-4 py-3 bg-gray-800/50 border border-gray-600/30 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:border-red-500/50 focus:ring-2 focus:ring-red-500/20 transition-all" placeholder="Enter promo code or referral code">
                            <button type="button" id="apply-promo-btn" class="px-6 py-3 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white rounded-lg font-semibold transition-all duration-300 shadow-lg shadow-red-900/50">
                                Apply
                            </button>
                        </div>
                        <div id="promo-result" class="mt-2 text-sm hidden"></div>
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
                    <!-- Pagination -->
                    <div id="history-pagination" class="mt-6 justify-center items-center gap-2 hidden">
                        <button id="prev-page-btn" class="px-4 py-2 bg-gray-700 hover:bg-gray-600 text-white rounded-lg disabled:opacity-50 disabled:cursor-not-allowed transition-all">
                            Previous
                        </button>
                        <span id="page-info" class="text-gray-300 px-4"></span>
                        <button id="next-page-btn" class="px-4 py-2 bg-gray-700 hover:bg-gray-600 text-white rounded-lg disabled:opacity-50 disabled:cursor-not-allowed transition-all">
                            Next
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('post-js')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Check if user is logged in (from Laravel)
    const isLoggedIn = @json(Auth::check());

    // Detect user country and set default currency
    let currentCurrency = 'IDR'; // Default to IDR
    const userCountry = getUserCountry();
    if (userCountry !== 'ID') {
        currentCurrency = 'USD';
        document.getElementById('currency-toggle').checked = false;
    } else {
        document.getElementById('currency-toggle').checked = true;
    }

    // Load packages from API
    loadPackages();

    // Load saved transaction data from cookies
    loadTransactionFromCookies();

    // Tab switching
    const tabButtons = document.querySelectorAll('.tab-btn');
    const tabContents = document.querySelectorAll('.tab-content');

    function switchTab(targetTab) {
            // Update button states
            tabButtons.forEach(b => {
                b.classList.remove('active', 'border-red-500', 'text-white');
                b.classList.add('text-gray-400');
            });

        // Activate target button
        const targetButton = document.querySelector(`[data-tab="${targetTab}"]`);
        if (targetButton) {
            targetButton.classList.add('active', 'border-red-500', 'text-white');
            targetButton.classList.remove('text-gray-400');
        }

            // Update content visibility
            tabContents.forEach(content => {
                content.classList.add('hidden');
            });
        const targetContent = document.getElementById(targetTab + '-tab');
        if (targetContent) {
            targetContent.classList.remove('hidden');
        }

            // Load history if switching to history tab
            if (targetTab === 'history') {
                loadHistory();
            }
    }

    tabButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            switchTab(this.dataset.tab);
        });
    });

    // Check URL parameter for tab (e.g., ?tab=history)
    const urlParams = new URLSearchParams(window.location.search);
    const tabParam = urlParams.get('tab');
    if (tabParam === 'history') {
        switchTab('history');
    }

    // Currency toggle
    const currencyToggle = document.getElementById('currency-toggle');
    currencyToggle.addEventListener('change', function() {
        currentCurrency = this.checked ? 'IDR' : 'USD';
        updatePackagePrices();
    });

    // Package selection
    let selectedPackage = null;
    let packages = [];

    // Load packages from API
    function loadPackages() {
        fetch('{{ route("topup.packages") }}')
            .then(response => response.json())
            .then(data => {
                if (data.success && data.packages) {
                    packages = data.packages;
                    renderPackages();
                } else {
                    document.getElementById('package-grid').innerHTML =
                        '<div class="col-span-full text-center py-8"><p class="text-red-400">Failed to load packages</p></div>';
                }
            })
            .catch(error => {
                console.error('Error loading packages:', error);
                document.getElementById('package-grid').innerHTML =
                    '<div class="col-span-full text-center py-8"><p class="text-red-400">Error loading packages</p></div>';
            });
    }

    // Render packages
    function renderPackages() {
        const grid = document.getElementById('package-grid');
        grid.innerHTML = '';

        packages.forEach(pkg => {
            const priceIdr = pkg.discount_price_idr || pkg.price_idr;
            const priceUsd = pkg.price_discount_usd || pkg.price_usd;

            const card = document.createElement('div');
            card.className = 'package-card backdrop-blur-xl bg-gradient-to-br from-gray-800/50 via-gray-700/30 to-gray-800/50 border border-gray-600/30 rounded-xl p-6 cursor-pointer transition-all duration-300 hover:border-red-500/50 text-center';
            card.dataset.planId = pkg.id;
            card.dataset.priceIdr = priceIdr;
            card.dataset.priceUsd = priceUsd;
            card.dataset.amount = pkg.amount;

            const priceDisplay = currentCurrency === 'IDR'
                ? 'Rp ' + formatNumber(priceIdr)
                : '$' + parseFloat(priceUsd).toFixed(2);

            card.innerHTML = `
                <p class="text-xl font-bold text-white mb-2" data-price-display>${priceDisplay}</p>
                <p class="text-sm font-semibold text-gray-300">
                    <span class="text-[10px]">🪙</span> ${pkg.amount} ${pkg.item}
                </p>
            `;

        card.addEventListener('click', function() {
            // Remove selected state from all cards
                document.querySelectorAll('.package-card').forEach(c => {
                c.classList.remove('border-red-500', 'bg-red-950/40');
                c.classList.add('border-gray-600/30', 'bg-gray-800/50');
            });

            // Add selected state to clicked card
            this.classList.remove('border-gray-600/30', 'bg-gray-800/50');
            this.classList.add('border-red-500', 'bg-red-950/40');

            selectedPackage = {
                    plan_id: parseInt(this.dataset.planId),
                priceIdr: parseFloat(this.dataset.priceIdr),
                priceUsd: parseFloat(this.dataset.priceUsd),
                    amount: parseFloat(this.dataset.amount),
                currency: currentCurrency
            };
        });

            grid.appendChild(card);
    });

        updatePackagePrices();
    }

    // Update package prices based on currency
    function updatePackagePrices() {
        document.querySelectorAll('.package-card').forEach(card => {
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

    // Apply promo code button
    const applyPromoBtn = document.getElementById('apply-promo-btn');
    const promoCodeInput = document.getElementById('promo_code');
    const promoResult = document.getElementById('promo-result');
    let appliedCoupon = null;
    let appliedAffiliator = null;

    applyPromoBtn.addEventListener('click', function() {
        const code = promoCodeInput.value.trim();
        if (!code) {
            promoResult.className = 'mt-2 text-sm text-red-400';
            promoResult.textContent = 'Please enter a code';
            promoResult.classList.remove('hidden');
            return;
        }

        if (!selectedPackage) {
            promoResult.className = 'mt-2 text-sm text-red-400';
            promoResult.textContent = 'Please select a package first';
            promoResult.classList.remove('hidden');
            return;
        }

        applyPromoBtn.disabled = true;
        applyPromoBtn.textContent = 'Checking...';
        promoResult.classList.add('hidden');

        // Try coupon first
        fetch('{{ route("topup.validate-coupon") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                code: code,
                price: currentCurrency === 'IDR' ? selectedPackage.priceIdr : selectedPackage.priceUsd
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                appliedCoupon = data.coupon;
                appliedAffiliator = null;
                promoResult.className = 'mt-2 text-sm text-green-400';
                promoResult.textContent = `✓ Coupon applied! Discount: ${data.discount_type === 'percentage' ? data.discount_amount + '%' : formatNumber(data.discount)}`;
                promoResult.classList.remove('hidden');
            } else {
                // Try affiliator
                return fetch('{{ route("topup.validate-affiliator") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ code: code })
                });
            }
        })
        .then(response => {
            if (response) {
                return response.json();
            }
            return null;
        })
        .then(data => {
            if (data && data.success) {
                appliedAffiliator = data.affiliator;
                appliedCoupon = null;
                promoResult.className = 'mt-2 text-sm text-green-400';
                promoResult.textContent = '✓ Referral code applied! You will get 10% bonus.';
                promoResult.classList.remove('hidden');
            } else if (!appliedCoupon) {
                promoResult.className = 'mt-2 text-sm text-red-400';
                promoResult.textContent = '✗ Invalid code';
                promoResult.classList.remove('hidden');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            promoResult.className = 'mt-2 text-sm text-red-400';
            promoResult.textContent = 'An error occurred. Please try again.';
            promoResult.classList.remove('hidden');
        })
        .finally(() => {
            applyPromoBtn.disabled = false;
            applyPromoBtn.textContent = 'Apply';
        });
    });


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

    // Save transaction to cookies (for non-logged in users)
    function saveTransactionToCookies(transactionData) {
        const transactions = getTransactionsFromCookies();
        transactions.push({
            ...transactionData,
            timestamp: new Date().toISOString()
        });
        // Keep only last 20 transactions
        if (transactions.length > 20) {
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

    // Global variable untuk pagination dan isAffiliator
    let currentHistoryPage = 1;
    let historyPagination = null;
    let isUserAffiliator = false;

    // Render transaction item
    function renderTransactionItem(transaction) {
        const date = transaction.created_at
            ? new Date(transaction.created_at).toLocaleString()
            : new Date(transaction.timestamp).toLocaleString();
            const price = transaction.currency === 'IDR'
            ? 'Rp ' + formatNumber(transaction.price || transaction.final_price || 0)
            : '$' + (transaction.price || transaction.final_price || 0).toFixed(2);
            const status = transaction.status || 'pending';
        const isPending = status === 'pending';
        const isSettled = ['settlement', 'capture'].includes(status);
        const isCancel = status === 'cancel';
        const planName = transaction.plan_name || `${transaction.amount || 0} Cash`;
        const amount = transaction.amount || 0;
        // Cek apakah ini transaksi affiliator bonus (komisi)
        const isAffiliateBonus = transaction.is_affiliate_bonus === true ||
                                  (transaction.commission_amount > 0 && (transaction.price === 0 || transaction.final_price === 0));
        const orderId = transaction.order_id || '';
        const commissionAmount = transaction.commission_amount || 0;

            return `
                <div class="p-4 bg-gray-800/30 rounded-lg border border-gray-600/20">
                    <div class="flex justify-between items-center">
                    <div class="flex-1">
                        <p class="text-white font-semibold">
                            ${isAffiliateBonus ? '🎁 ' : ''}${planName} - ${amount} Cash
                            ${isAffiliateBonus ? '<span class="text-xs text-green-400 ml-2">(Affiliate Commission)</span>' : ''}
                        </p>
                            <p class="text-sm text-gray-400">${date}</p>
                        ${orderId ? `<p class="text-xs text-gray-500 mt-1">Order ID: ${orderId}</p>` : ''}
                        ${transaction.bonus_amount > 0 && !isAffiliateBonus ? `<p class="text-xs text-green-400 mt-1">Bonus: ${transaction.bonus_amount} Cash</p>` : ''}
                        ${commissionAmount > 0 && isUserAffiliator ? `<p class="text-xs text-blue-400 mt-1">Commission: ${commissionAmount} Cash</p>` : ''}
                        </div>
                        <div class="text-right flex items-center gap-4">
                            <div>
                            ${isAffiliateBonus ? `
                                <p class="text-white font-semibold text-green-400">+${commissionAmount} Cash</p>
                                <p class="text-sm text-green-400">Commission</p>
                            ` : `
                                <p class="text-white font-semibold">${price}</p>
                                <p class="text-sm ${isPending ? 'text-yellow-400' : isSettled ? 'text-green-400' : isCancel ? 'text-red-400' : 'text-gray-400'}">
                                    ${status.charAt(0).toUpperCase() + status.slice(1)}
                                </p>
                            `}
                            </div>
                        ${isPending && !isAffiliateBonus ? `
                            <div class="flex gap-2">
                                <button onclick="payPendingTransaction('${orderId}')" class="px-4 py-2 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white rounded-lg text-sm font-semibold transition-all duration-300 shadow-lg shadow-red-900/50">
                                    Pay
                                </button>
                                <button onclick="cancelTransaction('${orderId}')" class="px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-lg text-sm font-semibold transition-all duration-300">
                                    Cancel
                                </button>
                            </div>
                            ` : ''}
                        </div>
                    </div>
                </div>
            `;
    }

    // Load history from database or cookies
    function loadHistory(page = 1) {
        const historyList = document.getElementById('history-list');
        const paginationDiv = document.getElementById('history-pagination');
        historyList.innerHTML = '<p class="text-gray-400 text-center py-8">Loading...</p>';
        paginationDiv.classList.add('hidden');

        currentHistoryPage = page;

        // If user is logged in, always load from database
        if (isLoggedIn) {
            console.log('User is logged in, loading from database...');
            fetch('{{ route("topup.history") }}?page=' + page)
                .then(response => response.json())
                .then(data => {
                    console.log('History API response:', data);
                    if (data.success) {
                        // Set isUserAffiliator dari response
                        isUserAffiliator = data.is_affiliator || false;

                        if (data.transactions && data.transactions.length > 0) {
                            historyList.innerHTML = data.transactions.map(renderTransactionItem).join('');

                            // Setup pagination
                            if (data.pagination) {
                                historyPagination = data.pagination;
                                setupPagination(data.pagination);
                            }
                        } else {
                            // No transactions found in database, show empty message
                            historyList.innerHTML = '<p class="text-gray-400 text-center py-8">No transaction history found</p>';
                        }
                    } else {
                        historyList.innerHTML = '<p class="text-gray-400 text-center py-8">No transaction history found</p>';
                    }
                })
                .catch(error => {
                    console.error('Error loading history from database:', error);
                    // Fallback to cookies on error
                    loadHistoryFromCookies();
                });
            return;
        }

        // If user is not logged in, try to load from database using email/username if provided
        const email = document.getElementById('email')?.value || '';
        const username = document.getElementById('username')?.value || '';

        if (email || username) {
            console.log('User not logged in but has email/username, loading from database...');
            const params = new URLSearchParams();
            if (email) params.append('email', email);
            if (username) params.append('username', username);
            params.append('page', page);

            fetch('{{ route("topup.history") }}' + (params.toString() ? '?' + params.toString() : ''))
        .then(response => response.json())
        .then(data => {
                    console.log('History API response:', data);
                    if (data.success) {
                        // Set isUserAffiliator dari response (false untuk non-logged in)
                        isUserAffiliator = false;

                        if (data.transactions && data.transactions.length > 0) {
                            historyList.innerHTML = data.transactions.map(renderTransactionItem).join('');

                            // Setup pagination
                            if (data.pagination) {
                                historyPagination = data.pagination;
                                setupPagination(data.pagination);
                            }
                        } else {
                            // Fallback to cookies if no database results
                            loadHistoryFromCookies();
                        }
                    } else {
                        loadHistoryFromCookies();
                    }
                })
                .catch(error => {
                    console.error('Error loading history from database:', error);
                    // Fallback to cookies on error
                    loadHistoryFromCookies();
                });
        } else {
            // No email/username and not logged in, load from cookies
            console.log('User not logged in and no email/username, loading from cookies...');
            loadHistoryFromCookies();
        }
    }

    // Setup pagination UI
    function setupPagination(pagination) {
        const paginationDiv = document.getElementById('history-pagination');
        const prevBtn = document.getElementById('prev-page-btn');
        const nextBtn = document.getElementById('next-page-btn');
        const pageInfo = document.getElementById('page-info');

        if (pagination.total <= pagination.per_page) {
            paginationDiv.classList.add('hidden');
            paginationDiv.classList.remove('flex');
            return;
        }

        paginationDiv.classList.remove('hidden');
        paginationDiv.classList.add('flex');

        pageInfo.textContent = `Page ${pagination.current_page} of ${pagination.last_page}`;

        prevBtn.disabled = pagination.current_page === 1;
        nextBtn.disabled = pagination.current_page === pagination.last_page;

        prevBtn.onclick = () => {
            if (pagination.current_page > 1) {
                loadHistory(pagination.current_page - 1);
            }
        };

        nextBtn.onclick = () => {
            if (pagination.current_page < pagination.last_page) {
                loadHistory(pagination.current_page + 1);
            }
        };
    }

    // Load history from cookies
    function loadHistoryFromCookies() {
        const historyList = document.getElementById('history-list');
        const paginationDiv = document.getElementById('history-pagination');
        const transactions = getTransactionsFromCookies();

        // Hide pagination for cookies (no pagination for cookies)
        paginationDiv.classList.add('hidden');
        paginationDiv.classList.remove('flex');

        // Set isUserAffiliator to false for non-logged in users
        isUserAffiliator = false;

        if (transactions.length === 0) {
            historyList.innerHTML = '<p class="text-gray-400 text-center py-8">No transaction history found</p>';
            return;
        }

        // Sort by timestamp (newest first)
        const sortedTransactions = transactions.sort((a, b) => {
            const timeA = a.timestamp || a.created_at || 0;
            const timeB = b.timestamp || b.created_at || 0;
            return new Date(timeB) - new Date(timeA);
        });

        historyList.innerHTML = sortedTransactions.map(renderTransactionItem).join('');
    }


    // Form submission
    document.getElementById('topup-form').addEventListener('submit', function(e) {
        e.preventDefault();

        // Validate required fields
        if (!selectedPackage) {
            Swal.fire({
                icon: 'warning',
                title: 'Package Required',
                text: 'Please select a package',
                confirmButtonColor: '#dc2626',
            });
            return;
        }

        if (!usernameInput.value.trim()) {
            Swal.fire({
                icon: 'warning',
                title: 'Username Required',
                text: 'Please enter your username',
                confirmButtonColor: '#dc2626',
            });
            usernameInput.focus();
            return;
        }

        // Check if username is valid
        const usernameValid = usernameInput.classList.contains('border-green-500');
        if (!usernameValid) {
            Swal.fire({
                icon: 'warning',
                title: 'Username Verification',
                text: 'Please verify your username is correct',
                confirmButtonColor: '#dc2626',
            });
            usernameInput.focus();
            return;
        }

        // Prepare transaction data
        const transactionData = {
            plan_id: selectedPackage.plan_id,
            currency: currentCurrency,
            username: usernameInput.value.trim(),
            email: document.getElementById('email').value.trim() || null,
            promo_code: promoCodeInput.value.trim() || null,
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
                // Save transaction to cookies (for non-logged in users)
                const transactionToSave = {
                    order_id: data.order_id,
                    plan_id: selectedPackage.plan_id,
                    plan_name: packages.find(p => p.id === selectedPackage.plan_id)?.name || `${selectedPackage.amount} Cash`,
                    amount: selectedPackage.amount,
                    price: currentCurrency === 'IDR' ? selectedPackage.priceIdr : selectedPackage.priceUsd,
                    final_price: currentCurrency === 'IDR' ? selectedPackage.priceIdr : selectedPackage.priceUsd,
                    currency: currentCurrency,
                    username: usernameInput.value.trim(),
                    email: document.getElementById('email').value.trim() || null,
                    status: 'pending',
                    bonus_amount: appliedAffiliator ? selectedPackage.amount * 0.1 : 0,
                };
                saveTransactionToCookies(transactionToSave);

                // Open Midtrans snap
                snap.pay(data.snap_token, {
                    onSuccess: function(result) {
                        console.log('Payment success:', result);
                        // Update transaction status in cookies
                        updateTransactionInCookies(data.order_id, 'settlement');
                        Swal.fire({
                            icon: 'success',
                            title: 'Payment Successful!',
                            text: 'Your top up has been processed successfully.',
                            confirmButtonColor: '#dc2626',
                        }).then(() => {
                            // Reload to show updated history
                        window.location.reload();
                        });
                    },
                    onPending: function(result) {
                        console.log('Payment pending:', result);
                        // Update transaction status in cookies
                        updateTransactionInCookies(data.order_id, 'pending');
                        Swal.fire({
                            icon: 'info',
                            title: 'Payment Pending',
                            text: 'Please complete your payment.',
                            confirmButtonColor: '#dc2626',
                        }).then(() => {
                        window.location.reload();
                        });
                    },
                    onError: function(result) {
                        console.log('Payment error:', result);
                        // Update transaction status in cookies
                        updateTransactionInCookies(data.order_id, 'deny');
                        Swal.fire({
                            icon: 'error',
                            title: 'Payment Failed',
                            text: 'Please try again.',
                            confirmButtonColor: '#dc2626',
                        });
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
                Swal.fire({
                    icon: 'error',
                    title: 'Payment Failed',
                    text: data.message || 'Failed to create payment. Please try again.',
                    confirmButtonColor: '#dc2626',
                });
                submitBtn.disabled = false;
                submitBtn.textContent = 'Complete Purchase';
            }
        })
        .catch(error => {
            console.error('Error:', error);
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'An error occurred. Please try again.',
                confirmButtonColor: '#dc2626',
            });
            submitBtn.disabled = false;
            submitBtn.textContent = 'Complete Purchase';
        });
    });

    // Update transaction status in cookies
    function updateTransactionInCookies(orderId, status) {
        const transactions = getTransactionsFromCookies();
        const transaction = transactions.find(t => t.order_id === orderId);
        if (transaction) {
            transaction.status = status;
            document.cookie = `topup_transactions=${JSON.stringify(transactions)}; path=/; max-age=${60 * 60 * 24 * 30}`;
        }
    }

    // Pay pending transaction
    window.payPendingTransaction = function(orderId) {
        Swal.fire({
            title: 'Processing...',
            text: 'Please wait',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        const email = document.getElementById('email')?.value || '';
        const username = document.getElementById('username')?.value || '';

        fetch('{{ route("topup.pay-pending") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                order_id: orderId,
                email: email,
                username: username
            })
        })
        .then(response => response.json())
        .then(data => {
            Swal.close();
            if (data.success && data.snap_token) {
                // Open Midtrans snap
                snap.pay(data.snap_token, {
                    onSuccess: function(result) {
                        console.log('Payment success:', result);
                        updateTransactionInCookies(orderId, 'settlement');
                        Swal.fire({
                            icon: 'success',
                            title: 'Payment Successful!',
                            text: 'Your top up has been processed successfully.',
                            confirmButtonColor: '#dc2626',
                        }).then(() => {
                            loadHistory();
                        });
                    },
                    onPending: function(result) {
                        console.log('Payment pending:', result);
                        updateTransactionInCookies(orderId, 'pending');
                        Swal.fire({
                            icon: 'info',
                            title: 'Payment Pending',
                            text: 'Please complete your payment.',
                            confirmButtonColor: '#dc2626',
                        }).then(() => {
                            loadHistory();
                        });
                    },
                    onError: function(result) {
                        console.log('Payment error:', result);
                        updateTransactionInCookies(orderId, 'deny');
                        Swal.fire({
                            icon: 'error',
                            title: 'Payment Failed',
                            text: 'Please try again.',
                            confirmButtonColor: '#dc2626',
                        });
                        loadHistory();
                    },
                    onClose: function() {
                        console.log('Payment popup closed');
                        loadHistory();
                    }
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: data.message || 'Failed to process payment',
                    confirmButtonColor: '#dc2626',
                });
            }
        })
        .catch(error => {
            Swal.close();
            console.error('Error:', error);
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'An error occurred. Please try again.',
                confirmButtonColor: '#dc2626',
            });
        });
    };

    // Cancel transaction
    window.cancelTransaction = function(orderId) {
        Swal.fire({
            title: 'Cancel Transaction?',
            text: 'Are you sure you want to cancel this transaction?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc2626',
            cancelButtonColor: '#6b7280',
            confirmButtonText: 'Yes, cancel it',
            cancelButtonText: 'No, keep it'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Processing...',
                    text: 'Please wait',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                const email = document.getElementById('email')?.value || '';
                const username = document.getElementById('username')?.value || '';

                fetch('{{ route("topup.cancel") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        order_id: orderId,
                        email: email,
                        username: username
                    })
                })
                .then(response => response.json())
                .then(data => {
                    Swal.close();
                    if (data.success) {
                        // Update status in cookies
                        updateTransactionInCookies(orderId, 'cancel');
                        Swal.fire({
                            icon: 'success',
                            title: 'Cancelled!',
                            text: 'Transaction has been cancelled successfully.',
                            confirmButtonColor: '#dc2626',
                        }).then(() => {
                            loadHistory();
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: data.message || 'Failed to cancel transaction',
                            confirmButtonColor: '#dc2626',
                        });
                    }
                })
                .catch(error => {
                    Swal.close();
                    console.error('Error:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'An error occurred. Please try again.',
                        confirmButtonColor: '#dc2626',
                    });
                });
            }
        });
    };

    // Initial setup - packages will be loaded and rendered
});
</script>
@endsection
