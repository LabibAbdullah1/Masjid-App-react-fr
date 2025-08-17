{{-- resources/views/auth/reset-password.blade.php --}}
<x-guest-layout>
    <div class="max-w-lg mx-auto bg-white shadow-lg rounded-xl border border-green-200 overflow-hidden" data-aos="fade-up">
        <!-- Header -->
        <div class="bg-gradient-to-r from-green-600 to-green-500 text-white text-center py-6">
            <h1 class="text-2xl font-bold">🔑 Reset Password</h1>
            <p class="text-sm text-green-100 mt-1">Masukkan password baru Anda untuk melanjutkan</p>
        </div>

        <!-- Form -->
        <form method="POST" action="{{ route('password.store') }}" class="p-6">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div class="mb-4">
                <x-input-label for="email" :value="__('Email')" class="text-green-700 font-semibold" />
                <x-text-input id="email"
                    class="block mt-1 w-full border-green-300 focus:border-green-500 focus:ring-green-500 rounded-lg"
                    type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600" />
            </div>

            <!-- Password -->
            <div class="mb-4">
                <x-input-label for="password" :value="__('Password Baru')" class="text-green-700 font-semibold" />
                <x-text-input id="password"
                    class="block mt-1 w-full border-green-300 focus:border-green-500 focus:ring-green-500 rounded-lg"
                    type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600" />
            </div>

            <!-- Confirm Password -->
            <div class="mb-4">
                <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" class="text-green-700 font-semibold" />
                <x-text-input id="password_confirmation"
                    class="block mt-1 w-full border-green-300 focus:border-green-500 focus:ring-green-500 rounded-lg"
                    type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-600" />
            </div>

            <!-- Button -->
            <div class="flex items-center justify-between mt-6">
                <a href="{{ route('login') }}" class="text-sm text-green-600 hover:underline">
                    ← Kembali ke Login
                </a>

                <x-primary-button class="bg-green-600 hover:bg-green-700 focus:ring-green-500 px-6 py-2 rounded-lg">
                    {{ __('Reset Password') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
