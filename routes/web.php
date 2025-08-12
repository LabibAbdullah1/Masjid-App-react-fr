<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\TransaksiController;
use App\Http\Controllers\Admin\KategoriKeuanganController;


// HALAMAN UTAMA
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

//DASHBOARD perkondisian
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    Route::get('/admin/dashboard', [DashboardController::class, 'admin'])->name('admin.dashboard');
    Route::get('/umum/dashboard', [\App\Http\Controllers\DashboardController::class, 'umum'])->name('umum.dashboard');
});


// Profile untuk Admin dan umum
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route Khusu Admin
Route::middleware(['admin'])->group(function () {


    //kelola anggota
    Route::get('/anggota', [UserController::class, 'index'])->name('admin.anggota.index');
    Route::get('/anggota/create', [UserController::class, 'create'])->name('admin.anggota.create');
    Route::post('/anggota', [UserController::class, 'store'])->name('admin.anggota.store');
    Route::get('/anggota/{id}/edit', [UserController::class, 'edit'])->name('admin.anggota.edit');
    Route::put('/anggota', [UserController::class, 'update'])->name('admin.anggota.update');
    Route::delete('/anggota/{id}/delete', [UserController::class, 'delete'])->name('admin.anggota.delete');

    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
    Route::get('/transaksi/create', [TransaksiController::class, 'create'])->name('transaksi.create');
    Route::post('/transaksi', [TransaksiController::class, 'store'])->name('transaksi.store');
    Route::get('/transaksi/{transaksi}/edit', [TransaksiController::class, 'edit'])->name('transaksi.edit');
    Route::put('/transaksi/{transaksi}', [TransaksiController::class, 'update'])->name('transaksi.update');
    Route::delete('/transaksi/{transaksi}', [TransaksiController::class, 'destroy'])->name('transaksi.destroy');

    Route::resource('kategori', KategoriKeuanganController::class);


})->middleware('admin');


// Route Khusus untuk umum
Route::middleware(['umum'])->group(function () {});



require __DIR__ . '/auth.php';
