<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\Distributor;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    public function index()
    {
        $pembelians = Pembelian::with('distributor')->latest()->get();
        return view('pembelian.index', compact('pembelians')); // Pastikan 'pembelian.index'
    }

    public function create()
    {
        $distributors = \App\Models\Distributor::all(); 
        return view('pembelian.create', compact('distributors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nonota' => 'required',
            'tgl_pembelian' => 'required|date',
            'id_distributor' => 'required',
            'total_bayar' => 'required|numeric',
        ]);

        Pembelian::create($request->all());
        return redirect()->route('pembelian.index')->with('success', 'Data pembelian berhasil dicatat!');
    }

    public function edit($id)
    {
        // Cari data pembelian berdasarkan ID
        $pembelian = Pembelian::findOrFail($id);
        
        // Kita butuh data distributor lagi untuk pilihan dropdown
        $distributors = \App\Models\Distributor::all();
        
        return view('pembelian.edit', compact('pembelian', 'distributors'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nonota' => 'required',
            'tgl_pembelian' => 'required|date',
            'id_distributor' => 'required',
            'total_bayar' => 'required|numeric',
        ]);

        $pembelian = Pembelian::findOrFail($id);
        $pembelian->update($request->all());

        return redirect()->route('pembelian.index')->with('success', 'Data pembelian berhasil diperbarui!');
    }

    public function destroy($id)
    {
        // Cari data pembelian berdasarkan ID
        $pembelian = Pembelian::findOrFail($id);
        
        // Lakukan penghapusan
        $pembelian->delete();

        // Kembalikan ke halaman index dengan pesan sukses
        return redirect()->route('pembelian.index')->with('success', 'Data pembelian berhasil dihapus!');
    }
}