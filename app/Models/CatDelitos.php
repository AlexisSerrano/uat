<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delitos extends Model
{
    public $table = 'cat_delitos';


public $fillable = [
       'id',
        'nombre',
        'snVeh'
    ];

    public function tipifDelitos(){
        return $this->hasMany('App\Models\TipifDelito');
    }
}