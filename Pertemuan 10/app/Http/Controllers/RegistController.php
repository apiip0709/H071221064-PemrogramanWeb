<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegistController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            if (Auth::user()->role == 'Admin') {
                // $request->session()->regenerate();
                return redirect('admin');
            } elseif (Auth::user()->role == 'Pelamar') {
                // $request->session()->regenerate();
                return redirect()->intended('/pelamar');
            }
        }
        return view('Auth.regist');
    }

    public function store (Request $request) {
        $validator = Validator::make($request->all(), [
            'username' => 'required|min:3',
            'inputEmail3' => 'required|email|unique:users,email',
            'inputPassword3' => ['required', 'regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]/', 'min:8']
        ], [
            'username.required' => 'Username wajib diisi.',
            'username.min' => 'Username harus memiliki minimal 3 karakter.',
            'inputEmail3.required' => 'Email wajib diisi.',
            'inputEmail3.email' => 'Format email tidak valid.',
            'inputEmail3.unique' => 'Email sudah terdaftar.',
            'inputPassword3.required' => 'Password wajib diisi.',
            'inputPassword3.regex' => 'Password harus berisi kombinasi huruf dan angka.',
            'inputPassword3.min' => 'Password harus memiliki minimal 8 karakter.'
        ]);

        if ($validator->fails()) {
            return redirect(route('regist'))
                ->withErrors($validator)
                ->withInput();
        }

        // Jika validasi berhasil, lanjutkan dengan menyimpan data ke database
        $input = $request->all();
        User::create([
            'name' => $input['username'],
            'email' => $input['inputEmail3'],
            'password' => Hash::make($input['inputPassword3']),
            'role' => $input['role'],
        ]);
        
        return redirect(route('regist'))
            ->with('message', 'User Berhasil Ditambah');
    }
}

