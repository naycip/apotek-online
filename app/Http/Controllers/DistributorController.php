<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Distributor;

class DistributorController extends Controller
{
    protected $table = 'distributor'; // Nama tabel di DB kamu
    protected $fillable = ['nama_distributor', 'telepon', 'alamat'];

    public function index()
    {
        $distributors = Distributor::all();
        return view('distributor.index', compact('distributors'));
    }

    public function create()
    {
        return view('distributor.create');
    }

    // Menyimpan data distributor baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama_distributor' => 'required',
            'telepon' => 'required',
            'alamat' => 'required',
        ]);

        Distributor::create($request->all());

        return redirect()->route('distributor.index')->with('success', 'Distributor berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $distributor = Distributor::findOrFail($id);
        return view('distributor.edit', compact('distributor'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_distributor' => 'required',
            'telepon' => 'required',
            'alamat' => 'required',
        ]);

        $distributor = Distributor::findOrFail($id);
        $distributor->update($request->all());

        return redirect()->route('distributor.index')->with('success', 'Distributor berhasil diupdate!');
    }

    // Menghapus data
    public function destroy($id)
    {
        $distributor = Distributor::findOrFail($id);
        $distributor->delete();

        return redirect()->route('distributor.index')->with('success', 'Distributor berhasil dihapus!');
    }
}
