<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    // Menampilkan halaman login
    public function create()
    {
        return view('auth.login');
    }

    // Proses Login
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $request->session()->regenerate();

        $user = auth()->user();

        // Logika redirect berdasarkan role
        if (in_array($user->role, ['admin', 'pemilik'])) {
            return redirect()->intended(route('admin.dashboard'));
        } 

        if (in_array($user->role, ['apoteker', 'karyawan'])) {
            return redirect()->intended(route('be.admin'));
        }

        // Default ke halaman utama
        return redirect()->intended(RouteServiceProvider::HOME);
    }

        // Logout
        public function destroy(Request $request)
        {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/');
        }
    }