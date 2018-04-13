<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Narracion;
use App\Http\Requests\SolicitanteRequest;
use Illuminate\Support\Facades\Storage;
use Alert;

class NarracionController extends Controller
{
    public function index(){
        $carpeta = session('carpeta');
        $denunciantes = CarpetaController::getDenunciantes($carpeta);
        $denunciados = CarpetaController::getDenunciados($carpeta);
        $medidasP= CarpetaController::getMedidasP($carpeta);
            
        $narraciones = Narracion::where('idCarpeta',$carpeta)->orderby('created_at','desc')->get();
        $ultimo = Narracion::where('idCarpeta',$carpeta)->where('tipo','0')->orderby('created_at','desc')->first();
        return view("forms.hechos-orientador")
        ->with("denunciantes",$denunciantes)
        ->with("denunciados",$denunciados)
        ->with("medidasP",$medidasP)
        ->with("ultimo",$ultimo)
        ->with('narraciones',$narraciones);
    }

    public function addNarracion(SolicitanteRequest $request){
        $narracion = $request->narracion;
        $narracionM = new Narracion;
        $narracionM->idCarpeta = session('carpeta');
        if($request->file('file')){
            $path = $request->file('file')->store('narraciones');
            $narracionM->narracion = $path;
            $narracionM->tipo = 1;
            if($narracionM->save()){
                Alert::success('Narración creada con éxito', 'Hecho')->persistent("Aceptar");
            }
            else{
                Alert::error('Se presentó un problema al crear su narración', 'Error');
            }
        }
        else if($narracion!=''){
            $narracionM->narracion = $narracion;
            $narracionM->tipo = 0;
            if($narracionM->save()){
                Alert::success('Narración creada con éxito', 'Hecho')->persistent("Aceptar");
            }
            else{
                Alert::error('Se presentó un problema al crear su narración', 'Error');
            }
        }
        return redirect("narracion");    
    }

    public function getNarracion(Request $request, $id){
        if($request->ajax()){
            $narracion = Narracion::find($id);
            return response()->json(['narracion'=>$narracion]);
        }
    } 

    public function mostrarDoc($id){
        $narracionM = Narracion::find($id);
        //dd($narracionM->narracion);
        //return response()->download($narracionM->narracion);
        return Storage::download("$narracionM->narracion");
    }
}
