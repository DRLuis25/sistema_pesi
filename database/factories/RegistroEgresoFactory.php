<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\RegistroEgreso;
use Faker\Generator as Faker;

$factory->define(RegistroEgreso::class, function (Faker $faker) {

    return [
        'monto' => $faker->randomDigitNotNull,
        'fecha_egreso' => $faker->date('Y-m-d H:i:s'),
        'descripcion' => $faker->word,
        'registro_pago_personal_id' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
