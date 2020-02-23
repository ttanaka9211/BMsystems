<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClerksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $param = [
            'name' => '田中 利幸',
            'mail' => 'ttanaka@hatchdogs.net',
            'line_id' => 'testtest',
            'phone' => '0883220515',
            'mobile' => '09047848784',
            'zipcode' => '7711506',
            'address' => '徳島県阿波市土成町土成字南原２５１−９',
        ];
        DB::table('clerks')->insert($param);

        $param = [
            'name' => '田中 栞愛',
            'mail' => 'ttanaka@hatchdogs.net',
            'line_id' => 'testtest',
            'phone' => '',
            'mobile' => '09047848784',
            'zipcode' => '7711506',
            'address' => '徳島県阿波市土成町土成字南原２５１−９',
        ];
        DB::table('clerks')->insert($param);

        $param = [
            'name' => '田中 太郎',
            'mail' => 'taro@hatchdogs.net',
            'line_id' => '',
            'phone' => '',
            'mobile' => '09047653468',
            'zipcode' => '7723418',
            'address' => '徳島県吉野川市鴨島町知江島２３４１−６',
        ];
        DB::table('clerks')->insert($param);

        $param = [
            'name' => '田中 次郎',
            'mail' => 'jiro@hatchdogs.net',
            'line_id' => '',
            'phone' => '0883220000',
            'mobile' => '09068946324',
            'zipcode' => '7742312',
            'address' => '徳島県名西郡石井町石井２３１４−５',
        ];
        DB::table('clerks')->insert($param);

        $param = [
            'name' => '橋本 真司',
            'mail' => 'shingi@hatchdogs.net',
            'line_id' => '',
            'phone' => '',
            'mobile' => '09078332411',
            'zipcode' => '7701675',
            'address' => '徳島県吉野川市山川町字川田２３４−１',
        ];
        DB::table('clerks')->insert($param);
    }
}