<?php

namespace App\Http\Controllers;

use App\Models\JenisObat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class JenisObatController extends Controller
{
    public function index()
    {
        $jenis = JenisObat::all();
        return view('jenis_obat.index', compact('jenis'));
    }

    public function create()
    {
        return view('jenis_obat.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis' => 'required',
            'deskripsi_jenis' => 'nullable',
            'image_url' => 'nullable|image|max:2048'
        ]);

        // Kita ambil manual satu-satu biar aman
        $jenis = $request->jenis;
        $deskripsi = $request->deskripsi_jenis;
        $nama_file = ""; // Kita kasih string kosong, BUKAN null

        if ($request->hasFile('image_url')) {
            $file = $request->file('image_url');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $file->move(public_path('storage/jenis_obat'), $nama_file);
        }

        // Simpan manual pakai Model
        \App\Models\JenisObat::create([
            'jenis' => $jenis,
            'deskripsi_jenis' => $deskripsi,
            'image_url' => $nama_file, // Ini kuncinya, dia akan terisi "" bukan NULL
        ]);

        return redirect()->route('jenisobat.index')->with('success', 'Data Berhasil Disimpan!');
    }

        public function edit($id)
        {
            $jenis = JenisObat::findOrFail($id);
            return view('jenis_obat.edit', compact('jenis'));
        }

        public function update(Request $request, $id)
        {
            $jenis = JenisObat::findOrFail($id);
            $data = $request->all();

            if ($request->hasFile('image_url')) {
                // Hapus foto lama jika ada
            if ($jenis->image_url && File::exists(public_path('storage/jenis_obat/' . $jenis->image_url))) {
                File::delete(public_path('storage/jenis_obat/' . $jenis->image_url));
            }

            $file = $request->file('image_url');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $file->move(public_path('storage/jenis_obat'), $nama_file);
            $data['image_url'] = $nama_file;
        }

        $jenis->update($data);
        return redirect()->route('jenisobat.index')->with('success', 'Jenis obat berhasil diupdate!');
    }

    public function destroy($id)
    {
        $jenis = \App\Models\JenisObat::findOrFail($id);

        if ($jenis->obats()->count() > 0) {
            return redirect()->route('jenisobat.index')
                ->with('error', 'Gagal hapus! Masih ada data obat yang menggunakan jenis ini.');
        }

        // Jika tidak ada obat, baru boleh hapus foto dan datanya
        if ($jenis->image_url && file_exists(public_path('storage/jenis_obat/' . $jenis->image_url))) {
            unlink(public_path('storage/jenis_obat/' . $jenis->image_url));
        }

        $jenis->delete();
        return redirect()->route('jenisobat.index')->with('success', 'Jenis obat berhasil dihapus.');
    }
}