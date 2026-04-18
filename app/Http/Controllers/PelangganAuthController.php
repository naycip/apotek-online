<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;
use Illuminate\Support\Facades\Auth;

class PelangganAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('pelanggan.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'katakunci' => 'required',
        ]);

        // Karena katakunci di database disimpan plaintext (max 15 karakter)
        // Kita verifikasi manual
        $pelanggan = Pelanggan::where('email', $request->email)
            ->where('katakunci', $request->katakunci)
            ->first();

        if ($pelanggan) {
            Auth::guard('pelanggan')->login($pelanggan);
            return redirect()->route('pelanggan.dashboard')->with('success', 'Berhasil login sebagai pelanggan!');
        }

        return back()->withErrors([
            'email' => 'Email atau password pelanggan salah.',
        ])->onlyInput('email');
    }

    public function showRegisterForm()
    {
        return view('pelanggan.auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => 'required|string|max:255',
            'email' => 'required|email|unique:pelanggan',
            'katakunci' => 'required|string|max:15',
            'no_telp' => 'required|string|max:15',
        ]);

        // Simpan data
        $pelanggan = new Pelanggan();
        $pelanggan->nama_pelanggan = $request->nama_pelanggan;
        $pelanggan->email = $request->email;
        $pelanggan->katakunci = $request->katakunci; // Plaintext sesuai request (jangan ubah database)
        $pelanggan->no_telp = $request->no_telp;
        $pelanggan->alamat1 = $request->alamat1 ?? '';
        $pelanggan->kota1 = $request->kota1 ?? '';
        $pelanggan->propinsi1 = $request->propinsi1 ?? '';
        $pelanggan->kodepos1 = $request->kodepos1 ?? '';
        
        $pelanggan->save();

        // Langsung login
        Auth::guard('pelanggan')->login($pelanggan);

        return redirect()->route('pelanggan.dashboard')->with('success', 'Pendaftaran berhasil!');
    }

    public function logout(Request $request)
    {
        Auth::guard('pelanggan')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }

    public function dashboard()
    {
        return view('pelanggan.dashboard');
    }
}
