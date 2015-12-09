<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Correo extends Model
{
  protected $table='correos';
  protected $fillable=['correo', 'estatus','cliente_id'];
  
  public function cliente()
  {
    return $this->belongsTo('App\Cliente');
  }
 
}
