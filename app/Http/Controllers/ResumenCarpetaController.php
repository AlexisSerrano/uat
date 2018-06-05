<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carpeta;
use DB;
use App\Models\Persona;
use App\Models\VariablesPersona;
class ResumenCarpetaController extends Controller

{
    public function showResumen(){
        $idCarpeta=session('carpeta');
        $carpeta=DB::table('carpeta')
        ->join('unidad','carpeta.idUnidad','=','unidad.id')
        ->where('carpeta.id',$idCarpeta)->first();
        // dd($carpeta);
        return view('fields.resumen-carpeta.resumen-carpeta')->with('carpeta',$carpeta);
    }

    public function detalleDenunciante(){
        $idCarpeta=session('carpeta');
        $carpeta=DB::table('carpeta')
        ->join('unidad','carpeta.idUnidad','=','unidad.id')
        ->where('carpeta.id',$idCarpeta)->first();
        // dd($carpeta);

        return view('fields.resumen-carpeta.resumen-denunciante')->with('carpeta',$carpeta);
    }
    
    public function detalleDenunciado(){
        $idCarpeta=session('carpeta');
        $carpeta=DB::table('carpeta')
        ->join('unidad','carpeta.idUnidad','=','unidad.id')
        ->where('carpeta.id',$idCarpeta)->first();
        // dd($carpeta);
        
        return view('fields.resumen-carpeta.resumen-denunciado')->with('carpeta',$carpeta);
    }

    public function detalleAutoridad(){
        $idCarpeta=session('carpeta');
        $carpeta=DB::table('carpeta')
        ->join('unidad','carpeta.idUnidad','=','unidad.id')
        ->where('carpeta.id',$idCarpeta)->first();
        // dd($carpeta);
        
        return view('fields.resumen-carpeta.resumen-autoridad')->with('carpeta',$carpeta);
    }
    
    public function detalleObservaciones(){
        $idCarpeta=session('carpeta');
        $carpeta=DB::table('carpeta')
        ->join('unidad','carpeta.idUnidad','=','unidad.id')
        ->where('carpeta.id',$idCarpeta)->first();
        // dd($carpeta);
        
        return view('fields.resumen-carpeta.resumen-observaciones')->with('carpeta',$carpeta);
    }
    public function detalleDefensa(){
        $idCarpeta=session('carpeta');
        $carpeta=DB::table('carpeta')
        ->join('unidad','carpeta.idUnidad','=','unidad.id')
        ->where('carpeta.id',$idCarpeta)->first();
        // dd($carpeta);
        
        return view('fields.resumen-carpeta.resumen-defensa')->with('carpeta',$carpeta);
    
    }
    public function detalleAbogado(){
        $idCarpeta=session('carpeta');
        $carpeta=DB::table('carpeta')
        ->join('unidad','carpeta.idUnidad','=','unidad.id')
        ->where('carpeta.id',$idCarpeta)->first();
        // dd($carpeta);
        
        return view('fields.resumen-carpeta.resumen-abogado')->with('carpeta',$carpeta);
    }
    public function detalleDelito(){
        $idCarpeta=session('carpeta');
        $carpeta=DB::table('carpeta')
        ->join('unidad','carpeta.idUnidad','=','unidad.id')
        ->where('carpeta.id',$idCarpeta)->first();
        // dd($carpeta);
        
        return view('fields.resumen-carpeta.resumen-delitos')->with('carpeta',$carpeta);
    }
    public function detalleAcusaciones(){
        $idCarpeta=session('carpeta');
        $carpeta=DB::table('carpeta')
        ->join('unidad','carpeta.idUnidad','=','unidad.id')
        ->where('carpeta.id',$idCarpeta)->first();
        // dd($carpeta);
        
        return view('fields.resumen-carpeta.resumen-acusaciones')->with('carpeta',$carpeta);
    }
}