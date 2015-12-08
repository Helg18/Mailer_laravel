<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Correo extends Model
{
  protected $table='correos';
  protected $fillable=['correo', 'estatus','id_cliente'];
  
  public function cliente()
  {
    return $this->belongsTo('App\Cliente');
  }
 
}
