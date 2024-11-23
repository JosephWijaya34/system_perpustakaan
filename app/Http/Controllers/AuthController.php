<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function Register()
    {
        if (Auth::check()) {
            // Jika pengguna sudah login, redirect ke dashboard
            return redirect('/dashboard')->with('status', 'Anda sudah login!');
        }

        // Tampilkan halaman register
        $title = 'Register';
        return view('auth.register', compact('title'));
    }

    public function ValidateRegister(Request $request)
    {
        // Validasi inputan
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'foto' => 'required|image|mimes:jpg,jpeg,png',
            'role_id' => 'required|exists:roles,id',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Upload foto (jika ada)
        $fotoPath = '';
        if ($request->hasFile('foto')) {
            $extension = $request->file('foto')->getClientOriginalExtension();
            $newName = 'foto' . '-' . now()->timestamp . '.' . $extension;
            $fotoPath = $request->file('foto')->storeAs('foto_user_photos', $newName, 'public');
        }

        // Simpan data pengguna ke database
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'foto' => $fotoPath,
            'role_id' => $request->role_id,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('login')->with('success', 'Registration successful! Please login.');
    }

    public function Login()
    {
        if (Auth::check()) {
            // Jika pengguna sudah login, redirect ke dashboard
            return redirect('/dashboard')->with('status', 'Anda sudah login!');
        }

        // Tampilkan halaman login
        $title = 'Login';
        return view('auth.login', compact('title'));
    }

    public function ValidateLogin(Request $request)
{
    // Validasi format input
    $validator = Validator::make($request->all(), [
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    // Jika validasi format gagal
    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
    }

    // Cek apakah email ada di database
    $user = User::where('email', $request->email)->first();

    if (!$user) {
        // Jika email tidak ditemukan
        return back()->withErrors([
            'email' => 'Email tidak ditemukan.',
        ])->withInput();
    }

    // Cek apakah password cocok
    if (!Hash::check($request->password, $user->password)) {
        // Jika password salah
        return back()->withErrors([
            'password' => 'Password salah.',
        ])->withInput();
    }

    // Jika kredensial benar, autentikasi pengguna
    if (Auth::attempt($request->only('email', 'password'))) {
        // Ambil data user
        $user = Auth::user();

        // Periksa role
        if ($user->role_id == 1) {
            // Regenerate session untuk keamanan
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        // Logout jika bukan admin
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login')->with('error', 'Akses tidak diizinkan untuk akun Anda.');
    }

    // Jika login gagal karena alasan tidak diketahui
    return redirect()->back()->with('error', 'Gagal login. Silakan coba lagi.');
}


    public function Logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // flush session untuk menghapus semua data session
        // $request->session()->flush();

        // Redirect ke halaman login
        return redirect('login')->with('success', 'Anda telah logout.');
    }
}
