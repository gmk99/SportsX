<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->boolean('IsAtHome');
            $table->string('OpposingTeam', 50);
            $table->date('Date');
            $table->timestamp('StartingTime');
            $table->integer('GoalsScored');
            $table->integer('GoalsConceded');
            $table->timestamp('EndingTime');
            $table->unsignedBigInteger('FieldFieldID')->nullable();
            $table->unsignedBigInteger('TeamID');
            $table->timestamps();

            $table->foreign('FieldFieldID')->references('id')->on('fields')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('TeamID')->references('id')->on('teams')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('games');
    }
}

