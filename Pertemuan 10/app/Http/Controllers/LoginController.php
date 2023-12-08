<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            if (Auth::user()->role == 'Admin') {
                // $request->session()->regenerate();
                return redirect('admin');
            } elseif (Auth::user()->role == 'Pelamar') {
                // $request->session()->regenerate();
                return redirect()->intended('/');
            } elseif (Auth::user()->role == 'Penyedia') {
                // $request->session()->regenerate();
                return redirect()->intended('/');
            }
        }
        return view('Auth.login');
    }

    public function autentikasi(Request $request)
    {
        $tes = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($tes)){
            if (Auth::user()->role == 'Admin') {
                // $request->session()->regenerate();
                return redirect('admin');
            } elseif (Auth::user()->role == 'Pelamar') {
                // $request->session()->regenerate();
                return redirect()->intended('/');
            } elseif (Auth::user()->role == 'Penyedia') {
                // $request->session()->regenerate();
                return redirect()->intended('/');
            }
        }

        return back()->with('failed', 'Email Atau Password Anda Salah!');
    }

    public function keluar(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
