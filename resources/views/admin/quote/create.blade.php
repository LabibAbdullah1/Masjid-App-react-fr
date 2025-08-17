{{-- resources/views/admin/quote/create.blade.php --}}
@extends('layouts.app')

@section('title', 'Tambah Quote Islami')

@section('content')
    <div class="max-w-4xl mx-auto mt-10 p-6 bg-white shadow-xl rounded-xl border border-gray-200" data-aos="fade-up">
        <h2 class="text-2xl font-bold text-green-700 mb-6 flex items-center">
            <svg class="w-7 h-7 mr-2 text-green-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-3-3v6m9-3a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            Tambah Quote Islami
        </h2>

        {{-- Error Message --}}
        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-800 rounded-lg">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form --}}
        <form action="{{ route('admin.quote.store') }}" method="POST" class="space-y-5">
            @csrf

            {{-- Isi Quote --}}
            <div>
                <label for="isi" class="block font-semibold text-gray-700">Isi Quote</label>
                <textarea name="isi" id="isi" rows="4"
                    class="w-full mt-1 p-3 border border-gray-300 rounded-lg focus:ring focus:ring-green-200"
                    placeholder="Masukkan kalimat bijak Islami" required>{{ old('isi') }}</textarea>
                @error('isi')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Penulis / Sumber --}}
            <div>
                <label for="penulis" class="block font-semibold text-gray-700">Sumber / Penulis</label>
                <input type="text" name="penulis" id="penulis" value="{{ old('penulis') }}"
                    class="w-full mt-1 p-3 border border-gray-300 rounded-lg focus:ring focus:ring-green-200"
                    placeholder="Misal: Al-Qur'an, Hadis, Ulama">
                @error('penulis')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Tombol --}}
            <div class="flex justify-end space-x-3">
                <a href="{{ route('admin.quote.index') }}"
                    class="px-5 py-2 bg-gray-300 rounded-lg hover:bg-gray-400">Batal</a>
                <button type="submit" class="px-5 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
                    Simpan Quote
                </button>
            </div>
        </form>
    </div>
@endsection
