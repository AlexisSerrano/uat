<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class ExtraDenuncianteMoral extends Model
{
    protected $connection = 'componentes';
    public $table = 'extra_denunciante_moral';
    
    public $fillable = [
        'id',
        'idVariablesPersona',
        'idAbogado',
        'reguardarIdentidad',
        'victima'
    ];
}
