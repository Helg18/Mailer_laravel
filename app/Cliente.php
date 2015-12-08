<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
  protected $table='clientes';
  protected $fillable=['nombre', 'estatus'];
  
  public function correos()
  {
    return $this->hasMany('App\Correo'); 
  }
}
