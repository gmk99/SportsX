<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->string('FullName');
            $table->date('Birthdate');
            $table->integer('AssociationNumber')->unique();
            $table->integer('PhoneNumber');
            $table->unsignedBigInteger('PositionID');
            $table->timestamps();

            $table->foreign('PositionID')->references('id')->on('positions')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('players');
    }
}
