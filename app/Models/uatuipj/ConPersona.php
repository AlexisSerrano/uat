<?php

namespace App\Models\uatuipj;

use Illuminate\Database\Eloquent\Model;

class ConPersona extends Model
{
    protected $connection = 'uipj';
    protected $table = 'persona';

    protected $fillable = [
        'id', 'nombres', 'primerAp', 'segundoAp', 'fechaNacimiento', 'rfc', 'curp', 'sexo', 'idNacionalidad', 'idEtnia', 'idLengua', 'idMunicipioOrigen', 'esEmpresa',
    ];

    // public function familiares(){
    // 	return $this->hasMany('App\Models\Familiar');
    // }

    // public function nacionalidad(){
    // 	return $this->belongsTo('App\Models\CatNacionalidad');
    // }

    // public function etnia(){
    // 	return $this->belongsTo('App\Models\CatEtnia');
    // }

    // public function lengua(){
    // 	return $this->belongsTo('App\Models\CatLengua');
    // }

    // public function municipio(){
    // 	return $this->belongsTo('App\Models\CatMunicipio');
    // }

    // public function variablesPersonas(){
    // 	return $this->hasMany('App\Models\VariablesPersona');
    // }
}
