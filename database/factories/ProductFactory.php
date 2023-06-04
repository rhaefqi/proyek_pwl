<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(){
        return [
            'nama_produk' => $this->faker->name,
            'harga_produk' => $this->faker->randomElement($array = array('10000', '20000', '15000', '5000')),
            'kategori_produk' => $this->faker->randomElement($array = array('makanan', 'minuman', 'alat_dapur', 'sembako')),
            'merek_produk' => $this->faker->name,
            'deskripsi_produk' => $this->faker->sentence(rand(20, 25)),
            'image' => $this->faker->randomElement($array = array(
                'assets/img/tmSwepl51YYnBpQQqgZOU3G32OnSAZrwf7J97tx9.jpg',
                'assets/img/gula.jpg',
                'assets/img/indomie.jpg',
                'assets/img/minyak.jpg',
                'assets/img/sabun.jpg',
                'assets/img/spatula.jpg',
                'assets/img/tehpoci.jpg',
                'assets/img/shampo.jpg',
                ))
        ];
    }
}