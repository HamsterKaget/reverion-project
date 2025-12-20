<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('pre-css')

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @yield('seo')
</head>
<body class="bg-gray-900 text-white antialiased overflow-x-hidden">
    @include('frontend.components.auth-modals')
    @include('frontend.components.navbar')

    <main class="w-full">
        @yield('body')
    </main>

    @include('frontend.components.footer')

    @yield('pre-js')

    @yield('post-js')
</body>
</html>

