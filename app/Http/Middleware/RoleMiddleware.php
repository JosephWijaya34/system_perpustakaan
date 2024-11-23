<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Ambil pengguna yang login
        $user = Auth::user();

        // Redirect berdasarkan role
        if ($user->role_id == 1) {
            // Admin
            return redirect()->route('dashboard');
        } elseif ($user->role_id == 2) {
            // User
            return redirect()->route('home');
        }
        // Jika role tidak dikenali, logout dan kembalikan ke login
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login')->with('error', 'Akun tidak dikenali.');
    }
}
