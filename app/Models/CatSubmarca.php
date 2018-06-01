<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatSubmarca extends Model
{
    //
    protected $fillable = [
        'id', 'idSubmarca', 'idMarca', 'nombre',
    ];
    public static function submarcas($id){
        return CatSubmarca::select('id', 'nombre')->where('idMarca', '=', $id)->get();
    }

}
