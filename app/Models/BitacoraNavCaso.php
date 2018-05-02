<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BitacoraNavCaso extends Model
{
    public $table = 'bitacora_navcaso';

    public $fillable = [
        'id',
        'denunciante',
        'denunciado',
        'abogado',
        'autoridad',
        'delitos',
        'acusaciones',
        'defensa',
        'hechos',
        'medidas',
        'idCaso',
        'created_at',
        'updated_at'
    ];
}
