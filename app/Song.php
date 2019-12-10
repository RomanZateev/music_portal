<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $table = 'songs';

    public $primaryKey = 'id';

    public function artists()
    {
        return $this->hasMany('App\SongOfArtist');
    }
}
