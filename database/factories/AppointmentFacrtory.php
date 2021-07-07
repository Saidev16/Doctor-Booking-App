<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Appointment;
use App\Model;
use App\User;
use Faker\Generator as Faker;

$factory->define(Appointment::class, function (Faker $faker) {
    return [
        'user_id'=> User::where('role_id', 1)->select('id')->inRandomOrder()->first()->id,
        'date'=> '2021-07-07',
    ];
});
