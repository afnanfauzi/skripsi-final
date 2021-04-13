<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\StatusPublikasi;
use Faker\Generator as Faker;

$factory->define(StatusPublikasi::class, function (Faker $faker) {
    return [
        'nama_status' => $faker->unique()->randomElement($array = array ('Ya','Tidak'))
    ];
});
