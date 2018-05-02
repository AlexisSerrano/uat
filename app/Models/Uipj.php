<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Uipj extends Model
{
    protected $connection = 'uipj';
    protected $table = 'cat_tipo_arma';
    public $fillable = [
        'id',
        'nombre'
    ];
}


