<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    protected $table = 'bitacora';

    protected $fillable = [
        'id', 'usuarioFiscal', 'accion', 'modulo', 'update_at', 'create_at'
    ];

}
