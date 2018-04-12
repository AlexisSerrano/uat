<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatProvidencias extends Model
{
    protected $table = 'cat_providencia_precautoria';
    protected $fillable = [
        'id',
        'nombre',
        'status',
        
    ];
}
