<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLevelsTable extends Migration
{
    public function up()
    {
        Schema::create('levels', function (Blueprint $table) {
            $table->id();
            $table->string('Designation');
            $table->integer('MaximumAge');
            $table->unsignedBigInteger('CoordenatorID');
            $table->timestamps();

            $table->foreign('CoordenatorID')->references('id')->on('coordenators')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('levels');
    }
}

