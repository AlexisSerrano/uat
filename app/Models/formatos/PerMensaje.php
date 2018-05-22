<?php

namespace App\Models\formatos;

use Illuminate\Database\Eloquent\Model;

class PerMensaje extends Model
{
    //   
    // protected $connection = 'formatos'; 
    // protected $table = 'per_mensajes';
    public $fillable = [
        'id',
        'idCarpeta',
        'nombre',
        'primerAp',
       'segundoAp',
        'marca',
        'imei',
        'compania',
        'telefono',
        'telefono_destino',
        'narracion'
    ];
}
