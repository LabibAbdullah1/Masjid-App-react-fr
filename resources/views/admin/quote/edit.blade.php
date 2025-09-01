{{-- resources/views/admin/quote/edit.blade.php --}}
@extends('layouts.app')

@section('title', 'Edit Quote Islami')

@section('content')
    <div class="container bg-green-50/75 dark:bg-green-900 overflow-hidden shadow-xl sm:rounded-lg border-t-4 border-green-700 border max-w-xl mx-auto"
        data-aos="fade-up">
        <h2 class=" text-center text-3xl font-bold mt-4 text-green-800 dark:text-green-300 tracking-wide">
            Edit Quote Islami
        </h2>
        <div class="p-6 text-gray-900 dark:text-gray-100">
            <form action="{{ route('admin.quote.update', $quote->id) }}" method="POST" class="space-y-5">
                @csrf
                @method('PUT')

                {{-- Isi Quote --}}
                <div>
                    <label for="text" class="block font-medium text-green-800 dark:text-green-300">Isi
                        Quote</label>
                    <textarea name="text" id="text" rows="4"
                        class="block mt-1 w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-green-500 focus:ring-green-500"
                        placeholder="Masukkan kalimat bijak Islami">{{ old('text', $quote->text) }}</textarea>
                    @error('text')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Sumber --}}
                <div>
                    <label for="source" class="block font-medium text-green-800 dark:text-green-300">Sumber</label>
                    <input type="text" name="source" id="source" value="{{ old('source', $quote->source) }}"
                        class="block mt-1 w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-green-500 focus:ring-green-500"
                        placeholder="Misal: Al-Qur'an, Hadis, Ulama">
                    @error('source')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Tombol --}}
                <div class="flex justify-end space-x-3">
                    <a href="{{ route('admin.quote.index') }}"
                        class="inline-flex items-center px-4 py-2 bg-gray-200 dark:bg-gray-700 rounded-lg font-semibold text-xs text-gray-800 dark:text-gray-200 uppercase tracking-widest hover:bg-gray-300 dark:hover:bg-gray-600">Batal</a>
                    <button type="submit" class="px-5 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
                        Update Quote
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
