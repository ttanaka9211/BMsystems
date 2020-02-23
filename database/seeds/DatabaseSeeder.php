<?php

use Illuminate\Database\Seeder;
use App\models\clerk;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call(WeekTableSeeder::class);
        $this->call(TimezoneTableSeeder::class);
        factory(clerk::class, 30)->create();
    }
}