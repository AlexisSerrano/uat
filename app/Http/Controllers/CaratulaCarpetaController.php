<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Carpeta;
use Illuminate\Support\Facades\Auth;

class CaratulaCarpetaController extends Controller
{
    public function crearCaratula($id){

       

       
        
         dd($id);
       
         return view('documentos.caratula')
         ->with('id',$id);

        // $datos=array('id'=> $idCarpeta,
        // 'numeroCarpeta'=>$numeroCarpeta,
        // 'denunciante'=>$denunciantes-,
        // 'puesto'=>$fiscalAtiende->puesto,
        // 'nombreC'=>$fiscalAtiende->nombreC);
       
        // return response()->json($datos);
        // return view('documentos.caratula')->with('id',  $carpeta->id );

        // $word = new \PhpOffice\PhpWord\TemplateProcessor('formatos/CaratulaCarpeta.docx');
        // $word->setValue('carpeta',$carpeta->numCarpeta);
        // $word->setValue('nombre', $denunciantes->nombres.' '.$denunciantes->primerAp.' '.$denunciantes->segundoAp);
        // $word->setValue('fiscal','xxxxxxxxxxxxxxxx');

        // $word->saveAs('../storage/oficios/CaratulaCarpeta'.'avila'.'.docx');

    }

public function imprimirCaratula(){


    $idCarpeta=session('carpeta');
    $carpeta=DB::table('carpeta')
    ->join('unidad','carpeta.idUnidad','=','unidad.id')
    ->select('unidad.descripcion')
    ->where('carpeta.id',$idCarpeta)
    ->first();

    $numeroCarpeta=$carpeta->numCarpeta;
    
    $denunciantes = DB::table('extra_denunciante')
    ->join('variables_persona', 'variables_persona.id', '=', 'extra_denunciante.idVariablesPersona')
    ->join('persona', 'persona.id', '=', 'variables_persona.idPersona')
    ->select('extra_denunciante.id','persona.nombres', 'persona.primerAp', 'persona.segundoAp')
    ->where('variables_persona.idCarpeta', '=', $idCarpeta)
    ->first();
    $nombre= $denunciantes->nombres.' '. $denunciantes->primerAp.' '. $denunciantes->segundoAp;
    
    $fiscalAtiende=DB::table('users')
    ->join('unidad','unidad.id','=','users.id')
    ->where('users.id', Auth::user()->id)
    ->select('users.nombreC','users.puesto','users.numFiscal')
    ->first();

    $datos=array('id'=> $idCarpeta,
        'numeroCarpeta'=>$numeroCarpeta,
        'denunciante'=>$nombre,
        'puesto'=>$fiscalAtiende->puesto,
        'numeroF'=> $fiscalAtiende->numFiscal,
        'descripcion'=> $carpeta->descripcion,
        'nombreC'=>$fiscalAtiende->nombreC);

        return response()->json($datos);
// dd($data);
    // return view('documentos.caratula');


}





















}
