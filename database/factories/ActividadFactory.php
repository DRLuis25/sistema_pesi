<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Actividad;
use Faker\Generator as Faker;

$factory->define(Actividad::class, function (Faker $faker) {

    return [
        'descripcion' => $faker->word,
        'gerente_id' => $faker->word,
        'fecha' => $faker->date('Y-m-d H:i:s'),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
