<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
/**
 * Add faker data
 * php artisan tinker
 * factory(\App\channel::class, 20)->create();
 */

use App\channel;
use Faker\Generator as Faker;

$factory->define(channel::class, function (Faker $faker) {
    return [
        'name' => $faker->word
    ];
});
