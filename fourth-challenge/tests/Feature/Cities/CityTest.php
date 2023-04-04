<?php

namespace Tests\Feature\Cities;

use App\Http\Controllers\CityController;
use App\Models\City;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CityTest extends TestCase
{

    /** @test */
    public function store_new_city_with_form()
    {
        $this->withoutExceptionHandling();

        $this->post(action([CityController::class, 'store']),
            [
            'name' => 'Miami',
            'flights_arriving' => 100,
            'flights_departing' => 100,
        ]);

        $this->assertDatabaseHas(City::class, [
            'name' => 'Miami',
            'flights_arriving' => 100,
            'flights_departing' => 100,
        ]);
    }

    /** @test */
    public function index()
    {
        $this->withoutExceptionHandling();

        City::factory()->count(2)->sequence(
            ['name' => 'Miami'],
            ['name' => 'London'],
        )
        ->create();

        $this->get('/cities')
            ->assertSuccessful()
            ->assertSee('Miami')
            ->assertSeeInOrder([
                'Miami',
                'London',
            ]);
    }



}
