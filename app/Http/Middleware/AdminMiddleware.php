<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Periksa apakah pengguna sudah login
        if (!Auth::check()) {
            // Redirect ke halaman login jika belum login
            return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        // Periksa apakah pengguna login dan memiliki role_id 1 (admin) atau 2 (member)
        if (Auth::check() && in_array(Auth::user()->role_id, [1])) {
            return $next($request); // Lanjutkan ke route berikutnya
        }

        // Jika bukan admin, redirect ke halaman login atau halaman error
        return redirect('/login')->with('error', 'Akses ditolak. Anda bukan admin.');
    }
}
