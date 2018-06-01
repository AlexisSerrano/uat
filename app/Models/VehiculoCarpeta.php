<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class VehiculoCarpeta extends Model
{
    //
    
    protected $fillable = [
        'id', 'idTipifDelito', 'placas', 'idEstado', 'idSubmarca', 'modelo', 'nrpv', 'idColor', 'permiso', 'numSerie', 'numMotor', 'idTipoVehiculo', 'idTipoUso', 'senasPartic', 'idProcedencia', 'idAseguradora',
    ];
}
