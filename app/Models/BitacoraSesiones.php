<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BitacoraSesiones extends Model
{
	use SoftDeletes;
    protected $table = 'bitacora_sesiones';

    protected $fillable = [
        'id', 'zona', 'unidad', 'grupo', 'usuario', 'idSesion', 'update_at', 'create_at', 'deleted_at'
    ];
    protected $dates = ['deleted_at'];
}
