<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Atencion extends Model
{
    protected $table = 'atenciones';

    protected $fillable = [
        'id', 'idRedireccion', 'nombre', 'updated_at', 'created_at'
    ];
}
