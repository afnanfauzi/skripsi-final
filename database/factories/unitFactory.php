<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Unit;
use Faker\Generator as Faker;

$factory->define(Unit::class, function (Faker $faker) {
    return [
        // 'idunit' => $faker->unique()->numberBetween($min = 1, $max = 20),
        'nama_unit' => $faker->company,
        'no_telp' => $faker->e164PhoneNumber,
    ];
});
