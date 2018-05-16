<?php

namespace App\Models\formatos;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    //
    protected $connection = 'formatos'; 
    protected $table = 'vehiculos';
    protected $fillable = [
        'id',
        'idCarpeta',
        'marca',
        'linea',
        'modelo',
        'color',
        'numero_serie',
        'lugar_fabricacion',
        'placas',
        'nombre',
        'numero',
        'calle',
        'num_ext',
        'num_int',
        'entidad',
        'municipio',
        'localidad',
        'colonia',
        'codigo_postal', 
        'fecha'

    ];
}
