<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\RegistroTorneo;
use Faker\Generator as Faker;

$factory->define(RegistroTorneo::class, function (Faker $faker) {

    return [
        'descripcion' => $faker->word,
        'fecha' => $faker->date('Y-m-d H:i:s'),
        'personal_id' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
