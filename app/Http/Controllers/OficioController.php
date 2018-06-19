<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            $oficio->fiscal = Auth::user()->id;
            $oficio->idOficio = $request->id_oficio;
            $oficio->idTabla = $request->id_tabla;
            if($oficio->save()){
                return 1;
            }
            else{
                return 0;
            }
        
    }

    public function intentos(Request $request){
        $intento = new Intentos();
        $intento->html = $request->html;
        $intento->fiscal = Auth::user()->id;
        $intento->idOficio = $request->id_oficio;
        $intento->idTabla = $request->id_tabla;
        if($intento->save()){
            return 1;
        }
        else{
            return 0;
        }
    }

    /*Cambiar sistema por el que corresponda y la unidad por la que tenga asiganada el usuario logueado */
    public function getOficios(){
        $oficios = Aoficio::where('unidad',1)
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
        $oficio = new Aoficio();
        $oficio->nombre = $request->nombre;
        $oficio->encabezado = $request->encabezado;
        $oficio->contenido = $request->contenido;
        $oficio->pie = $request->pie;
        $oficio->unidad = 1;
        if($oficio->save()){
            $data = array('id' => $oficio->id, 'nombre' => $request->nombre);
            return response()->json($data);
        }
        else{
            return 0;
        }
    }

    public function updateOficio(Request $request){
        $oficio = Aoficio::find($request->id);
        $oficio->nombre = $request->nombre;
        $oficio->contenido = $request->contenido;
        $oficio->encabezado = $request->encabezado;
        $oficio->pie = $request->pie;
        if($oficio->save()){
            return 1;
        }
        else{
            return 0;
        }
    }
}
