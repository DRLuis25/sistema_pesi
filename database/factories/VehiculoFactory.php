<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Vehiculo;
use Faker\Generator as Faker;

$factory->define(Vehiculo::class, function (Faker $faker) {

    return [
        'placa' => $faker->word,
        'color' => $faker->word,
        'marca' => $faker->word,
        'modelo' => $faker->word,
        'inscripcion_id' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
