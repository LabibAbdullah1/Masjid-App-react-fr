@extends('layouts.app')

@section('title', 'Edit Data Anggota')

@section('content')
    <div class="max-w-2xl mx-auto">
        <!-- Alert jika validasi gagal -->
        @if ($errors->any())
            <div
                class="mb-6 p-4 bg-red-50 dark:bg-red-900 border border-red-200 dark:border-red-800 text-red-700 dark:text-red-200 rounded-lg shadow-sm">
                <p class="font-semibold mb-1">Terjadi kesalahan:</p>
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div
            class="bg-green-50/75 dark:bg-green-900 overflow-hidden shadow-xl sm:rounded-lg border-t-4 border-green-700 border fade-in-up">
            <div class="p-6 text-gray-900 dark:text-gray-100">

                <!-- Header -->
                <div class="text-center py-8 ">
                    <h2 class="text-3xl font-bold text-green-800 dark:text-green-300">
                        🕌 Edit Data Anggota
                    </h2>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Perbarui informasi anggota jamaah masjid
                    </p>
                </div>


                <form action="{{ route('admin.anggota.update', $umums->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Nama -->
                    <div>
                        <x-input-label for="name" :value="__('Nama Lengkap')" class="dark:text-gray-200" />
                        <x-text-input type="text" name="name" id="name"
                            class="block mt-1 w-full dark:bg-gray-700 dark:text-gray-100 dark:border-gray-600 focus:border-green-500 focus:ring-green-500 transition-colors duration-300"
                            value="{{ old('name', $umums->name) }}" placeholder="Masukkan nama Baru" required autofocus
                            autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email -->
                    <div>
                        <x-input-label for="email" :value="__('Alamat Email')" class="dark:text-gray-200" />
                        <x-text-input type="email" name="email" id="email"
                            class="block mt-1 w-full dark:bg-gray-700 dark:text-gray-100 dark:border-gray-600 focus:border-green-500 focus:ring-green-500 transition-colors duration-300"
                            value="{{ old('email', $umums->email) }}" placeholder="Email Baru" required
                            autocomplete="email" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password Baru -->
                    <div>
                        <x-input-label for="password" :value="__('Password Baru (Kosongkan jika tidak diubah)')" class="dark:text-gray-200" />
                        <x-text-input type="password" name="password" id="password"
                            class="block mt-1 w-full dark:bg-gray-700 dark:text-gray-100 dark:border-gray-600 focus:border-green-500 focus:ring-green-500 transition-colors duration-300"
                            placeholder="Minimal 6 karakter" autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Tombol -->
                    <div class="flex items-center justify-end gap-3 pt-4">
                        <a href="{{ route('admin.anggota.index') }}"
                            class="inline-flex items-center px-4 py-2 bg-gray-200 dark:bg-gray-700 rounded-lg font-semibold text-xs text-gray-800 dark:text-gray-200 uppercase tracking-widest hover:bg-gray-300 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-green-500">
                            Batal
                        </a>
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg font-semibold text-xs uppercase tracking-widest shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
