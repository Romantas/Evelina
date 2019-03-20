<?php

use Faker\Generator as Faker;

use App\Company;
use App\Student;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Message::class, function (Faker $faker) {

        $i = rand(0, 1);
        if($i){
            $to = Company::all();
            $from = Student::all();
        }
        else{
            $from = Company::all();
            $to = Student::all();
        }
    return [
        'to' => $to[0]->email,
        'from' => $from[0]->email,
        'message' => $faker->sentence,
    ];
});
