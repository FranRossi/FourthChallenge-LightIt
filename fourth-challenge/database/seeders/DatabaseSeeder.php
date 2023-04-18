<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Airline;
use App\Models\City;
use App\Models\Flight;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        City::factory(10)->create();
        Airline::factory(10)->create();
        Flight::factory(15)->create();
    }
}
