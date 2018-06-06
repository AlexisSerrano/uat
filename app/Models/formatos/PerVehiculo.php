<?php

namespace App\Models\formatos;

use Illuminate\Database\Eloquent\Model;

class PerVehiculo extends Model
{
    //
     
   
    public $fillable = [
        'id',
        'idCarpeta',
        'idMarca',
        'idSubmarca',
        'idClase',
        'linea',
        'modelo',
        'color',
        'numero_serie',
        'lugar_fabricacion',
        'placas',
        'nombre',
        'primerAp',
         'segundoAp',
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
