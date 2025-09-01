@extends('layouts.app')

@section('title', 'Tambah Anggota Baru')
@section('header-title', 'Tambah Anggota Baru')

@section('content')
    <div class="max-w-2xl mx-auto" data-aos="fade-up">
        {{-- Pesan Sukses --}}
        @if (session('success'))
            <div
                class="mb-6 p-4 bg-green-100 dark:bg-green-900 border border-green-300 dark:border-green-700 text-green-800 dark:text-green-200 rounded-lg shadow-sm">
                {{ session('success') }}
            </div>
        @endif


        <div
            class="bg-green-50/75 dark:bg-green-900 overflow-hidden shadow-xl sm:rounded-lg border-t-4 border-green-700 border">


            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="text-center py-8 ">
                    <!-- Judul Form -->
                    <h2 class="text-3xl font-bold mt-4 text-green-800 dark:text-green-300 tracking-wide">
                        Form Registrasi Anggota
                    </h2>

                    <!-- Deskripsi Singkat -->
                    <p class="text-gray-700 dark:text-gray-300 text-sm mt-2 max-w-md mx-auto">
                        Bismillahirrahmanirrahim.
                        Silakan lengkapi data berikut untuk menambahkan anggota baru dalam sistem Masjid.
                    </p>
                </div>
                <form method="POST" action="{{ route('admin.anggota.store') }}" class="space-y-6">
                    @csrf

                    <!-- Input Nama -->
                    <div>
                        <label for="name" class="block font-medium text-green-800 dark:text-green-300">Nama
                            Lengkap</label>
                        <input type="text" name="name" id="name"
                            class="block mt-1 w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-green-500 focus:ring-green-500"
                            value="{{ old('name') }}" required autofocus>
                        @error('name')
                            <div class="mt-2 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Input Email -->
                    <div>
                        <label for="email" class="block font-medium text-green-800 dark:text-green-300">Email</label>
                        <input type="email" name="email" id="email"
                            class="block mt-1 w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-green-500 focus:ring-green-500"
                            value="{{ old('email') }}" required>
                        @error('email')
                            <div class="mt-2 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Input Password -->
                    <div>
                        <label for="password" class="block font-medium text-green-800 dark:text-green-300">Password</label>
                        <input type="password" name="password" id="password"
                            class="block mt-1 w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-green-500 focus:ring-green-500"
                            required>
                        @error('password')
                            <div class="mt-2 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Input Konfirmasi Password -->
                    <div>
                        <label for="password_confirmation"
                            class="block font-medium text-green-800 dark:text-green-300">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="block mt-1 w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-green-500 focus:ring-green-500"
                            required>
                        @error('password_confirmation')
                            <div class="mt-2 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Tombol -->
                    <div class="flex items-center justify-end gap-3">
                        <a href="{{ route('admin.anggota.index') }}"
                            class="inline-flex items-center px-4 py-2 bg-gray-200 dark:bg-gray-700 rounded-lg font-semibold text-xs text-gray-800 dark:text-gray-200 uppercase tracking-widest hover:bg-gray-300 dark:hover:bg-gray-600">
                            Batal
                        </a>
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-green-700 text-white rounded-lg font-semibold text-xs uppercase tracking-widest hover:bg-green-600 focus:bg-green-800 focus:outline-none focus:ring-2 focus:ring-green-500">
                            Simpan Anggota
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
