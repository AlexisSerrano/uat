<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Oficio;
use App\Models\Intentos;
use DB;

class OficioController extends Controller
{
    public function oficios(Request $request){
        //echo $request->tipo;
        $templates = DB::table('templates')
        ->join('oficios', 'templates.idOficio', '=', 'oficios.id')
        ->join('secciones_oficios', 'templates.idSeccion', '=', 'secciones_oficios.id')
        ->where('oficios.nombre', $request->tipo)
        ->select('secciones_oficios.html as html','oficios.id as id')
        ->get();
        return response()->json($templates);
    }

    public function getToken() { 
        return substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 30); 
    }
    
    public function saveOficio(Request $request){      
            $oficio = new Oficio();
            $oficio->html = $request->html;
            $oficio->token = $request->token;
            $oficio->fiscal = $request->fiscal;
            $oficio->idOficio = $request->id_oficio;
            if($oficio->save()){
                echo 1;
            }
            else{
                echo 0;
            }
        
    }

    public function intentos(Request $request){
        $intento = new Intentos();
        $intento->html = $request->html;
        $intento->fiscal = $request->fiscal;
        $intento->idOficio = $request->id_oficio;
        if($intento->save()){
            echo 1;
        }
        else{
            echo 0;
        }
    
}
}
