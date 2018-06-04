<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResumenCarpetaController extends Controller

{
    public function showResumen(){


        return view('fields.resumen-carpeta.resumen-carpeta');
    }

    public function detalleDenunciante(){


        return view('fields.resumen-carpeta.resumen-denunciante');
    }
    
    public function detalleDenunciado(){
        
        
        return view('fields.resumen-carpeta.resumen-denunciado');
    }

    public function detalleAutoridad(){
        
        
        return view('fields.resumen-carpeta.resumen-autoridad');
    }
    
    public function detalleObservaciones(){
        
        
        return view('fields.resumen-carpeta.resumen-observaciones');
    }
    public function detalleDefensa(){
        
        
        return view('fields.resumen-carpeta.resumen-defensa');
    
    }
    public function detalleAbogado(){
        
        
        return view('fields.resumen-carpeta.resumen-abogado');
    }
    public function detalleDelito(){
        
        
        return view('fields.resumen-carpeta.resumen-delitos');
    }
    public function detalleAcusaciones(){
        
        
        return view('fields.resumen-carpeta.resumen-acusaciones');
    }
}