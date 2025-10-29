<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // Tampilkan halaman login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    // Tampilkan halaman register (kalau ada)
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Proses register
    public function register(Request $request)
    {
        // validasi sederhana
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        // buat user baru
        $user = \App\Models\User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('admin.dashboard');
    }

    // Dashboard admin
    public function dashboard()
    {
        return view('admin.dashboard'); // pastikan nanti bikin file ini
    }
}