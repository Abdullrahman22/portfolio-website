<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Messege;
use Faker\Generator as Faker;

$factory->define(Messege::class, function (Faker $faker) {
    return [
        'body'  => $faker->sentence(10)  ,
        'name'  => $faker->name()  ,
        'email' => $faker->email()  ,
        'phone' => $faker->phoneNumber()  ,
    ];
});
