@extends('layouts.app')

@section('title', 'Manajemen Anggota')
@section('header-title', 'Manajemen Anggota')

@section('content')

    <!-- Tombol Tambah Anggota -->
    <a href="{{ route('admin.anggota.create') }}"
        class="inline-flex items-center px-4 py-2 mb-4 bg-green-600 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500 focus:bg-green-700 active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150">
        ➕ Tambah Anggota
    </a>

    <!-- Tabel Anggota -->
    <div class="overflow-x-auto rounded-lg shadow-sm fade-in-up">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 text-sm">
            <thead class="bg-green-100 dark:bg-green-700">
                <tr>
                    <th
                        class="px-6 py-3 text-left text-xs font-medium text-green-800 dark:text-green-200 uppercase tracking-wider">
                        No
                    </th>
                    <th
                        class="px-6 py-3 text-left text-xs font-medium text-green-800 dark:text-green-200 uppercase tracking-wider">
                        Nama</th>
                    <th
                        class="px-6 py-3 text-left text-xs font-medium text-green-800 dark:text-green-200 uppercase tracking-wider">
                        Email</th>
                    <th
                        class="px-6 py-3 text-center text-xs font-medium text-green-800 dark:text-green-200 uppercase tracking-wider">
                        Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                @forelse ($umums as $umum)
                    <tr class="hover:bg-green-50 dark:hover:bg-green-900 transition-colors duration-200">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">
                            {{ $loop->iteration }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">
                            {{ $umum->name }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">
                            {{ $umum->email }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap space-x-2 text-center">
                            <a href="{{ route('admin.anggota.edit', $umum->id) }}"
                                class="text-green-600 dark:text-green-400 hover:text-green-800 dark:hover:text-green-500 font-medium transition-colors duration-200">Edit</a>
                            <form action="{{ route('admin.anggota.delete', $umum->id) }}" method="POST" class="inline"
                                onsubmit="return confirm('Yakin ingin menghapus anggota ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="text-red-600 dark:text-red-400 hover:text-red-800 dark:hover:text-red-500 font-medium transition-colors duration-200">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
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
@endsection
