<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'idProducto' => $this->faker->unique()->numberBetween(0, 501),
            'nomProducto' => $this->faker->name(),
            'url_pagina' => $this->faker->text(70),
            'url_imagen' => $this->faker->text(70),
            'precio' => $this->faker->numberBetween(2000,50000)
        ];
    }
}
