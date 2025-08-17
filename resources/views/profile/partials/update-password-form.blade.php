<section class="bg-white shadow-lg rounded-xl p-6 border-l-4 border-green-600">
    <header class="mb-4">
        <h2 class="text-xl font-bold text-green-700 flex items-center gap-2">
            🔒 {{ __('Perbarui Password') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600">
            {{ __('Pastikan akun Anda menggunakan password yang panjang dan aman.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <!-- Password Saat Ini -->
        <div>
            <x-input-label for="update_password_current_password" :value="__('Password Saat Ini')"
                class="text-green-700 font-semibold" />
            <x-text-input id="update_password_current_password" name="current_password" type="password"
                class="mt-1 block w-full rounded-lg border-green-300 focus:border-green-500 focus:ring-green-500"
                autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2 text-red-600" />
        </div>

        <!-- Password Baru -->
        <div>
            <x-input-label for="update_password_password" :value="__('Password Baru')" class="text-green-700 font-semibold" />
            <x-text-input id="update_password_password" name="password" type="password"
                class="mt-1 block w-full rounded-lg border-green-300 focus:border-green-500 focus:ring-green-500"
                autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2 text-red-600" />
        </div>

        <!-- Konfirmasi Password -->
        <div>
            <x-input-label for="update_password_password_confirmation" :value="__('Konfirmasi Password')"
                class="text-green-700 font-semibold" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password"
                class="mt-1 block w-full rounded-lg border-green-300 focus:border-green-500 focus:ring-green-500"
                autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2 text-red-600" />
        </div>

        <!-- Tombol Simpan -->
        <div class="flex items-center gap-4">
            <x-primary-button class="bg-green-600 hover:bg-green-700 focus:ring-green-500">
                💾 {{ __('Simpan Perubahan') }}
            </x-primary-button>

            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-green-600 font-medium">
                    ✅ {{ __('Password berhasil diperbarui.') }}
                </p>
            @endif
        </div>
    </form>
</section>
