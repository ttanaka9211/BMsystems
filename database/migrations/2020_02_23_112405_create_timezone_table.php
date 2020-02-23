<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimezoneTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('timezone', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('timezone');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('timezone');
    }
}