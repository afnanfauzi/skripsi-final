<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Kegiatan;
use Faker\Generator as Faker;

$factory->define(Kegiatan::class, function (Faker $faker) {
    return [
        // 'idkegiatan' => $faker->unique()->numberBetween($min = 1, $max = 20),
        'kpi' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'rencana_kegiatan' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'catatan' => '',
        'unit_id' => $faker->randomDigitNotNull,
        'target' => '',
        'tahun' => $faker->randomElement($array = array ('2021','2022')),
        'waktu' => '',
        'rab' => '',


    ];
});
