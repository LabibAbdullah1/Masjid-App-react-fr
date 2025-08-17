{{-- resources/views/auth/verify-email.blade.php --}}
<x-guest-layout>
    <div class="max-w-lg mx-auto bg-white shadow-lg rounded-xl border border-green-200 overflow-hidden"
        data-aos="fade-up">
        <!-- Header -->
        <div class="bg-gradient-to-r from-green-600 to-green-500 text-white text-center py-6">
            <h1 class="text-2xl font-bold">🕌 Verifikasi Email</h1>
            <p class="text-sm text-green-100 mt-1">
                Terima kasih telah mendaftar! Silakan verifikasi email Anda untuk melanjutkan
            </p>
        </div>

        <!-- Body -->
        <div class="p-6">
            <div class="mb-4 text-sm text-gray-700">
                {{ __('Sebelum memulai, harap verifikasi alamat email Anda dengan mengklik link yang sudah kami kirimkan. Jika belum menerima, Anda bisa meminta link baru.') }}
            </div>

            @if (session('status') == 'verification-link-sent')
                <div
                    class="mb-4 font-medium text-sm text-green-700 bg-green-100 border border-green-300 rounded-lg px-4 py-2">
                    {{ __('Link verifikasi baru telah dikirim ke alamat email yang Anda daftarkan.') }}
                </div>
            @endif

            <!-- Actions -->
            <div class="mt-4 flex items-center justify-between">
                <!-- Resend Email -->
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <x-primary-button class="bg-green-600 hover:bg-green-700 focus:ring-green-500 px-4 py-2 rounded-lg">
                        {{ __('Kirim Ulang Email Verifikasi') }}
                    </x-primary-button>
                </form>

                <!-- Logout -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-sm text-red-600 hover:text-red-800 font-semibold underline">
                        {{ __('Keluar') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
