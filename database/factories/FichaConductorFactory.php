<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\FichaConductor;
use Faker\Generator as Faker;

$factory->define(FichaConductor::class, function (Faker $faker) {

    return [
        'certificado_pnp' => $faker->word,
        'brevete' => $faker->word,
        'fotocheck' => $faker->word,
        'dni' => $faker->word,
        'recibo' => $faker->word,
        'foto' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
