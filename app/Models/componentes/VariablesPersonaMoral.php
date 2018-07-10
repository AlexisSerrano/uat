<?php

namespace App\Models\componentes;


use Illuminate\Database\Eloquent\Model;


class VariablesPersonaMoral extends Model
{
    protected $connection = 'componentes';
    public $table = 'variables_persona_moral';
    
    public $fillable = [
        'id',
        'idPersona',
        'telefono',
        'representanteLegal',
        'idDomicilio',
        'idNotificacion'
    ];    
}
