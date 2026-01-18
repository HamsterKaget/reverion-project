<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Google Site Verification -->
    <meta name="google-site-verification" content="ehK0ITEoL3DBQLUCbpW-o-jrornbjKLxlboPBocXPBA" />

    <!-- Default SEO Meta Tags -->
    @php
        $defaultTitle = 'Reverion - Best Dragon Nest Private Server 2026';
        $defaultDescription = 'Join Reverion Dragon Nest private server with enhanced features, balanced PvP, custom rates, and exclusive content. Download the client and start your epic adventure today!';
        $defaultKeywords = 'Dragon Nest, Dragon Nest private server, Reverion, private server, MMORPG, online game, Dragon Nest download, Dragon Nest top up, gaming community';
        $siteUrl = config('app.url');
        $currentUrl = url()->current();
    @endphp

    <title>@yield('title', $defaultTitle)</title>
    <meta name="description" content="@yield('description', $defaultDescription)">
    <meta name="keywords" content="@yield('keywords', $defaultKeywords)">
    <meta name="author" content="Reverion Dragon Nest">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ $currentUrl }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ $currentUrl }}">
    <meta property="og:title" content="@yield('og:title', $defaultTitle)">
    <meta property="og:description" content="@yield('og:description', $defaultDescription)">
    <meta property="og:image" content="@yield('og:image', asset('assets/reverion_logo.png'))">
    <meta property="og:site_name" content="Reverion Dragon Nest">
    <meta property="og:locale" content="en_US">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ $currentUrl }}">
    <meta name="twitter:title" content="@yield('twitter:title', $defaultTitle)">
    <meta name="twitter:description" content="@yield('twitter:description', $defaultDescription)">
    <meta name="twitter:image" content="@yield('twitter:image', asset('assets/reverion_logo.png'))">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets/reverion_logo.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('assets/reverion_logo.png') }}">
    <link rel="shortcut icon" href="{{ asset('assets/reverion_logo.png') }}">

    <!-- Theme Color -->
    <meta name="theme-color" content="#DC2626">

    @yield('pre-css')

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @yield('seo')
</head>
<body class="bg-gray-900 text-white antialiased overflow-x-hidden">
    @include('frontend.components.auth-modals')
    @include('frontend.components.navbar')

    <!-- Custom Notification Toast -->
    <div id="notification-toast" class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-[100] hidden">
        <div class="relative backdrop-blur-xl bg-gradient-to-br from-black/90 via-red-950/80 to-black/90 border-2 border-red-500/40 rounded-2xl shadow-2xl shadow-red-900/30 overflow-hidden min-w-[320px] max-w-md">
            <div class="absolute inset-0 bg-gradient-to-br from-red-600/10 via-transparent to-transparent pointer-events-none"></div>
            <div class="absolute -inset-1 bg-gradient-to-r from-red-600/20 to-transparent blur-xl opacity-50"></div>

            <div class="relative z-10 p-5 flex items-center gap-4">
                <div id="notification-icon" class="flex-shrink-0 w-12 h-12 rounded-full bg-gradient-to-br from-red-600 to-red-700 flex items-center justify-center shadow-lg shadow-red-900/50">
                    <svg id="notification-icon-svg" class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <div class="flex-1">
                    <p id="notification-message" class="text-white font-semibold text-sm"></p>
                </div>
                <button type="button" id="notification-close" class="flex-shrink-0 text-gray-400 hover:text-red-400 hover:bg-red-500/10 rounded-lg p-1.5 transition-all">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <main class="w-full">
        @yield('body')
    </main>

    @include('frontend.components.footer')

    @yield('pre-js')

    @yield('post-js')
</body>
</html>

