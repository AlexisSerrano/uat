<?php

namespace App\Models\uatuipj;

use Illuminate\Database\Eloquent\Model;

class ConDomicilio extends Model
{
    protected $connection = 'uipj';
    protected $table = 'domicilio';

    protected $fillable = [
        'id', 'idMunicipio', 'idLocalidad', 'idColonia',  'calle', 'numExterno',  'numInterno',
    ];

    public function variablesPersonas()
    {
        return $this->hasMany('App\Models\uatuipj\ConVariablesPersona');
    }

    public function dirNotificaciones()
    {
        return $this->hasMany('App\Models\DirNotificacion');
    }

    public function tipifDelitos()
    {
        return $this->hasMany('App\Models\uatuipj\ConTipifDelito');
    }

    public function municipio()
    {
        return $this->belongsTo('App\Models\CatMunicipio');
    }

    public function localidad()
    {
        return $this->belongsTo('App\Models\CatLocalidad');
    }


    public function colonia()
    {
        return $this->belongsTo('App\Models\CatColonia');
    }
}
