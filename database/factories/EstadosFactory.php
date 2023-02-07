<?php

namespace Database\Factories;

use App\Estados;
use Illuminate\Database\Eloquent\Factories\Factory;

class EstadosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Estados::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => 0,
            'name' => 'Sin Estado',
            'color' => '#FFA800',
            'colorFont' => '#FFF4DE',
            'description' => 'Cliente sin estado'
        ];
    }
}
