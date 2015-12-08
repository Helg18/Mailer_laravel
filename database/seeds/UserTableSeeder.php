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

