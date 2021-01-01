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
        'price' => $faker->numberBetween(10, 200) * 100,
        'year' => $faker->dateTimeBetween($startDate = '-8 years', $endDate = 'now', $timezone = null)->format('Y'),
        'colour' => $faker->randomElement(['Blue', 'Red', 'Black', 'White']),
        'sold' => $faker->optional(0.3)->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
        'description' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true)
    ];
});
