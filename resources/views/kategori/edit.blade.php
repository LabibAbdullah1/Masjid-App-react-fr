@extends('layouts.app')

@section('content')
    <div class="container bg-green-50/75 dark:bg-green-900 overflow-hidden shadow-xl sm:rounded-lg border-t-4 border-green-700 border max-w-xl mx-auto"
        data-aos="fade-up">
        <h1 class=" text-center text-3xl font-bold mt-4 text-green-800 dark:text-green-300 tracking-wide"> Edit Kategori
        </h1>

        <div class="p-6 text-gray-900 dark:text-gray-100">
            <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="nama_kategori" class="block font-medium text-green-800 dark:text-green-300">Nama
                        Kategori</label>
                    <input type="text" name="nama_kategori" id="nama_kategori" value="{{ $kategori->nama_kategori }}"
                        class="block mt-1 w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-green-500 focus:ring-green-500"
                        required>
                </div>

                <div class="flex justify-end space-x-3">
                    <a href="{{ route('kategori.index') }}"
                        class="inline-flex items-center px-4 py-2 bg-gray-200 dark:bg-gray-700 rounded-lg font-semibold text-xs text-gray-800 dark:text-gray-200 uppercase tracking-widest hover:bg-gray-300 dark:hover:bg-gray-600">
                        Batal
                    </a>
                    <button type="submit"
                        class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg transition duration-300">
                        Update Kategori
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
