<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(){
        Category::create([
            'category_name' => 'Agama',
        ]);
        Category::create([
            'category_name' => 'Ekonomi dan Keuangan',
        ]);
        Category::create([
            'category_name' => 'Kesehatan',
        ]);
        Category::create([
            'category_name' => 'Kesejahteraan Gender dan Sosial Inklusif',
        ]);
        Category::create([
            'category_name' => 'Ketentraman, Ketertiban Umum dan Perlindungan Masyarakat',
        ]);
        Category::create([
            'category_name' => 'Lingkungan Hidup',
        ]);
        Category::create([
            'category_name' => 'Pembangunan Desa',
        ]);
        Category::create([
            'category_name' => 'Pendidikan dan Kebudayaan',
        ]);
        User::create([
            'nama' => 'Muhammad Luthfi',
            'email' => 'luthfim904@gmail.com',
            'nik' => '221402050',
            'no_hp' => '088262450134',
            'password' => bcrypt('password'),
            'level' => '1',
        ]);
        User::create([
            'nama' => 'Ibra Rizqy Siregar',
            'email' => 'rizqyibra@gmail.com',
            'nik' => '221402123',
            'no_hp' => '088262450134',
            'password' => bcrypt('password'),
            'level' => '0',
        ]);
    }
}