<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\RegistroIngreso;
use Faker\Generator as Faker;

$factory->define(RegistroIngreso::class, function (Faker $faker) {

    return [
        'monto' => $faker->randomDigitNotNull,
        'fecha_ingreso' => $faker->date('Y-m-d H:i:s'),
        'descripcion' => $faker->word,
        'registro_pago_base_id' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
