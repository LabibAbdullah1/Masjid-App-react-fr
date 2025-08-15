<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\QuoteController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\JadwalSholatController;
use App\Http\Controllers\Admin\TransaksiController;
use App\Http\Controllers\Umum\UmumDashboardController;
use App\Http\Controllers\Admin\JadwalCeramahController;
use App\Http\Controllers\Admin\KategoriKeuanganController;


// HALAMAN UTAMA APP
Route::get('/', function () {
    return view('welcome');
});

//RUTE LOGIN & REGISTER
Route::get('/login', function () {
    return view('auth', ['form' => 'login']);
})->name('login');

Route::get('/register', function () {
    return view('auth', ['form' => 'register']);
})->name('register');

// DASHBOARD Perkondisian
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
});


    // Profile untuk Admin dan umum
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

    // ----------------- //
    // Route Khusu Admin
    // ----------------- //
Route::middleware(['auth', 'admin'])->group(function () {

    //kelola anggota
    Route::get('/anggota', [UserController::class, 'index'])->name('admin.anggota.index');
    Route::get('/anggota/create', [UserController::class, 'create'])->name('admin.anggota.create');
    Route::post('/anggota', [UserController::class, 'store'])->name('admin.anggota.store');
    Route::get('/anggota/{id}/edit', [UserController::class, 'edit'])->name('admin.anggota.edit');
    Route::put('/anggota', [UserController::class, 'update'])->name('admin.anggota.update');
    Route::delete('/anggota/{id}/delete', [UserController::class, 'delete'])->name('admin.anggota.delete');

    //Kelelo Keuangan
    Route::get('/admin/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
    Route::get('/transaksi/create', [TransaksiController::class, 'create'])->name('transaksi.create');
    Route::post('/admin/transaksi', [TransaksiController::class, 'store'])->name('transaksi.store');
    Route::get('/transaksi/{transaksi}/edit', [TransaksiController::class, 'edit'])->name('transaksi.edit');
    Route::put('/transaksi/{transaksi}', [TransaksiController::class, 'update'])->name('transaksi.update');
    Route::delete('/transaksi/{transaksi}', [TransaksiController::class, 'destroy'])->name('transaksi.destroy');

    //kelola kategori
    Route::resource('kategori', KategoriKeuanganController::class);

    //kelola galeri
    Route::resource('galeri', GaleriController::class);

    //kelola quote
    Route::get('quote', [QuoteController::class, 'index'])->name('admin.quote.index');
    Route::get('quote/create', [QuoteController::class, 'create'])->name('admin.quote.create');
    Route::post('quote', [QuoteController::class, 'store'])->name('admin.quote.store');
    Route::get('quote/{quote}/edit', [QuoteController::class, 'edit'])->name('admin.quote.edit');
    Route::put('quote/{quote}', [QuoteController::class, 'update'])->name('admin.quote.update');
    Route::delete('quote/{quote}', [QuoteController::class, 'destroy'])->name('admin.quote.destroy');


    //kelola jadwal ceramah
    Route::resource('jadwal-ceramah', JadwalCeramahController::class);
})->middleware('admin');

// ----------------- //
// route khusus umum
// ----------------- //
//transaksi leyer
Route::get('/transaksi', [TransaksiController::class, 'umumindex'])->name('umum.transaksi');

//jadwal sholat layer
Route::get('/dashboard', [JadwalSholatController::class, 'umumDashboard'])->name('umum.dashboard');

// dashboar layer
Route::get('/dashboard', [UmumDashboardController::class, 'index'])->name('dashboard');


require __DIR__ . '/auth.php';
