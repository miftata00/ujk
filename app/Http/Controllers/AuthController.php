<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // ======================
    // LOGIN
    // ======================

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $data = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if (Auth::attempt($data)) {
            return redirect('/product')->with('success', 'Login berhasil');
        }

        return back()->with('error', 'Username atau Password salah');
    }

    // ======================
    // REGISTER
    // ======================

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|min:4|unique:users,username',
            'password' => 'required|min:4|confirmed',
        ], [
            'username.required' => 'Username wajib diisi',
            'username.min' => 'Username minimal 4 karakter',
            'username.unique' => 'Username sudah digunakan, silakan pakai username lain',

            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 4 karakter',
            'password.confirmed' => 'Konfirmasi password tidak sama',
        ]);

        User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password)
        ]);

        return redirect('/login')->with('success', 'Registrasi berhasil, silakan login');
    }

    // ======================
    // LOGOUT
    // ======================

    public function logout()
    {
        Auth::logout();

        return redirect('/login')->with('success', 'Berhasil logout');
    }
}