<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class catIdentificacion extends Model
{
    protected $table = 'cat_identificacion';

    protected $fillable = [
        'id', 'documento',
    ];

    public function personas(){
    	return $this->hasMany('App\Models\Persona');
    }
}

