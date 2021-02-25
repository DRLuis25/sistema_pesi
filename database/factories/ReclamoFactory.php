<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Reclamo;
use Faker\Generator as Faker;

$factory->define(Reclamo::class, function (Faker $faker) {

    return [
        'descripcion' => $faker->word,
        'cliente_id' => $faker->word,
        'personal_id' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
