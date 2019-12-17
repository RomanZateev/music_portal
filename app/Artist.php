<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name', 'nameURL', 'image', 'biograpy'
    ];

    public function songs()
    {
        return $this->belongsToMany('App\Song', 'artist_song', 'artist_id', 'song_id');
    }
}