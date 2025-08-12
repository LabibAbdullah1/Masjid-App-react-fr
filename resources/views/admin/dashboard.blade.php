@extends('layouts.app')
@section('title', 'Admin Dasboard')
@section('content')
    <div class="card shadow">
        <div class="card-body">
            <h1 class="text-success fw-bold">Dashboard Admin</h1>
            <p>Selamat datang, {{ Auth::user()->name }}! Anda masuk sebagai <b>Admin</b>.</p>
            <hr>
            <div class="row">
                <div class="col-md-4">
                    <div class="p-3 bg-success text-white rounded shadow-sm">
                        <h5>Data Jamaah</h5>
                        <p>Kelola data jamaah masjid.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-3 bg-warning text-dark rounded shadow-sm">
                        <h5>Kegiatan</h5>
                        <p>Kelola kegiatan masjid.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-3 bg-primary text-white rounded shadow-sm">
                        <h5>Laporan Keuangan</h5>
                        <p>Kelola kas dan laporan masjid.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
