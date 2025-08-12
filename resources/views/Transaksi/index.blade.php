{{-- resources/views/transaksi/index.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 bg-white/50 rounded-lg">

        {{-- Header --}}
        <div class="mb-6 text-center">
            <h1 class="text-3xl font-extrabold mt-2 text-gray-800">Kelola Transaksi</h1>
            <p class="text-gray-600 font-semibold text-md">Pilih kategori di bawah untuk menampilkan data sesuai kebutuhan
            </p>
        </div>
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Daftar Transaksi</h1>
            <a href="{{ route('transaksi.create') }}"
                class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 hover:text-yellow-300 transition ease-in-out duration-100">
                + Tambah Transaksi
            </a>
        </div>

        <nav class="bg-gray-800 text-white rounded-t-lg p-4 shadow-lg">
            <ul class="flex flex-col md:flex-row md:space-x-4 space-y-2 md:space-y-0 items-center justify-center">
                @foreach ($kategoriList as $kategori)
                    @php
                        // Dapatkan ID kategori dari URL
                        $currentKategoriId = request()->input('kategori_id');
                        // Tentukan kelas "active"
                        $isActive = $currentKategoriId == $kategori->id;
                        // Tambahkan kelas CSS untuk state aktif
                        $activeClass = $isActive
                            ? 'bg-green-600 text-white'
                            : 'text-gray-200 hover:text-green-300 hover:bg-gray-700';
                    @endphp
                    <li>
                        <a href="{{ route('transaksi.index', ['kategori_id' => $kategori->id]) }}"
                            class="nav-link block px-4 py-2 text-md font-semibold
                   transition duration-300 ease-in-out rounded-lg
                   focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-75
                   {{ $activeClass }}">
                            {{ $kategori->nama_kategori }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </nav>


        {{-- Tabel Data --}}
        <div class="bg-white shadow-md rounded-b-lg overflow-hidden">
            <div class="bg-white p-4 rounded-lg shadow mb-6">
                <h2 class="text-lg font-semibold mb-3">Ringkasan Keuangan</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="p-3 bg-green-100 rounded">
                        <span class="block text-sm text-green-700">Total Pemasukan</span>
                        <span class="text-xl font-bold text-green-800">
                            Rp {{ number_format($totalPemasukan, 0, ',', '.') }}
                        </span>
                    </div>
                    <div class="p-3 bg-red-100 rounded">
                        <span class="block text-sm text-red-700">Total Pengeluaran</span>
                        <span class="text-xl font-bold text-red-800">
                            Rp {{ number_format($totalPengeluaran, 0, ',', '.') }}
                        </span>
                    </div>
                    <div class="p-3 bg-blue-100 rounded">
                        <span class="block text-sm text-blue-700">Saldo</span>
                        <span class="text-xl font-bold text-blue-800">
                            Rp {{ number_format($saldo, 0, ',', '.') }}
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

            <table class="min-w-full table-auto border-collapse">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 text-left text-gray-600 text-sm">No</th>
                        <th class="px-4 py-2 text-left text-gray-600 text-sm">Tanggal</th>
                        <th class="px-4 py-2 text-left text-gray-600 text-sm">Jenis</th>
                        <th class="px-4 py-2 text-left text-gray-600 text-sm">Jumlah</th>
                        <th class="px-4 py-2 text-left text-gray-600 text-sm">Keterangan</th>
                        <th class="px-4 py-2 text-left text-gray-600 text-sm">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($transaksis as $index => $item)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-2 text-sm">
                                {{ $loop->iteration + ($transaksis->currentPage() - 1) * $transaksis->perPage() }}
                            </td>
                            <td class="px-4 py-2 text-sm">{{ $item->created_at->format('d-m-Y') }}</td>
                            <td class="px-4 py-2 text-sm capitalize">{{ $item->jenis }}</td>
                            <td class="px-4 py-2 text-sm">Rp.{{ number_format($item->jumlah, 0, ',', '.') }}</td>
                            <td class="px-4 py-2 text-sm">{{ $item->nama }}</td>
                            <td class="px-4 py-2 text-sm">
                                <a href="{{ route('transaksi.edit', $item->id) }}"
                                    class="text-blue-500 hover:underline">Edit</a>
                                |
                                <form action="{{ route('transaksi.destroy', $item->id) }}" method="POST" class="inline"
                                    onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-4 text-center text-gray-500">Tidak ada data</td>
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
