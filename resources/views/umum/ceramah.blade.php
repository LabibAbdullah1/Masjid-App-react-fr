{{-- resources/views/umum/ceramah.blade.php --}}
@extends('layouts.app')

@section('title', 'Jadwal Ceramah')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <!-- Judul -->
        <h1 class="text-3xl font-bold mb-6 text-center text-green-700">
            🕌 Jadwal Ceramah Masjid
        </h1>

        <div class="space-y-6">
            @forelse ($jadwal as $jad)
                <div
                    class="bg-white shadow-lg rounded-xl border border-green-600 p-6 flex flex-col sm:flex-row sm:items-center justify-between">

                    <!-- Info Ceramah -->
                    <div>
                        <h2 class="text-xl font-bold text-green-700">{{ $jad->judul }}</h2>
                        <p class="text-gray-700 mt-1">
                            <span class="font-semibold">Penceramah:</span> {{ $jad->penceramah }}
                        </p>
                        <p class="text-gray-700">
                            <span class="font-semibold">Tanggal:</span>
                            {{ \Carbon\Carbon::parse($jad->tanggal)->translatedFormat('l, d F Y') }}
                        </p>
                        <p class="text-gray-700">
                            <span class="font-semibold">Waktu:</span>
                            {{ \Carbon\Carbon::parse($jad->waktu)->format('H:i') }} WIB
                        </p>
                        <p class="text-gray-700">
                            <span class="font-semibold">Lokasi:</span>
                            Masjid Al-Falah Pekanbaru
                        </p>
                    </div>

                    <!-- Countdown -->
                    <div class="text-center text-sm" x-data="countdown('{{ \Carbon\Carbon::parse($jad->tanggal . ' ' . $jad->waktu)->format('Y-m-d H:i:s') }}')" x-init="start()">
                        <p class="text-gray-500">Hitung Mundur</p>
                        <p class="text-green-700 font-bold" x-text="display"></p>
                    </div>
                </div>
        </div>
    @empty
        <div class="text-center text-gray-500">
            Belum ada jadwal ceramah yang tersedia.
        </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $jadwal->links() }}
    </div>
    </div>


@endsection
