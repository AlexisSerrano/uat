<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatRedireccion extends Model
{
    protected $table = 'cat_redirecciones';

    protected $fillable = [
        'id', 'titulo', 'status', 'updated_at', 'created_at'
    ];
}
