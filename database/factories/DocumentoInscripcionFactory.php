<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\DocumentoInscripcion;
use Faker\Generator as Faker;

$factory->define(DocumentoInscripcion::class, function (Faker $faker) {

    return [
        'conductor_id' => $faker->word,
        'propietario_id' => $faker->word,
        'vehiculo_id' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
