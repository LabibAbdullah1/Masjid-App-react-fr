<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransaksiController;


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

    //transaksi keuangan
    Route::get('/transaksi', [TransaksiController::class, 'index']);
    Route::get('/transaksi/create', [TransaksiController::class, 'create']);
    Route::post('/transaksi/{id}/store', [TransaksiController::class, 'store']);
    Route::put('/transaksi/{id}/update', [TransaksiController::class, 'update']);
    Route::delete('/transaksi/{id}/delete', [TransaksiController::class, 'delete']);
})->middleware('admin');


    // Route Khusus untuk umum
Route::middleware(['umum'])->group(function () {
});



require __DIR__.'/auth.php';
