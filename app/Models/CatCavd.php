<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatCavd extends Model
{
    
     public $table = 'cat_cavd';

    protected $fillable = [
        'id', 'unidad', 'direccion', 'estatus', 'nombreDirector'
    ];




}
