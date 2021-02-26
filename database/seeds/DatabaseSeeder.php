<?php

use App\Models\ContratoPersonal;
use App\Models\Usuarios;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DatosLuisSeeder::class);
        //http://190.234.159.167:9000/
        
        $admin=Usuarios::create([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=>'$2y$10$cuf37o9lN0IkRFv73Q7IB.c5bDqCvog845XuTKHxSbMep/D04mknG', //password
            'contrato_personal_id'=> factory(ContratoPersonal::class)->create()->id,
        ]);
        factory(Usuarios::class,20)->create();
        //factory(User::class,20)->create();
    }
}
