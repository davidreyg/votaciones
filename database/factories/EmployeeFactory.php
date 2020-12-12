<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Employee;
use Faker\Generator as Faker;
use Faker\Provider\es_PE\Person;

$factory->define(Employee::class, function (Faker $faker) {
    $faker->addProvider(new Person($faker));;
    return [
        'name' => $faker->firstName,
        'father_last_name' => $faker->lastName,
        'mother_last_name' => $faker->lastName,
        'dni' => $faker->randomNumber(9, true),
        'condition' => 'C',
    ];
});
