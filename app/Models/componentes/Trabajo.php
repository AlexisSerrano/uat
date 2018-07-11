<?php

namespace App\Models\componentes;

use Illuminate\Database\Eloquent\Model;

class Trabajo extends Model
{
    protected $connection = 'componentes';
    public $table = 'trabajo';
    
    public $fillable = [
        'id',
        'idDomicilio',
        'lugar',
        'telefono'
    ];
}
