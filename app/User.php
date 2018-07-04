<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'idUnidad',
        'idZona',
        'grupo',
        'grecepcion',
        'gorientador',
        'gfacilitador',
        'gcoordinador',
        'username',
        'nombreC',
        'nombres',
        'apellidos',
        'email',
        'password',
        'idCarpeta',
        'idPreregistro',
        'session_id',
        'puesto',
        'numFiscal',
        'numFiscalLetras',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'session_id',
    ];
}
