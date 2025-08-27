@extends('layouts.app')

@section('title', 'Balas Pesan Saran')

@section('content')
    <div class="max-w-3xl mx-auto mt-10 bg-white p-6 rounded-lg shadow" data-aos="fade-up">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Balas Pesan Saran</h2>

        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" x-transition>
            @if (session('success'))
                <div class="mb-4 p-4 rounded-lg bg-green-100 text-green-800 border border-green-300">
                    ✅ {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="mb-4 p-4 rounded-lg bg-red-100 text-red-800 border border-red-300">
                    ❌ {{ session('error') }}
                </div>
            @endif
        </div>

        <div class="mb-6 p-4 border rounded bg-gray-50">
            <p class="text-gray-700"><strong>Pengirim:</strong> {{ $pesan->user->name }}</p>
            <p class="text-gray-700 mt-2"><strong>Pesan:</strong> {{ $pesan->pesan }}</p>
            <p class="text-xs text-gray-500 mt-1">
                Dikirim pada: {{ $pesan->created_at->format('d M Y H:i') }}
            </p>
        </div>

        <form action="{{ route('admin.pesan.update', $pesan->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="balasan_admin" class="block text-gray-700 font-medium">Balasan Admin</label>
                <textarea name="feedback" id="balasan_admin" rows="4"
                    class="w-full mt-1 border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500">{{ old('feedback', $pesan->feedback) }}</textarea>
                @error('feedback')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end gap-3">
                <a href="{{ route('admin.pesan.index') }}"
                    class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300">
                    Batal
                </a>
                <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
                    Simpan Balasan
                </button>
            </div>
        </form>
    </div>
@endsection
