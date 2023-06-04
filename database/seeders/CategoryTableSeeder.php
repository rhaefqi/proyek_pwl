<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
    }
}
