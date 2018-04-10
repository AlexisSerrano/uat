<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Providencia extends Model
{
    protected $table = 'providencia_precautoria';
    protected $fillable = [
        'id',
        'nombre',
        'status',
        
    ];
}
