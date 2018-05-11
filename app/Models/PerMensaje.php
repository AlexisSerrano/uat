<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PerMensaje extends Model
{
    //    
    protected $table = 'per_mensajes';
    protected $fillable = [
        'id',
        'idCarpeta',
        'nombre',
        'marca',
        'imei',
        'compania',
        'telefono',
        'telefono_destino',
        'narracion'
    ];
}