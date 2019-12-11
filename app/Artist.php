<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    public function getArtistName()
    {
        return $this->name;
    }

    public function getArtistNameURL()
    {
        return $this->nameURL;
    }

    public function songs()
    {
        return $this->belongsToMany('App\Song', 'artist_song', 'artist_id', 'song_id');
    }
}