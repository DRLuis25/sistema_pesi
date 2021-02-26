<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Inscripcion;
use App\Models\Propietario;
use Faker\Generator as Faker;

$factory->define(Inscripcion::class, function (Faker $faker) {

    return [
        'tarjeta_propiedad' => 'https://fakeimg.pl/350x200/?text=tarjeta%20propiedad',
        //'soat_afocat_numero' => $faker->word,
        'soat_afocat' => 'https://fakeimg.pl/350x200/?text=soat%20afocat',
        'certificado_gps' => 'https://fakeimg.pl/350x200/?text=certificado%20gps',
        'certificado_gas' => 'https://fakeimg.pl/350x200/?text=certificado%20gas',
        'revision_tecnica' => 'https://fakeimg.pl/350x200/?text=revision%20tecnica',
        'propietario_id' => function () {
            return factory(Propietario::class)->create()->id;
        }, 
        'estado' => '1',
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => null,
        'deleted_at' => null
    ];
});
