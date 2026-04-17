<?php

namespace App\Http\Controllers;

use App\Models\MetodeBayar; // Pastikan Model di-import
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MetodeBayarController extends Controller
{
    public function index() {
        $metodebayars = MetodeBayar::all();
        // Memanggil folder metode_bayar
        return view('metode_bayar.index', compact('metodebayars'));
    }

    public function create() {
        return view('metode_bayar.create');
    }

    public function store(Request $request) {
        $request->validate([
            'metode_pembayaran' => 'required',
            'tempat_bayar' => 'required',
            'no_rekening' => 'required',
            'url_logo' => 'nullable|image|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('url_logo')) {
            $file = $request->file('url_logo');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $file->move(public_path('storage/pembayaran'), $nama_file);
            $data['url_logo'] = $nama_file;
        }

        MetodeBayar::create($data);
        // Sesuaikan dengan nama route di web.php
        return redirect()->route('metodebayar.index')->with('success', 'Metode pembayaran berhasil ditambah!');
    }

    public function edit($id) {
        $metode = MetodeBayar::findOrFail($id);
        return view('metode_bayar.edit', compact('metode'));
    }

    public function update(Request $request, $id) {
        $metode = MetodeBayar::findOrFail($id);
        
        $request->validate([
            'metode_pembayaran' => 'required',
            'tempat_bayar' => 'required',
            'no_rekening' => 'required',
        ]);

        $data = $request->all();

        if ($request->hasFile('url_logo')) {
            // Hapus logo lama jika ada
            if ($metode->url_logo && File::exists(public_path('storage/pembayaran/' . $metode->url_logo))) {
                File::delete(public_path('storage/pembayaran/' . $metode->url_logo));
            }

            $file = $request->file('url_logo');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $file->move(public_path('storage/pembayaran'), $nama_file);
            $data['url_logo'] = $nama_file;
        }

        $metode->update($data);
        return redirect()->route('metodebayar.index')->with('success', 'Metode pembayaran berhasil diupdate!');
    }

    public function destroy($id) {
        $metode = MetodeBayar::findOrFail($id);

        // Hapus file logo dari folder
        if ($metode->url_logo && File::exists(public_path('storage/pembayaran/' . $metode->url_logo))) {
            File::delete(public_path('storage/pembayaran/' . $metode->url_logo));
        }

        $metode->delete();
        return redirect()->route('metodebayar.index')->with('success', 'Metode pembayaran berhasil dihapus!');
    }
}