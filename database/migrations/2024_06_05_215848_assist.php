<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssistsTable extends Migration
{
    public function up()
    {
        Schema::create('assists', function (Blueprint $table) {
            $table->id();
            $table->integer('Minute');
            $table->unsignedBigInteger('GameID');
            $table->unsignedBigInteger('PlayerID');
            $table->unsignedBigInteger('GoalID');
            $table->timestamps();

            $table->foreign('GoalID')->references('id')->on('goals')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign(['GameID', 'PlayerID'])->references(['game_id', 'player_id'])->on('game_players')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('assists');
    }
}

