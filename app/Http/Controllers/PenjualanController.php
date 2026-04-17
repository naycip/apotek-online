<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\MetodeBayar;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index() {
        // Mengambil data penjualan beserta nama pelanggan dan metode bayarnya
        $penjualans = Penjualan::with(['pelanggan', 'metodeBayar'])->latest()->get();
        return view('penjualan.index', compact('penjualans'));
    }

    public function edit($id) {
        $penjualan = Penjualan::findOrFail($id);
        $metodeBayars = MetodeBayar::all();
        return view('penjualan.edit', compact('penjualan', 'metodeBayars'));
    }
    
    // Tambahkan fungsi update jika ingin bisa ganti status order
    public function update(Request $request, $id)
    {
        $penjualan = Penjualan::findOrFail($id);

        $request->validate([
            'status_order' => 'required|in:Menunggu Konfirmasi,Diproses,Dibatalkan Penjual',
            'id_metode_bayar' => 'required|exists:metode_bayar,id',
        ]);
    
        $penjualan->update([
            'status_order' => $request->status_order,
            'keterangan_status' => $request->keterangan_status,
            'id_metode_bayar' => $request->id_metode_bayar
        ]);

        return redirect()->route('penjualan.index')->with('success', 'Status pesanan dan metode pembayaran berhasil diperbarui!');
    }
    
    
}