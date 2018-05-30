<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatAseguradora extends Model
{
    public $table = 'cat_aseguradoras';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    public $fillable = [
        'id',
        'nombre'
    ];

    // public function vehiculos()
    // {
    //    return $this->hasMany('app/Models/Vehiculo');
    // }
}
