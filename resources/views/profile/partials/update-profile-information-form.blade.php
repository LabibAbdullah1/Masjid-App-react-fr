<section class="bg-white shadow-lg rounded-xl p-6 border-l-4 border-green-600">
    <header class="mb-4">
        <h2 class="text-xl font-bold text-green-700 flex items-center gap-2">
            🕌 {{ __('Informasi Profil') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600">
            {{ __('Perbarui informasi akun dan alamat email Anda.') }}
        </p>
    </header>

    {{-- Form Kirim Verifikasi --}}
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    {{-- Form Update Profil --}}
    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <!-- Nama -->
        <div>
            <x-input-label for="name" :value="__('Nama Lengkap')" class="text-green-700 font-semibold" />
            <x-text-input id="name" name="name" type="text"
                class="mt-1 block w-full rounded-lg border-green-300 focus:border-green-500 focus:ring-green-500"
                :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2 text-red-600" :messages="$errors->get('name')" />
        </div>

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="text-green-700 font-semibold" />
            <x-text-input id="email" name="email" type="email"
                class="mt-1 block w-full rounded-lg border-green-300 focus:border-green-500 focus:ring-green-500"
                :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2 text-red-600" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div class="mt-2 p-3 bg-yellow-50 border border-yellow-200 rounded-lg">
                    <p class="text-sm text-yellow-700">
                        📩 {{ __('Email Anda belum diverifikasi.') }}

                        <button form="send-verification"
                            class="ml-1 underline text-sm font-medium text-green-700 hover:text-green-900">
                            {{ __('Kirim ulang email verifikasi.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            ✅ {{ __('Link verifikasi baru telah dikirim ke email Anda.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <!-- Tombol Simpan -->
        <div class="flex items-center gap-4">
            <x-primary-button class="bg-green-600 hover:bg-green-700 focus:ring-green-500">
                💾 {{ __('Simpan Perubahan') }}
            </x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-green-600 font-medium">
                    ✅ {{ __('Tersimpan.') }}
                </p>
            @endif
        </div>
    </form>
</section>
