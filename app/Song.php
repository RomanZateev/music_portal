<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    public function artists()
    {
        return $this->belongsToMany('App\Artist', 'artist_song', 'song_id', 'artist_id');
    }
}