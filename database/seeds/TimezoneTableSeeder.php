<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimezoneTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $param = [
        'timezone' => '５時〜９時',
        ];
        DB::table('timezones')->insert($param);

        $param = [
        'timezone' => '9時〜13時',
        ];
        DB::table('timezones')->insert($param);

        $param = [
        'timezone' => '12時〜17時',
        ];
        DB::table('timezones')->insert($param);

        $param = [
        'timezone' => '17時〜22時',
        ];
        DB::table('timezones')->insert($param);

        $param = [
        'timezone' => '22時〜5時',
        ];
        DB::table('timezones')->insert($param);
    }
}