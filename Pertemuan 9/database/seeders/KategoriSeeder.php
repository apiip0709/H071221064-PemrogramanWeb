<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kategoriProduk' => 'Samsung',
                'deskripsi' => 
                'Samsung Galaxy adalah seri perangkat telepon pintar berbasis Android yang dirancang, 
                diproduksi dan dipasarkan oleh Samsung Electronics. Lini produk seri galaxy ini meliputi 
                Seri Galaxy S sebagai smartphone high-end, Seri Galaxy A sebagai smartphone terdepan. 
                Seri Galaxy Note sebagai tablet dan phablet dengan fungsionalitas tambahan stylus 
                dan Seri Galaxy Tab sebagai tablet.'
            ],
            [
                'kategoriProduk' => 'Oppo',
                'deskripsi' =>
                'Oppo, sebagai pemimpin industri ponsel pintar, menawarkan kombinasi desain modern, 
                teknologi kamera canggih, dan performa tinggi. Dengan layar yang brilian dan desain ramping, 
                ponsel Oppo memberikan pengalaman visual yang memukau. Inovasi pengisian daya cepat, seperti VOOC, 
                menjadi salah satu fitur unggulan, sementara prosesor kuat dan RAM besar menjamin kinerja yang responsif. 
                Oppo terus menonjol di pasar dengan produk yang elegan dan canggih.'
            ],
            [
                'kategoriProduk' => 'Vivo',
                'deskripsi' =>
                'Vivo, sebagai pemain signifikan di pasar ponsel pintar, menawarkan serangkaian produk yang memadukan desain modern, 
                inovasi kamera, dan kinerja handal. Ponsel Vivo sering dikenal dengan penekanan pada kualitas fotografi, 
                menyediakan sistem kamera yang canggih untuk hasil foto dan video yang istimewa. 
                Dengan desain yang elegan dan layar berkualitas tinggi, ponsel Vivo memberikan pengalaman visual yang memukau. 
                Performa yang tangguh didukung oleh prosesor berkualitas dan kapasitas RAM yang besar, 
                sementara inovasi pengisian daya Vivo menawarkan solusi cepat untuk pengguna yang aktif. 
                Vivo terus menjadi pilihan menarik bagi mereka yang mencari kombinasi fitur unggulan 
                dan desain yang menawan di pasar ponsel pintar.'
            ]
        ];

        Kategori::insert($data);
    }
}
