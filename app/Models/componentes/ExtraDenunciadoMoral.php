<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class ExtraDenunciadoMoral extends Model
{
    protected $connection = 'componentes';
    protected $table = 'extra_denunciado_moral';

    protected $fillable = [
        'id', 
        'idVariablesPersona', 
        'idPuesto', 
        'alias', 
        'senasPartic', 
        'ingreso', 
        'periodoIngreso', 
        'residenciaAnterior', 
        'idAbogado', 
        'personasBajoSuGuarda', 
        'perseguidoPenalmente', 
        'vestimenta'
    ];
}
