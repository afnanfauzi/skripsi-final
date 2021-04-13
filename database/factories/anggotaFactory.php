<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Anggota;
use Faker\Generator as Faker;

$factory->define(Anggota::class, function (Faker $faker) {
    return [
        'nama_anggota' => $faker->firstNameMale,
        'no_telp' => $faker->e164PhoneNumber,
        'alamat' => $faker->streetAddress,
        'unit_id' => $faker->randomDigitNotNull,
        'akun_id' => $faker->numberBetween($min = 10000000, $max = 90000000),
        'jabatan_id' => '1',
    ];
});
