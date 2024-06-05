<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInjuryPlayersTable extends Migration
{
    public function up()
    {
        Schema::create('injury_players', function (Blueprint $table) {
            $table->id();
            $table->date('Date');
            $table->text('Observation');
            $table->unsignedBigInteger('InjuryID');
            $table->unsignedBigInteger('PlayerID');
            $table->timestamps();

            $table->foreign('PlayerID')->references('id')->on('players')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('InjuryID')->references('id')->on('injuries')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('injury_players');
    }
}

