<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Inspeccion;
use Faker\Generator as Faker;

$factory->define(Inspeccion::class, function (Faker $faker) {

    return [
        'documento_inscripcion_id' => $faker->word,
        'observaciones' => $faker->word,
        'fecha' => $faker->date('Y-m-d H:i:s'),
        'estado' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
