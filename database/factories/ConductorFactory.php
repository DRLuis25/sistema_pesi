<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Conductor;
use Faker\Generator as Faker;

$factory->define(Conductor::class, function (Faker $faker) {

    return [
        'fecha_contrato' => $faker->date('Y-m-d H:i:s'),
        'observaciones' => $faker->word,
        'ficha_conductor_id' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
