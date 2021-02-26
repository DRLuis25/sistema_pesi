<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ContratoPersonal;
use App\Models\Personal;
use Faker\Generator as Faker;

$factory->define(ContratoPersonal::class, function (Faker $faker) {

    return [
        'personal_id' => function () {
            return factory(Personal::class)->create()->id;
        },
        'fecha_contrato' => $faker->date('Y-m-d H:i:s'),
        'tiempo' => $faker->month(),
        'sueldo' => $faker->randomElement(['750.00', '800.00', '700.00', '850.00', '900.00']),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => null,
        'deleted_at' => null
    ];
});
