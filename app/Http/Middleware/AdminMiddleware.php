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
        if (!Auth::check()) {
            // Redirect ke halaman login jika belum login
            return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu.');
        }
        if (Auth::check() && Auth::user()->role_id !== 1) {
            // Redirect ke halaman login jika belum login
            return redirect('login')->with('error', 'Hanya admin yang dapat mengakses halaman ini.');
        }
        return $next($request);
    }
}
