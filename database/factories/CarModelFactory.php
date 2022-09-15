<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CarModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name" => $this->faker->word,
            "fuel" => $this->faker->boolean ? 'diesel' : 'gasoline',
            "power" => $this->faker->biasedNumberBetween(40, 400),
            "engine_size" => $this->faker->biasedNumberBetween(900, 4200),
            "manufacturer_id" => $this->faker->numberBetween(1, 14)
        ];
    }
}
