<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Song;
use Faker\Generator as Faker;

$factory->define(Song::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'nameURL' => $faker->word,
        'text' => $faker->paragraph(20),
        'textAuthor' => $faker->lastName,
        'musicAuthor' => $faker->lastName,
        'album' => $faker->word,
        'image'=> $faker->imageUrl($width = 300, $height = 300),
        'notes' => $faker->paragraph(4),
    ];
});
