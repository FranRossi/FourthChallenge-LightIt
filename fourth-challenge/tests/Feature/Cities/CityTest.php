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
            'name' => 'Miami'
        ]);

        $this->assertDatabaseHas(City::class, [
            'name' => 'Miami'
        ]);
    }

    /** @test */
    public function index_all_cities()
    {
        $this->withoutExceptionHandling();

        City::factory()->count(2)->sequence(
            ['name' => 'Miami'],
            ['name' => 'London'],
        )
        ->create();

        $this->get('cities')
            ->assertSuccessful()
            ->assertSee('Miami')
            ->assertSeeInOrder([
                'London',
                'Miami',
            ]);
    }

/** @test */
    public function destroy_a_city()
    {
        $this->withoutExceptionHandling();

        $city = City::factory()->create();

        $this->delete(action([CityController::class, 'destroy'], $city))
            ->assertSuccessful();

        $this->assertDatabaseMissing(City::class, [
            'id' => $city->id,
        ]);
    }

/** @test */
    public function update_a_city()
    {
        $this->withoutExceptionHandling();

        $city = City::factory()->create([
            'name' => 'New York City'
        ]);

        $this->patch(action([CityController::class, 'update'], $city), [
            'name' => 'Miami'
        ])
            ->assertSuccessful();

        $this->assertDatabaseHas(City::class, [
            'id' => $city->id,
            'name' => 'Miami'
        ])
            ->assertDatabaseMissing(City::class, [
                'id' => $city->id,
                'name' => 'New York City'
            ]);
    }


    /**
     * @test
     * @dataProvider cityFieldValidationProvider
     */
    public function validate_a_city_fields($input, $expectedError)
    {
        $city = City::factory()->create([
            'name' => 'New York City',
        ]);

        $this->patch(action([CityController::class, 'update'], $city), $input)
            ->assertSessionHasErrors($expectedError);
    }

    public static function cityFieldValidationProvider()
    {
        return [
            [
                ['name' => ''],
                'name'
            ],
        ];
    }


    /** @test */
    public function validate_a_city_is_unique(){

        City::factory()->create([
            'name' => 'New York City'
        ]);

        $this->post(action([CityController::class, 'store']), [
            'name' => 'New York City'
        ])
            ->assertSessionHasErrors('name');
    }

}
