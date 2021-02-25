<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\AsistenciaPersonal;
use Faker\Generator as Faker;

$factory->define(AsistenciaPersonal::class, function (Faker $faker) {

    return [
        'fecha' => $faker->date('Y-m-d H:i:s'),
        'estado' => $faker->word,
        'personal_id' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
