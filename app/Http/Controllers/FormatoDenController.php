<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Carpeta;
use App\Models\componentes\aparicionesModel;
use App\Models\componentes\VariablesPersona;
use App\Models\componentes\PersonaModel;
use App\Models\componentes\Domicilio;
use App\Models\componentes\Trabajo;
use App\Models\componentes\PersonaMoralModel;
use App\Models\componentes\VariablesPersonaMoral;
use Illuminate\Support\Facades\Auth;
use App\Models\CatOcupacion;
use App\Models\CatEstadoCivil;
use App\Models\CatEstado;
use App\Models\CatMunicipio;
use App\Models\CatColonia;
use App\Models\CatNacionalidad;
use App\Models\componentes\SexoModel;
use Alert;
use Carbon\Carbon;
use Jenssegers\Date\Date;


//use App\Models\VariablesPersona;

class FormatoDenController extends Controller
{
    public function formatoDenuncia($id){
   
    
    return view('documentos.formato-denuncia')->with('id',  $id );
    
}
public function getFormatoDenuncia($id){
    
    
  
    $idCarpeta=session('carpeta');
    $carpeta=DB::table('carpeta')
    ->join('unidad','carpeta.idUnidad','=','unidad.id')
    ->join('variables_persona','variables_persona.idCarpeta','=','carpeta.id')
    ->join('narraciones_persona','narraciones_persona.idVariablesPersona','=','variables_persona.id')
    ->select('carpeta.numCarpeta','narraciones_persona.narracion')
    ->where('carpeta.id',$idCarpeta)->first();
// datos del fiscal
    $fiscalAtiende=DB::table('users')
    ->join('unidad','unidad.id','=','users.id')
    ->join('unidad as unid','unid.id','=','users.idUnidad')
    ->where('users.id', Auth::user()->id)
    ->select('users.nombreC','users.puesto','users.numFiscal','unid.descripcion')
    ->first();
    $arr = explode(" ",$fiscalAtiende->descripcion);
    $aux=9;
    $localidad="";
    while(count($arr)-1 >= $aux){
        $localidad=$localidad." ".$arr[$aux];
        $aux=$aux+1;
    }
    //datos del denunciante
    $idCarpeta1='UIPJ/D17/VER1/22/1/2018';
    $apariciones= aparicionesModel::where('idCarpeta',$idCarpeta1)
    ->where('sistema','uat')
    ->where('tipoInvolucrado','denunciante')
    ->select('id','idVarPersona','idCarpeta','esEmpresa')
    ->first();
    
    $idVPersona=$apariciones->idVarPersona;
// si es persona fisica
    if ($apariciones->esEmpresa==0) {
        
        $variablesP=VariablesPersona::where('id',$idVPersona)
        ->first();
        $ocupacion=CatOcupacion::where('id',$variablesP->idOcupacion)
        ->select('nombre')
        ->first();
        $estadoCivil=CatEstadoCivil::where('id',$variablesP->idEstadoCivil)
        ->select('nombre')
        ->first();
        $idDirecciones=Domicilio::where('id',$variablesP->idDomicilio)
        ->first();
        $estado=CatEstado::where('id',$idDirecciones->idEstado)
        ->select('nombre')
        ->first();
        $municipio=CatMunicipio::where('id',$idDirecciones->idMunicipio)
        ->select('nombre')
        ->first();
        $colonia=CatColonia::where('id',$idDirecciones->idColonia)
        ->select('nombre')
        ->first();
        $datosPersona=PersonaModel::where('id',$variablesP->idPersona)
        ->first();
        $sexo=SexoModel::where('id',$datosPersona->sexo)
        ->select('nombre')
        ->first();
        $nacionalidad=CatNacionalidad::where('id',$datosPersona->idNacionalidad)
        ->select('nombre')
        ->first();
        $municipioOrigen=CatMunicipio::where('id',$datosPersona->idMunicipioOrigen)
        ->select('nombre')
        ->first();
        $datosTrabajo=Trabajo::where('id',$variablesP->idTrabajo)
        ->select('telefono')
        ->first();
        $denunciante=$datosPersona->nombres.' '.$datosPersona->primerAp.' '.$datosPersona->segundoAp;
    }
else 
// si es persona moral
{
        $variablesP=VariablesPersonaMoral::where('id',$idVPersona)
        ->first();
        $idPersona=$variablesP->idPersona;
        $datosPersona=PersonaMoralModel::where('id',$idPersona)
        ->select('nombre')
        ->first();

        $denunciante=$datosPersona->nombre;

    }
    // datos denunciado
    $idCarpeta2='UIPJ/D42/VER0/19/8/2018';
    $apariciones2= aparicionesModel::where('idCarpeta',$idCarpeta2)
    ->where('sistema','uat')
    ->where('tipoInvolucrado','denunciado')
    ->select('id','idVarPersona','idCarpeta','esEmpresa')
    ->first();
    $idVPersona2=$apariciones2->idVarPersona;

    if($apariciones2->esEmpresa==0) {

        $variablesDenunciado=VariablesPersona::where('id',$idVPersona2)
        ->first();
        $denuncianteFisica=PersonaModel::where('id',$variablesDenunciado->idPersona)
        ->first();
        $denunciado=$denuncianteFisica->nombres.' '.$denuncianteFisica->primerAp.' '.$denuncianteFisica->segundoAp;
    }
    else{
        $variablesDenunciado=VariablesPersonaMoral::where('id',$idVPersona2)
        ->first();
        $denuncianteMoral=PersonaMoralModel::where('id',$variablesDenunciado->idPersona)
        ->select('nombre')
        ->first();
        $denunciado=$denuncianteMoral->nombre;

    }

// variables temporales
        $numCarpeta=$carpeta->numCarpeta;
        $tipoDenuncia="Querella/Denuncia";
        $nuc="(NUC)";
       
    
        $fechaactual = date::now();
        $fechahum = $fechaactual->format('l j').' de '.$fechaactual->format('F').' del año '.$fechaactual->format('Y');
        $fechahum= strtr(strtoupper($fechahum),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ");
        $hora=Carbon::now()->format('H:i');

        $data = array('id' => $id,
        'numCarpeta'=>$numCarpeta,
        'fiscalAtendio'=>strtr(strtoupper($fiscalAtiende->nombreC),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ"),
        'hora'=>$hora,
        'fecha'=>$fechahum,
        'localidad'=>$localidad,
        'tipoDenuncia'=>$tipoDenuncia,
        'nuc'=>$nuc,
        'edad'=>$variablesP->edad,
        'denunciante'=>strtr(strtoupper($denunciante),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ"),
        'telefono'=>$variablesP->telefono,
        'motivoEstancia'=>$variablesP->motivoEstancia,
        'ocupacion'=> $ocupacion->nombre,
        'edoCivil'=>$estadoCivil->nombre,
        'estado'=>$estado->nombre,
        'municipio'=>$municipio->nombre,
        'colonia'=>$colonia->nombre,
        'calle'=>$idDirecciones->calle,
        'numExterno'=>$idDirecciones->numExterno,
        'numInterno'=>$idDirecciones->numInterno,
        'nacionalidad'=>$nacionalidad->nombre,
        'municipioOrigen'=>$municipioOrigen->nombre,
        'telTrabajo'=>$datosTrabajo->telefono,
        'fechaNac'=>$datosPersona->fechaNacimiento,
        'hechos'=>$carpeta->narracion,
        'denunciado'=>strtr(strtoupper($denunciado),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ"),
        'sexo'=>$sexo->nombre
       );

      // dd($data);
       
         // return view('documentos.formato-denuncia');
        // }
    return response()->json($data);
    
    }
}
