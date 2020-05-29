<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Helpers\Routines;
use App\Note;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Note::class, function (Faker $faker) {
    $message = $faker->sentence;
    return [
        'time_show' => Carbon::now()->subDay()->format('Y-m-d H:i:s'),
        'message' => encrypt($message),
        'hash' => Routines::makeHash($message),
        'ip' => '127.0.0.1'
    ];
});
