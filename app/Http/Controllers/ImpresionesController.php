<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Carpeta;
use DB;
use App\Models\Persona;
use App\Models\Unidad;

use App\Models\VariablesPersona;

class ImpresionesController extends Controller
{
    public function tablaOficios(){
        $idCarpeta=session('carpeta');
        $carpeta=DB::table('carpeta')
        ->join('unidad','carpeta.idUnidad','=','unidad.id')
        ->where('carpeta.id',$idCarpeta)->first();
       // dd($carpeta);
             return view('tables.documentos')->with('carpeta',$carpeta);
     }

     public function oficioDistrito(){
            $idCarpeta=session('carpeta');
            $carpeta=DB::table('carpeta')
            ->join('unidad','carpeta.idUnidad','=','unidad.id')
            ->where('carpeta.id',$idCarpeta)->first();

            $unidad = Unidad::select('id', 'descripcion')
            ->where('abreviacion','!=','')
            ->orderBy('descripcion', 'ASC')
            ->pluck('descripcion', 'id');

             //(dd($unidad);
            
            return view('fields.oficioDistrito')
            ->with('carpeta',$carpeta)
            ->with('unidad',$unidad);
        }

        public function getFiscal(Request $request, $id){
            // if($request->ajax()){
            if($request){
                // dd('asdasd');
                $fiscales = DB::table('users')
                ->where('idUnidad','=',$id)
                ->select( 'id','nombreC as nombre')
                ->get();



                return response()->json($fiscales);
            }
        }
        
        public function storeDistrito(){
           
            
            return view('fields.oficioDistrito')
           
        }
}


