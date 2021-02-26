<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\RegistroParadero;
use Faker\Generator as Faker;

$factory->define(RegistroParadero::class, function (Faker $faker) {
    
    return [
        'descripcion' => $faker->sentence(5),
        'direccion' => $faker->address,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => null,
        'deleted_at' => null
    ];
});
