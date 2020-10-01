<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Project;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {
    return [
        "name" => $faker->name() ,
        "date" => $faker->name() ,
        "img"  => "https://www.imgacademy.com/sites/default/files/2009-stadium-about.jpg" ,
        "desc" => $faker->sentence(200) ,
        "link" => $faker -> text(200) ,
    ];
});
