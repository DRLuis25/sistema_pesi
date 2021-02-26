<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Conductor;
use App\Models\FichaConductor;
use Faker\Generator as Faker;

$factory->define(Conductor::class, function (Faker $faker) {

    return [
        'fecha_contrato' => $faker->date('Y-m-d H:i:s'),
        'observaciones' => ($faker->numberBetween(0, 2)>1)?($faker->sentence(5)):null,
        'ficha_conductor_id' => function () {
            return factory(FichaConductor::class)->create()->id;
        },
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => null,
        'deleted_at' => null
    ];
});
