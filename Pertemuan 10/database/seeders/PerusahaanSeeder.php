<?php

namespace Database\Seeders;

use App\Models\Perusahaan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PerusahaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $perushaans = [
            [
                'namaCompany' => 'Shopee',
                'detail' => 'Shopee adalah platform perdagangan elektronik terkemuka di Asia Tenggara dan Taiwan yang didirikan pada tahun 2015. Sebagai bagian dari Grup Sea, Shopee memfokuskan diri pada menyediakan pengalaman belanja online yang mudah, aman, dan terpercaya untuk jutaan pengguna di wilayah tersebut.',
                'id_user' => 2,
            ],
            [
                'namaCompany' => 'Lazada',
                'detail' => 'Lazada adalah platform perdagangan elektronik yang mendominasi pasar di Asia Tenggara. Diluncurkan pada tahun 2012, Lazada menyediakan pengalaman belanja online yang luas dan beragam, menawarkan produk dari berbagai kategori termasuk elektronik, fashion, kecantikan, dan lainnya. Sebagai bagian dari Alibaba Group, Lazada berkomitmen untuk menyediakan solusi e-commerce terdepan untuk masyarakat Asia Tenggara, memfasilitasi penjual dan pembeli untuk terhubung secara efisien. Dengan penekanan pada inovasi, kenyamanan, dan kepuasan pelanggan, Lazada terus memimpin dalam memenuhi kebutuhan belanja online di wilayah ini.',
                'id_user' => 3,
            ]
        ];

        Perusahaan::insert($perushaans);
    }
}
