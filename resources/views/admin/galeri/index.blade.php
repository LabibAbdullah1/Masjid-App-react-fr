{{-- resources/views/admin/galeri/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Galeri')

@section('content')
    <div class="max-w-7xl mx-auto mt-10 p-6 bg-white shadow-lg rounded-xl border border-gray-200" data-aos="fade-up">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-green-700">📸 Galeri Masjid</h1>
            <a href="{{ route('admin.galeri.create') }}"
                class="px-4 py-2 bg-green-600 text-white rounded-lg shadow hover:bg-green-700 transition">
                + Tambah Foto
            </a>
        </div>

        {{-- Grid Galeri --}}
        <!-- Root div untuk Alpine.js -->
        <div x-data="{ showModal: false, modalImage: '', modalTitle: '' }">

            {{-- Galeri --}}
            @if ($galeri->count())
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 p-6">
                    @foreach ($galeri as $item)
                        <div class="bg-white border rounded-xl shadow hover:shadow-lg transition overflow-hidden">

                            {{-- Gambar --}}
                            <div class="relative w-full">
                                <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama }}"
                                    class="w-full h-auto rounded-t-xl object-contain cursor-pointer"
                                    @click="modalImage='{{ asset('storage/' . $item->gambar) }}'; modalTitle='{{ $item->nama }}'; showModal=true">

                                <div class="absolute top-2 left-2 bg-green-600 text-white text-xs px-2 py-1 rounded">
                                    {{ $loop->iteration + ($galeri->currentPage() - 1) * $galeri->perPage() }}
                                </div>
                            </div>

                            {{-- Nama & Aksi --}}
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
                <div class="mt-6 px-6">
                    {{ $galeri->links() }}
                </div>
            @else
                <p class="text-center text-gray-500 py-10">📭 Tidak ada data galeri.</p>
            @endif

            {{-- Modal Overlay fullscreen --}}
            <div x-show="showModal" class="fixed inset-0 bg-black/0 flex items-center justify-center z-[9999]"
                x-transition.opacity>

                {{-- Konten modal (klik di dalam modal tidak menutup overlay) --}}
                <div class="bg-white rounded-xl shadow-lg max-w-4xl w-full p-4 relative" @click.stop>

                    {{-- Tombol close --}}
                    <button class="absolute top-2 right-2 text-gray-700 hover:text-red-600 text-2xl font-bold"
                        @click="showModal = false">✕</button>

                    {{-- Gambar --}}
                    <img :src="modalImage" :alt="modalTitle"
                        class="w-full max-h-[80vh] object-contain rounded mx-auto">

                    {{-- Judul --}}
                    <h2 class="mt-3 text-center text-lg font-semibold text-gray-800" x-text="modalTitle"></h2>
                </div>
            </div>

        </div>

    </div>
@endsection
