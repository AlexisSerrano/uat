<?php


namespace App\Models\componentes;

use Illuminate\Database\Eloquent\Model;


class PersonaModel extends Model
{
    protected $connection = 'componentes';
    protected $table = 'persona_fisica';

    protected $fillable = [
        'id', 
        'nombres', 
        'primerAp', 
        'segundoAp', 
        'fechaNacimiento', 
        'rfc', 
        'curp', 
        'sexo', 
        'idNacionalidad', 
        'idEtnia', 
        'idLengua', 
        'idMunicipioOrigen'
    ];

    // public function familiares(){
    // 	return $this->hasMany('App\Models\Familiar');
    // }

    public function nacionalidad(){
    	return $this->hasOne('App\Http\Models\NacionalidadesModel','idNacionalidad');
    }

    public function etnia(){
    	return $this->belongsTo('App\Models\CatEtnia');
    }

    public function lengua(){
    	return $this->belongsTo('App\Models\CatLengua');
    }

    public function municipio(){
    	return $this->belongsTo('App\Models\CatMunicipio');
    }

    public function variablesPersonas(){
    	return $this->hasMany('App\Models\VariablesPersona');
    }
}
