<?php

use Illuminate\Database\Seeder;
use fzaninotto\faker\faker\Factory;
use App\User;
use App\Acceso;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $admin               = new User();
        $admin   -> name     = 'Henry Leon Gomez';
        $admin   -> email    = 'helg18@gmail.com';
        $admin   -> password = bcrypt("henry");
        $admin   -> perfil   = 'root';
        $admin   -> save();
        $accesos             = new Acceso();
        $accesos -> user_id  = $admin->id;
        $accesos -> create   = 0;
        $accesos -> read     = 0;
        $accesos -> update   = 0;
        $accesos -> delete   = 0;
        
        for ($i=0; $i < 25; $i++) {
        $usuario             = new User();
        $faker               = Faker\Factory::create();
        $usuario -> name     = $faker->name;
        $usuario -> email    = $faker->email;
        $usuario -> password = bcrypt($faker->name);
        $usuario -> perfil   = 'usuario';
        $usuario -> save();
        $accesos             = new Acceso();
        $accesos -> user_id  = $usuario->id;
        $accesos -> create   = 1;
        $accesos -> read     = 1;
        $accesos -> update   = 1;
        $accesos -> delete   = 1;
      }
    }
 
}

