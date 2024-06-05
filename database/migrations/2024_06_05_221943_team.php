<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('Name');
            $table->unsignedBigInteger('LevelID');
            $table->unsignedBigInteger('TeamDirectorID');
            $table->timestamps();

            $table->foreign('LevelID')->references('id')->on('levels')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('TeamDirectorID')->references('id')->on('team_directors')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('teams');
    }
}

