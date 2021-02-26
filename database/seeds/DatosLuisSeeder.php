<?php

use App\Models\Conductor;
use App\Models\FichaConductor;
use App\Models\Propietario;
use App\Models\RegistroParadero;
use App\Models\Vehiculo;
use Illuminate\Database\Seeder;

class DatosLuisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(RegistroParadero::class,20)->create();
        //factory(FichaConductor::class,20)->create();
        factory(Conductor::class,20)->create();
        factory(Propietario::class,20)->create();
        factory(Vehiculo::class,20)->create();
    }
}
