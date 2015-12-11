<?php

use Illuminate\Database\Seeder;
use fzaninotto\faker\faker\Factory;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $admin = new User();
        $admin->name = 'Henry Leon Gomez';
        $admin->email = 'helg18@gmail.com';
        $admin->password = bcrypt("administrador");
        $admin->save();
      for ($i=0; $i < 25; $i++) {
        $usuario = new User();
        $faker = Faker\Factory::create();
        $usuario->name = $faker->name;
        $usuario->email = $faker->email;
        $usuario->password = bcrypt($faker->name);
        $usuario->save();
      }
    }
 
}

