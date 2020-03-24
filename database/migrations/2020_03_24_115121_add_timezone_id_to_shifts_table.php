<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTimezoneIdToShiftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shifts', function (Blueprint $table) {
            $table->integer('timezone_id')->after('week_id');
            $table->dateTime('start_time')->change();
            $table->dateTime('ending_time')->change();
            $table->integer('accepted')->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shifts', function (Blueprint $table) {
            $table->dropColumn('timezone_id');
            $table->date('start_time')->change();
            $table->date('ending_time')->change();
            $table->integer('accepted')->change();
        });
    }
}