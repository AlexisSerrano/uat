<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Carpeta;
use App\Models\componentes\aparicionesModel;
use App\Models\componentes\VariablesPersona;
use App\Models\componentes\PersonaModel;
use App\Models\componentes\PersonaMoralModel;
use App\Models\componentes\VariablesPersonaMoral;
use Illuminate\Support\Facades\Auth;


class CaratulaCarpetaController extends Controller
{
    public function crearCaratula($id){
        
        return view('documentos.caratula')
             ->with('id',$id);
    }

    public function imprimirCaratula($id){
        $carpeta=DB::table('carpeta')
        ->join('unidad','carpeta.idUnidad','=','unidad.id')
        ->select('unidad.descripcion','carpeta.numCarpeta')
        ->where('carpeta.id',$id)
        ->first();
        $idCarpeta='558546';
        $apariciones= aparicionesModel::where('idCarpeta',$idCarpeta)
        ->where('sistema','uat')
        ->where('tipoInvolucrado','denunciante')
        ->select('id','idVarPersona','idCarpeta','esEmpresa')
        ->get();

        $idVPersona=$apariciones[0]->idVarPersona;

        if ($apariciones[0]->esEmpresa==0) {
            
            $variablesP=VariablesPersona::where('id',$idVPersona)
            ->select('idPersona','id')
            ->get();
            $idPersona=$variablesP[0]->idPersona;
            $datosPersona=PersonaModel::where('id',$idPersona)
            ->select('nombres','primerAp','segundoAp')
            ->get();
            $nombre=$datosPersona[0]->nombres.' '.$datosPersona[0]->primerAp.' '.$datosPersona[0]->segundoAp;
        }
    else {
            $variablesP=VariablesPersonaMoral::where('id',$idVPersona)
            ->select('idPersona','id')
            ->get();
            $idPersona=$variablesP[0]->idPersona;
            $datosPersona=PersonaMoralModel::where('id',$idPersona)
            ->select('nombre')
            ->get();

            $nombre=$datosPersona[0]->nombre;

        }

        $fiscalAtiende=DB::table('users')
    ->join('unidad','unidad.id','=','users.id')
    ->where('users.id', Auth::user()->id)
    ->select('users.nombreC','users.puesto','users.numFiscal')
    ->first();

        $datos=array('id'=> $id,
        'numeroCarpeta'=>$idCarpeta,
        'denunciante'=>$nombre,
        'puesto'=>$fiscalAtiende->puesto,
        'numeroF'=> $fiscalAtiende->numFiscal,
        'descripcion'=> $carpeta->descripcion,
        'nombreC'=>$fiscalAtiende->nombreC);
     
        return response()->json($datos);


}























}
