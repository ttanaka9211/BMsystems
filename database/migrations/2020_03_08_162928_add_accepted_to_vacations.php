<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAcceptedToVacations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vacations', function (Blueprint $table) {
            $table->boolean('accepted')
                ->default(false)
                ->comment('管理者承認')
                ->after('date');
            $table->string('reason')
                ->comment('理由')
                ->after('date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vacations', function (Blueprint $table) {
            $table->dropColumn('accepted');
            $table->dropColumn('reason');
        });
    }
}
