<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    {{-- logo --}}
    <link rel="icon" type="image/png" href="{{ asset('favicon-32x32-logo.png') }}">


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Chakra+Petch:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=K2D:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
        rel="stylesheet" />
    <!-- script -->
    <link rel="stylesheet" href="{{ asset('scss/menu.scss') }}">
    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body class="position-relative">
    <div class="homeContainer">
        <a href="{{ url('http://localhost:8000/') }}">
            <img class="homeIcon" src="duckLogoGoldpng.png" alt="">
        </a>
    </div>
    <main class="">
        @yield('content')
    </main>
    </div>
</body>

</html>
