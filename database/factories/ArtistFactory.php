<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Artist;
use Faker\Generator as Faker;

$factory->define(Artist::class, function (Faker $faker) {
    return [
        'name' => $faker->text(10),
        'nameURL' => $faker->text(10),
        'biograpy' => $faker->sentence(5),
    ];
});
