<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'nama_lengkap' => 'Admin Wapen',
            'email' => 'admin@wapen.com',
            'username' => 'admin',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
            'role' => 'admin',
            'nomor_hp' => '08123456789',
        ]);

        \App\Models\User::create([
            'nama_lengkap' => 'Donatur User',
            'email' => 'donatur@wapen.com',
            'username' => 'donatur',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
            'role' => 'donatur',
            'nomor_hp' => '08123456780',
        ]);
    }
}
