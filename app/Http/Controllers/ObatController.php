<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\JenisObat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $obats = Obat::all();
        return view('obat.index', compact('obats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // 1. Ambil semua data dari tabel jenis_obat
        $jenis_obats = JenisObat::all();

        // 2. Kirim variabel $jenis_obats ke view obat.create
        return view('obat.create', compact('jenis_obats'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $request->validate([
            'nama_obat' => 'required',
            'idjenis'   => 'required', // Ini akan mencegat error 'cannot be null'
            'harga_jual'=> 'required|numeric',
            'stok'      => 'required|integer',
            'foto1'     => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto1')) {
            $file = $request->file('foto1');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $file->move(public_path('storage/obat'), $nama_file);
            $data['foto1'] = $nama_file;
        }

        \App\Models\Obat::create($data);

        \App\Models\Obat::create([
            'nama_obat'      => $request->nama_obat,
            'idjenis'        => $request->idjenis,
            'harga_jual'     => $request->harga_jual,
            'stok'           => $request->stok,
            'deskripsi_obat' => $request->deskripsi_obat,
            'foto1'          => '', // Set default kosong
            'foto2'          => '',
            'foto3'          => '',
        ]);

        return redirect()->route('obat.index')->with('success', 'Data Obat Berhasil Disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Obat $obat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Obat $obat)
    {
        $jenis_obats = JenisObat::all();

        return view('obat.edit', compact('obat', 'jenis_obats'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Obat $obat)
    {
        $request->validate([
            'nama_obat' => 'required',
            'idjenis'   => 'required',
            'harga_jual'=> 'required|numeric',
            'stok'      => 'required|integer',
        ]);

        $obat->update([
            'nama_obat'      => $request->nama_obat,
            'idjenis'        => $request->idjenis,
            'harga_jual'     => $request->harga_jual,
            'stok'           => $request->stok,
            'deskripsi_obat' => $request->deskripsi_obat ?? '-',
        ]);

        return redirect()->route('obat.index')->with('success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Obat $obat)
    {
        $obat->delete();
        return redirect()->route('obat.index');
    }
}