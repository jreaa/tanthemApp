<?php

namespace Database\Factories;

use App\Models\Clientes;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Clientes::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'rut'  => $this->faker->randomNumber(8),
            'estado' => 1,
            'email' => $this->faker->email(),
            'primary_phone' => $this->faker->phoneNumber(),
            'secondary_phone' => $this->faker->phoneNumber(),
            'category'        => 'Natural',
            'website'         => 'https://testing.com',
            'address'         => $this->faker->address(),
            'contact_name'    => $this->faker->userName(),
            'type'            => 'Juridica',
            'region_id'       => 1,
            'comuna_id'       => 'Santiago'
        ];
    }
}
