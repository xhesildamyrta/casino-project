<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script defer src="https://unpkg.com/alpinejs@3.2.4/dist/cdn.min.js"></script>

    @vite('resources/css/app.css')

</head>

<body class="antialiased">
    @yield('content')
</body>

</html>
