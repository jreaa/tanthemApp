<?php

namespace Database\Seeders;

use App\Estados;
use Illuminate\Database\Seeder;

class EstadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Estados::factory()->count(1)->create();
    }
}
