@extends('layouts.app')

@section('title', 'Manajemen Anggota')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6 text-center text-green-700">
            <i class="fas fa-users mr-2"></i> Manajemen Anggota
        </h1>

        <div class="flex justify-end mb-4">
            <a href="{{ route('admin.anggota.create') }}"
                class="bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-300">
                + Tambah Anggota
            </a>
        </div>

        <div class="bg-white shadow-lg rounded-lg overflow-x-auto max-w-full border-2 border-green-600">
            <table class="min-w-full leading-normal">
                <thead class="bg-green-600 text-white">
                    <tr>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 text-left text-sm font-semibold uppercase tracking-wider">
                            No
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 text-left text-sm font-semibold uppercase tracking-wider">
                            Nama
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 text-left text-sm font-semibold uppercase tracking-wider">
                            Email
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 text-center text-sm font-semibold uppercase tracking-wider">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($umums as $umum)
                        <tr class="hover:bg-green-50 transition duration-150">
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                {{ $loop->iteration + ($umums->currentPage() - 1) * $umums->perPage() }}
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                {{ $umum->name }}
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                {{ $umum->email }}
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                <div class="flex justify-center space-x-2">
                                    <a href="{{ route('admin.anggota.edit', $umum->id) }}"
                                        class="text-yellow-600 hover:text-yellow-800 transition duration-150">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.anggota.delete', $umum->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus anggota ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-red-600 hover:text-red-800 transition duration-150">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-5 py-5 text-center text-gray-500">
                                Belum ada anggota yang terdaftar.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $umums->links() }}
        </div>
    </div>
@endsection
