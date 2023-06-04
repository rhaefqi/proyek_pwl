<?php

namespace Database\Seeders;

use App\Models\Penduduk;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PendudukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Penduduk::create([
            'nama' => 'penduduk',
            'email' => 'penduduk@gmail.com',
            'nik' => '221402031',
            'no_hp' => '08120121020',
            'password' => Hash::make('123'),
        ]);
    }
}
