<?php

namespace App\Models\componentes;

use Illuminate\Database\Eloquent\Model;


class VariablesPersona extends Model
{
    protected $connection = 'componentes';
    public $table = 'variables_persona_fisica';
    
    public $fillable = [
        'id',
        'idPersona',
        'edad',
        'telefono',
        'motivoEstancia',
        'idOcupacion',
        'idEstadoCivil',
        'idEscolaridad',
        'idReligion',
        'docIdentificacion',
        'idInterprete',
        'numDocIdentificacion',
        'idDomicilio',
        'idTrabajo',
        'idNotificacion'
    ];
}
