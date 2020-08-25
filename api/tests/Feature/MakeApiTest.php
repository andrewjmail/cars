<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use App\Make;
use App\Model;
use App\User;

class MakeApiTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testMakesEndpoint()
    {
        $make = factory(Make::class)->create();
        $token = factory(User::class)->create()->api_token;
        
        $this->get('/api/v1/makes')
            ->assertStatus(500);

        $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('GET', '/api/v1/makes')->assertSeeText($make->name);

    }

    public function testMakeModelsEndPoint()
    {
        $model = factory(Model::class)->create();
        $token = factory(User::class)->create()->api_token;

        $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('GET', '/api/v1/makes/' . $model->make->id . '/models')
            ->assertStatus(200)
            ->assertSeeText($model->name);
    }
}