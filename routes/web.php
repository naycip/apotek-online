<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    UserController, ObatController, AdminController, KasirController,
    JenisObatController, MetodeBayarController, DistributorController,
    PelangganController, PenjualanController, PembelianController,
    JenisKirimController, ProfileController, DashboardController
};
use App\Http\Controllers\Auth\AuthenticatedSessionController;

// 1. FRONTEND
Route::get('/', function () { return view('fe.index'); })->name('home');

// 2. AUTH (Guest)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
});

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth')->name('logout');

// 3. SEMUA HALAMAN ADMIN (Harus Login)
Route::middleware(['auth'])->group(function () {
    
    // Halaman Utama Admin
    Route::get('/admin', [DashboardController::class, 'index'])->name('be.admin');

    // Profile Settings
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // --- PEMBAGIAN ROLE ---

    // KHUSUS ADMIN: Hanya Kelola User
    Route::middleware(['role:admin'])->group(function () {
        Route::resource('user', UserController::class);
    });

    // KHUSUS KASIR, PEMILIK, ADMIN: Penjualan & Pelanggan
    Route::middleware(['role:kasir,pemilik,admin'])->group(function () {
        Route::get('/kasir/dashboard', [KasirController::class, 'index'])->name('kasir.dashboard');
        Route::post('/penjualan/{id}/approve', [PenjualanController::class, 'approve'])->name('penjualan.approve');
        Route::post('/penjualan/{id}/cancel', [PenjualanController::class, 'cancel'])->name('penjualan.cancel');
        Route::resource('penjualan', PenjualanController::class);
        Route::resource('pelanggan', PelangganController::class);
    });

    // KHUSUS KASIR, PEMILIK, ADMIN: Metode Bayar
    Route::middleware(['role:kasir,pemilik,admin'])->group(function () {
        Route::resource('metodebayar', MetodeBayarController::class);
    });

    // KHUSUS APOTEKER / KARYAWAN / ADMIN: Kelola Obat
    Route::middleware(['role:apoteker,karyawan,admin'])->group(function () {
        Route::resource('obat', ObatController::class);
        Route::resource('jenisobat', JenisObatController::class);
        Route::resource('distributor', DistributorController::class);
    });

    // KHUSUS PEMILIK & ADMIN: Laporan & Pengiriman
    Route::middleware(['role:pemilik,admin'])->group(function () {
        Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::resource('pembelian', PembelianController::class);
        Route::resource('jenispengiriman', JenisKirimController::class);
    });
}); // Tutup Middleware Auth Utama