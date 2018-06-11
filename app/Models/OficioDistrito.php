<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OficioDistrito extends Model
{
    protected $table = 'oficio_distritos';
    protected $fillable = [
    'id',
    'entidad',
    'localidad',
    'fecha',
    'denunciante',
    'delito',
    'denunciado',
    'fiscalCordinador',
    'fiscalDistrito',
    'unidad',
    'carpeta',
    'fiscalAtendio'
    ];
}
