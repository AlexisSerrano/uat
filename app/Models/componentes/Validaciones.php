<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Validaciones extends Model
{
    protected $connection = 'componentes';
    public $table = 'validaciones';
    public $fillable = [
        'id',
        'sistema',
        'tipo',
        'validaciones'
    ];
}
