<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Oficio;
use App\Models\Aoficio;
use App\Models\Intentos;
use DB;

class OficioController extends Controller
{
    public function oficios(Request $request){
        $templates = DB::table('oficios')
        ->where('nombre', $request->tipo)
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

    /*Cambiar sistema por el que corresponda y la unidad por la que tenga asiganada el usuario logueado */
    public function getOficios(){
        $oficios = Aoficio::where('unidad',1)
        ->where('sistema','uat')
        ->select('id','nombre')
        ->get();
        return view('forms.oficios', compact('oficios')); 
    }

    public function getOficio(Request $request){
        $oficio = DB::table('oficios')
        ->where('id', $request->id)
        ->get();
        return response()->json($oficio);
    }

    /*Cambiar sistema por el que corresponda y la unidad por la que tenga asiganada el usuario logueado */
    public function addOficio(Request $request){
        $oficio = new Oficio();
        $oficio->unidad = 1;
        $oficio->sistema = 'uat';
        $oficio->nombre = $request->nombre;
    }

    public function updateOficio(Request $request){
        $id = $request->id;
        $oficio = Oficio::find('id',$id);
        //$oficio-
    }
}
