<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>

    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
    <link rel="manifest" href="site.webmanifest">
    <link rel="mask-icon" href="safari-pinned-tab.svg" color="#7843E9">
    <meta name="msapplication-TileColor" content="#7843E9">
    <meta name="theme-color" content="#7843E9">
    <title>@yield('title', config('app.name'))</title>

    @vite('resources/js/app.js')

    <link rel="stylesheet" href="compiled/css/app.css">
    <script src="compiled/js/app.js"></script>
</head>
<body>
<main class="bg-darkblue text-white md:min-h-screen md:flex md:items-center md:justify-center py-16 lg:py-20">
    <div class="container">
        @include('shared.logo-auth')
        @yield('content')
    </div>
</main>
</body>
</html>
