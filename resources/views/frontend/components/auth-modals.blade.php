<!-- Login Modal -->
<div id="login-modal" class="hidden">
    <div id="login-backdrop" class="fixed inset-0 bg-black/80 backdrop-blur-sm z-[60] hidden" data-modal-hide="login-modal"></div>
    <div id="login-wrapper" class="fixed inset-0 flex items-center justify-center p-4 z-[70] pointer-events-none hidden">
        <div class="relative w-full max-w-md max-h-full overflow-y-auto pointer-events-auto">
            <div class="relative backdrop-blur-xl bg-gradient-to-br from-black/90 via-red-950/80 to-black/90 border-2 border-red-500/40 rounded-2xl shadow-2xl shadow-red-900/30 overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-red-600/10 via-transparent to-transparent pointer-events-none"></div>
                <div class="absolute -inset-1 bg-gradient-to-r from-red-600/20 to-transparent blur-xl opacity-50"></div>

                <div class="relative z-10 p-6">
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 rounded-full bg-gradient-to-br from-red-600 to-red-700 flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-2xl font-bold text-white">Login</h3>
                                <p class="text-sm text-gray-300">Sign in to your account</p>
                            </div>
                        </div>
                        <button type="button" class="text-gray-400 hover:text-red-400 hover:bg-red-500/10 rounded-lg p-2 transition-all" data-modal-hide="login-modal">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>

                    <div id="login-errors" class="hidden mb-4 p-4 bg-red-500/20 border border-red-500/50 rounded-lg">
                        <ul class="list-disc list-inside text-red-300 text-sm space-y-1"></ul>
                    </div>

                    <form id="login-form" action="{{ route('login.post') }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label for="modal-email" class="block text-sm font-medium text-gray-300 mb-2">Email or Username</label>
                            <input type="text" id="modal-email" name="email" required class="w-full px-4 py-3 bg-black/30 border border-red-500/30 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all text-sm" placeholder="email@example.com or username">
                        </div>
                        <div>
                            <label for="modal-password" class="block text-sm font-medium text-gray-300 mb-2">Password</label>
                            <input type="password" id="modal-password" name="password" required class="w-full px-4 py-3 bg-black/30 border border-red-500/30 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all text-sm" placeholder="••••••••">
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" id="modal-remember" name="remember" class="w-4 h-4 text-red-600 bg-black/30 border-red-500/30 rounded focus:ring-red-500 focus:ring-2">
                            <label for="modal-remember" class="ml-2 text-sm text-gray-300">Remember me</label>
                        </div>
                        @if(config('services.recaptcha.status', true) && config('services.recaptcha.site_key'))
                            <div class="flex justify-center">
                                <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}" data-callback="onLoginRecaptchaCallback"></div>
                            </div>
                            <div id="login-recaptcha-error" class="hidden text-red-400 text-sm mt-1"></div>
                        @endif
                        <button type="submit" class="w-full bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white py-3 px-6 rounded-lg font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg shadow-red-900/50 text-sm">Login</button>
                    </form>
                    <div class="mt-4 text-center">
                        <p class="text-gray-300 text-xs">
                            Don't have an account?
                            <button type="button" class="text-red-400 hover:text-red-300 font-semibold transition-colors" data-modal-hide="login-modal" data-modal-show="register-modal">Sign up now</button>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Register Modal -->
