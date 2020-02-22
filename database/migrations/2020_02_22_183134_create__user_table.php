<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('mail');
            $table->string('phone');
            $table->string('mobile');
            $table->integer('zipcode');
            $table->text('address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('_user');
    }
}