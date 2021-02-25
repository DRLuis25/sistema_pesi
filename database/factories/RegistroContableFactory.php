<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\RegistroContable;
use Faker\Generator as Faker;

$factory->define(RegistroContable::class, function (Faker $faker) {

    return [
        'ingreso' => $faker->randomDigitNotNull,
        'egreso' => $faker->randomDigitNotNull,
        'fecha' => $faker->date('Y-m-d H:i:s'),
        'descripcion' => $faker->word,
        'personal_id' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
