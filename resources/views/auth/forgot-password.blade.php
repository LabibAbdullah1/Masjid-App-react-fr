{{-- resources/views/auth/forgot-password.blade.php --}}
<x-guest-layout>
    <div class="max-w-lg mx-auto bg-white shadow-lg rounded-xl border border-green-200 overflow-hidden" data-aos="fade-up">
        <!-- Header -->
        <div class="bg-gradient-to-r from-green-600 to-green-500 text-white text-center py-6">
            <h1 class="text-2xl font-bold">🕌 Lupa Password?</h1>
            <p class="text-sm text-green-100 mt-1">
                Masukkan email Anda, kami akan kirim link reset password
            </p>
        </div>

        <!-- Body -->
        <div class="p-6">
            <div class="mb-4 text-sm text-gray-600">
                {{ __('Tidak masalah jika Anda lupa password. Kami akan kirimkan link reset ke email yang Anda daftarkan.') }}
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email Address -->
                <div class="mb-4">
                    <x-input-label for="email" :value="__('Email')" class="text-green-700 font-semibold" />
                    <x-text-input id="email"
                        class="block mt-1 w-full border-green-300 focus:border-green-500 focus:ring-green-500 rounded-lg"
                        type="email" name="email" :value="old('email')" required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600" />
                </div>

                <!-- Button -->
                <div class="flex items-center justify-between mt-6">
                    <a href="{{ route('login') }}" class="text-sm text-green-600 hover:underline">
                        ← Kembali ke Login
                    </a>

                    <x-primary-button class="bg-green-600 hover:bg-green-700 focus:ring-green-500 px-6 py-2 rounded-lg">
                        {{ __('Kirim Link Reset') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
