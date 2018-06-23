<?php

use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(TimeNote\Note::class, function (Faker $faker) {
    return [
        'message'  => $faker->paragraph,
        'time_show' => Carbon::now(),
        'hash' => hash('md5', time() . $faker->paragraph),
    ];

});
