<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacationTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('vacation', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('clerk_id');
            $table->datetime('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('vacation');
    }
}