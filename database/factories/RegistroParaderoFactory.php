<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\RegistroParadero;
use Faker\Generator as Faker;

$factory->define(RegistroParadero::class, function (Faker $faker) {

    return [
        'descripcion' => $faker->word,
        'direccion' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
