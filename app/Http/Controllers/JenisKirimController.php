<?php

namespace App\Http\Controllers;

use App\Models\JenisKirim;
use Illuminate\Http\Request;

class JenisKirimController extends Controller
{
    public function index()
    {
        $jenis_kirims = JenisKirim::all();
        return view('jenis_kirim.index', compact('jenis_kirims'));
    }

    public function create()
    {
        return view('jenis_kirim.create');
    }

    public function store(Request $request)
    {
        // Gunakan nama kolom sesuai database: nama_ekspedisi
        JenisKirim::create($request->all());
        return redirect()->route('jenispengiriman.index')->with('success', 'Data berhasil ditambah');
    }

    public function edit($id)
    {
        $jenis_kirim = JenisKirim::findOrFail($id);
        return view('jenis_kirim.edit', compact('jenis_kirim'));
    }

    public function update(Request $request, $id)
    {
        // Validasi disesuaikan dengan kolom nama_ekspedisi
        $request->validate(['nama_ekspedisi' => 'required']);
        
        JenisKirim::findOrFail($id)->update($request->all());
        return redirect()->route('jenispengiriman.index')->with('success', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        JenisKirim::findOrFail($id)->delete();
        return redirect()->route('jenispengiriman.index')->with('success', 'Data berhasil dihapus');
    }
}