<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class ExtraAutoridad extends Model
{
    protected $connection = 'componentes';
    protected $table = 'extra_autoridad';

    protected $fillable = [
        'id', 
        'idVariablesPersona', 
        'antiguedad', 
        'rango', 
        'horarioLaboral'
    ];
}
