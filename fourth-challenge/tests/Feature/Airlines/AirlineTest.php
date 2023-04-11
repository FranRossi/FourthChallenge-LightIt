<?php

namespace Tests\Feature\Airlines;

use App\Http\Controllers\AirlineController;
use App\Models\Airline;
use Tests\TestCase;

class AirlineTest extends TestCase
{

    /** @test */
    public function store_new_airline_with_form()
    {
        $this->withoutExceptionHandling();

        $this->post(action([AirlineController::class, 'store']),
            [
                'name' => 'American'
            ]);

        $this->assertDatabaseHas(Airline::class, [
            'name' => 'American'
        ]);
    }

    /** @test */
    public function index_all_airlines()
    {
        $this->withoutExceptionHandling();

        Airline::factory()->count(2)->sequence(
            ['name' => 'American Airlines'],
            ['name' => 'British Airways'],
        )
            ->create();

        $this->get('airlines')
            ->assertSuccessful()
            ->assertSee('American Airlines')
            ->assertSeeInOrder([
                'British Airways',
                'American Airlines',
            ]);
    }

    /** @test */
    public function destroy_an_airline()
    {
        $this->withoutExceptionHandling();

        $airline = Airline::factory()->create();

        $this->delete(action([AirlineController::class, 'destroy'], $airline))
            ->assertSuccessful();

        $this->assertDatabaseMissing(Airline::class, [
            'id' => $airline->id,
        ]);
    }

    /** @test */
    public function update_an_airlines()
    {
        $this->withoutExceptionHandling();

        $airline = Airline::factory()->create([
            'name' => 'American Airlines'
        ]);

        $this->patch(action([AirlineController::class, 'update'], $airline), [
            'name' => 'American'
        ])
            ->assertSuccessful();

        $this->assertDatabaseHas(Airline::class, [
            'id' => $airline->id,
            'name' => 'American'
        ])
            ->assertDatabaseMissing(Airline::class, [
                'id' => $airline->id,
                'name' => 'American Airlines'
            ]);
    }


}
