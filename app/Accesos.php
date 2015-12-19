<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accesos extends Model
{
	protected $table = 'accesos';

    protected $fillable = ['id', 'create', 'read', 'update', 'delete', 'user_id'];

    public function users()
  	{
    	return $this->belongsTo('App\User');
  	}

}
