<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\FichaConductor;
use Faker\Generator as Faker;

$factory->define(FichaConductor::class, function (Faker $faker) {

    return [
        'certificado_pnp' => 'https://fakeimg.pl/350x200/?text=certificado%20pnp',
        'brevete_nro' => "D".$faker->dni()."-".$faker->numberBetween(1, 9),
        'brevete' => 'https://fakeimg.pl/350x200/?text=brevete%20img',
        'fotocheck' => 'https://fakeimg.pl/350x200/?text=fotocheck%20img',
        'dni' => $faker->dni(),
        'recibo' => 'https://fakeimg.pl/350x200/?text=recibo%20img',
        'foto' => 'https://fakeimg.pl/350x200/?text=foto%20img',
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => null,
        'deleted_at' => null,
        'nombres' => $faker->firstName,
        'apellidoPaterno' => $faker->lastName,
        'apellidoMaterno' => $faker->lastName,
        'direccion' => ($faker->numberBetween(0, 2)>1)?($faker->address):null,
    ];
});
