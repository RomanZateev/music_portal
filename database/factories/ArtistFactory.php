<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Artist;
use Faker\Generator as Faker;

$factory->define(Artist::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'nameURL' => $faker->word,
        'biograpy' => $faker->paragraph(4),
        'image'=> $faker->imageUrl($width = 300, $height = 300)
    ];
});
