<?php

namespace App\Models\componentes;

use Illuminate\Database\Eloquent\Model;


class AparicionesModel extends Model
{
    //
    protected $connection = 'componentes';
    protected $table='apariciones';
    
    protected $fillable = [
        'id', 
        'idVarPersona', 
        'idCarpeta',
        'sistema',
        'tipoInvolucrado',
        'nuc',
        'esEmpresa', 
        'idTipoDeterminacion'
    ];
}
