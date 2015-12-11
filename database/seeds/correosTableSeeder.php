<?php

use Illuminate\Database\Seeder;
use fzaninotto\faker\faker\Factory;
use App\Correo;

class correosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 900; $i++) {
        $usuario = new Correo();
        $faker = Faker\Factory::create();
        $usuario->correo = $faker->email;
          $estado= rand(1, 4);
          if($estado ==4)
          {
            $usuario->estatus='INACTIVO';
          }
          else
          {
            $usuario->estatus = 'ACTIVO';    
          }
        $usuario->cliente_id = $faker->numberBetween($min = 1, $max = 25);
        $usuario->save();
      }
    }
}
