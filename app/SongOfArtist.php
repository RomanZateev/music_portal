<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SongOfArtist extends Model
{
    protected $table = 'songs_of_artists';

    public $primaryKey = 'id';
}
