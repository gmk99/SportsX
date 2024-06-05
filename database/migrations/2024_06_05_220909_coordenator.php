<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoordenatorsTable extends Migration
{
    public function up()
    {
        Schema::create('coordenators', function (Blueprint $table) {
            $table->id();
            $table->string('FullName', 100);
            $table->date('Birthdate');
            $table->unsignedBigInteger('UsersID')->nullable();
            $table->timestamps();

            $table->foreign('UsersID')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('coordenators');
    }
}

