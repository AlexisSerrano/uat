<?php

namespace App\Models\formatos;

use Illuminate\Database\Eloquent\Model;

class Lesione extends Model
{
    //
    protected $connection = 'formatos'; 
    protected $table = 'lesiones';
    protected $fillable = [
        'id',
        'idCarpeta',
        'nombre',
        'primerAp',
        'segundoAp',
        'fecha'
        
    ];

}
