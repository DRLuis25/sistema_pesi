<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ReporteSancion;
use Faker\Generator as Faker;

$factory->define(ReporteSancion::class, function (Faker $faker) {

    return [
        'fecha_creacion' => $faker->date('Y-m-d H:i:s'),
        'personal_id' => $faker->word,
        'archivo' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
