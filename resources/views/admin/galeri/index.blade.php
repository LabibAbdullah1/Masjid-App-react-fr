{{-- resources/views/admin/galeri/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Galeri')

@section('content')
    <div class="max-w-7xl mx-auto mt-10 p-6 bg-white shadow-lg rounded-xl border border-gray-200">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-green-700">📸 Galeri Masjid</h1>
            <a href="{{ route('admin.galeri.create') }}"
                class="px-4 py-2 bg-green-600 text-white rounded-lg shadow hover:bg-green-700 transition">
                + Tambah Foto
            </a>
        </div>

        {{-- Flash Message --}}
        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        {{-- Grid Galeri --}}
        @if ($galeri->count())
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($galeri as $item)
                    <div class="bg-white border rounded-xl shadow hover:shadow-lg transition overflow-hidden">
                        <div class="relative">
                            <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama }}"
                                class="w-full h-48 object-cover">
                            <div class="absolute top-2 left-2 bg-green-600 text-white text-xs px-2 py-1 rounded">
                                {{ $loop->iteration + ($galeri->currentPage() - 1) * $galeri->perPage() }}
                            </div>
                        </div>
                        <div class="p-4">
                            <h2 class="text-lg font-semibold text-gray-800 truncate">{{ $item->nama }}</h2>
                            <div class="mt-3 flex justify-between">
                                <a href="{{ route('admin.galeri.edit', $item->id) }}"
                                    class="px-3 py-1 bg-yellow-500 text-white text-sm rounded hover:bg-yellow-600">Edit</a>
                                <form action="{{ route('admin.galeri.destroy', $item->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-3 py-1 bg-red-600 text-white text-sm rounded hover:bg-red-700">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Pagination --}}
            <div class="mt-6">
                {{ $galeri->links() }}
            </div>
        @else
            <p class="text-center text-gray-500 py-10">📭 Tidak ada data galeri.</p>
        @endif
    </div>
@endsection
