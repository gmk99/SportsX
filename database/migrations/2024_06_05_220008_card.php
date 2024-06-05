<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardsTable extends Migration
{
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->integer('Minute');
            $table->unsignedBigInteger('CardTypeID');
            $table->unsignedBigInteger('GameID');
            $table->unsignedBigInteger('PlayerID');
            $table->timestamps();

            $table->foreign(['GameID', 'PlayerID'])->references(['game_id', 'player_id'])->on('game_players')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('CardTypeID')->references('id')->on('card_types')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('cards');
    }
}

