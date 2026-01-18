<!-- Main Navbar -->
<div class="fixed top-4 z-50 flex justify-center py-3 w-screen">
    <nav class="w-full max-w-7xl backdrop-blur-xl from-red-950/40 via-red-900/30 to-red-950/40 border border-red-500/20 rounded-full px-8 py-4 shadow-2xl shadow-red-900/20">
        <div class="flex items-center justify-between">
            <!-- Logo -->
            <div class="shrink-0 flex items-center">
                <a href="{{ route('home') }}" class="flex items-center space-x-3">
                    <img src="{{ asset('assets/reverion_logo.png') }}" alt="Reverion Logo" class="w-10 h-10 object-contain">
                    <span class="text-2xl font-semibold text-white">Reverion</span>
                </a>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex items-center space-x-2 flex-1 justify-center">
                <a href="{{ route('home') }}" class="nav-link text-gray-300 hover:text-red-400 px-5 py-2.5 rounded-full text-base font-semibold transition-all duration-200 hover:bg-red-500/10 {{ request()->routeIs('home') && !request()->has('hash') ? 'text-red-400 bg-red-500/10' : '' }}" data-route="home">Home</a>
                <a href="{{ route('download.index') }}" class="nav-link text-gray-300 hover:text-red-400 px-5 py-2.5 rounded-full text-base font-semibold transition-all duration-200 hover:bg-red-500/10 {{ request()->routeIs('download.*') ? 'text-red-400 bg-red-500/10' : '' }}" data-hash="download">Download</a>
                {{-- <a href="#leaderboard" class="nav-link text-gray-300 hover:text-red-400 px-5 py-2.5 rounded-full text-base font-semibold transition-all duration-200 hover:bg-red-500/10" data-hash="leaderboard">Leaderboard</a> --}}
                <a href="{{ route('topup.index') }}" class="nav-link text-gray-300 hover:text-red-400 px-5 py-2.5 rounded-full text-base font-semibold transition-all duration-200 hover:bg-red-500/10 {{ request()->routeIs('topup.*') ? 'text-red-400 bg-red-500/10' : '' }}" data-route="topup">Top Up</a>
                @auth
                    {{-- User sudah login - tidak tampilkan login link --}}
                @else
                    <a href="#login" class="nav-link text-gray-300 hover:text-red-400 px-5 py-2.5 rounded-full text-base font-semibold transition-all duration-200 hover:bg-red-500/10 desktop-auth-link" data-modal-show="login-modal" data-hash="login">Login</a>
                @endauth
            </div>

            <!-- Register/Profile Button -->
            <div class="hidden md:block">
                @auth
                    <!-- Profile Dropdown -->
                    <div class="relative" data-dropdown-toggle="profile-dropdown">
                        <button type="button" class="flex items-center space-x-2 bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white px-5 py-2.5 rounded-full text-base font-semibold transition-all duration-200 shadow-lg shadow-red-500/30">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            <span>{{ Auth::user()->username }}</span>
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <!-- Dropdown Menu -->
                        <div id="profile-dropdown" class="hidden absolute right-0 mt-2 w-48 backdrop-blur-xl bg-gradient-to-br from-black/90 via-red-950/80 to-black/90 border border-red-500/30 rounded-xl shadow-2xl shadow-red-900/30 overflow-hidden z-50">
                            <div class="py-2">
                                <a href="{{ route('profile.index') }}" class="flex items-center space-x-2 px-4 py-2.5 text-gray-300 hover:text-red-400 hover:bg-red-500/10 transition-all duration-200">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    <span>Profile</span>
                                </a>
                                <form action="{{ route('logout') }}" method="POST" class="border-t border-red-500/20 logout-form">
                                    @csrf
                                    <button type="submit" class="w-full flex items-center space-x-2 px-4 py-2.5 text-gray-300 hover:text-red-400 hover:bg-red-500/10 transition-all duration-200">
                                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                        </svg>
                                        <span>Logout</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @else
                    <a href="#register" class="bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white px-7 py-2.5 rounded-full text-base font-semibold transition-all duration-200 shadow-lg shadow-red-500/30 flex items-center space-x-1 group desktop-auth-link" data-modal-show="register-modal">
                        <span>Register</span>
                        <svg class="w-4 h-4 transform group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </a>
                @endauth
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
                    <img src="{{ asset('assets/reverion_logo.png') }}" alt="Reverion Logo" class="w-12 h-12 object-contain">
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
                @auth
                    <a href="{{ route('profile.index') }}" class="nav-link text-gray-300 hover:text-red-400 hover:bg-red-500/10 px-5 py-3.5 rounded-full text-lg font-semibold transition-all duration-200 {{ request()->routeIs('profile.*') ? 'text-red-400 bg-red-500/10' : '' }}" data-drawer-hide="mobile-menu">Profile</a>
                    <form action="{{ route('logout') }}" method="POST" class="mt-4 logout-form">
                        @csrf
                        <button type="submit" class="w-full bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white px-7 py-3.5 rounded-full text-lg font-semibold transition-all duration-200 text-center shadow-lg shadow-red-500/30">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="nav-link text-gray-300 hover:text-red-400 hover:bg-red-500/10 px-5 py-3.5 rounded-full text-lg font-semibold transition-all duration-200" data-drawer-hide="mobile-menu">Login</a>
                    <a href="{{ route('register') }}" class="bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white px-7 py-3.5 rounded-full text-lg font-semibold transition-all duration-200 text-center shadow-lg shadow-red-500/30 mt-4" data-drawer-hide="mobile-menu">Register</a>
                @endauth
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

        // Handle profile dropdown toggle
        const dropdownToggle = document.querySelector('[data-dropdown-toggle="profile-dropdown"]');
        const dropdownMenu = document.getElementById('profile-dropdown');

        if (dropdownToggle && dropdownMenu) {
            dropdownToggle.addEventListener('click', function(e) {
                e.stopPropagation();
                dropdownMenu.classList.toggle('hidden');
            });

            // Close dropdown when clicking outside
            document.addEventListener('click', function(e) {
                if (!dropdownToggle.contains(e.target) && !dropdownMenu.contains(e.target)) {
                    dropdownMenu.classList.add('hidden');
                }
            });
        }

        // Handle mobile drawer menu toggle
        const drawerToggle = document.querySelector('[data-drawer-toggle="mobile-menu"]');
        const drawerTarget = document.getElementById('mobile-menu');
        const drawerHideButtons = document.querySelectorAll('[data-drawer-hide="mobile-menu"]');

        if (drawerToggle && drawerTarget) {
            // Toggle drawer when hamburger button is clicked
            drawerToggle.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                drawerTarget.classList.toggle('-translate-x-full');
                
                // Prevent body scroll when drawer is open
                if (!drawerTarget.classList.contains('-translate-x-full')) {
                    document.body.style.overflow = 'hidden';
                } else {
                    document.body.style.overflow = '';
                }
            });

            // Close drawer when close button is clicked
            drawerHideButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    drawerTarget.classList.add('-translate-x-full');
                    document.body.style.overflow = '';
                });
            });

            // Close drawer when clicking outside (on backdrop)
            document.addEventListener('click', function(e) {
                if (!drawerTarget.classList.contains('-translate-x-full')) {
                    // Check if click is outside the drawer
                    if (!drawerTarget.contains(e.target) && !drawerToggle.contains(e.target)) {
                        drawerTarget.classList.add('-translate-x-full');
                        document.body.style.overflow = '';
                    }
                }
            });

            // Close drawer on escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && !drawerTarget.classList.contains('-translate-x-full')) {
                    drawerTarget.classList.add('-translate-x-full');
                    document.body.style.overflow = '';
                }
            });
        }

        // Handle logout forms with AJAX
        document.querySelectorAll('.logout-form').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();

                const formData = new FormData(this);
                const submitBtn = this.querySelector('button[type="submit"]');
                const originalText = submitBtn.textContent;

                submitBtn.disabled = true;
                submitBtn.textContent = 'Logging out...';

                fetch(this.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || formData.get('_token')
                    }
                })
                .then(response => {
                    if (response.ok && response.redirected) {
                        // Success - redirect
                        if (window.showNotification) {
                            window.showNotification('You have been successfully logged out.', 'success');
                            setTimeout(() => {
                                window.location.href = response.url;
                            }, 1500);
                        } else {
                            window.location.href = response.url;
                        }
                        return;
                    }
                    return response.json().then(data => {
                        if (response.ok && data.success) {
                            // Show success notification before redirect
                            if (window.showNotification && data.message) {
                                window.showNotification(data.message, 'success');
                                setTimeout(() => {
                                    if (data.redirect) {
                                        window.location.href = data.redirect;
                                    } else {
                                        window.location.href = '/';
                                    }
                                }, 1500);
                            } else {
                                if (data.redirect) {
                                    window.location.href = data.redirect;
                                } else {
                                    window.location.href = '/';
                                }
                            }
                        } else {
                            submitBtn.disabled = false;
                            submitBtn.textContent = originalText;
                        }
                    });
                })
                .catch(error => {
                    submitBtn.disabled = false;
                    submitBtn.textContent = originalText;
                    // Fallback to normal form submit
                    this.submit();
                });
            });
        });
    });
</script>
