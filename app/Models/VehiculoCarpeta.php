<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class VehiculoCarpeta extends Model
{
    //
    protected $table = 'vehiculo';
    protected $fillable = [
        'id', 'idTipifDelito', 'placas', 'idEstado', 'idSubmarca', 'modelo', 'nrpv', 'idColor', 'permiso', 'numSerie', 'numMotor', 'idTipoVehiculo', 'idTipoUso', 'senasPartic', 'idProcedencia', 'idAseguradora',
    ];

    public function tipifDelito()
    {
       return $this->belongsTo('app/Models/TipifDelito');
    }
}
