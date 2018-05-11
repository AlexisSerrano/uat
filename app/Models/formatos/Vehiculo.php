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
        'numeroE',
        'numeroI',
        'entidad',
        'municipio',
        'localidad',
        'colonia',
        'codigo_postal'
        
    ];

}
