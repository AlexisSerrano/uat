<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Providencia extends Model
{
    // use SoftDeletes;
    protected $table = 'providencias_precautorias';
    protected $fillable = [
        'id',
        'idCarpeta',
        'idProvidencia',
        'idEjecutor',
        'idPersona',
        'observacion',
        'fechaInicio',
        'fechaFin'
    ];
    // protected $dates = ['deleted_at'];




}
