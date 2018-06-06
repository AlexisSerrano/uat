<?php

namespace App\Models\formatos;

use Illuminate\Database\Eloquent\Model;

class Psicologo extends Model
{
    //
    // protected $connection = 'formatos'; 
     protected $table = 'per_psicologos';
    public $fillable = [
        'id',
        'idCarpeta',
        'nombre',
       'primerAp',
        'segundoAp',
        'numero',
        'fecha',
        'delito'
        
    ];
}
