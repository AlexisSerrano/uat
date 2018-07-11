<?php

namespace App\Models\componentes;

use Illuminate\Database\Eloquent\Model;


class PersonaMoralModel extends Model
{
    protected $connection = 'componentes';
    protected $table='persona_moral';

    protected $fillable=[
        'id',
        'nombre',
        'fechaCreacion',
        'rfc'
    ];   
}
