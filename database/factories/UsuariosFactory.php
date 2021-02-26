<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ContratoPersonal;
use App\Models\Usuarios;
use Faker\Generator as Faker;

$factory->define(Usuarios::class, function (Faker $faker) {

    return [
        'name' => $faker->firstName(),
        'email' => $faker->email(),
        'email_verified_at' => $faker->date('Y-m-d H:i:s'),
        'password' => '$2y$10$cuf37o9lN0IkRFv73Q7IB.c5bDqCvog845XuTKHxSbMep/D04mknG',
        'remember_token' => null,
        'contrato_personal_id' => function () {
            return factory(ContratoPersonal::class)->create()->id;
        },
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => null,
        'deleted_at' => null,
    ];
});
