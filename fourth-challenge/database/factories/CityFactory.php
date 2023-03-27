<?php

namespace Database\Factories;

use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<City>
 */
class CityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'name' => $this->faker->city,
            'flights_arriving' => $this->faker->numberBetween(0, 100),
            'flights_departing' => $this->faker->numberBetween(0, 100),
        ];
    }
}
