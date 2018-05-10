<?php

namespace App\Models\uatuipj;

use Illuminate\Database\Eloquent\Model;

class ConExtraAutoridad extends Model
{
    protected $connection = 'uipj';
    protected $table = 'extra_autoridad';

    protected $fillable = [
        'id', 'idVariablesPersona', 'antiguedad', 'rango', 'horarioLaboral', 'narracion',
    ];

    public function variablesPersona()
    {
        return $this->belongsTo('App\Models\uatuipj\ConVariablesPersona');
    }
}
