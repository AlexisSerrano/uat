<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Preregistro extends Model
{
    protected $table = 'preregistros';

    protected $fillable = [
        'id',
        'idDireccion',
        'idRazon',
        'esEmpresa',
        'nombre',
        'primerAp',
        'segundoAp',
        'idMunicipioOrigen',
        'rfc',
        'fechaNac',
        'idEscolaridad',
        'idEstadoCivil',
        'idOcupacion',
        'edad',
        'sexo',
        'curp',
        'telefono',
        'docIdentificacion',
        'numDocIdentificacion',
        'conViolencia',
        'narracion',
        'folio',
        'tipoActa',
        'representanteLegal',
        'statusCancelacion',
        'statusOrigen',
        'statusCola',
        'horaLlegada',
        'unidad',
        'zona',
    ];

    public function direcciones(){
        return $this->belongsTo('App\Models\Domicilio');
    }
    
    public function ocupacion(){
        return $this->belongsTo('App\Models\CatOcupacion');
    }
    
    public function escolaridad(){
        return $this->belongsTo('App\Models\CatEscolaridad');
    }
    
    public function estadoCivil(){
        return $this->belongsTo('App\Models\CatEstadoCivil');
    }

    public static function buscarfolio($folio){
        return Preregistro::select('nombre')->where('idEstado', '=', $id)->orderBy('nombre', 'ASC')->get();

        // SELECT * FROM `preregistro` WHERE `folio` LIKE '12345675' ORDER BY `folio` ASC
    }
    

}
