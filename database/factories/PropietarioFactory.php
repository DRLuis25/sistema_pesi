<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Propietario;
use Faker\Generator as Faker;

$factory->define(Propietario::class, function (Faker $faker) {

    return [
        'inscripcion_id' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
