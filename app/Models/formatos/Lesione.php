<?php

namespace App\Models\formatos;

use Illuminate\Database\Eloquent\Model;

class Lesione extends Model
{
    //
    // protected $connection = 'formatos'; 
     protected $table = 'per_lesiones';
    public $fillable = [
        'id',
        'idCarpeta',
        'nombre',
        'primerAp',
        'segundoAp',
        'fecha'
        
    ];

}
