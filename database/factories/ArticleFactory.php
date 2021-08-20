<?php

/* @var Factory $factory */
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(App\Article::class, function (Faker $faker) {
    return [
        "title"=> $faker->sentence(),
        "description"=> $faker->paragraph() ,
        "user_id"=> \App\User::all()->random()->id,
    ];
});
