<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class TipoDeterminacion extends Model
{
    protected $connection = 'componentes';
    public $table = 'cat_tipo_determinacion';
    
    public $fillable = [
        'id',
        'nombre'
    ];
}
