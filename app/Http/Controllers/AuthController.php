<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('nik', 'password');

        if (Auth::attempt($credentials)) {
            // Login berhasil
            if (Auth::user()->hasRole('admin')) {
                return redirect()->intended('/admin/dashboard');
            } else {
                return redirect()->intended('/user/dashboard');
            }
        } else {
            // Login gagal
            return redirect()->back()->withInput()->withErrors(['nik' => 'Nik atau password salah']);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
