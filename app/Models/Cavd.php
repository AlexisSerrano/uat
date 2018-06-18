<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cavd extends Model
{
    public $table = 'cavd';



    protected $fillable = [
        'id', 'idCavd', 'idVariablesPersona', 'idCarpeta' 
    ];






}