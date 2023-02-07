<?php

namespace Database\Seeders;

use App\Models\Clientes;
use Database\Factories\ClientesFactory;
use Illuminate\Database\Seeder;

class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Clientes::factory()->count(20)->create();
    }
}
