<?php

namespace App\Models\uatuipj;

use Illuminate\Database\Eloquent\Model;

class ConExtraAbogado extends Model
{
    protected $connection = 'uipj';
    public $table = 'extra_abogado';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    public $fillable = [
        'id',
        'idVariablesPersona',
        'cedulaProf',
        'sector',
        'correo',
        'tipo'
    ];

    public function variablesPersona()
    {
       return $this->belongsTo('app/Models/uatuipj/ConVariablesPersona');
    }

    public function extraDenunciante()
    {
       return $this->hasMany('app/Models/uatuipj/ConExtraDenunciante');
    }

    public function extraDenunciado()
    {
       return $this->hasMany('app/Models/uatuipj/ConExtraDenunciado');
    }
}
