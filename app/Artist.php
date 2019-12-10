<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    protected $table = 'artists';

    public $primaryKey = 'id';

    public function songs()
    {
        return $this->hasMany('App\SongOfArtist');
    }
}
