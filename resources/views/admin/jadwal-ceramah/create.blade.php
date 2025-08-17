{{-- resources/views/admin/jadwal-ceramah/create.blade.php --}}
@extends('layouts.app')

@section('title', 'Tambah Jadwal Ceramah')

@section('content')
    <div class="max-w-3xl mx-auto mt-8" data-aos="fade-up">
        <div class="bg-white shadow-xl rounded-xl p-6 border border-green-200">
            <h1 class="text-2xl font-bold text-green-800 mb-6">➕ Tambah Jadwal Ceramah</h1>

            @if ($errors->any())
                <div class="mb-4 p-3 bg-red-100 text-red-800 rounded">
                    <ul class="list-disc pl-6">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.jadwal-ceramah.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block font-medium text-gray-700">Penceramah</label>
                    <input type="text" name="penceramah" value="{{ old('penceramah') }}"
                        class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-green-400">
                </div>
                <div>
                    <label class="block font-medium text-gray-700">Tema</label>
                    <input type="text" name="judul" value="{{ old('judul') }}"
                        class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-green-400">
                </div>
                <div>
                    <label class="block font-medium text-gray-700">Tanggal</label>
                    <input type="date" name="tanggal" value="{{ old('tanggal') }}"
                        class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-green-400">
                </div>
                <div>
                    <label class="block font-medium text-gray-700">Waktu</label>
                    <input type="time" name="waktu" value="{{ old('waktu') }}"
                        class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-green-400">
                </div>

                <div class="flex justify-end gap-3 mt-6">
                    <a href="{{ route('admin.jadwal-ceramah.index') }}"
                        class="px-4 py-2 bg-gray-400 text-white rounded-lg shadow hover:bg-gray-500">⬅️ Batal</a>
                    <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg shadow hover:bg-green-700">💾
                        Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
