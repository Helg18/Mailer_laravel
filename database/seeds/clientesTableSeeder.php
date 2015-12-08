<?php

use Illuminate\Database\Seeder;
use fzaninotto\faker\faker\Factory;
use App\Cliente;

class clientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 25; $i++) {
        $usuario = new Cliente();
        $faker = Faker\Factory::create();
        $usuario->nombre = $faker->name. " C. A.";$estado= rand(1, 4);
          if($estado ==4)
          {
            $usuario->estatus='INACTIVO';
          }
          else
          {
            $usuario->estatus = 'ACTIVO';    
          }
        $usuario->save();
      }
    }
}
