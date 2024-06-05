<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainsTable extends Migration
{
    public function up()
    {
        Schema::create('trains', function (Blueprint $table) {
            $table->id();
            $table->date('Day');
            $table->timestamp('StartingTime');
            $table->timestamp('EndingTime');
            $table->unsignedBigInteger('TeamID');
            $table->unsignedBigInteger('FieldFieldID');
            $table->timestamps();

            $table->foreign('FieldFieldID')->references('id')->on('fields')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('TeamID')->references('id')->on('teams')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('trains');
    }
}
