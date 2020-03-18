<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAcceptedToBaseshifts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('baseshifts', function (Blueprint $table) {
            $table->boolean('accepted')
                ->default(false)
                ->comment('管理者承認')
                ->after('timezone_id');
            $table->string('name')->after('user_id');
            $table->string('email')->after('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('baseshifts', function (Blueprint $table) {
            $table->dropColumn('accepted');
            $table->dropColumn('name');
            $table->dropColumn('email');
        });
    }
}
