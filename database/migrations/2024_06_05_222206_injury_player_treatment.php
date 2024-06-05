<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInjuryPlayerTreatmentsTable extends Migration
{
    public function up()
    {
        Schema::create('injury_player_treatments', function (Blueprint $table) {
            $table->id();
            $table->text('Notes')->nullable();
            $table->unsignedBigInteger('InjuryPlayerID');
            $table->unsignedBigInteger('PhysiotherapistID');
            $table->timestamps();

            $table->foreign('InjuryPlayerID')->references('id')->on('injury_players')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('PhysiotherapistID')->references('id')->on('physiotherapists')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('injury_player_treatments');
    }
}

