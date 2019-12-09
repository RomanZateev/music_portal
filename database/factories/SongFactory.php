<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Song;
use Faker\Generator as Faker;

$factory->define(Song::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'nameURL' => $faker->text(10),
        'text' => $faker->sentence(40),
        'textAuthor' => $faker->text(10),
        'musicAuthor' => $faker->text(10),
        'album' => $faker->text(10),
        'notes' => $faker->sentence(5),
    ];
});
