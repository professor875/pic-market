<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased">
<div class="h-screen w-full flex">
    <div class="h-full w-full flex justify-center items-center">
        <div class="px-8 flex flex-col items-center w-[450px]">
            <x-application-logo class="w-1/2"/>
            {{ $slot }}
        </div>
    </div>
    <div class="h-full w-full hidden lg:block bg-center bg-cover"
         style="background-image: url({{ asset('/images/auth/elephent.jpg') }})">
    </div>
</div>
</body>
</html>
