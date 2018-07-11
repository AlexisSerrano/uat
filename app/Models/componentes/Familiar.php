<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Familiar extends Model
{
    protected $connection = 'componentes';
    public $table = 'familiar';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $fillable = [
        'id', 'idPersona', 'nombres', 'primerAp', 'segundoAp', 'parentesco', 'idOcupacion',
    ];
}
