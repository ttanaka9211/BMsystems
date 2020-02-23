<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaseshiftTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('baseshift', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('clerk_id');
            $table->integer('week_id');
            $table->integer('timezone_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('baseshift');
    }
}