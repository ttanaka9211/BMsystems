<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShiftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shifts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date')->comment('日付');
            $table->integer('week_id')->comment('曜日');
            $table->datetime('start_time')->comment('開始時間');
            $table->datetime('ending_time')->comment('終了時間');
            $table->integer('user_id')->comment('従業員番号');
            $table->integer('accepted')->comment('管理者承認');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shifts');
    }
}