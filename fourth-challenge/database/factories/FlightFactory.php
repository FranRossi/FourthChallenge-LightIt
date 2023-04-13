<?php

namespace Database\Factories;

use App\Models\Airline;
use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Flight>
 */
class FlightFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'airline_id' => Airline::get()->random()->id,
            'city_departure_id' => City::get()->random()->id,
            'city_arrival_id' => City::get()->whereNotIn('id', 'city_departure_id')->random()->id,
        ];
    }
}
