<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Personal;
use Faker\Generator as Faker;

$factory->define(Personal::class, function (Faker $faker) {

    return [
        'nombres' => $faker->firstName,
        'apellidoPaterno' => $faker->lastName,
        'apellidoMaterno' => $faker->lastName,
        'telefono' => $faker->e164PhoneNumber,
        'email' => $faker->email(),
        'direccion' => $faker->address,
        'tipo' => $faker->numberBetween(1, 3),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => null,
        'deleted_at' => null
    ];
});
