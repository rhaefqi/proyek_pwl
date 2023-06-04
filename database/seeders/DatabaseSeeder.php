<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // $this ->call(CategoryTableSeeder::class);
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
