{{-- resources/views/profile/edit.blade.php --}}
@extends('layouts.guest')

@section('header')
    <div class="flex items-center justify-between">
        <h2 class="font-bold text-2xl text-green-700 leading-tight">
            🕌 {{ __('Profil Akun') }}
        </h2>
        <span class="text-sm text-gray-500 italic">Kelola informasi pribadi Anda</span>
    </div>
@endsection

@section('content')
    <div class="py-12 rounded-lg">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <!-- Update Profile -->
            <div class="p-6 bg-white/50 shadow-lg border-l-4 border-green-600 rounded-xl" data-aos="fade-up">
                <h3 class="text-lg font-semibold text-green-700 mb-4">✏️ Perbarui Informasi Profil</h3>
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Update Password -->
            <div class="p-6 bg-white/50 shadow-lg border-l-4 border-green-600 rounded-xl" data-aos="fade-up"
                data-aos-delay="200">
                <h3 class="text-lg font-semibold text-green-700 mb-4">🔒 Ganti Password</h3>
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Delete Account -->
            <div class="p-6 bg-white shadow-lg border-l-4 border-red-600 rounded-xl" data-aos="fade-up"
                data-aos-delay="400">
                <h3 class="text-lg font-semibold text-red-600 mb-4">⚠️ Hapus Akun</h3>
                <p class="text-sm text-gray-600 mb-3">
                    Menghapus akun akan menghilangkan semua data Anda secara permanen.
                </p>
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </div>
@endsection
