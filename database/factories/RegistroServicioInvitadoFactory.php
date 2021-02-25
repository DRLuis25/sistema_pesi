<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\RegistroServicioInvitado;
use Faker\Generator as Faker;

$factory->define(RegistroServicioInvitado::class, function (Faker $faker) {

    return [
        'contrato_servicio_id' => $faker->word,
        'costo' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
