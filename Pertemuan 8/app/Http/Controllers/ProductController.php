<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // public function kategori($productLine)
    // {
    //     // Mengganti tanda "-" dengan spasi
    //     $productLine = str_replace('-', ' ', $productLine);

    //     // Mengambil semua produk dengan productLine yang sesuai
    //     $products = Product::where('productLine', $productLine)->get();

    //     // Mengirim data produk dan productLine yang telah dimodifikasi ke tampilan 'kategori-produk'
    //     return view('kategori-produk', compact('products', 'productLine'));
    // }

    public function show($identifier)
    {
        // Cek apakah parameter adalah productCode (menggunakan pola regex)
        if (preg_match('/^S\d{2}_\d{4}$/', $identifier) || preg_match('/^S\d{3}_\d{4}$/', $identifier)) {
            // Parameter adalah productCode, cari produk berdasarkan productCode
            $products = Product::where('productCode', $identifier)->first();

            // Periksa apakah produk ditemukan
            if (!$products) {
                return abort(404); // Tampilkan halaman 404 jika produk tidak ditemukan
            }

            // Tampilkan tampilan 'detail-produk' dengan produk yang ditemukan
            return view('detail-produk', compact('products'));
        } else {
            // Parameter adalah productLine, modifikasi tanda "-" menjadi spasi
            $productLine = str_replace('-', ' ', $identifier);

            // Mengambil semua produk dengan productLine yang sesuai
            $products = Product::where('productLine', $productLine)->get();

            // Mengirim data produk dan productLine yang telah dimodifikasi ke tampilan 'kategori-produk'
            return view('kategori-produk', compact('products', 'productLine'));
        }
    }
}
