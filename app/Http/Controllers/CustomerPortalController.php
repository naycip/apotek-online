<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Obat;
use App\Models\Keranjang;
use App\Models\Penjualan;
use App\Models\MetodeBayar;
use App\Models\JenisKirim;

class CustomerPortalController extends Controller
{
    public function dashboard()
    {
        $id_pelanggan = Auth::guard('pelanggan')->id();
        
        $pesanan_aktif = Penjualan::where('id_pelanggan', $id_pelanggan)
            ->whereNotIn('status_order', ['Selesai', 'Dibatalkan Pembeli', 'Dibatalkan Penjual'])
            ->count();
            
        $riwayat_belanja = Penjualan::where('id_pelanggan', $id_pelanggan)
            ->whereIn('status_order', ['Selesai'])
            ->count();
            
        $isi_keranjang = Keranjang::where('id_pelanggan', $id_pelanggan)->count();

        return view('pelanggan.dashboard', compact('pesanan_aktif', 'riwayat_belanja', 'isi_keranjang'));
    }

    public function katalog()
    {
        $obats = Obat::all();
        return view('pelanggan.katalog', compact('obats'));
    }

    public function tambahKeranjang(Request $request, $id_obat)
    {
        $id_pelanggan = Auth::guard('pelanggan')->id();
        $obat = Obat::findOrFail($id_obat);
        $qty = $request->qty ?? 1;

        // Check if item already in cart
        $keranjang = Keranjang::where('id_pelanggan', $id_pelanggan)
            ->where('id_obat', $id_obat)
            ->first();

        if ($keranjang) {
            $keranjang->jumlah_order += $qty;
            $keranjang->subtotal = $keranjang->jumlah_order * $keranjang->harga;
            $keranjang->save();
        } else {
            Keranjang::create([
                'id_pelanggan' => $id_pelanggan,
                'id_obat' => $id_obat,
                'jumlah_order' => $qty,
                'harga' => $obat->harga_jual,
                'subtotal' => $qty * $obat->harga_jual
            ]);
        }

        return redirect()->route('pelanggan.keranjang')->with('success', 'Obat berhasil ditambahkan ke keranjang!');
    }

    public function keranjang()
    {
        $id_pelanggan = Auth::guard('pelanggan')->id();
        $keranjangs = Keranjang::with('obat')->where('id_pelanggan', $id_pelanggan)->get();
        $total = $keranjangs->sum('subtotal');
        
        return view('pelanggan.keranjang', compact('keranjangs', 'total'));
    }

    public function hapusKeranjang($id)
    {
        $id_pelanggan = Auth::guard('pelanggan')->id();
        Keranjang::where('id_pelanggan', $id_pelanggan)->where('id', $id)->delete();
        
        return redirect()->route('pelanggan.keranjang')->with('success', 'Item berhasil dihapus');
    }

    public function checkout()
    {
        $id_pelanggan = Auth::guard('pelanggan')->id();
        $keranjangs = Keranjang::with('obat')->where('id_pelanggan', $id_pelanggan)->get();
        
        if ($keranjangs->count() == 0) {
            return redirect()->route('pelanggan.katalog')->withErrors('Keranjang Anda kosong.');
        }

        $metode_bayars = MetodeBayar::all();
        $jenis_kirims = JenisKirim::all();
        $total_belanja = $keranjangs->sum('subtotal');

        return view('pelanggan.checkout', compact('keranjangs', 'metode_bayars', 'jenis_kirims', 'total_belanja'));
    }

