<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamPlayersTable extends Migration
{
    public function up()
    {
        Schema::create('team_players', function (Blueprint $table) {
            $table->unsignedBigInteger('team_id');
            $table->unsignedBigInteger('player_id');
            $table->integer('Number');
            $table->timestamps();

            $table->primary(['team_id', 'player_id']);
            $table->foreign('player_id')->references('id')->on('players')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('team_players');
    }
}

