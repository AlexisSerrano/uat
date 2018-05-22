<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Intentos extends Model
{
    protected $table = 'intentos';
    protected $fillable = [
        'id',
        'html',
        'fiscal',
        'idOficio'
    ];
}
