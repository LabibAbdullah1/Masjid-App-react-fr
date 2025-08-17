<section class="space-y-6">
    <header>
        <h2 class="text-lg font-bold text-green-800">
            {{ __('Hapus Akun') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Setelah akun Anda dihapus, semua data terkait akan hilang secara permanen. Pastikan Anda menyimpan data penting sebelum melanjutkan.') }}
        </p>
    </header>

    <!-- Tombol Hapus -->
    <x-danger-button type="button" x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="bg-red-600 hover:bg-red-700 text-white font-bold px-4 py-2 rounded-lg shadow">
        {{ __('Hapus Akun') }}
    </x-danger-button>

    <!-- Modal Konfirmasi -->
    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="POST" action="{{ route('profile.destroy') }}" class="p-6 bg-white rounded-lg shadow-lg">
            @csrf
            @method('delete')

            <h2 class="text-lg font-bold text-red-600">
                {{ __('Apakah Anda yakin ingin menghapus akun?') }}
            </h2>

            <p class="mt-2 text-sm text-gray-700">
                {{ __('Semua data akan dihapus secara permanen. Masukkan kata sandi Anda untuk mengonfirmasi.') }}
            </p>

            <div class="mt-4">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />
                <x-text-input id="password" name="password" type="password"
                    class="mt-1 block w-full border-green-300 focus:ring-green-500 focus:border-green-500 rounded-lg"
                    placeholder="{{ __('Password') }}" />
                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end space-x-3">
                <!-- Tombol Batal -->
                <x-secondary-button type="button" x-on:click.prevent="$dispatch('close', 'confirm-user-deletion')"
                    class="bg-gray-200 hover:bg-gray-300 text-gray-800 rounded-lg px-4 py-2">
                    {{ __('Batal') }}
                </x-secondary-button>

                <!-- Tombol Hapus -->
                <x-danger-button type="submit"
                    class="bg-red-600 hover:bg-red-700 text-white font-bold px-4 py-2 rounded-lg shadow">
                    {{ __('Hapus Akun') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
