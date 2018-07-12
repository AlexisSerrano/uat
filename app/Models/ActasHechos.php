<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActasHechos extends Model
{
    public $table = 'actas_hechos';

    public $fillable = [
        'id',
        'hora',
        'fecha',
        'fiscal',
        'expedido',
        'tipoActa',
        'esEmpresa',
        'narracion',
        'varPersona',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
