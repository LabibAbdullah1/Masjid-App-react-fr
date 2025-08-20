{{-- resources/views/umum/transaksi.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8" data-aos="fade-up">
        {{-- Header --}}
        <h1 class="text-3xl font-bold mb-2 text-center text-green-700">
            <i class="fas fa-money-bill-wave mr-2"></i> Laporan Keuangan Masjid Al-Falah
        </h1>
        <p class="text-gray-600 font-semibold text-center mb-6">
            Informasi transaksi terkini
        </p>

        {{-- Navigasi Kategori --}}
        <nav class="bg-green-600 text-white rounded-t-lg p-4 shadow-lg mb-0">
            <ul class="flex flex-col md:flex-row md:space-x-4 space-y-2 md:space-y-0 items-center justify-center">
                @foreach ($kategoriList as $kategori)
                    @php
                        $currentKategoriId = request()->input('kategori_id');
                        $isActive = $currentKategoriId == $kategori->id;
                        $activeClass = $isActive
                            ? 'bg-yellow-500 text-white'
                            : 'text-white hover:text-yellow-300 hover:bg-green-700';
                    @endphp
                    <li>
                        <a href="{{ route('umum.transaksi', ['kategori_id' => $kategori->id]) }}"
                            class="block px-4 py-2 text-md font-semibold transition duration-300 ease-in-out rounded-lg {{ $activeClass }}">
                            {{ $kategori->nama_kategori }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </nav>

        {{-- Ringkasan Keuangan --}}
        <div class="bg-white shadow-md p-4 rounded-b-lg mb-6 border-2 border-green-600">
            <h2 class="text-lg font-semibold mb-3">Ringkasan {{ $activeKategoriName }}</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div x-data="counter({{ $totalPemasukan }})" x-init="start()" class="p-3 bg-green-100 rounded">
                    {{-- pemasukan --}}
                    <span class="block text-sm text-green-700">Total Pemasukan</span>
                    <span class="text-xl font-bold text-green-800">
                        Rp <span x-text="displayCount()"></span>
                    </span>
                </div>
                {{-- pengeluaran --}}
                <div x-data="counter({{ $totalPengeluaran }})" x-init="start()" class="p-3 bg-red-100 rounded">
                    <span class="block text-sm text-red-700">Total Pengeluaran</span>
                    <span class="text-xl font-bold text-red-800">
                        Rp <span x-text="displayCount()"></span>
                    </span>
                </div>
                {{-- saldo --}}
                <div x-data="counter({{ $saldo }})" x-init="start()" class="p-3 bg-blue-100 rounded">
                    <span class="block text-sm text-blue-700">Saldo</span>
                    <span class="text-xl font-bold text-blue-800">
                        Rp <span x-text="displayCount()"></span>
                    </span>
                </div>
            </div>

            <div class="mt-4">
                <h3 class="font-semibold">Total per Kategori</h3>
                <ul class="list-disc pl-6">
                    @foreach ($totalPerKategori as $totalPerKat)
                        <li>
                            {{ $totalPerKat->kategori ? $totalPerKat->kategori->nama_kategori : 'Tidak Ada Kategori' }}:
                            Rp {{ number_format($totalPerKat->total, 0, ',', '.') }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        {{-- Tabel Data --}}
        <div class="max-w-full bg-white shadow-lg rounded-lg overflow-x-auto border-2 border-green-600" data-aos="fade-up"
            data-aos-delay="200">
            <table class="min-w-full leading-normal">
                <thead class="bg-green-600 text-white">
                    <tr>
                        <th class="px-5 py-3 text-left text-sm font-semibold uppercase tracking-wider">No</th>
                        <th class="px-5 py-3 text-left text-sm font-semibold uppercase tracking-wider">Tanggal</th>
                        <th class="px-5 py-3 text-left text-sm font-semibold uppercase tracking-wider">Jenis</th>
                        <th class="px-5 py-3 text-left text-sm font-semibold uppercase tracking-wider">Jumlah</th>
                        <th class="px-5 py-3 text-left text-sm font-semibold uppercase tracking-wider">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($transaksis as $item)
                        <tr class="hover:bg-green-50 transition duration-150">
                            <td class="px-5 py-5 text-sm">
                                {{ $loop->iteration + ($transaksis->currentPage() - 1) * $transaksis->perPage() }}
                            </td>
                            <td class="px-5 py-5 text-sm">{{ $item->created_at->format('d-m-Y') }}</td>
                            <td class="px-5 py-5 text-sm capitalize">{{ $item->jenis }}</td>
                            <td class="px-5 py-5 text-sm">Rp {{ number_format($item->jumlah, 0, ',', '.') }}</td>
                            <td class="px-5 py-5 text-sm">{{ $item->nama }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-5 py-5 text-center text-gray-500">Tidak ada data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="mt-6">
            {{ $transaksis->withQueryString()->links() }}
        </div>
    </div>
@endsection
