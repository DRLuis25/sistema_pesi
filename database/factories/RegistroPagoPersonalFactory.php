<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\RegistroPagoPersonal;
use Faker\Generator as Faker;

$factory->define(RegistroPagoPersonal::class, function (Faker $faker) {

    return [
        'monto' => $faker->randomDigitNotNull,
        'fecha_pago' => $faker->date('Y-m-d H:i:s'),
        'descripcion' => $faker->word,
        'personal_id' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
