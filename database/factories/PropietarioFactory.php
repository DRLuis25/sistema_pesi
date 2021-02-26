<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Propietario;
use Faker\Generator as Faker;

$factory->define(Propietario::class, function (Faker $faker) {

    return [
        'dni' => $faker->dni(),
        'nombre_propietario' => $faker->firstName,
        'apellidoPaterno_propietario' => $faker->lastName,
        'apellidoMaterno_propietario' => $faker->lastName,
        'telefono_propietario' => $faker->e164PhoneNumber,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => null,
        'deleted_at' => null
    ];
});
