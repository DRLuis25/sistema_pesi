<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ContratoServicio;
use Faker\Generator as Faker;

$factory->define(ContratoServicio::class, function (Faker $faker) {

    return [
        'cliente_id' => $faker->word,
        'lugar' => $faker->word,
        'duracion' => $faker->word,
        'fecha' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
