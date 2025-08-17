{{-- resources/views/auth/confirm-password.blade.php --}}
<x-guest-layout>
    <div class="max-w-lg mx-auto bg-white shadow-lg rounded-xl border border-green-200 overflow-hidden" data-aos="fade-up">
        <!-- Header -->
        <div class="bg-gradient-to-r from-green-600 to-green-500 text-white text-center py-6">
            <h1 class="text-2xl font-bold">🕌 Konfirmasi Password</h1>
            <p class="text-sm text-green-100 mt-1">
                Demi keamanan, silakan masukkan kembali password Anda
            </p>
        </div>

        <!-- Body -->
        <div class="p-6">
            <div class="mb-4 text-sm text-gray-600">
                {{ __('Ini adalah area aman dari aplikasi. Mohon konfirmasi password Anda sebelum melanjutkan.') }}
            </div>

            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <!-- Password -->
                <div class="mb-4">
                    <x-input-label for="password" :value="__('Password')" class="text-green-700 font-semibold" />
                    <x-text-input id="password"
                        class="block mt-1 w-full border-green-300 focus:border-green-500 focus:ring-green-500 rounded-lg"
                        type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600" />
                </div>

                <!-- Button -->
                <div class="flex justify-between items-center mt-6">
                    <a href="{{ route('dashboard') }}" class="text-sm text-green-600 hover:underline">
                        ← Kembali
                    </a>
                    <x-primary-button class="bg-green-600 hover:bg-green-700 focus:ring-green-500 px-6 py-2 rounded-lg">
                        {{ __('Konfirmasi') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
