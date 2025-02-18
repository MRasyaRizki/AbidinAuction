<?php

namespace Database\Factories;

use App\Models\Masyarakat;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class MasyarakatFactory extends Factory
{
    protected $model = Masyarakat::class;

    public function definition()
    {
        return [
            'nama_lengkap' => $this->faker->name,
            'username' => $this->faker->unique()->userName,
            'telp' => $this->faker->phoneNumber,
            'password' => Hash::make('password'),
        ];
    }
}
