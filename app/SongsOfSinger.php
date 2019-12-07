<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SongsOfSinger extends Model
{
    protected $table = 'songs_of_singers';

    public $primaryKey = 'id';
}
