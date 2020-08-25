<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'make_id' => function () {
            return factory(App\Make::class)->create()->id;
        },
    ];
});
