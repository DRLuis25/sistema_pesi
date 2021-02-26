<?php

use App\Models\ContratoPersonal;
use App\Models\Usuarios;
use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' => 'Administrador']);
        $operador = Role::create(['name' => 'Operador']);
        $gerente = Role::create(['name' => 'Gerente']);
        $this->call(DatosLuisSeeder::class);
        //http://190.234.159.167:9000/
        
        $admin=Usuarios::create([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=>'$2y$10$cuf37o9lN0IkRFv73Q7IB.c5bDqCvog845XuTKHxSbMep/D04mknG', //password
            'contrato_personal_id'=> factory(ContratoPersonal::class)->create()->id,
        ]);
        $admin = User::where('id','=',$admin->id)->first();
        $admin->assignRole('Administrador');
        factory(Usuarios::class,3)->create()->each(function ($user) {
            $user = User::where('id','=',$user->id)->first();
            $user->assignRole('Gerente');
        });
        factory(Usuarios::class,10)->create()->each(function ($user) {
            $user = User::where('id','=',$user->id)->first();
            $user->assignRole('Operador');
        });
    }
}
