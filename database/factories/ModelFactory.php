<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(CursoLaravel\Entities\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});


$factory->define(CursoLaravel\Entities\Client::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'responsible' => $faker->name,
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'obs' => $faker->text(),
    ];
});

$factory->define(CursoLaravel\Entities\Project::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->text(),
        'progress' => $faker->randomElement([1,2,3,4]),
        'status' => $faker->text(),
        'due_date' => $faker->dateTime,
        'owner_id' => $faker->randomElement([1,2,3,4,5,6,7,8,9,10]),
        'client_id' => $faker->randomElement([1,2,3,4,5,6,7,8,9,10]),
    ];
});
