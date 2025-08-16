{{-- resources/views/admin/galeri/create.blade.php --}}
@extends('layouts.app')

@section('title', 'Tambah Galeri')

@section('content')
    <div class="max-w-3xl mx-auto mt-10 p-6 bg-white shadow-lg rounded-xl border border-gray-200">
        <h1 class="text-2xl font-bold mb-6 text-gray-800">Tambah Foto Galeri</h1>

        <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Judul --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Judul</label>
                <input type="text" name="nama" value="{{ old('nama') }}"
                    class="w-full border border-gray-300 p-2 rounded-lg focus:ring focus:ring-blue-200">
                @error('nama')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            {{-- Gambar --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Gambar</label>
                <input type="file" name="gambar"
                    class="w-full border border-gray-300 p-2 rounded-lg focus:ring focus:ring-blue-200">
                @error('gambar')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            {{-- Tombol --}}
            <div class="flex justify-end gap-3">
                <a href="{{ route('admin.galeri.index') }}"
                    class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Batal</a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Simpan</button>
            </div>
        </form>
    </div>
@endsection
