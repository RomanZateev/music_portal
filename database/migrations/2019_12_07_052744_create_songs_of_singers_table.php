<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSongsOfSingersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('songs_of_singers', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('song_id');

            $table->unsignedBigInteger('singer_id');

            $table->foreign('song_id')->references('id')->on('songs');

            $table->foreign('singer_id')->references('id')->on('singers');

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
        Schema::dropIfExists('songs_of_singers');
    }
}
