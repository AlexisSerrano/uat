<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ejecutor;
use App\Models\Providencia;

class MedidasProteccionController extends Controller
{
    public function index(){
        $providencias[''] = 'Seleccione una providencia precautoria';
        $ejecutores[''] = 'Seleccione un ejecutor';
        $providencias2 = Providencia::get();
        $ejecutores2 = Ejecutor::get();
        foreach($providencias2 as $providencia){
            $providencias[$providencia->id] = $providencia->nombre;
        }
        foreach($ejecutores2 as $ejecutor){
            $ejecutores[$ejecutor->id] = $ejecutor->nombre;
        }
        return view('forms.medidasProteccion', compact('providencias','ejecutores'));
    }

    public function addMedidas(){

    }
}
