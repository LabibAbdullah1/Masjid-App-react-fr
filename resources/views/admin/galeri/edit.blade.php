{{-- resources/views/admin/galeri/edit.blade.php --}}
@extends('layouts.app')

@section('title', 'Edit Galeri')

@section('content')
    <div class="max-w-3xl mx-auto mt-10 p-6 bg-white shadow-lg rounded-xl border border-gray-200" data-aos="fade-up">
        <h1 class="text-2xl font-bold mb-6 text-gray-800">Edit Foto Galeri</h1>

        <form action="{{ route('galeri.update', $galeri->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Judul --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Judul</label>
                <input type="text" name="judul" value="{{ old('judul', $galeri->judul) }}"
                    class="w-full border border-gray-300 p-2 rounded-lg focus:ring focus:ring-blue-200">
                @error('judul')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            {{-- Gambar --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Gambar</label>
                <input type="file" name="gambar"
                    class="w-full border border-gray-300 p-2 rounded-lg focus:ring focus:ring-blue-200">
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $galeri->gambar) }}" alt="{{ $galeri->judul }}"
                        class="w-32 h-32 object-cover rounded">
                </div>
                @error('gambar')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            {{-- Deskripsi --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Deskripsi</label>
                <textarea name="deskripsi" rows="4"
                    class="w-full border border-gray-300 p-2 rounded-lg focus:ring focus:ring-blue-200">{{ old('deskripsi', $galeri->deskripsi) }}</textarea>
                @error('deskripsi')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            {{-- Tombol --}}
            <div class="flex justify-end gap-3">
                <a href="{{ route('galeri.index') }}"
                    class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Batal</a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Update</button>
            </div>
        </form>
    </div>
@endsection
