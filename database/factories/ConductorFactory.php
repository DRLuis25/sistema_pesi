<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Conductor;
use Faker\Generator as Faker;

$factory->define(Conductor::class, function (Faker $faker) {

    return [
        'dni' => $faker->word,
        'descripcion' => $faker->word,
        'certificado_pnp' => $faker->word,
        'brevete' => $faker->word,
        'fotocheck' => $faker->word,
        'recibo' => $faker->word,
        'foto' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
