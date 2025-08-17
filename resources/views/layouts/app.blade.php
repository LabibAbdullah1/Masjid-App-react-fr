<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SIM Masjid') }}</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('/favicon1.svg') }}">

    {{-- style and javascript --}}
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <script src="https://unpkg.com/alpinejs" defer></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-cover bg-center bg-fixed bg-no-repeat"
    style="background-image: url('{{ asset('images/masjid-bg.jpg') }}'); font-sans antialiased min-h-screen text-gray-800 dark:text-gray-100 selection:bg-emerald-400 selection:text-white
    transition-colors duration-500 ease-in-out">

    <div class="min-h-screen flex flex-col">

        {{-- Sidebar & Navigation --}}
        @include('layouts.navigation')

        {{-- Wrapper Konten --}}
        <div class="flex flex-col flex-1 sm:ml-64 mt-16 sm:mt-0">
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
                    class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8 sm:pl-[calc(1rem+16rem)] flex flex-col sm:flex-row justify-between items-center space-y-2 sm:space-y-0">
                    <p class="text-sm">&copy; {{ date('Y') }} SIM Masjid. All rights reserved.</p>
                    <p class="text-sm">Dibuat dengan <span class="text-yellow-300">❤</span> untuk memakmurkan masjid</p>
                </div>
            </footer>

        </div>
    </div>
</body>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('countdown', (target) => ({
            targetDate: new Date(target).getTime(),
            display: '',
            start() {
                this.update();
                setInterval(() => this.update(), 1000);
            },
            update() {
                const now = new Date().getTime();
                const distance = this.targetDate - now;

                if (distance <= 0) {
                    this.display = 'Selesai';
                    return;
                }

                const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                this.display =
                    (days > 0 ? days + 'h ' : '') +
                    hours + 'j ' +
                    minutes + 'm ' +
                    seconds + 'd';
            }
        }))
    })
</script>



</html>
