<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CaratulaCarpetaController extends Controller
{



    public function crearCaratula(){

        $idCarpeta=session('carpeta');
        $carpeta=DB::table('carpeta')->where('carpeta.id', $idCarpeta)
        ->select('carpeta.numCarpeta')
        ->first();
        $denunciantes = DB::table('extra_denunciante')
        ->join('variables_persona', 'variables_persona.id', '=', 'extra_denunciante.idVariablesPersona')
        ->join('persona', 'persona.id', '=', 'variables_persona.idPersona')
        ->select('extra_denunciante.id','persona.nombres', 'persona.primerAp', 'persona.segundoAp')
        ->where('variables_persona.idCarpeta', '=', $idCarpeta)
        ->first();


        $word = new \PhpOffice\PhpWord\TemplateProcessor('formatos/CaratulaCarpeta.docx');
        $word->setValue('carpeta',$carpeta->numCarpeta);
        $word->setValue('nombre', $denunciantes->nombres.' '.$denunciantes->primerAp.' '.$denunciantes->segundoAp);
        $word->setValue('fiscal','Chiquita Brenda');

        $word->saveAs('../storage/oficios/CaratulaCarpeta'.'avila'.'.docx');
        return response()->download('../storage/oficios/CaratulaCarpeta'.'avila'.'.docx');









    }






















}
