<?php

namespace Tests\Feature\Cities;

use App\Models\City;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CityTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function index()
    {
        City::factory()->count(2)->sequence(
            ['name' => 'Miami'],
            ['name' => 'London'],
        )
        ->create();

        $this->get('/')
            ->assertSuccessful()
            ->assertSee('Miami')
            ->assertSeeInOrder([
                'Miami',
                'London',
            ]);
    }

}
