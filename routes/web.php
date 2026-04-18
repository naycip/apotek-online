<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    UserController, ObatController, AdminController, KasirController,
    JenisObatController, MetodeBayarController, DistributorController,
    PelangganController, PenjualanController, PembelianController,
    JenisKirimController, ProfileController, DashboardController
};
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\PelangganAuthController;
use App\Http\Controllers\CustomerPortalController;

// 1. FRONTEND
Route::get('/', function () { 
    $obats = App\Models\Obat::where('stok', '>', 0)->get();
    return view('fe.index', compact('obats')); 
})->name('home');

// 2. AUTH (Guest)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
});

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth')->name('logout');

// 2b. AUTH Pelanggan (Guest)
Route::middleware('guest:pelanggan')->group(function () {
    Route::get('/pelanggan/login', [PelangganAuthController::class, 'showLoginForm'])->name('pelanggan.login');
    Route::post('/pelanggan/login', [PelangganAuthController::class, 'login']);
    Route::get('/pelanggan/register', [PelangganAuthController::class, 'showRegisterForm'])->name('pelanggan.register');
    Route::post('/pelanggan/register', [PelangganAuthController::class, 'register']);
});

Route::post('/pelanggan/logout', [PelangganAuthController::class, 'logout'])->name('pelanggan.logout');

// 2c. Dashboard Pelanggan & E-Commerce (Harus Login sebagai Pelanggan)
Route::get('/katalog', [CustomerPortalController::class, 'katalog'])->name('pelanggan.katalog');

Route::middleware('auth:pelanggan')->group(function () {
    Route::get('/pelanggan/dashboard', [CustomerPortalController::class, 'dashboard'])->name('pelanggan.dashboard');
    Route::post('/pelanggan/keranjang/tambah/{id_obat}', [CustomerPortalController::class, 'tambahKeranjang'])->name('pelanggan.tambah_keranjang');
    Route::get('/pelanggan/keranjang', [CustomerPortalController::class, 'keranjang'])->name('pelanggan.keranjang');
    Route::delete('/pelanggan/keranjang/hapus/{id}', [CustomerPortalController::class, 'hapusKeranjang'])->name('pelanggan.hapus_keranjang');
    Route::get('/pelanggan/checkout', [CustomerPortalController::class, 'checkout'])->name('pelanggan.checkout');
    Route::post('/pelanggan/checkout', [CustomerPortalController::class, 'prosesCheckout'])->name('pelanggan.proses_checkout');
    Route::get('/pelanggan/riwayat', [CustomerPortalController::class, 'riwayat'])->name('pelanggan.riwayat');
    Route::get('/pelanggan/profil/edit', [CustomerPortalController::class, 'editProfil'])->name('pelanggan.profil.edit');
    Route::put('/pelanggan/profil/update', [CustomerPortalController::class, 'updateProfil'])->name('pelanggan.profil.update');
    Route::delete('/pelanggan/profil/alamat/{nomor}', [CustomerPortalController::class, 'hapusAlamat'])->name('pelanggan.alamat.hapus');
});

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