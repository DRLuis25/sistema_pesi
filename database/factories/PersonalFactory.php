<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Personal;
use Faker\Generator as Faker;

$factory->define(Personal::class, function (Faker $faker) {

    return [
        'nombres' => $faker->word,
        'apellidoPaterno' => $faker->word,
        'apellidoMaterno' => $faker->word,
        'precio' => $faker->randomDigitNotNull,
        'tipo' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
