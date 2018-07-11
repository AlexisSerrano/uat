<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    protected $connection = 'componentes';
    protected $table = 'bitacora';

    protected $fillable = [
        'sistema', 
        'usuario', 
        'tabla',
        'operacion',
        'id_afectado',        
        'antes',
        'despues'
    ];
}
