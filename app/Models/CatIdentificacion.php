<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatIdentificacion extends Model
{
    protected $table = 'cat_identificacion';

    protected $fillable = [
        'id', 'documento',
    ];

    
}
