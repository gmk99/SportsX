<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoachRolesTable extends Migration
{
    public function up()
    {
        Schema::create('coach_roles', function (Blueprint $table) {
            $table->id();
            $table->string('Denomination', 50);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('coach_roles');
    }
}

