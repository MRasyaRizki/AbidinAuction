<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Level;
use App\Models\Petugas;
use App\Models\Masyarakat;
use App\Models\Barang;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Level::create(['level' => 'administrator']);
        Level::create(['level' => 'petugas']);

        Petugas::factory(2)->create();

        Masyarakat::factory(5)->create();

        Barang::factory(10)->create();
    }
}
