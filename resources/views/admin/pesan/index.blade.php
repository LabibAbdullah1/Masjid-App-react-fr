@extends('layouts.app')

@section('title', 'Pesan & Saran Masuk')

@section('content')
    <div class="max-w-5xl mx-auto mt-10 bg-white p-6 rounded-lg shadow">
        <h2 class="text-3xl font-semibold text-gray-800 mb-4 text-center">Daftar Pesan & Saran</h2>

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

        <table class="w-full border-collapse border border-gray-200">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="border px-3 py-2">Pengirim</th>
                    <th class="border px-3 py-2">Pesan</th>
                    <th class="border px-3 py-2">Balasan</th>
                    <th class="border px-3 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pesanSaran as $pesan)
                    <tr>
                        <td class="border px-3 py-2">{{ $pesan->user->name }}</td>
                        <td class="border px-3 py-2 break-words max-h-64 overflow-y-auto first-letter:uppercase">
                            {{ $pesan->pesan }}</td>
                        <td class="border px-3 py-2 break-words max-h-64 overflow-y-auto first-letter:uppercase">
                            @if ($pesan->feedback)
                                <span class="text-green-600">{{ $pesan->feedback }}</span>
                                <br>
                                <small class="text-gray-500">Dibalas
                                    pada:{{ $pesan->dibalas_pada->format('d M Y H:i') }}</small>
                            @else
                                <span class="text-red-500">Belum dibalas</span>
                            @endif
                        </td>
                        <td class="border px-3 py-2">
                            <a href="{{ route('admin.pesan.edit', $pesan->id) }}"
                                class="text-blue-600 hover:underline">Balas</a>
                            <form action="{{ route('admin.pesan.destroy', $pesan->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline"
                                    onclick="return confirm('Yakin hapus pesan ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-4">Belum ada pesan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-4">
            {{ $pesanSaran->links() }}
        </div>
    </div>
@endsection
