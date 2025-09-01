{{-- resources/views/admin/jadwal-ceramah/create.blade.php --}}
@extends('layouts.app')

@section('title', 'Tambah Jadwal Ceramah')

@section('content')
    <div class="container bg-green-50/75 dark:bg-green-900 overflow-hidden shadow-xl sm:rounded-lg border-t-4 border-green-700 border max-w-xl mx-auto"
        data-aos="fade-up">
        <div class="p-6 text-gray-900 dark:text-gray-100">
            <h1 class=" text-center text-3xl font-bold mt-4 text-green-800 dark:text-green-300 tracking-wide"> Tambah Jadwal
                Ceramah</h1>
            <form action="{{ route('admin.jadwal-ceramah.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block font-medium text-green-800 dark:text-green-300">Penceramah</label>
                    <input type="text" name="penceramah" value="{{ old('penceramah') }}"
                        class="block mt-1 w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-green-500 focus:ring-green-500">
                </div>
                <div>
                    <label class="block font-medium text-green-800 dark:text-green-300">Tema</label>
                    <input type="text" name="judul" value="{{ old('judul') }}"
                        class="block mt-1 w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-green-500 focus:ring-green-500">
                </div>
                <div>
                    <label class="block font-medium text-green-800 dark:text-green-300">Tanggal</label>
                    <input type="date" name="tanggal" value="{{ old('tanggal') }}"
                        class="block mt-1 w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-green-500 focus:ring-green-500">
                </div>
                <div>
                    <label class="block font-medium text-green-800 dark:text-green-300">Waktu</label>
                    <input type="time" name="waktu" value="{{ old('waktu') }}"
                        class="block mt-1 w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-green-500 focus:ring-green-500">
                </div>

                <div class="flex justify-end gap-3 mt-6">
                    <a href="{{ route('admin.jadwal-ceramah.index') }}"
                        class="inline-flex items-center px-4 py-2 bg-gray-200 dark:bg-gray-700 rounded-lg font-semibold text-xs text-gray-800 dark:text-gray-200 uppercase tracking-widest hover:bg-gray-300 dark:hover:bg-gray-600">Batal</a>
                    <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg shadow hover:bg-green-700">
                        Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
