@extends('layouts.app')

@section('title', 'Pesan & Saran')

@section('content')
    <div class="mx-auto px-4 py-8" data-aos="fade-up">
        <!-- Judul -->
        <h1 class="text-3xl font-bold mb-6 text-center text-green-700">
            Pesan dan Saran
        </h1>
        <p class=" text-center">Berikan Kritik dan Saran kepada Kami Untuk menjadi pelayanan Masjid yang lebih baik</p>
    </div>
    <div class="max-w-2xl mx-auto mt-10 bg-white p-6 rounded-lg shadow">

        {{-- Notifikasi sukses / error --}}
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

        {{-- pesan untuk umum --}}
        @if ($pesanAktif->count())
            @foreach ($pesanAktif as $pesan)
                <div class="mb-6 p-4 border rounded-lg bg-gray-50">
                    <p class="text-gray-700">
                        <strong>Pesan Anda:</strong> {{ $pesan->pesan }}
                    </p>

                    @if ($pesan->feedback)
                        <div class="mt-3 p-3 bg-green-50 border border-green-200 rounded">
                            <p class="text-sm text-gray-600"><strong>Balasan Admin:</strong></p>
                            <p class="text-gray-800">{{ $pesan->feedback }}</p>
                            <p class="text-xs text-gray-500 mt-1">
                                Dibalas pada: {{ optional($pesan->dibalas_pada)->format('d M Y H:i') }}
                            </p>
                        </div>
                    @else
                        <p class="text-sm text-gray-500 mt-2 italic">Menunggu balasan dari admin...</p>
                    @endif

                    {{-- Tombol hapus pesan --}}
                    <form action="{{ route('umum.pesan.destroy', $pesan->id) }}" method="POST" class="mt-3">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin ingin menghapus pesan ini?')"
                            class="text-red-600 hover:text-red-800 text-sm font-medium">
                            Hapus Pesan
                        </button>
                    </form>
                </div>
            @endforeach
        @else
            <p class="text-gray-500 italic">Belum ada pesan yang Anda kirim.</p>
        @endif


        {{-- Form buat kirim pesan baru --}}
        <form action="{{ route('umum.pesan.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="pesan" class="block text-gray-700 font-medium">Tulis Pesan / Saran</label>
                <textarea name="pesan" id="pesan" rows="4"
                    class="w-full mt-1 border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500">{{ old('pesan') }}</textarea>
                @error('pesan')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                Kirim Pesan
            </button>
        </form>
    </div>
@endsection
