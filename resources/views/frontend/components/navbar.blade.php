<!-- Main Navbar -->
<div class="fixed top-4 z-50 flex justify-center py-3 w-screen">
    <nav class="w-full max-w-7xl backdrop-blur-xl from-red-950/40 via-red-900/30 to-red-950/40 border border-red-500/20 rounded-full px-8 py-4 shadow-2xl shadow-red-900/20">
        <div class="flex items-center justify-between">
            <!-- Logo -->
            <div class="shrink-0 flex items-center">
                <a href="{{ route('home') }}" class="flex items-center space-x-3">
                    <img src="{{ asset('assets/reverion_red.jpeg') }}" alt="Reverion Logo" class="w-10 h-10 object-contain">
                    <span class="text-2xl font-semibold text-white">Reverion</span>
                </a>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex items-center space-x-2 flex-1 justify-center">
                <a href="{{ route('home') }}" class="nav-link text-gray-300 hover:text-red-400 px-5 py-2.5 rounded-full text-base font-semibold transition-all duration-200 hover:bg-red-500/10 {{ request()->routeIs('home') && !request()->has('hash') ? 'text-red-400 bg-red-500/10' : '' }}" data-route="home">Home</a>
                <a href="{{ route('download.index') }}" class="nav-link text-gray-300 hover:text-red-400 px-5 py-2.5 rounded-full text-base font-semibold transition-all duration-200 hover:bg-red-500/10 {{ request()->routeIs('download.*') ? 'text-red-400 bg-red-500/10' : '' }}" data-hash="download">Download</a>
                {{-- <a href="#leaderboard" class="nav-link text-gray-300 hover:text-red-400 px-5 py-2.5 rounded-full text-base font-semibold transition-all duration-200 hover:bg-red-500/10" data-hash="leaderboard">Leaderboard</a> --}}
                <a href="{{ route('topup.index') }}" class="nav-link text-gray-300 hover:text-red-400 px-5 py-2.5 rounded-full text-base font-semibold transition-all duration-200 hover:bg-red-500/10 {{ request()->routeIs('topup.*') ? 'text-red-400 bg-red-500/10' : '' }}" data-route="topup">Top Up</a>
                <a href="#login" class="nav-link text-gray-300 hover:text-red-400 px-5 py-2.5 rounded-full text-base font-semibold transition-all duration-200 hover:bg-red-500/10 desktop-auth-link" data-modal-show="login-modal" data-hash="login">Login</a>
            </div>

            <!-- Register Button -->
            <div class="hidden md:block">
                <a href="#register" class="bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white px-7 py-2.5 rounded-full text-base font-semibold transition-all duration-200 shadow-lg shadow-red-500/30 flex items-center space-x-1 group desktop-auth-link" data-modal-show="register-modal">
                    <span>Register</span>
                    <svg class="w-4 h-4 transform group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                </a>
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden">
                <button type="button" class="inline-flex items-center justify-center p-2.5 rounded-full text-gray-300 hover:text-red-400 hover:bg-red-500/10 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-red-500 transition-all" data-drawer-target="mobile-menu" data-drawer-toggle="mobile-menu" aria-controls="mobile-menu">
                    <span class="sr-only">Open main menu</span>
                    <svg class="block h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </nav>
</div>

