<?php

namespace App\Models\uatuipj;

use Illuminate\Database\Eloquent\Model;

class ConExtraDenunciante extends Model
{
    protected $connection = 'uipj';
    public $table = 'extra_denunciante';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    public $fillable = [
        'id',
        'idVariablesPersona',
        'idNotificaciones',
        'idAbogado',
        'victima',
        'reguardarIdentidad',
        'narracion'
    ];
    
    public function variablesPersona()
    {
       return $this->belongsTo('app/Models/uatuipj/ConVariablesPersona');
    }

    public function abogado()
    {
       return $this->belongsTo('app/Models/uatuipj/ConExtraAbogado');
    }

    public function notificacion()
    {
       return $this->hasOne('app/Models/uatuipj/ConDirNotificacion');
    }

    // public function acusacion()
    // {
    //    return $this->belongsTo('app/Models/Acusacion');
    // }
}
