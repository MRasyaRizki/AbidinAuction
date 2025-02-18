<?php

namespace Database\Factories;

use App\Models\Petugas;
use App\Models\Level;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class PetugasFactory extends Factory
{
    protected $model = Petugas::class;

    public function definition()
    {
        return [
            'nama_petugas' => $this->faker->name,
            'username' => $this->faker->unique()->userName,
            'password' => Hash::make('password'),
            'id_level' => $this->faker->randomElement([1, 2])
        ];
    }
}
