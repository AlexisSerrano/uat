<?php

namespace App\Models\componentes;

use Illuminate\Database\Eloquent\Model;


class SexoModel extends Model
{
    //
    protected $connection = 'componentes';
    protected $table='sexos';
    protected $fillable = [
        'id', 
        'nombre'
    ];
}
