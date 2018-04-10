<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ejecutor extends Model
{
    protected $table = 'ejecutor';
    protected $fillable = [
        'id',
        'nombre',
        'status',
        
    ];
}
