<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoachesTable extends Migration
{
    public function up()
    {
        Schema::create('coaches', function (Blueprint $table) {
            $table->id();
            $table->string('FullName');
            $table->date('Birthdate');
            $table->string('Degree');
            $table->integer('AssociationNumber')->unique();
            $table->unsignedBigInteger('UsersID')->nullable();
            $table->timestamps();

            $table->foreign('UsersID')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('coaches');
    }
}


