<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        // Mengambil perusahaan berdasarkan ID pengguna
        $data = Perusahaan::where('id_user', $user->id)->first();
        // dd($data);
        return view('penyedia.company.edit-company')->with(compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('penyedia.company.create-company');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'namaCompany' => 'required|string',
            'detail' => 'required|string',
        ]);

        // If validation fails, redirect back with errors
        if ($validator->fails()) {
            return redirect('/penyedia/company/create')
                ->withErrors($validator)
                ->withInput();
        }

        $input = $request->all();
        Perusahaan::create([
            'namaCompany' => $input['namaCompany'],
            'detail' => $input['detail'],
            'id_user' => auth()->user()->id
        ]);

        return redirect('/penyedia/company/create')
            ->with('message', 'Company Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(Perusahaan $perusahaan)
    {
        $user = Auth::user();

        // Mengambil perusahaan berdasarkan ID pengguna
        $data = Perusahaan::where('id_user', $user->id)->first();
        // dd($data);
        return view('penyedia.company.edit-company')->with(compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Perusahaan $perusahaan)
    {
        $user = Auth::user();

        // Mengambil perusahaan berdasarkan ID pengguna
        $data = Perusahaan::where('id_user', $user->id)->first();
        // dd($data);
        return view('penyedia.company.edit-company')->with(compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Perusahaan $perusahaan)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'namaCompany' => 'required|string',
            'detail' => 'required|string',
        ]);

        // Jika validasi gagal, redirect kembali dengan error
        if ($validator->fails()) {
            return redirect("/penyedia/company/{$perusahaan->id}/edit")
            ->withErrors($validator)
            ->withInput();
        }
        
        $input = $request->all();
        $data = [
            'namaCompany' => $input['namaCompany'],
            'detail' => $input['detail'],
            'id_user' => auth()->user()->id
        ];

        $perusahaan = Perusahaan::where('id_user', auth()->user()->id)->first();
        // dd($perusahaan);
        $perusahaan->update($data);
        
        return redirect("/penyedia/company/{$perusahaan->id}/edit")
            ->with('message', 'Company Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Perusahaan $perusahaan)
    {
        //
    }
}
