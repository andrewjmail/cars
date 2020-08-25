<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Vehicle;
use Faker\Generator as Faker;

$factory->define(Vehicle::class, function (Faker $faker) {
    return [
        'model_id' => function () {
            return factory(App\Model::class)->create()->id;
        },
        'fuel_type_id' => function () {
            return factory(App\FuelType::class)->create()->id;
        },
    ];
});
