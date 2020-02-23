<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShiftWeekTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('shift_week', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('week');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('shift_week');
    }
}