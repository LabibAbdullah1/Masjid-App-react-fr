<x-guest-layout>
    {{-- Container utama dengan latar belakang dan bayangan --}}
    <div class="w-full sm:max-w-md px-6 py-4 bg-white dark:bg-gray-900 shadow-xl overflow-hidden rounded-lg"
        data-aos="fade-up">

        {{-- Header dengan logo masjid dan judul --}}
        <div class="flex flex-col items-center justify-center mb-6">
            <h1 class="text-2xl font-bold text-green-700 dark:text-green-500 pt-5">Selamat Datang</h1>
            <p class="text-sm text-gray-500 dark:text-gray-400">Masuk untuk mendapatkan informasi seputar masjid</p>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email"
                    class="block mt-1 w-full rounded-md shadow-sm focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50"
                    type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4" x-data="{ show: false }">
                <x-input-label for="password" :value="__('Password')" />

                <div class="relative">
                    <x-text-input id="password"
                        class="block mt-1 w-full rounded-md shadow-sm focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50 pr-10"
                        x-bind:type="show ? 'text' : 'password'" name="password" required
                        autocomplete="current-password" />

                    <!-- Tombol Toggle -->
                    <button type="button" @click="show = !show"
                        class="absolute inset-y-0 right-0 px-3 flex items-center text-gray-500 hover:text-green-600">
                        <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065
                    7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        <svg x-show="show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478
                    0-8.27-2.944-9.543-7a10.05 10.05 0 012.29-3.568m4.105-2.914A9.956
                    9.956 0 0112 5c4.478 0 8.27 2.944
                    9.543 7a10.056 10.056 0 01-4.132
                    5.411M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 3l18 18" />
                        </svg>
                    </button>
                </div>

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>


            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="rounded border-gray-300 text-green-600 shadow-sm focus:ring-green-500 focus:rounded"
                        name="remember">
                    <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-between mt-4">
                <a class="underline text-sm text-green-600 hover:text-green-900 rounded-md focus:outline-none"
                    href="{{ route('register') }}">
                    {{ __('Belum punya akun?') }}
                </a>
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-green-600 hover:text-green-900 rounded-md focus:outline-none"
                        href="{{ route('password.request') }}">
                        {{ __('Lupa password?') }}
                    </a>
                @endif

                <x-primary-button
                    class="ms-3 bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full transition duration-300 ease-in-out">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
