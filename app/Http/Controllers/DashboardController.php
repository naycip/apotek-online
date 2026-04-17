<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Obat;
use App\Models\Penjualan;
use App\Models\Pelanggan;

class DashboardController extends Controller
{
    public function index()
    {
        $total_user = User::count();
        $total_obat = Obat::count();
        $total_penjualan = Penjualan::count();
        $pendapatan = Penjualan::where('status_order', 'selesai')->orWhere('status_order', 'dikirim')->sum('total_bayar') ?? 0;
        
        // Ambil 5 penjualan terbaru untuk ditampilkan di tabel ringkasan
        $penjualan_terbaru = Penjualan::with('pelanggan')->orderBy('created_at', 'desc')->limit(5)->get();

        return view('admin.dashboard', compact('total_user', 'total_obat', 'total_penjualan', 'pendapatan', 'penjualan_terbaru'));
    }
}
