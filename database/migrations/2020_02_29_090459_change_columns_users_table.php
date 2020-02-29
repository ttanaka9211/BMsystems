<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnsUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone')->nullable()->change();
            $table->string('mobile')->nullable()->change();
            $table->string('zipcode')->nullable()->change();
            $table->text('address')->nullable()->change();
            $table->integer('hourly_wage')->nullable()->change();
            $table->date('hire_date')->nullable()->change();
            $table->string('name_pronunciation')->nullable()->change();
            $table->integer('birth_year')->nullable()->change();
            $table->integer('birth_month')->nullable()->change();
            $table->integer('birth_day')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone')->change();
            $table->string('mobile')->change();
            $table->string('zipcode')->change();
            $table->text('address')->change();
            $table->integer('hourly_wage')->change();
            $table->date('hire_date')->change();
            $table->string('name_pronunciation')->change();
            $table->integer('birth_year')->change();
            $table->integer('birth_month')->change();
            $table->integer('birth_day')->change();
        });
    }
}