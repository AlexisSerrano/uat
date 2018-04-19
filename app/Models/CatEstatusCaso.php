<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatEstatusCaso extends Model
{
     public $table = 'cat_estatus_casos';


    
    public $fillable = [
        'id',
        'nombreEstatus'
    ];

    public function Carpeta(){
        return $this->hasMany('app/Models/Carpeta');

    }

}
