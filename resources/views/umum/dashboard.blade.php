@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="card shadow bg-white rounded-lg p-6">
            <div class="card-body">
                <h1 class="text-3xl font-extrabold text-gray-800">Dashboard Jamaah</h1>
                <p class="text-lg text-gray-600 mt-2">Assalamualaikum, {{ Auth::user()->name }}! Selamat datang di SIM
                    Masjid.</p>
                <hr class="my-4 border-gray-300">
            </div>

            {{-- Jadwal Sholat --}}
            <div class="bg-gray-100 rounded-lg p-4 mb-6 shadow-sm">
                <h2 class="text-xl font-bold text-gray-700">Jadwal Sholat Hari Ini</h2>
                <div id="prayer-times" class="grid grid-cols-2 md:grid-cols-5 gap-4 mt-4 text-center">
                    {{-- Data jadwal sholat akan diisi oleh JavaScript --}}
                    <div class="p-3 bg-white rounded shadow">
                        <p class="font-semibold text-gray-600">Subuh</p>
                        <p class="text-2xl font-bold text-blue-700" id="fajr">--:--</p>
                    </div>
                    <div class="p-3 bg-white rounded shadow">
                        <p class="font-semibold text-gray-600">Dzuhur</p>
                        <p class="text-2xl font-bold text-blue-700" id="dhuhr">--:--</p>
                    </div>
                    <div class="p-3 bg-white rounded shadow">
                        <p class="font-semibold text-gray-600">Ashar</p>
                        <p class="text-2xl font-bold text-blue-700" id="asr">--:--</p>
                    </div>
                    <div class="p-3 bg-white rounded shadow">
                        <p class="font-semibold text-gray-600">Maghrib</p>
                        <p class="text-2xl font-bold text-blue-700" id="maghrib">--:--</p>
                    </div>
                    <div class="p-3 bg-white rounded shadow">
                        <p class="font-semibold text-gray-600">Isya</p>
                        <p class="text-2xl font-bold text-blue-700" id="isha">--:--</p>
                    </div>
                </div>
            </div>

            {{-- Kutipan Al-Qur'an & Hadits (Dapat Dikelola Admin) --}}
            <div class="bg-gray-100 rounded-lg p-4 mb-6 shadow-sm">
                <h2 class="text-xl font-bold text-gray-700">Inspirasi Harian</h2>
                @if ($quote)
                    <blockquote class="italic text-gray-600 mt-2 border-l-4 border-green-500 pl-4">
                        <p class="text-lg">{{ $quote->text }}</p>
                        <footer class="mt-2 text-sm font-semibold text-gray-500">{{ $quote->source }}</footer>
                    </blockquote>
                @else
                    <p class="text-gray-500 mt-2">Tidak ada kutipan yang tersedia saat ini.</p>
                @endif
            </div>

            {{-- Ringkasan Kas Masjid --}}
            <div class="bg-green-600 text-white rounded-lg p-4 mb-6 shadow-md">
                <h2 class="text-xl font-bold">Ringkasan Kas Masjid</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
                    <div class="p-3 bg-white bg-opacity-20 rounded-lg text-center">
                        <span class="block text-sm">Total Pemasukan</span>
                        <span class="text-2xl font-bold">Rp {{ number_format($totalPemasukan, 0, ',', '.') }}</span>
                    </div>
                    <div class="p-3 bg-white bg-opacity-20 rounded-lg text-center">
                        <span class="block text-sm">Total Pengeluaran</span>
                        <span class="text-2xl font-bold">Rp {{ number_format($totalPengeluaran, 0, ',', '.') }}</span>
                    </div>
                    <div class="p-3 bg-white bg-opacity-20 rounded-lg text-center">
                        <span class="block text-sm">Saldo Saat Ini</span>
                        <span class="text-2xl font-bold">Rp {{ number_format($saldo, 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>

            {{-- Jadwal Ceramah Bulanan --}}
            <div class="bg-gray-100 rounded-lg p-4 mb-6 shadow-sm">
                <h2 class="text-xl font-bold text-gray-700">Jadwal Ceramah Bulan Ini</h2>
                <div class="mt-4">
                    @forelse ($jadwalCeramah as $jadwal)
                        <div class="flex items-center space-x-4 p-3 mb-2 bg-white rounded shadow-sm">
                            <div class="flex-shrink-0 text-center">
                                <p class="text-xl font-bold text-green-600">
                                    {{ \Carbon\Carbon::parse($jadwal->tanggal)->format('d') }}</p>
                                <p class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($jadwal->tanggal)->format('M') }}
                                </p>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800">{{ $jadwal->judul }}</p>
                                <p class="text-sm text-gray-600">Oleh: {{ $jadwal->penceramah }}</p>
                                <p class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($jadwal->waktu)->format('H:i') }}
                                    WIB</p>
                            </div>
                        </div>
                    @empty
                        <p class="text-gray-500">Tidak ada jadwal ceramah yang tersedia.</p>
                    @endforelse
                </div>
            </div>

            {{-- Galeri --}}
            <div class="bg-gray-100 rounded-lg p-4 shadow-sm">
                {{-- <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold text-gray-700">Galeri Foto</h2>
                    <a href="{{ route('galeri.index') }}" class="text-blue-600 hover:text-blue-800 font-semibold">Lihat
                        Semua →</a>
                </div> --}}
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    @forelse ($galeri as $item)
                        <div class="overflow-hidden rounded-lg shadow-md">
                            <img src="{{ asset('storage/' . $item->path) }}" alt="{{ $item->nama }}"
                                class="w-full h-40 object-cover">
                        </div>
                    @empty
                        <p class="text-gray-500">Galeri kosong.</p>
                    @endforelse
                </div>
            </div>

        </div>
    </div>
@endsection
