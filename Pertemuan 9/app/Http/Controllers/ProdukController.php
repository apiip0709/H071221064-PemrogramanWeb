<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produks = Produk::all();
        return view('produk.index')->with('produks', $produks);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori::all();
        $lastKodeProduk = DB::table('produks')
            ->select('kodeProduk')
            ->orderBy('kodeProduk', 'desc')
            ->first();

        if ($lastKodeProduk) {
            $angkaTerakhir = (int)substr($lastKodeProduk->kodeProduk, 2) + 1;
            $newKodeProduk = 'KP' . str_pad($angkaTerakhir, 3, '0', STR_PAD_LEFT);
        } else {
            $newKodeProduk = 'KP001';
        }

        return view('produk.create', [
            'kodeProduk' => $newKodeProduk,
            'kategori' => $kategori,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $input = $request->all();

            // Buat produk baru dengan data yang diterima dari formulir
            Produk::create([
                'kodeProduk' => $input['kode'],
                'namaProduk' => $input['nama'],
                'kategori' => $input['kategori'],
                'stok' => $input['stok'],
                'harga' => $input['harga'],
            ]);

            return redirect('/produk/create')->with('flash_message', 'Produk Ditambahkan!');
        } catch (QueryException $e) {
            // Tangani kesalahan database, misalnya constraint unik atau lainnya
            return redirect('/produk/create')->with('error_message', 'Gagal menambahkan produk. Silakan coba lagi.');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $produk = Produk::where('kodeProduk', $id)->first();
        return view('produk.show')->with('produks', $produk);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kategori = Kategori::all();
        $produk = Produk::where('kodeProduk', $id)->first();

        return view('produk.edit', [
            'produks' => $produk,
            'kategoris' => $kategori,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $kodeProduk)
    {
        try {
            DB::table('produks')
                ->where('kodeProduk', $kodeProduk)
                ->update([
                    'kategori' => $request->kategori,
                    'namaProduk' => $request->nama,
                    'stok' => $request->stok,
                    'harga' => $request->harga
                ]);

            return redirect('/produk/' . $kodeProduk . '/edit')->with('flash_message', 'Produk diperbarui!');
        } catch (QueryException $e) {
            // Tangani kesalahan database, misalnya constraint unik atau lainnya
            return redirect('/produk/' . $kodeProduk . '/edit')->with('error_message', 'Gagal memperbarui produk. Silakan coba lagi.');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($kodeProduk)
    {
        try {
            // Menggunakan model Produk untuk menghapus data
            Produk::where('kodeProduk', $kodeProduk)->delete();

            $produks = Produk::all();

            Schema::disableForeignKeyConstraints();
            Produk::truncate();
            Schema::enableForeignKeyConstraints();

            // Mengatur ulang kodeProduk dan membuat produk baru
            foreach ($produks as $index => $data) {
                $formattedIndex = str_pad($index + 1, 3, '0', STR_PAD_LEFT);
                Produk::create([
                    'kodeProduk' => 'KP' . $formattedIndex,
                    'namaProduk' => $data['namaProduk'],
                    'kategori' => $data['kategori'],
                    'stok' => $data['stok'],
                    'harga' => $data['harga'],
                ]);
            }

            // Redirect dengan pesan sukses
            return redirect()->route('produk.index')->with('flash_message', 'Data Berhasil dihapus');
        } catch (QueryException $e) {
            return redirect()->route('produk.index')->with('error_message', 'Data Gagal dihapus');
        }
    }
}
