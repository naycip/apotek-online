<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Jika belum login, lempar ke login
        if (!auth()->check()) {
            return redirect('login');
        }

        // Ambil role user (pakai strtolower biar aman dari huruf besar/kecil)
        $userRole = strtolower($request->user()->role);

        if (in_array($request->user()->jabatan, $roles)) {
            return $next($request);
        }

        abort(403, 'ANDA TIDAK PUNYA AKSES KE HALAMAN INI.');
    }
}