    public function prosesCheckout(Request $request)
    {
        $request->validate([
            'id_metode_bayar' => 'required',
            'id_jenis_kirim' => 'required',
            'alamat_lengkap' => 'required'
        ]);

        $id_pelanggan = Auth::guard('pelanggan')->id();
        $pelanggan = Auth::guard('pelanggan')->user();
        $keranjangs = Keranjang::where('id_pelanggan', $id_pelanggan)->get();

        if ($keranjangs->count() == 0) return redirect()->back();

        // Update alamat jika dipilih
        $pelanggan->alamat1 = $request->alamat_lengkap;
        $pelanggan->save();

        $ongkos_kirim = 15000; // Mock ongkir
        $biaya_app = 2000;
        $total_belanja = $keranjangs->sum('subtotal');
        $total_bayar = $total_belanja + $ongkos_kirim + $biaya_app;

        // Create Penjualan
        $penjualan = Penjualan::create([
            'id_pelanggan' => $id_pelanggan,
            'id_metode_bayar' => $request->id_metode_bayar,
            'id_jenis_kirim' => $request->id_jenis_kirim,
            'tgl_penjualan' => date('Y-m-d'),
            'ongkos_kirim' => $ongkos_kirim,
            'biaya_app' => $biaya_app,
            'total_bayar' => $total_bayar,
            'status_order' => 'Menunggu Konfirmasi',
            'keterangan_status' => 'Pesanan baru dibuat',
        ]);

        // Insert to DetailPenjualan
        foreach ($keranjangs as $item) {
            \App\Models\DetailPenjualan::create([
                'id_penjualan' => $penjualan->id,
                'id_obat' => $item->id_obat,
                'jumlah_beli' => $item->jumlah_order,
                'harga_beli' => $item->harga,
                'subtotal' => $item->subtotal
            ]);
        }

        // Clear keranjang
        Keranjang::where('id_pelanggan', $id_pelanggan)->delete();

        return redirect()->route('pelanggan.riwayat')->with('success', 'Pesanan berhasil dibuat!');
    }

    public function riwayat()
    {
        $id_pelanggan = Auth::guard('pelanggan')->id();
        $penjualans = Penjualan::with(['metodeBayar', 'jenisKirim'])->where('id_pelanggan', $id_pelanggan)->orderBy('created_at', 'desc')->get();
        
        return view('pelanggan.riwayat', compact('penjualans'));
    }

    public function editProfil()
    {
        $pelanggan = Auth::guard('pelanggan')->user();
        return view('pelanggan.edit_profil', compact('pelanggan'));
    }

    public function updateProfil(Request $request)
    {
        /** @var \App\Models\Pelanggan $pelanggan */
        $pelanggan = Auth::guard('pelanggan')->user();
        
        $request->validate([
            'nama_pelanggan' => 'required|string|max:255',
            'no_telp' => 'required|string|max:20',
            'alamat1' => 'nullable|string',
            'kota1' => 'nullable|string|max:100',
            'propinsi1' => 'nullable|string|max:100',
            'kodepos1' => 'nullable|string|max:10',
            'alamat2' => 'nullable|string',
            'kota2' => 'nullable|string|max:100',
            'propinsi2' => 'nullable|string|max:100',
            'kodepos2' => 'nullable|string|max:10',
            'alamat3' => 'nullable|string',
            'kota3' => 'nullable|string|max:100',
            'propinsi3' => 'nullable|string|max:100',
            'kodepos3' => 'nullable|string|max:10',
        ]);

        $pelanggan->update($request->only([
            'nama_pelanggan', 'no_telp', 
            'alamat1', 'kota1', 'propinsi1', 'kodepos1',
            'alamat2', 'kota2', 'propinsi2', 'kodepos2',
            'alamat3', 'kota3', 'propinsi3', 'kodepos3',
        ]));

        return redirect()->route('pelanggan.dashboard')->with('success', 'Profil berhasil diperbarui!');
    }

    public function hapusAlamat($nomor)
    {
        $pelanggan = Auth::guard('pelanggan')->user();
        if ($nomor == 2) {
            $pelanggan->update([
                'alamat2' => null, 'kota2' => null, 'propinsi2' => null, 'kodepos2' => null
            ]);
        } elseif ($nomor == 3) {
            $pelanggan->update([
                'alamat3' => null, 'kota3' => null, 'propinsi3' => null, 'kodepos3' => null
            ]);
        }
        
        return redirect()->back()->with('success', 'Alamat tambahan berhasil dihapus!');
    }
}
