<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notificacion extends Model
{
    protected $table = 'notificaciones';

    protected $fillable = [
        'id', 'usuarioFiscal', 'visto', 'tipoNotificacion','update_at','create_at'
    
    ];

}
