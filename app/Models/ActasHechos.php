<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActasHechos extends Model
{
    public $table = 'actas_hechos';

    public $fillable = [
        'id',
        'folio',
        'hora',
        'fecha',
        'fiscal',
        'nombre',
        'primer_ap',
        'segundo_ap',
        'identificacion',
        'num_identificacion',
        'fecha_nac',
        'idDomicilio',
        'idOcupacion',
        'idEstadoCivil',
        'idEscolaridad',
        'telefono',
        'tipoActa',
        'narracion',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
