<?php

namespace App\Models\uatuipj;

use Illuminate\Database\Eloquent\Model;

class ConCarpeta extends Model
{
    protected $connection = 'uipj';
    public $table = 'carpeta';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    public $fillable = [
        'id',
        'idUnidad',
        'idFiscal',
        'numCarpeta',
        'fechaInicio',
        'conDetenido',
        'esRelevante',
        'idEstadoCarpeta',
        'horaIntervencion',
        'descripcionHechos',
        'npd',
        'numIph',
        'fechaIph',
        'narracionIph',
        'idTipoDeterminacion',
        'fechaDeterminacion',        
        'observacionesEstadus',        
        'asignada',        
        'nombreFiscalUat',        
        'numCarpetaUat'        
    ];

    public function acusaciones()
    {
       return $this->hasMany('app/Models/uatuipj/ConAcusacion');
    }

    // public function acumulaciones()
    // {
    //    return $this->hasMany('app/Models/Acumulacion');
    // }

    public function variablesPersona()
    {
       return $this->hasMany('app/Models/uatuipj/ConVariablesPersona');
    }

    public function tipifDelitos()
    {
       return $this->hasMany('app/Models/uatuipj/ConTipifDelito');
    }

    // public function Cat_estatus_caso(){
    //     return $this->belongsTo('app/Models/CatEstatusCaso');
        
    // }


    // public function unidad()
    // {
    //     return $this->belongsTo('app/Models/Unidad');
    // }

    // public function fiscal()
    // {
    //     return $this->belongsTo('app/User');
    // }    

    // public function tipoDeterminacion()
    // {
    //     return $this->belongsTo('app/Models/CatTipoDeterminacion');
    // }
}
