<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Faker\Generator as Faker;

$factory->define(Admin::class, function (Faker $faker) {
    return [
        "username" => "admin",
        "email"    => "admin@example.com",
        "password" => Hash::make('password'),
    ];
});