<div id="register-modal" class="hidden">
    <div id="register-backdrop" class="fixed inset-0 bg-black/80 backdrop-blur-sm z-[60] hidden" data-modal-hide="register-modal"></div>
    <div id="register-wrapper" class="fixed inset-0 flex items-center justify-center p-4 z-[70] pointer-events-none hidden">
        <div class="relative w-full max-w-md max-h-full overflow-y-auto pointer-events-auto">
            <div class="relative backdrop-blur-xl bg-gradient-to-br from-black/90 via-red-950/80 to-black/90 border-2 border-red-500/40 rounded-2xl shadow-2xl shadow-red-900/30 overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-red-600/10 via-transparent to-transparent pointer-events-none"></div>
                <div class="absolute -inset-1 bg-gradient-to-r from-red-600/20 to-transparent blur-xl opacity-50"></div>

                <div class="relative z-10 p-6">
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 rounded-full bg-gradient-to-br from-red-600 to-red-700 flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-2xl font-bold text-white">Register</h3>
                                <p class="text-sm text-gray-300">Create a new account</p>
                            </div>
                        </div>
                        <button type="button" class="text-gray-400 hover:text-red-400 hover:bg-red-500/10 rounded-lg p-2 transition-all" data-modal-hide="register-modal">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>

                    <div id="register-errors" class="hidden mb-4 p-4 bg-red-500/20 border border-red-500/50 rounded-lg">
                        <ul class="list-disc list-inside text-red-300 text-sm space-y-1"></ul>
                    </div>

                    <form id="register-form" action="{{ route('register.post') }}" method="POST" class="space-y-4">
                        @csrf
                        <!-- Hidden Name Field - value will be same as username -->
                        <input type="hidden" id="modal-name" name="name" value="">
                        <div>
                            <label for="modal-username" class="block text-sm font-medium text-gray-300 mb-2">Username</label>
                            <div class="flex gap-2">
                                <input type="text" id="modal-username" name="username" required class="flex-1 px-4 py-3 bg-black/30 border border-red-500/30 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all text-sm" placeholder="username (3-20 characters)" pattern="[a-zA-Z0-9_-]{3,20}">
                                <button type="button" id="modal-check-username-btn" class="px-4 py-3 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white rounded-lg font-semibold transition-all duration-300 text-sm whitespace-nowrap">Check</button>
                            </div>
                            <div id="modal-username-check-result" class="mt-2 text-sm hidden"></div>
                        </div>
                        <div>
                            <label for="modal-register-email" class="block text-sm font-medium text-gray-300 mb-2">Email</label>
                            <div class="flex gap-2">
                                <input type="email" id="modal-register-email" name="email" required class="flex-1 px-4 py-3 bg-black/30 border border-red-500/30 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all text-sm" placeholder="email@example.com">
                                <button type="button" id="modal-check-email-btn" class="px-4 py-3 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white rounded-lg font-semibold transition-all duration-300 text-sm whitespace-nowrap">Check</button>
                            </div>
                            <div id="modal-email-check-result" class="mt-2 text-sm hidden"></div>
                        </div>
                        <div>
                            <label for="modal-register-password" class="block text-sm font-medium text-gray-300 mb-2">Password</label>
                            <input type="password" id="modal-register-password" name="password" required class="w-full px-4 py-3 bg-black/30 border border-red-500/30 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all text-sm" placeholder="Minimum 8 characters">
                            <!-- Password Strength Meter -->
                            <div id="modal-password-strength" class="mt-2">
                                <div class="flex items-center gap-2 mb-1">
                                    <div class="flex-1 h-2 bg-gray-700 rounded-full overflow-hidden">
                                        <div id="modal-password-strength-bar" class="h-full transition-all duration-300 rounded-full" style="width: 0%"></div>
                                    </div>
                                    <span id="modal-password-strength-text" class="text-xs text-gray-400"></span>
                                </div>
                                <div class="text-xs text-gray-500 space-y-1">
                                    <div id="modal-pwd-check-length" class="flex items-center gap-1">
                                        <span class="w-4">•</span>
                                        <span>Minimum 8 characters</span>
                                    </div>
                                    <div id="modal-pwd-check-uppercase" class="flex items-center gap-1">
                                        <span class="w-4">•</span>
                                        <span>Uppercase letter (A-Z)</span>
                                    </div>
                                    <div id="modal-pwd-check-lowercase" class="flex items-center gap-1">
                                        <span class="w-4">•</span>
                                        <span>Lowercase letter (a-z)</span>
                                    </div>
                                    <div id="modal-pwd-check-number" class="flex items-center gap-1">
                                        <span class="w-4">•</span>
                                        <span>Number (0-9)</span>
                                    </div>
                                    <div id="modal-pwd-check-special" class="flex items-center gap-1">
                                        <span class="w-4">•</span>
                                        <span>Special character (!@#$%^&*)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <label for="modal-password-confirmation" class="block text-sm font-medium text-gray-300 mb-2">Confirm Password</label>
                            <input type="password" id="modal-password-confirmation" name="password_confirmation" required class="w-full px-4 py-3 bg-black/30 border border-red-500/30 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all text-sm" placeholder="Repeat password">
                        </div>
                        <div>
                            <label for="modal-kode-referal" class="block text-sm font-medium text-gray-300 mb-2">Referral Code <span class="text-gray-500 text-xs">(Optional)</span></label>
                            <input type="text" id="modal-kode-referal" name="kode_referal" class="w-full px-4 py-3 bg-black/30 border border-red-500/30 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all text-sm" placeholder="Enter referral code if you have one">
                        </div>
                        @if(config('services.recaptcha.status', true) && config('services.recaptcha.site_key'))
                            <div class="flex justify-center">
                                <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}" data-callback="onRegisterRecaptchaCallback"></div>
                            </div>
                            <div id="register-recaptcha-error" class="hidden text-red-400 text-sm mt-1"></div>
                        @endif
                        <button type="submit" class="w-full bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white py-3 px-6 rounded-lg font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg shadow-red-900/50 text-sm">Register</button>
                    </form>
                    <div class="mt-4 text-center">
                        <p class="text-gray-300 text-xs">
                            Already have an account?
                            <button type="button" class="text-red-400 hover:text-red-300 font-semibold transition-colors" data-modal-hide="register-modal" data-modal-show="login-modal">Login now</button>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if(config('services.recaptcha.status', true) && config('services.recaptcha.site_key'))
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endif

