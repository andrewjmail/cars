<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use App\Vehicle;
use App\User;

class VehicleSearchApiTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testSearchEndpoint()
    {

        $vehicle = factory(vehicle::class)->create();
        $token = factory(User::class)->create()->api_token;
        
        $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('GET', '/api/v1/search?make=' . $vehicle->model->make->name)
            ->assertStatus(200)
            ->assertSeeText($vehicle->model->name);

            $this->withHeaders([
                'Authorization' => 'Bearer ' . $token,
            ])->json('GET','/api/v1/search?make=' . $vehicle->model->make->name . '&model=' . $vehicle->model->name . '&fuelType=' . $vehicle->fuelType->type)
            ->assertStatus(200)
            ->assertSeeText($vehicle->model->name);

            $this->withHeaders([
                'Authorization' => 'Bearer ' . $token,
            ])->json('GET', '/api/v1/search?make=' . 'NotAMake')
            ->assertStatus(422);

            $this->withHeaders([
                'Authorization' => 'Bearer ' . $token,
            ])->json('GET', '/api/v1/search?model=' . 'NotAMake')
            ->assertStatus(422);
    }
}