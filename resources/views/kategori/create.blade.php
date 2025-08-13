@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8 max-w-xl">
        <h1 class="text-3xl font-bold mb-6 text-center text-green-700">
            <i class="fas fa-plus-square mr-2"></i> Tambah Kategori Baru
        </h1>

        <div class="bg-white shadow-lg rounded-lg p-6 border-2 border-green-600">
            <form action="{{ route('kategori.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="nama_kategori" class="block text-gray-700 text-sm font-bold mb-2">Nama Kategori</label>
                    <input type="text" name="nama_kategori" id="nama_kategori"
                        class="shadow appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        required>
                </div>

                <div class="flex items-center justify-between">
                    <a href="{{ route('kategori.index') }}"
                        class="bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded-lg transition duration-300">
                        Batal
                    </a>
                    <button type="submit"
                        class="bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded-lg transition duration-300">
                        <i class="fas fa-save mr-2"></i> Simpan Kategori
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
