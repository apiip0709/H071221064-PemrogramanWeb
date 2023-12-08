<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 'nama','email','no_hp','umur','jenis_kelamin','deskripsi','id_user'
        $profiles = [
            [
                'nama' => 'A. Afif Alhaq',
                'email' => 'afifalhaq777@gmail.com',
                'no_hp' => '089695096085',
                'umur' => 20,
                'jenis_kelamin' => 'laki-laki',
                'deskripsi' => 'Sedikit Malas',
                'id_user' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Jubaedah',
                'email' => 'afifkaka777@gmail.com',
                'no_hp' => '081524188250',
                'umur' => 24,
                'jenis_kelamin' => 'perempuan',
                'deskripsi' => 'Strong Girl',
                'id_user' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        Profile::insert($profiles);
    }
}
