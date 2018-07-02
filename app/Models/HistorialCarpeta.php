<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistorialCarpeta extends Model
{
    protected $table = 'historial_carpeta';

    public $fillable = [
        'id',
        'idCarpeta',
        'idEstatusCarpeta',
        'observacion',
        'fecha'
    ];
}
