<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class GuestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Periksa apakah pengguna sudah login
        if (Auth::check()) {
            // Redirect ke halaman dashboard jika sudah login
            return redirect('/dashboard')->with('status', 'Anda sudah login.');
        }

        // Jika belum login, lanjutkan ke request berikutnya
        return $next($request);
    }
}
