<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSongsOfArtistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('songs_of_artists', function (Blueprint $table) {
            
            $table->bigIncrements('id');

            $table->unsignedBigInteger('song_id');

            $table->unsignedBigInteger('artist_id');

            $table->foreign('song_id')->references('id')->on('songs')->onDelete('cascade');;

            $table->foreign('artist_id')->references('id')->on('artists')->onDelete('cascade');;

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('songs_of_artists');
    }
}
