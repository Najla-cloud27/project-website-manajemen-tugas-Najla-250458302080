<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'nama'     => 'Najla IT',
            'email'    => 'admin@gmail.com',
            'jabatan'  => 'Admin',
            'password' => Hash::make('123123123'),
            'is_tugas' => false,
        ]);
        User::create([
            'nama'     => 'Tono',
            'email'    => 'tono@gmail.com',
            'jabatan'  => 'karyawan',
            'password' => Hash::make('123123123'),
            'is_tugas' => false,
        ]);
        User::create([
            'nama'     => 'Tini',
            'email'    => 'tini@gmail.com',
            'jabatan'  => 'karyawan',
            'password' => Hash::make('123123123'),
            'is_tugas' => false,
        ]);
        User::create([
            'nama'     => 'Budi',
            'email'    => 'budi@gmail.com',
            'jabatan'  => 'karyawan',
            'password' => Hash::make('123123123'),
            'is_tugas' => false,
        ]);
    }
}