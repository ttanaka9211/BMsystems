<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WeekTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $param = [
            'week' => '月曜日',
        ];
        DB::table('weeks')->insert($param);

        $param = [
            'week' => '火曜日',
        ];
        DB::table('weeks')->insert($param);

        $param = [
            'week' => '水曜日',
        ];
        DB::table('weeks')->insert($param);

        $param = [
            'week' => '木曜日',
        ];
        DB::table('weeks')->insert($param);

        $param = [
            'week' => '金曜日',
        ];
        DB::table('weeks')->insert($param);

        $param = [
            'week' => '土曜日',
        ];
        DB::table('weeks')->insert($param);

        $param = [
            'week' => '日曜日',
        ];
        DB::table('weeks')->insert($param);
    }
}