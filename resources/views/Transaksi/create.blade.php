{{-- resources/views/transaksi/create.blade.php --}}
@extends('layouts.app')

@section('title', 'Tambah Transaksi Masjid')

@section('content')
    <div class="max-w-4xl mx-auto mt-10 p-6 bg-white shadow-xl rounded-xl border border-gray-200">
        <h2 class="text-2xl font-bold text-green-700 mb-6 flex items-center">
            <svg class="w-7 h-7 mr-2 text-green-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h4l3-7 4 14 3-7h4"></path>
            </svg>
            Tambah Transaksi Masjid
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

        <form action="{{ route('transaksi.store') }}" method="POST" class="space-y-5">
            @csrf

            {{-- Tanggal --}}
            <div>
                <label for="tanggal" class="block font-semibold text-gray-700">Tanggal</label>
                <input type="date" name="tanggal" id="tanggal"
                    class="w-full mt-1 p-3 border border-gray-300 rounded-lg focus:ring focus:ring-green-200"
                    value="{{ old('tanggal') }}" **required**>
                @error('tanggal')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Kategori Keuangan --}}
            <div>
                <label for="kategori_keuangan_id" class="block font-semibold text-gray-700">Kategori Keuangan</label>
                <select name="kategori_id" id="kategori_id"
                    class="w-full mt-1 p-3 border border-gray-300 rounded-lg focus:ring focus:ring-green-200" required>
                    <option value="">Pilih Kategori Keuangan</option>
                    @foreach ($kategoriKeuangan as $kategori)
                        <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                    @endforeach
                </select>
                @error('kategori_keuangan_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Jenis Transaksi --}}
            <div>
                <label for="jenis" class="block font-semibold text-gray-700">Jenis Transaksi</label>
                <select name="jenis" id="jenis"
                    class="w-full mt-1 p-3 border border-gray-300 rounded-lg focus:ring focus:ring-green-200" **required**>
                    <option value="">-- Pilih Jenis --</option>
                    <option value="Pemasukan" {{ old('jenis') == 'Pemasukan' ? 'selected' : '' }}>Pemasukan</option>
                    <option value="Pengeluaran" {{ old('jenis') == 'Pengeluaran' ? 'selected' : '' }}>Pengeluaran</option>
                </select>
                @error('jenis')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Jumlah --}}
            <div>
                <label for="jumlah" class="block font-semibold text-gray-700">Jumlah (Rp)</label>
                <input type="number" name="jumlah" id="jumlah" step="1000" min="0"
                    class="w-full mt-1 p-3 border border-gray-300 rounded-lg focus:ring focus:ring-green-200"
                    value="{{ old('jumlah') }}" **required**>
                @error('jumlah')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Keterangan --}}
            <div>
                <label for="keterangan" class="block font-semibold text-gray-700">Keterangan</label>
                <textarea name="keterangan" id="keterangan" rows="3"
                    class="w-full mt-1 p-3 border border-gray-300 rounded-lg focus:ring focus:ring-green-200" **required**>{{ old('keterangan') }}</textarea>
                @error('keterangan')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Tombol Submit --}}
            <div class="flex justify-end space-x-3">
                <a href="{{ route('transaksi.index') }}"
                    class="px-5 py-2 bg-gray-300 rounded-lg hover:bg-gray-400">Batal</a>
                <button type="submit" class="px-5 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
                    Simpan Transaksi
                </button>
            </div>
        </form>
    </div>
@endsection
