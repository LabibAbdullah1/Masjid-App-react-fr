<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransaksiController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $user = Auth::user();

    if ($user->role === 'admin') {
        return redirect()->route('admin.dashboard');
    } else {
        return redirect()->route('user.dashboard');
    }
})->middleware(['auth', 'verified'])->name('dashboard');

// Dashboard Admin
Route::get('/admin/dashboard', [DashboardController::class, 'admin'])
    ->middleware(['auth', 'role:admin'])
    ->name('admin.dashboard');

// Dashboard User
Route::get('/user/dashboard', [DashboardController::class, 'umum'])
    ->middleware(['auth', 'role:user'])
    ->name('user.dashboard');

    // Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Transaksi untuk admin
Route::middleware(['admin'])->group(function () {
    Route::resource('transaksi', TransaksiController::class);
});

// Transaksi untuk umum
Route::middleware(['umum'])->group(function () {
    Route::get('/beranda', function () {
        return view('beranda');
    });
});



require __DIR__.'/auth.php';
