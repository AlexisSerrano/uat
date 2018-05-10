<?php

namespace App\Models\uatuipj;

use Illuminate\Database\Eloquent\Model;

class ConAcusacion extends Model
{
    protected $connection = 'uipj';
    public $table = 'acusacion';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    public $fillable = [
        'id',
        'idCarpeta',
        'idDenunciante',
        'idTipifDelito',
        'idDenunciado'
    ];

    public function extraDenunciante(){
        return $this->belongsTo('App\Models\uatuipj\ConExtraDenunciante');
    }

    public function extraDenunciado(){
        return $this->belongsTo('App\Models\uatuipj\ConExtraDenunciado');
    }

    public function carpeta(){
        return $this->belongsTo('App\Models\uatuipj\ConCarpeta');
    }

    public function tipifDelito(){
        return $this->hasOne('App\Models\uatuipj\ConTipifDelito');
    }

}
