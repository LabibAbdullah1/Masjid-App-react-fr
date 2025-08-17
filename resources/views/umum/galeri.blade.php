{{-- resources/views/galeri/public.blade.php --}}
@extends('layouts.app')

@section('title', 'Galeri Masjid')

@section('content')
    <div class="max-w-7xl mx-auto mt-10 p-4" x-data="{ showModal: false, modalImage: '', modalTitle: '' } data-aos="fade-up"">
        <h1 class="text-3xl font-bold text-center text-green-700 mb-8">📸 Galeri Masjid</h1>

        @if ($galeri->count())
            {{-- Masonry Grid --}}
            <div class="columns-1 sm:columns-2 md:columns-3 lg:columns-4 gap-4 space-y-4">
                @foreach ($galeri as $item)
                    <div class="break-inside-avoid rounded-xl overflow-hidden shadow hover:shadow-lg bg-white cursor-pointer"
                        @click="showModal = true; modalImage='{{ asset('storage/' . $item->gambar) }}'; modalTitle='{{ $item->nama }}'">
                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama }}"
                            class="w-full object-cover transition">
                        <div class="p-3">
                            <h2 class="text-center text-gray-800 font-semibold">{{ $item->nama }}</h2>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-center text-gray-500 py-10">📭 Belum ada foto di galeri.</p>
        @endif

        {{-- Modal Overlay --}}
        <div x-show="showModal" class="fixed inset-0 bg-black/70 flex items-center justify-center z-50" x-transition
            @click="showModal = false"> {{-- Klik overlay = close --}}

            {{-- Konten modal (kliknya tidak menutup) --}}
            <div class="bg-white rounded-xl shadow-lg max-w-3xl w-full p-4 relative" @click.stop> {{-- stop = klik di dalam modal tidak menutup --}}

                <button class="absolute top-2 right-2 text-gray-700 hover:text-red-600"
                    @click="showModal = false">✕</button>

                <img :src="modalImage" :alt="modalTitle" class="w-full max-h-[80vh] object-contain rounded">

                <h2 class="mt-3 text-center text-lg font-semibold text-gray-800" x-text="modalTitle"></h2>
            </div>
        </div>
    </div>
@endsection
