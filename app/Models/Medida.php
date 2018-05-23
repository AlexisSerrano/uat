<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medida extends Model
{
    //
    protected $table = 'providencias_precautorias';
    protected $fillable = [
        'id',
        'idCarpeta',
        'idProvidencia',
        'idEjecutor',
        'idPersona',
        'fechaInicio',
        'fechaFin',
        'nombre',
        'apellidoP',
        'apellidoM',
        'calle',
        'numero',
        'colonia',
        'cp',
        'ciudad',
        'estado',
        'celular',
        'opcion',
        'delito'
    ];
}
