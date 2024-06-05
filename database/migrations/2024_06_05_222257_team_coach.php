<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamCoachesTable extends Migration
{
    public function up()
    {
        Schema::create('team_coaches', function (Blueprint $table) {
            $table->unsignedBigInteger('team_id');
            $table->unsignedBigInteger('coach_id');
            $table->unsignedBigInteger('CoachRoleID');
            $table->timestamps();

            $table->primary(['team_id', 'coach_id']);
            $table->foreign('CoachRoleID')->references('id')->on('coach_roles')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('coach_id')->references('id')->on('coaches')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('team_coaches');
    }
}