<!-- Mobile menu drawer -->
<div id="mobile-menu" class="fixed top-0 left-0 z-50 h-screen p-5 overflow-y-auto transition-transform -translate-x-full backdrop-blur-xl bg-gradient-to-br from-red-950/90 via-red-900/80 to-red-950/90 border-r border-red-500/20 w-72 shadow-2xl shadow-red-900/30" tabindex="-1" aria-labelledby="drawer-label">
        <div class="flex flex-col h-full">
            <div class="flex items-center justify-between mb-8 pt-5">
                <div class="flex items-center space-x-3">
                    <img src="{{ asset('assets/reverion_red.jpeg') }}" alt="Reverion Logo" class="w-12 h-12 object-contain">
                    <span class="text-2xl font-semibold text-white">Reverion</span>
                </div>
                <button type="button" class="text-gray-300 hover:text-red-400 hover:bg-red-500/10 rounded-full p-2.5 transition-all" data-drawer-hide="mobile-menu" aria-controls="mobile-menu">
                    <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="flex-1 flex flex-col space-y-3">
                <a href="{{ route('home') }}" class="nav-link text-gray-300 hover:text-red-400 hover:bg-red-500/10 px-5 py-3.5 rounded-full text-lg font-semibold transition-all duration-200 {{ request()->routeIs('home') && !request()->has('hash') ? 'text-red-400 bg-red-500/10' : '' }}" data-drawer-hide="mobile-menu" data-route="home">Home</a>
                <a href="{{ route('download.index') }}" class="nav-link text-gray-300 hover:text-red-400 hover:bg-red-500/10 px-5 py-3.5 rounded-full text-lg font-semibold transition-all duration-200 {{ request()->routeIs('download.*') ? 'text-red-400 bg-red-500/10' : '' }}" data-drawer-hide="mobile-menu" data-hash="download">Download</a>
                {{-- <a href="#leaderboard" class="nav-link text-gray-300 hover:text-red-400 hover:bg-red-500/10 px-5 py-3.5 rounded-full text-lg font-semibold transition-all duration-200" data-drawer-hide="mobile-menu" data-hash="leaderboard">Leaderboard</a> --}}
                <a href="{{ route('topup.index') }}" class="nav-link text-gray-300 hover:text-red-400 hover:bg-red-500/10 px-5 py-3.5 rounded-full text-lg font-semibold transition-all duration-200 {{ request()->routeIs('topup.*') ? 'text-red-400 bg-red-500/10' : '' }}" data-drawer-hide="mobile-menu" data-route="topup">Top Up</a>
                <a href="{{ route('login') }}" class="nav-link text-gray-300 hover:text-red-400 hover:bg-red-500/10 px-5 py-3.5 rounded-full text-lg font-semibold transition-all duration-200" data-drawer-hide="mobile-menu">Login</a>
                <a href="{{ route('register') }}" class="bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white px-7 py-3.5 rounded-full text-lg font-semibold transition-all duration-200 text-center shadow-lg shadow-red-500/30 mt-4" data-drawer-hide="mobile-menu">Register</a>
            </div>
        </div>
    </div>

<script>
    // Handle desktop auth links (open modal instead of navigating)
    document.addEventListener('DOMContentLoaded', function() {
        const desktopAuthLinks = document.querySelectorAll('.desktop-auth-link');

        desktopAuthLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                // Only prevent default on desktop (md and above)
                if (window.innerWidth >= 768) {
                    e.preventDefault();
                    const modalId = this.getAttribute('data-modal-show');
                    if (modalId) {
                        // Mark that modal was triggered by user
                        sessionStorage.setItem('authModalTriggered', 'true');
                        // Update hash for consistency
                        if (this.getAttribute('data-hash')) {
                            window.location.hash = this.getAttribute('data-hash');
                        }
                        // Show modal directly - try multiple ways to ensure it works
                        const showModalFunc = window.showModal || window.showAuthModal;
                        if (showModalFunc) {
                            showModalFunc(modalId);
                        } else {
                            // Fallback: wait a bit for auth-modals script to load
                            setTimeout(() => {
                                const showModalFunc2 = window.showModal || window.showAuthModal;
                                if (showModalFunc2) {
                                    showModalFunc2(modalId);
                                } else {
                                    // Last resort: trigger click on element with data-modal-show
                                    console.error('showModal function not found');
                                }
                            }, 200);
                        }
                    }
                }
                // On mobile, let the link work normally (navigate to page)
            });
        });
    });
</script>
