<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategoris = Kategori::all();
        return view('kategori.index')->with('kategoris', $kategoris);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $input = $request->all();

            // Buat produk baru dengan data yang diterima dari formulir
            Kategori::create([
                'kategoriProduk' => $input['kategori'],
                'deskripsi' => $input['deskripsi'],
            ]);

            return redirect('/kategori/create')->with('flash_message', 'kategori Ditambahkan!');
        } catch (QueryException $e) {
            // Tangani kesalahan database, misalnya constraint unik atau lainnya
            return redirect('/kategori/create')->with('error_message', 'Gagal menambahkan kategori. Silakan coba lagi.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kategoris = Kategori::where('kategoriProduk', $id)->first();
        return view('kategori.show')->with('kategoris', $kategoris);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kategori = Kategori::where('kategoriProduk', $id)->first();

        return view('kategori.edit', [
            'kategoris' => $kategori,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $kategoriProduk)
    {
        try {
            DB::table('kategoris')
                ->where('kategoriProduk', $kategoriProduk)
                ->update([
                    'deskripsi' => $request->deskripsi,
                ]);

            return redirect('/kategori/' . $kategoriProduk . '/edit')->with('flash_message', 'Kategori diperbarui!');
        } catch (QueryException $e) {
            // Tangani kesalahan database, misalnya constraint unik atau lainnya
            return redirect('/kategori/' . $kategoriProduk . '/edit')->with('error_message', 'Gagal memperbarui Kategori. Silakan coba lagi.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($kategoriProduk)
    {
        try {
            // Menggunakan model Produk untuk menghapus data
            Kategori::where('kategoriProduk', $kategoriProduk)->delete();
        
            // Redirect dengan pesan sukses
            return redirect()->route('kategori.index')->with('flash_message', 'Data Berhasil dihapus');
        } catch (QueryException $e) {
            return redirect()->route('kategori.index')->with('error_message', 'Data Gagal dihapus');
        }
    }
}
