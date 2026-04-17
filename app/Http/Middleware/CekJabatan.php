<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CekJabatan
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, $next, ...$jabatans)
    {
        // Kalau user belum login atau jabatannya nggak ada di daftar, usir!
        if (!$request->user() || !in_array($request->user()->jabatan, $jabatans)) {
            return redirect('/dashboard')->with('error', 'Akses ditolak!');
        }

        return $next($request);
    }
}
