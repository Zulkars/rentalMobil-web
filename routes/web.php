<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\AuthController;

// Jika mengakses path /, arahkan ke /register
Route::get('/', function () {
    return redirect()->route('register');
});

// Register
Route::get('/register', [AuthController::class, 'showRegister'])
    ->name('register');

Route::post('/register', [AuthController::class, 'register'])
    ->name('register.store');

// Login
Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');

// Tes koneksi database
Route::get('/tes-koneksi', function () {
    try {
        DB::connection()->getPdo();
        return "DB berhasil connect!";
    } catch (\Exception $e) {
        return "DB gagal connect: " . $e->getMessage();
    }
})->withoutMiddleware('web');

// Route yang hanya bisa diakses setelah login
Route::middleware(['auth'])->group(function () {

    // Halaman Home
    Route::get('/home', function () {
        return view('welcome');
    })->name('home');

    // Detail mobil
    Route::get('/detail-mobil', function () {
        return view('detailMobil');
    })->name('mobil.detail');

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

    // Route Admin dan Petugas
    Route::middleware(['role:admin,petugas'])->group(function () {

        // Melihat data pelanggan
        Route::get('/pelanggan', [PelangganController::class, 'index'])
            ->name('pelanggan.index');

        // Menambah data pelanggan
        Route::get('/pelanggan/create', [PelangganController::class, 'create'])
            ->name('pelanggan.create');

        Route::post('/pelanggan', [PelangganController::class, 'store'])
            ->name('pelanggan.store');

        // Mengubah data pelanggan
        Route::get('/pelanggan/{id}/edit', [PelangganController::class, 'edit'])
            ->name('pelanggan.edit');

        Route::put('/pelanggan/{id}', [PelangganController::class, 'update'])
            ->name('pelanggan.update');
    });

    // Route khusus Admin
    Route::middleware(['role:admin'])->group(function () {

        // Menghapus data pelanggan
        Route::delete('/pelanggan/{id}', [PelangganController::class, 'destroy'])
            ->name('pelanggan.destroy');
    });
});
