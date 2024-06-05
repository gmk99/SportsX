<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoalsTable extends Migration
{
    public function up()
    {
        Schema::create('goals', function (Blueprint $table) {
            $table->id();
            $table->integer('Minute');
            $table->unsignedBigInteger('GameID');
            $table->unsignedBigInteger('PlayerID');
            $table->timestamps();

            $table->foreign(['GameID', 'PlayerID'])->references(['game_id', 'player_id'])->on('game_players')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('goals');
    }
}

