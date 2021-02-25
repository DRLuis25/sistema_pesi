<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Inscripcion;
use Faker\Generator as Faker;

$factory->define(Inscripcion::class, function (Faker $faker) {

    return [
        'tarjeta_propiedad' => $faker->word,
        'soat_afocat' => $faker->word,
        'certificado_gps' => $faker->word,
        'certificado_gas' => $faker->word,
        'revision_tecnica' => $faker->word,
        'dni' => $faker->word,
        'nombre_propietario' => $faker->word,
        'apellidoPaterno_propietario' => $faker->word,
        'apellidoMaterno_propietario' => $faker->word,
        'telefono_propietario' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
