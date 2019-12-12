<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Song;
use Faker\Generator as Faker;

$factory->define(Song::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'nameURL' => $faker->word,
        'text' => $faker->paragraphs(4),
        'textAuthor' => $faker->name,
        'musicAuthor' => $faker->name,
        'album' => $faker->word,
        'image'=> $faker->imageUrl($width = 300, $height = 300),
        'notes' => $faker->paragraph(4),
    ];
});
