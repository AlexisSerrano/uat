<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CatMunicipio;
use App\Models\CatLocalidad;
use App\Models\CatColonia;

class RegisterController extends Controller
{
   
    /*-----Métodos para obetener catálogos-----*/
    public function getMunicipios(Request $request, $id){
        if($request->ajax()){
            $municipios = CatMunicipio::municipios($id);
            return response()->json($municipios);
        }
    }

    public function getLocalidades(Request $request, $id){
        if($request->ajax()){
            $localidades = CatLocalidad::localidades($id);
            return response()->json($localidades);
        }
    }

    public function getColonias2(Request $request, $id){
        if($request->ajax()){
            $colonias = CatColonia::colonias2($id);
            return response()->json($colonias);
        }
    }

    public function getCodigos(Request $request, $id){
        if($request->ajax()){
            $codigos = CatColonia::codigos($id);
            return response()->json($codigos);
        }
    }

    public function getCodigos2(Request $request, $id){
        if($request->ajax()){
            $codigos = CatColonia::codigos2($id);
            return response()->json($codigos);
        }
    }

    public function getColonias(Request $request, $cp){
        if($request->ajax()){
            $colonias = CatColonia::colonias($cp);
            return response()->json($colonias);
        }
    }

    
    public function errorlogin()
    {
        return view('servicios.errores.errorlogin');
    }
}
