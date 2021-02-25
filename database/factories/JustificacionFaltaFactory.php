<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\JustificacionFalta;
use Faker\Generator as Faker;

$factory->define(JustificacionFalta::class, function (Faker $faker) {

    return [
        'fecha_justificacion' => $faker->date('Y-m-d H:i:s'),
        'descripcion' => $faker->word,
        'registro_sancion_id' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
