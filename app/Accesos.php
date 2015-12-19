<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accesos extends Model
{
	protected $table = 'users';

    protected $fillable = ['id', 'create', 'read', 'update', 'delete'];

}
