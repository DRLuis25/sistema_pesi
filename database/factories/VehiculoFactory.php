<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Inscripcion;
use App\Models\Vehiculo;
use Faker\Generator as Faker;

$factory->define(Vehiculo::class, function (Faker $faker) {
    $faker->addProvider(new \MattWells\Faker\Vehicle\Provider($faker));
    return [
        'placa' => $faker->vehicleRegistration,
        'color' => $faker->safeColorName(),
        'marca' => $faker->vehicleMake,
        'modelo' => $faker->vehicleModel,
        'inscripcion_id' => function () {
            return factory(Inscripcion::class)->create()->id;
        }, 
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => null,
        'deleted_at' => null
    ];
});
