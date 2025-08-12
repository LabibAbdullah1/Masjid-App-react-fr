<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SIM Masjid') }}</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('/favicon1.svg') }}">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(15px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in-up {
            animation: fadeInUp 1s ease-out;
        }

        .parallax {
            background-image: url('{{ asset('images/masjid-bg.jpg') }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
        }
    </style>
</head>

<body
    class="parallax font-sans antialiased min-h-screen
text-gray-800 dark:text-gray-100
selection:bg-emerald-400 selection:text-white
transition-colors duration-500 ease-in-out">

    <div class="min-h-screen flex flex-col">

        {{-- Navigasi --}}
        @include('layouts.navigation')

        {{-- Page Header --}}
        @isset($header)
            <header class="bg-gradient-to-r from-green-700 to-green-500 text-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        {{-- Page Content --}}
        <main class="flex-grow max-w-7xl mx-auto w-full py-6 px-4 sm:px-6 lg:px-8">
            @yield('content')
        </main>

        {{-- Footer --}}
        <footer class="bg-green-700 text-white mt-8">
            <div
                class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row justify-between items-center space-y-2 sm:space-y-0">
                <p class="text-sm">&copy; {{ date('Y') }} SIM Masjid. All rights reserved.</p>
                <p class="text-sm">Dibuat dengan <span class="text-yellow-300">❤</span> untuk memakmurkan masjid</p>
            </div>
        </footer>
    </div>
</body>

</html>
