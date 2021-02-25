<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ContratoPersonal;
use Faker\Generator as Faker;

$factory->define(ContratoPersonal::class, function (Faker $faker) {

    return [
        'personal_id' => $faker->word,
        'fecha_contrato' => $faker->date('Y-m-d H:i:s'),
        'tiempo' => $faker->date('Y-m-d H:i:s'),
        'sueldo' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
