<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name', 'text', 'image', 'notes', 'textAuthor', 'musicAuthor', 'album'
    ];

    public function artists()
    {
        return $this->belongsToMany('App\Artist', 'artist_song', 'song_id', 'artist_id');
    }
}