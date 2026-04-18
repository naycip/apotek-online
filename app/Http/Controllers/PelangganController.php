<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        $pelanggans = Pelanggan::all();
        return view('pelanggan.index', compact('pelanggans'));
    }

    public function create()
    {
        return view('pelanggan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => 'required',
            'email' => 'required|email|unique:pelanggan',
            'katakunci' => 'required',
        ]);

        $data = $request->all();
        $data['katakunci'] = $request->katakunci;

        $kolom_tambahan = [
            'alamat2', 'kota2', 'propinsi2', 'kodepos2',
            'alamat3', 'kota3', 'propinsi3', 'kodepos3',
            'kodepos1', 'foto', 'url_ktp'
        ];

        foreach ($kolom_tambahan as $kolom) {
            if (!isset($data[$kolom])) {
                $data[$kolom] = ''; // Isi string kosong jika tidak ada di form
            }
        }

        \App\Models\Pelanggan::create($data);

        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan Berhasil Disimpan');
    }

    public function edit($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        return view('pelanggan.edit', compact('pelanggan'));
    }

    public function update(Request $request, $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        
        $request->validate([
            'nama_pelanggan' => 'required',
            'email' => 'required|email|unique:pelanggan,email,' . $id, // Email unik kecuali miliknya sendiri
        ]);

        $data = $request->all();

        // Jika user mengisi kolom password baru
        if ($request->filled('katakunci')) {
            $data['katakunci'] = $request->katakunci;
        } else {
            // Jika dikosongkan saat edit, jangan update passwordnya
            unset($data['katakunci']);
        }

        $pelanggan->update($data);
        return redirect()->route('pelanggan.index')->with('success', 'Data pelanggan diperbarui!');
    }

    public function destroy($id)
    {
        Pelanggan::findOrFail($id)->delete();
        return redirect()->route('pelanggan.index');
    }
}