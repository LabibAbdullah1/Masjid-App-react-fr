@extends('layouts.app')

@section('content')
    <div class="card shadow">
        <div class="card-body">
            <h1 class="text-primary fw-bold">Dashboard Jamaah</h1>
            <p>Assalamualaikum, {{ Auth::user()->name }}! Selamat datang di SIM Masjid.</p>
            <hr>
            <ul>
                <li>Lihat jadwal kegiatan masjid</li>
                <li>Membaca pengumuman terbaru</li>
                <li>Melihat laporan kas masjid</li>
            </ul>
        </div>
    </div>
@endsection
