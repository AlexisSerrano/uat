<?php

namespace App\Models\uatuipj;

use Illuminate\Database\Eloquent\Model;

class ConNotificacion extends Model
{
    protected $connection = 'uipj';
    protected $table = 'notificacion';

    protected $fillable = [
        'id', 'idDomicilio', 'correo', 'telefono', 'fax',
    ];

    public function extraDenunciante()
    {
        return $this->belongsTo('App\Models\uatuipj\ConExtraDenunciante');
    }

    public function extraDenunciado()
    {
        return $this->belongsTo('App\Models\uatuipj\ConExtraDenunciado');
    }

    public function domicilio()
    {
        return $this->belongsTo('App\Models\uatuipj\ConDomicilio');
    }
}
