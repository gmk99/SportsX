<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataRowsTable extends Migration
{
    public function up()
    {
        Schema::create('data_rows', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('data_type_id');
            $table->string('field');
            $table->string('type');
            $table->string('display_name');
            $table->boolean('required')->default(0);
            $table->boolean('browse')->default(1);
            $table->boolean('read')->default(1);
            $table->boolean('edit')->default(1);
            $table->boolean('add')->default(1);
            $table->boolean('delete')->default(1);
            $table->text('details')->nullable();
            $table->integer('order')->default(1);
            $table->timestamps();

            $table->foreign('data_type_id')->references('id')->on('data_types')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('data_rows');
    }
}

