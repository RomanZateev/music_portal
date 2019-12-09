<?php

/** @var \Illuminate\Database\Eloquent\Factory $acftory */

use App\SongOfArtist;
use App\Song;
use App\Artist;
use Faker\Generator as Faker;

$factory->define(SongOfArtist::class, function (Faker $faker) {
    return [
        'song_id' => function() {
            return factory(App\Song::class)->create()->id;
        },
        'artist_id' => function() {
            return factory(App\Artist::class)->create()->id;
        }
    ];
});