<script>
    // Modal show/hide functions - define immediately so they're available globally
    (function() {
        function showModal(modalId) {
            // Handle both "login-modal" and "login" format
            const cleanId = modalId.replace('-modal', '');
            const modalContainer = document.getElementById(modalId);
            const backdrop = document.getElementById(cleanId + '-backdrop');
            const wrapper = document.getElementById(cleanId + '-wrapper');

            // Remove hidden from modal container
            if (modalContainer) {
                modalContainer.classList.remove('hidden');
            }
            // Remove hidden from backdrop
            if (backdrop) {
                backdrop.classList.remove('hidden');
            }
            // Remove hidden from wrapper
            if (wrapper) {
                wrapper.classList.remove('hidden');
            }
            document.body.style.overflow = 'hidden';
        }

        function hideModal(modalId) {
            // Handle both "login-modal" and "login" format
            const cleanId = modalId.replace('-modal', '');
            const modalContainer = document.getElementById(modalId);
            const backdrop = document.getElementById(cleanId + '-backdrop');
            const wrapper = document.getElementById(cleanId + '-wrapper');

            // Add hidden to backdrop
            if (backdrop) backdrop.classList.add('hidden');
            // Add hidden to wrapper
            if (wrapper) wrapper.classList.add('hidden');
            // Add hidden to modal container
            if (modalContainer) {
                modalContainer.classList.add('hidden');
            }
            document.body.style.overflow = '';
            if (window.location.hash === '#login' || window.location.hash === '#register') {
                history.replaceState(null, null, window.location.pathname);
            }
        }

        // Make functions globally available immediately
        window.showModal = showModal;
        window.hideModal = hideModal;
        window.showAuthModal = showModal;
        window.hideAuthModal = hideModal;
    })(); // End IIFE - functions are now globally available

    // Handle modal triggers
    document.addEventListener('DOMContentLoaded', function() {
        // Handle all modal show triggers - this will catch clicks from navbar too
        document.querySelectorAll('[data-modal-show]').forEach(trigger => {
            trigger.addEventListener('click', function(e) {
                // Only prevent default if not already prevented
                if (!e.defaultPrevented) {
                    e.preventDefault();
                }
                const modalId = this.getAttribute('data-modal-show');
                if (modalId) {
                    window.showModal(modalId);
                }
            });
        });

        document.querySelectorAll('[data-modal-hide]').forEach(trigger => {
            trigger.addEventListener('click', function(e) {
                e.preventDefault();
                let modalId = this.getAttribute('data-modal-hide');
                // If modalId is just "login" or "register", add "-modal" suffix
                if (modalId && !modalId.includes('-modal')) {
                    modalId = modalId + '-modal';
                }
                window.hideModal(modalId);
            });
        });

        // Close on backdrop click
        document.getElementById('login-backdrop')?.addEventListener('click', function(e) {
            if (e.target === this) window.hideModal('login-modal');
        });
        document.getElementById('register-backdrop')?.addEventListener('click', function(e) {
            if (e.target === this) window.hideModal('register-modal');
        });

        // Handle hash navigation for desktop
        window.addEventListener('hashchange', function() {
            if (window.innerWidth >= 768) {
                if (window.location.hash === '#login') {
                    window.showModal('login-modal');
                } else if (window.location.hash === '#register') {
                    window.showModal('register-modal');
                } else {
                    window.hideModal('login-modal');
                    window.hideModal('register-modal');
                }
            }
        });

        // Functions already available globally from above
    });

    // reCAPTCHA callbacks
    function onLoginRecaptchaCallback() {
        document.getElementById('login-recaptcha-error')?.classList.add('hidden');
    }

    function onRegisterRecaptchaCallback() {
        document.getElementById('register-recaptcha-error')?.classList.add('hidden');
    }

    // Username check functionality
    function checkUsernameAvailability(usernameInput, resultDiv, checkBtn, endpoint) {
        const username = usernameInput.value.trim();
        if (!username) {
            resultDiv.className = 'mt-2 text-sm text-red-400';
            resultDiv.textContent = 'Please enter username first';
            resultDiv.classList.remove('hidden');
            return;
        }
        if (!/^[a-zA-Z0-9_-]{3,20}$/.test(username)) {
            resultDiv.className = 'mt-2 text-sm text-red-400';
            resultDiv.textContent = 'Username can only contain letters, numbers, underscore (_), and dash (-). Length 3-20 characters.';
            resultDiv.classList.remove('hidden');
            return;
        }
        checkBtn.disabled = true;
        const originalText = checkBtn.textContent;
        checkBtn.textContent = 'Checking...';
        resultDiv.classList.add('hidden');
        fetch(endpoint, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}'
            },
            body: JSON.stringify({ username: username })
        })
        .then(response => response.json())
        .then(data => {
            checkBtn.disabled = false;
            checkBtn.textContent = originalText;
            resultDiv.classList.remove('hidden');
            if (data.available) {
                resultDiv.className = 'mt-2 text-sm text-green-400';
                resultDiv.textContent = '✓ ' + data.message;
                usernameInput.classList.remove('border-red-500');
                usernameInput.classList.add('border-green-500');
            } else {
                resultDiv.className = 'mt-2 text-sm text-red-400';
                resultDiv.textContent = '✗ ' + data.message;
                usernameInput.classList.remove('border-green-500');
                usernameInput.classList.add('border-red-500');
            }
        })
        .catch(error => {
            checkBtn.disabled = false;
            checkBtn.textContent = originalText;
            resultDiv.className = 'mt-2 text-sm text-red-400';
            resultDiv.textContent = 'An error occurred. Please try again.';
            resultDiv.classList.remove('hidden');
        });
    }

    document.getElementById('check-username-btn')?.addEventListener('click', function() {
        const usernameInput = document.getElementById('username');
        const resultDiv = document.getElementById('username-check-result');
        checkUsernameAvailability(usernameInput, resultDiv, this, '{{ route("check.username") }}');
    });

    document.getElementById('modal-check-username-btn')?.addEventListener('click', function() {
        const usernameInput = document.getElementById('modal-username');
        const resultDiv = document.getElementById('modal-username-check-result');
        checkUsernameAvailability(usernameInput, resultDiv, this, '{{ route("check.username") }}');
    });

    document.getElementById('username')?.addEventListener('input', function() {
        const resultDiv = document.getElementById('username-check-result');
        resultDiv?.classList.add('hidden');
        this.classList.remove('border-red-500', 'border-green-500');
    });

    document.getElementById('modal-username')?.addEventListener('input', function() {
        const resultDiv = document.getElementById('modal-username-check-result');
        resultDiv?.classList.add('hidden');
        this.classList.remove('border-red-500', 'border-green-500');
    });

    // Email check functionality
    function checkEmailAvailability(emailInput, resultDiv, checkBtn, endpoint) {
        const email = emailInput.value.trim();
        if (!email) {
            resultDiv.className = 'mt-2 text-sm text-red-400';
            resultDiv.textContent = 'Please enter email first';
            resultDiv.classList.remove('hidden');
            return;
        }
        if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
            resultDiv.className = 'mt-2 text-sm text-red-400';
            resultDiv.textContent = 'Invalid email format';
            resultDiv.classList.remove('hidden');
            return;
        }
        checkBtn.disabled = true;
        const originalText = checkBtn.textContent;
        checkBtn.textContent = 'Checking...';
        resultDiv.classList.add('hidden');
        fetch(endpoint, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}'
            },
            body: JSON.stringify({ email: email })
        })
        .then(response => response.json())
        .then(data => {
            checkBtn.disabled = false;
            checkBtn.textContent = originalText;
            resultDiv.classList.remove('hidden');
            if (data.available) {
                resultDiv.className = 'mt-2 text-sm text-green-400';
                resultDiv.textContent = '✓ ' + data.message;
                emailInput.classList.remove('border-red-500');
                emailInput.classList.add('border-green-500');
            } else {
                resultDiv.className = 'mt-2 text-sm text-red-400';
                resultDiv.textContent = '✗ ' + data.message;
                emailInput.classList.remove('border-green-500');
                emailInput.classList.add('border-red-500');
            }
        })
        .catch(error => {
            checkBtn.disabled = false;
            checkBtn.textContent = originalText;
            resultDiv.className = 'mt-2 text-sm text-red-400';
            resultDiv.textContent = 'An error occurred. Please try again.';
            resultDiv.classList.remove('hidden');
        });
    }

    // Modal email check
    document.getElementById('modal-check-email-btn')?.addEventListener('click', function() {
        const emailInput = document.getElementById('modal-register-email');
        const resultDiv = document.getElementById('modal-email-check-result');
        checkEmailAvailability(emailInput, resultDiv, this, '{{ route("check.email") }}');
    });

    document.getElementById('modal-register-email')?.addEventListener('input', function() {
        const resultDiv = document.getElementById('modal-email-check-result');
        resultDiv?.classList.add('hidden');
        this.classList.remove('border-red-500', 'border-green-500');
    });

    // Password strength meter for modal
    function updatePasswordStrength(password, strengthBarId, strengthTextId, checksId) {
        const strengthBar = document.getElementById(strengthBarId);
        const strengthText = document.getElementById(strengthTextId);
        const strengthContainer = document.getElementById(checksId);
        
        // Always show password strength meter, no need to hide/show
        
        const checks = {
            length: password.length >= 8,
            uppercase: /[A-Z]/.test(password),
            lowercase: /[a-z]/.test(password),
            number: /[0-9]/.test(password),
            special: /[!@#$%^&*(),.?":{}|<>]/.test(password)
        };
        
        const passedChecks = Object.values(checks).filter(v => v).length;
        const strength = (passedChecks / 5) * 100;
        
        // Update progress bar
        if (strengthBar) {
            strengthBar.style.width = strength + '%';
            if (strength < 40) {
                strengthBar.className = 'h-full transition-all duration-300 rounded-full bg-red-500';
            } else if (strength < 70) {
                strengthBar.className = 'h-full transition-all duration-300 rounded-full bg-yellow-500';
            } else {
                strengthBar.className = 'h-full transition-all duration-300 rounded-full bg-green-500';
            }
        }
        
        // Update text
        if (strengthText) {
            if (strength < 40) {
                strengthText.textContent = 'Weak';
                strengthText.className = 'text-xs text-red-400';
            } else if (strength < 70) {
                strengthText.textContent = 'Medium';
                strengthText.className = 'text-xs text-yellow-400';
            } else {
                strengthText.textContent = 'Strong';
                strengthText.className = 'text-xs text-green-400';
            }
        }
        
        // Update individual checks
        ['length', 'uppercase', 'lowercase', 'number', 'special'].forEach(check => {
            const checkElement = document.getElementById('modal-pwd-check-' + check);
            if (checkElement) {
                const span = checkElement.querySelector('span:last-child');
                if (checks[check]) {
                    checkElement.className = 'flex items-center gap-1 text-xs text-green-400';
                    if (span) span.innerHTML = span.textContent.replace('•', '✓');
                } else {
                    checkElement.className = 'flex items-center gap-1 text-xs text-gray-500';
                    if (span) span.innerHTML = span.textContent.replace('✓', '•');
                }
            }
        });
    }

    // Initialize password strength meter for modal
    const modalPasswordInput = document.getElementById('modal-register-password');
    if (modalPasswordInput) {
        // Update on input
        modalPasswordInput.addEventListener('input', function() {
            updatePasswordStrength(this.value, 'modal-password-strength-bar', 'modal-password-strength-text', 'modal-password-strength');
        });
        // Initialize on page load
        updatePasswordStrength(modalPasswordInput.value || '', 'modal-password-strength-bar', 'modal-password-strength-text', 'modal-password-strength');
    }

    // Handle login form submission with AJAX
    document.getElementById('login-form')?.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const form = this;
        const submitBtn = form.querySelector('button[type="submit"]');
        const errorDiv = document.getElementById('login-errors');
        const errorList = errorDiv?.querySelector('ul');
        const emailInput = document.getElementById('modal-email');
        const passwordInput = document.getElementById('modal-password');
        
        // Hide previous errors
        if (errorDiv) {
            errorDiv.classList.add('hidden');
        }
        if (errorList) {
            errorList.innerHTML = '';
        }
        
        // Disable submit button
        const originalText = submitBtn.textContent;
        submitBtn.disabled = true;
        submitBtn.textContent = 'Processing...';
        
        // Get form data
        const formData = new FormData(form);
        
        // Add reCAPTCHA if exists
        const recaptchaResponse = grecaptcha?.getResponse();
        if (recaptchaResponse) {
            formData.append('g-recaptcha-response', recaptchaResponse);
        }
        
        // Submit via AJAX
        fetch(form.action, {
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
                window.location.href = response.url;
                return;
            }
            return response.json().then(data => {
                if (response.ok && data.success) {
                    // Show success with SweetAlert2
                    const title = form.id === 'login-form' ? 'Login Successful!' : 'Registration Successful!';
                    Swal.fire({
                        icon: 'success',
                        title: title,
                        text: data.message || 'Operation completed successfully',
                        confirmButtonColor: '#dc2626',
                        timer: 2000,
                        timerProgressBar: true,
                    }).then(() => {
                        if (data.redirect) {
                            window.location.href = data.redirect;
                        } else {
                            window.location.href = '/';
                        }
                    });
                } else if (data.errors) {
                    // Show errors in modal
                    if (errorDiv && errorList) {
                        errorDiv.classList.remove('hidden');
                        errorList.innerHTML = '';
                        Object.keys(data.errors).forEach(key => {
                            if (Array.isArray(data.errors[key])) {
                                data.errors[key].forEach(error => {
                                    const li = document.createElement('li');
                                    li.textContent = error;
                                    errorList.appendChild(li);
                                });
                            } else {
                                const li = document.createElement('li');
                                li.textContent = data.errors[key];
                                errorList.appendChild(li);
                            }
                        });
                    }
                    submitBtn.disabled = false;
                    submitBtn.textContent = originalText;
                } else {
                    throw new Error('Unexpected response');
                }
            }).catch(() => {
                // If not JSON, might be HTML redirect
                if (response.redirected) {
                    window.location.href = response.url;
                } else {
                    if (errorDiv && errorList) {
                        errorDiv.classList.remove('hidden');
                        errorList.innerHTML = '<li>An error occurred. Please try again.</li>';
                    }
                    submitBtn.disabled = false;
                    submitBtn.textContent = originalText;
                }
            });
        })
        .catch(error => {
            // Network or other errors
            if (errorDiv && errorList) {
                errorDiv.classList.remove('hidden');
                errorList.innerHTML = '<li>An error occurred. Please try again.</li>';
            }
            submitBtn.disabled = false;
            submitBtn.textContent = originalText;
        });
    });

    // Sync name field with username in modal
    const modalUsernameInput = document.getElementById('modal-username');
    const modalNameInput = document.getElementById('modal-name');
    if (modalUsernameInput && modalNameInput) {
        modalUsernameInput.addEventListener('input', function() {
            modalNameInput.value = this.value;
        });
    }

    // Handle register form submission with AJAX
    document.getElementById('register-form')?.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const form = this;
        const submitBtn = form.querySelector('button[type="submit"]');
        const errorDiv = document.getElementById('register-errors');
        const errorList = errorDiv?.querySelector('ul');
        
        // Set name value to username before submit
        const username = document.getElementById('modal-username')?.value;
        const nameField = document.getElementById('modal-name');
        if (nameField && username) {
            nameField.value = username;
        }
        
        // Hide previous errors
        if (errorDiv) {
            errorDiv.classList.add('hidden');
        }
        if (errorList) {
            errorList.innerHTML = '';
        }
        
        // Disable submit button
        const originalText = submitBtn.textContent;
        submitBtn.disabled = true;
        submitBtn.textContent = 'Processing...';
        
        // Get form data
        const formData = new FormData(form);
        
        // Add reCAPTCHA if exists
        const recaptchaResponse = grecaptcha?.getResponse();
        if (recaptchaResponse) {
            formData.append('g-recaptcha-response', recaptchaResponse);
        }
        
        // Submit via AJAX
        fetch(form.action, {
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
                window.location.href = response.url;
                return;
            }
            return response.json().then(data => {
                if (response.ok && data.success) {
                    // Show success with SweetAlert2
                    const title = form.id === 'login-form' ? 'Login Successful!' : 'Registration Successful!';
                    Swal.fire({
                        icon: 'success',
                        title: title,
                        text: data.message || 'Operation completed successfully',
                        confirmButtonColor: '#dc2626',
                        timer: 2000,
                        timerProgressBar: true,
                    }).then(() => {
                        if (data.redirect) {
                            window.location.href = data.redirect;
                        } else {
                            window.location.href = '/';
                        }
                    });
                } else if (data.errors) {
                    // Show errors in modal
                    if (errorDiv && errorList) {
                        errorDiv.classList.remove('hidden');
                        errorList.innerHTML = '';
                        Object.keys(data.errors).forEach(key => {
                            if (Array.isArray(data.errors[key])) {
                                data.errors[key].forEach(error => {
                                    const li = document.createElement('li');
                                    li.textContent = error;
                                    errorList.appendChild(li);
                                });
                            } else {
                                const li = document.createElement('li');
                                li.textContent = data.errors[key];
                                errorList.appendChild(li);
                            }
                        });
                    }
                    submitBtn.disabled = false;
                    submitBtn.textContent = originalText;
                } else {
                    throw new Error('Unexpected response');
                }
            }).catch(() => {
                // If not JSON, might be HTML redirect
                if (response.redirected) {
                    window.location.href = response.url;
                } else {
                    if (errorDiv && errorList) {
                        errorDiv.classList.remove('hidden');
                        errorList.innerHTML = '<li>An error occurred. Please try again.</li>';
                    }
                    submitBtn.disabled = false;
                    submitBtn.textContent = originalText;
                }
            });
        })
        .catch(error => {
            // Network or other errors
            if (errorDiv && errorList) {
                errorDiv.classList.remove('hidden');
                errorList.innerHTML = '<li>An error occurred. Please try again.</li>';
            }
            submitBtn.disabled = false;
            submitBtn.textContent = originalText;
        });
    });

    // Custom Notification Toast Function
    function showNotification(message, type = 'success') {
        const toast = document.getElementById('notification-toast');
        const messageEl = document.getElementById('notification-message');
        const iconEl = document.getElementById('notification-icon');
        const iconSvg = document.getElementById('notification-icon-svg');
        const closeBtn = document.getElementById('notification-close');
        
        if (!toast || !messageEl) return;
        
        // Set message
        messageEl.textContent = message;
        
        // Set icon based on type
        if (type === 'success') {
            iconEl.className = 'flex-shrink-0 w-12 h-12 rounded-full bg-gradient-to-br from-green-600 to-green-700 flex items-center justify-center shadow-lg shadow-green-900/50';
            iconSvg.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>';
        } else if (type === 'error') {
            iconEl.className = 'flex-shrink-0 w-12 h-12 rounded-full bg-gradient-to-br from-red-600 to-red-700 flex items-center justify-center shadow-lg shadow-red-900/50';
            iconSvg.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>';
        } else {
            iconEl.className = 'flex-shrink-0 w-12 h-12 rounded-full bg-gradient-to-br from-red-600 to-red-700 flex items-center justify-center shadow-lg shadow-red-900/50';
            iconSvg.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>';
        }
        
        // Show toast with animation
        toast.classList.remove('hidden');
        toast.style.opacity = '0';
        toast.style.transform = 'translateX(-50%) translateY(-20px)';
        
        setTimeout(() => {
            toast.style.transition = 'all 0.3s ease-out';
            toast.style.opacity = '1';
            toast.style.transform = 'translateX(-50%) translateY(0)';
        }, 10);
        
        // Auto hide after 4 seconds
        const autoHide = setTimeout(() => {
            hideNotification();
        }, 4000);
        
        // Close button handler
        const closeHandler = () => {
            clearTimeout(autoHide);
            hideNotification();
            closeBtn.removeEventListener('click', closeHandler);
        };
        
        closeBtn.addEventListener('click', closeHandler);
    }
    
    function hideNotification() {
        const toast = document.getElementById('notification-toast');
        if (!toast) return;
        
        toast.style.transition = 'all 0.3s ease-in';
        toast.style.opacity = '0';
        toast.style.transform = 'translateX(-50%) translateY(-20px)';
        
        setTimeout(() => {
            toast.classList.add('hidden');
        }, 300);
    }
    
    // Make function globally available
    window.showNotification = showNotification;
    window.hideNotification = hideNotification;
    
    // Show notification on login/register success (from AJAX)
    document.addEventListener('DOMContentLoaded', function() {
        // Check for session flash messages
        @if(session('success'))
            showNotification('{{ session('success') }}', 'success');
        @endif
        
        @if(session('error'))
            showNotification('{{ session('error') }}', 'error');
        @endif
    });
</script>
