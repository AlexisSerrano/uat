<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NarracionPersona extends Model
{
    protected $table = 'narraciones_persona';


    public $fillable = [
        'id',
        'idVariablesPersona',
        'narracion',
        'tipo'
    ];




}
