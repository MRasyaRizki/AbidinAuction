<?php

namespace Database\Factories;

use App\Models\Barang;
use Illuminate\Database\Eloquent\Factories\Factory;

class BarangFactory extends Factory
{
    protected $model = Barang::class;

    public function definition()
    {
        return [
            'nama_barang' => $this->faker->word,
            'tgl' => $this->faker->date(),
            'harga_awal' => $this->faker->numberBetween(100000, 1000000),
            'deskripsi_barang' => $this->faker->sentence(5),
        ];
    }
}
