<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\EstadoGananciaPerdida;
use Faker\Generator as Faker;

$factory->define(EstadoGananciaPerdida::class, function (Faker $faker) {

    return [
        'utilidad_bruta' => $faker->randomDigitNotNull,
        'impuestos' => $faker->randomDigitNotNull,
        'fecha' => $faker->date('Y-m-d H:i:s'),
        'descripcion' => $faker->word,
        'personal_id' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
