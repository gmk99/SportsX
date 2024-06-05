<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionsTable extends Migration
{
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('key');
            $table->string('table_name')->nullable();
            $table->timestamps();

            $table->index('key');
        });
    }

    public function down()
    {
        Schema::dropIfExists('permissions');
    }
}

