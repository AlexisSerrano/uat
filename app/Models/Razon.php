<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Razon extends Model
{
    
    
    protected $table = 'razones';

    protected $fillable = [
        'id',
        'nombre',
        'status',
        
    ];

    public function preresgistro(){

        return $this->hasMany('App\Models\Preresgistro');
    }

}
