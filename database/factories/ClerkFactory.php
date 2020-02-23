<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\models\clerk;
use Faker\Generator as Faker;

$factory->define(clerk::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'mail' => $faker->safeEmail,
        'line_id' => $faker->numberBetween($min = 666, $max = 999),
        'phone' => $faker->phoneNumber,
        'mobile' => substr($faker->phoneNumber, 11),
        'zipcode' => $faker->postcode,
        'address' => substr($faker->address, 9),
    ];
});