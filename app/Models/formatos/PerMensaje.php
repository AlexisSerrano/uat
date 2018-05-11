<?php

namespace App\Models\formatos;

use Illuminate\Database\Eloquent\Model;

class PerMensaje extends Model
{
    //   
    protected $connection = 'formatos'; 
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
