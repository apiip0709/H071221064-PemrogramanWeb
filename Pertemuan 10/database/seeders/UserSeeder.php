<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'Admin123@gmail.com',
                'password' => Hash::make('admin123'),
                'role' => 'Admin'
            ],
            [
                'name' => 'Penyedia1',
                'email' => 'penyedia1@gmail.com',
                'password' => Hash::make('penyedia123'),
                'role' => 'Penyedia'
            ],
            [
                'name' => 'Penyedia2',
                'email' => 'penyedia2@gmail.com',
                'password' => Hash::make('penyedia123'),
                'role' => 'Penyedia'
            ],
            [
                'name' => 'Pelamar1',
                'email' => 'pelamar1@gmail.com',
                'password' => Hash::make('pelamar123'),
                'role' => 'Pelamar'
            ],
            [
                'name' => 'Pelamar2',
                'email' => 'pelamar2@gmail.com',
                'password' => Hash::make('pelamar123'),
                'role' => 'Pelamar'
            ],
        ];
        
        User::insert($users);
    }
}
