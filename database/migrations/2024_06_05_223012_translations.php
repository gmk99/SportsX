<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTranslationsTable extends Migration
{
    public function up()
    {
        Schema::create('translations', function (Blueprint $table) {
            $table->id();
            $table->string('table_name');
            $table->string('column_name');
            $table->unsignedBigInteger('foreign_key');
            $table->string('locale');
            $table->text('value');
            $table->timestamps();

            $table->unique(['table_name', 'column_name', 'foreign_key', 'locale']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('translations');
    }
}

