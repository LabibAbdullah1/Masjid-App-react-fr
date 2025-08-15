{{-- resources/views/admin/quote/edit.blade.php --}}
@extends('layouts.app')

@section('title', 'Edit Quote Islami')

@section('content')
    <div class="max-w-4xl mx-auto mt-10 p-6 bg-white shadow-xl rounded-xl border border-gray-200">
        <h2 class="text-2xl font-bold text-green-700 mb-6 flex items-center">
            <svg class="w-7 h-7 mr-2 text-green-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
            </svg>
            Edit Quote Islami
        </h2>

        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-800 rounded-lg">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.quote.update', $quote->id) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            {{-- Isi Quote --}}
            <div>
                <label for="text" class="block font-semibold text-gray-700">Isi Quote</label>
                <textarea name="text" id="text" rows="4"
                    class="w-full mt-1 p-3 border border-gray-300 rounded-lg focus:ring focus:ring-green-200"
                    placeholder="Masukkan kalimat bijak Islami">{{ old('text', $quote->text) }}</textarea>
                @error('text')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Sumber --}}
            <div>
                <label for="source" class="block font-semibold text-gray-700">Sumber</label>
                <input type="text" name="source" id="source" value="{{ old('source', $quote->source) }}"
                    class="w-full mt-1 p-3 border border-gray-300 rounded-lg focus:ring focus:ring-green-200"
                    placeholder="Misal: Al-Qur'an, Hadis, Ulama">
                @error('source')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Tombol --}}
            <div class="flex justify-end space-x-3">
                <a href="{{ route('admin.quote.index') }}"
                    class="px-5 py-2 bg-gray-300 rounded-lg hover:bg-gray-400">Batal</a>
                <button type="submit" class="px-5 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
                    Update Quote
                </button>
            </div>
        </form>
    </div>
@endsection
