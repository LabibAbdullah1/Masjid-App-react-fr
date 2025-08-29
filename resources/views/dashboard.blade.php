@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="card shadow bg-white rounded-lg p-6" data-aos="fade-up">
            <div class="card-body">

                {{-- Header Dashboard --}}
                <div class="bg-green-600 text-white text-center py-8 rounded-lg shadow mb-8 p-6">
                    <h1 class="text-4xl font-bold tracking-wide font-[Amiri]">Dashboard Jamaah</h1>
                    <p class="text-lg mt-2">Assalamualaikum, {{ Auth::user()->name }}! Selamat datang di SIM Masjid.</p>
                </div>

                {{-- Jadwal Sholat --}}
                <div class="border border-green-200 rounded-lg shadow mb-8 p-6 bg-white" data-aos="fade-up"
                    data-aos-delay="400">
                    <div class="bg-green-600 text-white text-center py-6 px-3 rounded mb-6">
                        <h1 class="text-xl font-bold font-[Amiri]">Jadwal Sholat</h1>
                        <p class="text-md">{{ $jadwal['city'] ?? '-' }}, {{ $jadwal['country'] ?? '-' }}</p>
                        <p class="text-sm">
                            {{ $jadwal['date_readable'] ?? '-' }} (Hijriah: {{ $jadwal['hijriah'] ?? '-' }})
                        </p>
                    </div>

                    @if ($jadwal)
                        @php
                            $important = [
                                'Imsak' => 'bg-green-50 text-green-900 border-green-200',
                                'Fajr' => 'bg-blue-50 text-blue-900 border-blue-200',
                                'Sunrise' => 'bg-yellow-50 text-yellow-900 border-yellow-200',
                                'Dhuhr' => 'bg-orange-50 text-orange-900 border-orange-200',
                                'Asr' => 'bg-teal-50 text-teal-900 border-teal-200',
                                'Maghrib' => 'bg-red-50 text-red-900 border-red-200',
                                'Isha' => 'bg-purple-50 text-purple-900 border-purple-200',
                            ];
                        @endphp
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:gird-cols-4 gap-4">
                            @foreach ($important as $name => $style)
                                <div class="rounded-lg shadow p-4 text-center border {{ $style }}">
                                    <h2 class="text-lg font-bold font-sans">{{ $name }}</h2>
                                    <p class="text-2xl font-semibold mt-1">
                                        {{ $jadwal['timings'][$name] ?? '-' }}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center text-red-500 font-semibold mt-6">
                            ❌ Gagal mengambil jadwal sholat
                        </div>
                    @endif
                </div>

                {{-- Inspirasi Harian --}}
                <div class="border border-green-200 rounded-lg shadow p-4 mb-8 bg-white" data-aos="fade-up"
                    data-aos-delay="200">
                    <h2 class="text-xl font-bold text-green-700 font-[Amiri]">📖 Inspirasi Harian</h2>
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
                <div class="border border-green-200 rounded-lg shadow p-4 mb-8 bg-white" data-aos="fade-up"
                    data-aos-delay="200">
                    <h2 class="text-xl font-bold text-green-700">💰 Ringkasan Kas Masjid</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">

                        <!-- Total Pemasukan -->
                        <div x-data="counter({{ $totalPemasukan }})" x-init="start()"
                            class="p-3 bg-green-50 rounded-lg text-center border border-green-200">
                            <span class="block text-sm">Total Pemasukan</span>
                            <span class="text-2xl text-green-500 font-bold">
                                Rp <span x-text="displayCount()"></span>
                            </span>
                        </div>

                        <!-- Total Pengeluaran -->
                        <div x-data="counter({{ $totalPengeluaran }})" x-init="start()"
                            class="p-3 bg-red-50 rounded-lg text-center border border-red-200">
                            <span class="block text-sm">Total Pengeluaran</span>
                            <span class="text-2xl text-red-500 font-bold">
                                Rp <span x-text="displayCount()"></span>
                            </span>
                        </div>

                        <!-- Saldo Saat Ini -->
                        <div x-data="counter({{ $saldo }})" x-init="start()"
                            class="p-3 bg-blue-50 rounded-lg text-center border border-blue-200">
                            <span class="block text-sm">Saldo Saat Ini</span>
                            <span class="text-2xl text-blue-500 font-bold">
                                Rp <span x-text="displayCount()"></span>
                            </span>
                        </div>

                    </div>
                </div>

                {{-- Jadwal Ceramah --}}
                <div class="border border-green-200 rounded-lg shadow p-4 mb-8 bg-white" data-aos="fade-up"
                    data-aos-delay="200">
                    <h2 class="text-xl font-bold text-green-700 font-[Amiri] flex items-center gap-2">
                        🗓 Jadwal Ceramah Bulan Ini
                    </h2>

                    @php
                        $today = \Carbon\Carbon::today();
                        $nextMonth = \Carbon\Carbon::today()->addDays(30);

                        $filteredCeramah = $jadwalCeramah->filter(function ($jadwal) use ($today, $nextMonth) {
                            $tanggal = \Carbon\Carbon::parse($jadwal->tanggal);
                            return $tanggal->between($today, $nextMonth);
                        });
                    @endphp

                    <div class="mt-4 space-y-3">
                        @forelse ($filteredCeramah as $jadwal)
                            <div
                                class="flex items-center justify-between p-4 bg-green-50 rounded-lg border border-green-200 hover:shadow-md transition">

                                <!-- Bagian Tanggal -->
                                <div class="flex-shrink-0 text-center px-3">
                                    <p class="text-2xl font-bold text-green-600 leading-none">
                                        {{ \Carbon\Carbon::parse($jadwal->tanggal)->format('d') }}
                                    </p>
                                    <p class="text-sm text-gray-500">
                                        {{ \Carbon\Carbon::parse($jadwal->tanggal)->format('M') }}
                                    </p>
                                </div>

                                <!-- Bagian Informasi -->
                                <div class="flex-1 ml-4">
                                    <p class="font-semibold text-gray-800">{{ $jadwal->judul }}</p>
                                    <p class="text-sm text-gray-600">Oleh: {{ $jadwal->penceramah }}</p>
                                    <p class="text-sm text-gray-500">
                                        {{ \Carbon\Carbon::parse($jadwal->waktu)->format('H:i') }} WIB
                                    </p>
                                </div>

                                <!-- Bagian Countdown -->
                                <div class="text-center text-sm" x-data="countdown('{{ \Carbon\Carbon::parse($jadwal->tanggal . ' ' . $jadwal->waktu)->format('Y-m-d H:i:s') }}')" x-init="start()">
                                    <p class="text-gray-500">Hitung Mundur</p>
                                    <p class="text-green-700 font-bold" x-text="display"></p>
                                </div>
                            </div>
                        @empty
                            <p class="text-gray-500">Tidak ada jadwal ceramah yang tersedia.</p>
                        @endforelse
                    </div>
                </div>

                {{-- Galeri --}}
                <div class="border border-green-200 rounded-lg shadow p-4 bg-white" data-aos="fade-up" data-aos-delay="200">
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        @forelse ($galeri as $item)
                            <div class="overflow-hidden rounded-lg shadow border border-green-100">
                                <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama }}"
                                    class="w-full h-40 object-cover">
                                <p class="py-1 px-2 text-sm font-semibold">{{ $item->nama }}</p>
                            </div>
                        @empty
                            <p class="text-gray-500">Galeri kosong.</p>
                        @endforelse
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
