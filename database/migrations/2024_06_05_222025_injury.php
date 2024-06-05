<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInjuriesTable extends Migration
{
    public function up()
    {
        Schema::create('injuries', function (Blueprint $table) {
            $table->id();
            $table->string('Denomination');
            $table->string('Location');
            $table->string('EstimatedTimeToRecover');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('injuries');
    }
}

