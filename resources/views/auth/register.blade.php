<x-guest-layout>
    <div class="w-full sm:max-w-md px-6 py-4 bg-white dark:bg-gray-900 shadow-xl overflow-hidden sm:rounded-lg">
        <div class="flex flex-col items-center justify-center mb-6">
            <h1 class="text-2xl font-bold text-green-700 dark:text-green-500 pt-5">Registrasi Akun</h1>
            <p class="text-sm text-center text-gray-500 dark:text-gray-400">Silahkan registrasi terlebih dahulu untuk
                masuk sebagai
                pengguna</p>
        </div>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4" x-data="{ show: false }">
                <x-input-label for="password" :value="__('Password')" />

                <div class="relative">
                    <x-text-input id="password" class="block mt-1 w-full pr-10"
                        x-bind:type="show ? 'text' : 'password'" name="password" required autocomplete="new-password" />

                    <!-- Tombol Toggle -->
                    <button type="button" @click="show = !show"
                        class="absolute inset-y-0 right-0 px-3 flex items-center text-gray-500 hover:text-green-600">
                        <!-- Mata terbuka -->
                        <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268
                    2.943 9.542 7-1.274 4.057-5.065
                    7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        <!-- Mata tertutup -->
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

            <!-- Confirm Password -->
            <div class="mt-4" x-data="{ show: false }">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <div class="relative">
                    <x-text-input id="password_confirmation" class="block mt-1 w-full pr-10"
                        x-bind:type="show ? 'text' : 'password'" name="password_confirmation" required
                        autocomplete="new-password" />

                    <!-- Tombol Toggle -->
                    <button type="button" @click="show = !show"
                        class="absolute inset-y-0 right-0 px-3 flex items-center text-gray-500 hover:text-green-600">
                        <!-- Mata terbuka -->
                        <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268
                    2.943 9.542 7-1.274 4.057-5.065
                    7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        <!-- Mata tertutup -->
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

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>


            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                    href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="ms-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
