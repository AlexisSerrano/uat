<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActaCircunstanciada extends Model
{
    public $table = 'acta_circunstanciada';

    public $fillable = [
        'id',
     
        'hora',
        'fecha',
        'fiscal',
        'nombre',
        'primer_ap',
        'segundo_ap',
        'identificacion',
        'num_identificacion',
        'expedido',
        'fecha_nac',
        'idDomicilio',
        'idOcupacion',
        'idEstadoCivil',
        'idEscolaridad',
        'telefono',
      
        'narracion',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
