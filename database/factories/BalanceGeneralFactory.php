<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\BalanceGeneral;
use Faker\Generator as Faker;

$factory->define(BalanceGeneral::class, function (Faker $faker) {

    return [
        'activos' => $faker->randomDigitNotNull,
        'pasivos' => $faker->randomDigitNotNull,
        'capital' => $faker->randomDigitNotNull,
        'fecha_pago_tributo' => $faker->date('Y-m-d H:i:s'),
        'descripcion' => $faker->word,
        'personal_id' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
