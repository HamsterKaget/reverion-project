<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @yield('pre-css')

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @yield('seo')
</head>
<body class="bg-gray-900 text-white antialiased">
    @include('frontend.components.navbar')

    <main>
        @yield('body')
    </main>

    @include('frontend.components.footer')

    @yield('pre-js')

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>

    @yield('post-js')
</body>
</html>

