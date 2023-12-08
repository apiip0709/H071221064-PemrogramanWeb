<?php

namespace Database\Seeders;

use App\Models\Jobpost;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobpostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 'posisi','lokasi','type','email','deskripsi','gaji','id_company','id_user'
        $jobs = [
            [
                'posisi' => 'Marketing',
                'lokasi' => 'Jakarta, Indonesia',
                'type' => 'full-time',
                'email' => 'shopee@gmail.com',
                'deskripsi' => 'Kami mencari profesional pemasaran yang berkomitmen untuk bergabung dengan tim kami di Shopee. Anda akan memiliki kesempatan untuk mengembangkan strategi pemasaran dan berkolaborasi dengan tim lintas fungsi. Bergabunglah dengan kami untuk menciptakan dampak positif dan pertumbuhan bersama!',
                'gaji' => 5000000,
                'id_company' => 1,
                'id_user' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'posisi' => 'Customer Service',
                'lokasi' => 'Bandung, Indonesia',
                'type' => 'full-time',
                'email' => 'shopee@gmail.com',
                'deskripsi' => 'Kami mencari individu yang berdedikasi untuk bergabung dengan tim Customer Service kami. Sebagai Customer Service, Anda akan berinteraksi dengan pelanggan, memberikan solusi terbaik, dan menjaga kepuasan pelanggan. Bergabunglah dengan kami untuk memberikan pengalaman pelanggan yang luar biasa!',
                'gaji' => 4500000,
                'id_company' => 1,
                'id_user' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'posisi' => 'Sales & Communication',
                'lokasi' => 'Makassar, Indonesia',
                'type' => 'part-time',
                'email' => 'shopee@gmail.com',
                'deskripsi' => 'Kami mencari profesional dalam bidang penjualan dan komunikasi untuk bergabung dengan tim kami di Shopee. Anda akan bertanggung jawab dalam mengembangkan strategi penjualan, berkomunikasi efektif dengan pelanggan, dan mencapai target penjualan. Bergabunglah dengan kami untuk menjadi bagian dari pertumbuhan kami!',
                'gaji' => 5000000,
                'id_company' => 1,
                'id_user' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'posisi' => 'Human Resource',
                'lokasi' => 'Makassar, Indonesia',
                'type' => 'part-time',
                'email' => 'lazada@gmail.com',
                'deskripsi' => 'Kami mencari profesional di bidang Sumber Daya Manusia (SDM) untuk bergabung dengan tim kami di Lazada. Sebagai Human Resource, Anda akan memiliki tanggung jawab penting dalam pengelolaan SDM, pengembangan karyawan, dan menciptakan lingkungan kerja yang produktif. Bergabunglah dengan kami untuk menjadi bagian dari tim yang berkembang pesat!',
                'gaji' => 3000000, 
                'id_company' => 2,
                'id_user' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'posisi' => 'Sales & Communication',
                'lokasi' => 'Jakarta, Indonesia',
                'type' => 'full-time',
                'email' => 'lazada@gmail.com',
                'deskripsi' => 'Kami mencari profesional dalam bidang penjualan dan komunikasi untuk bergabung dengan tim kami di Shopee. Anda akan bertanggung jawab dalam mengembangkan strategi penjualan, berkomunikasi efektif dengan pelanggan, dan mencapai target penjualan. Bergabunglah dengan kami untuk menjadi bagian dari pertumbuhan kami!',
                'gaji' => 4500000, 
                'id_company' => 2,
                'id_user' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'posisi' => 'Design & Creative',
                'lokasi' => 'Jakarta, Indonesia',
                'type' => 'full-time',
                'email' => 'lazada@gmail.com',
                'deskripsi' => 'Kami mencari individu kreatif dan berbakat untuk bergabung dengan tim kami di Lazada dalam posisi Design & Creative. Sebagai bagian dari tim ini, Anda akan memiliki tanggung jawab dalam menghasilkan desain visual yang menarik dan konsep kreatif. Kami mencari seseorang yang bersemangat untuk berinovasi dan membantu menciptakan pengalaman visual yang luar biasa bagi pelanggan kami. Bergabunglah dengan kami dan berkontribusi pada keberhasilan Lazada melalui kreativitas Anda!',
                'gaji' => 2000000,
                'id_company' => 2,
                'id_user' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],            
        ];

        Jobpost::insert($jobs);
    }
}
