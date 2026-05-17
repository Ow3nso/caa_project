<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased text-gray-900 bg-caa-off-white">
        <div class="flex h-screen overflow-hidden">
            <!-- Sidebar -->
            @auth
                @if(auth()->user()->role === 'admin')
                    @include('layouts.sidebar')
                @endif
            @endauth

            <!-- Main Content Area -->
            <div class="relative flex flex-col flex-1 overflow-y-auto overflow-x-hidden">
                <!-- Header -->
                @include('layouts.header')

                <!-- Page Content -->
                <main class="w-full grow p-6">
                    {{ $slot }}
                </main>
            </div>
        </div>
    </body>
</html>
