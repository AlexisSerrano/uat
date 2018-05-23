<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ejecutor;
use App\Models\Providencia;
use App\Models\CatProvidencias;
use Yajra\DataTables\Datatables;
use App\Models\Carpeta;
use App\Models\BitacoraNavCaso;
use DB;
use Alert;
use App\Http\Requests\MedidasRequest;

class MedidasController extends Controller
{
    //

    public function index(){
        $idCarpeta = session('carpeta');
        $casoNuevo = Carpeta::where('id', $idCarpeta)->get();
        if(count($casoNuevo)>0){ 
            $denunciantes = CarpetaController::getDenunciantes($idCarpeta);
            $denunciados = CarpetaController::getDenunciados($idCarpeta);
            $acusaciones = CarpetaController::getAcusaciones($idCarpeta);
            $medidasP= CarpetaController::getMedidasP($idCarpeta);
            $delitos = CarpetaController::getDelitos($idCarpeta);
            $providencias[''] = 'Seleccione una providencia precautoria';
            $ejecutores[''] = 'Seleccione un ejecutor';
            $victimas[''] = 'Seleccione una víctima/ofendido';
            $providencias2 = CatProvidencias::get();
            $ejecutores2 = Ejecutor::get();
            $victimas2 = DB::table('variables_persona')
            ->join('persona', 'variables_persona.idPersona', '=', 'persona.id')
            ->join('extra_denunciante', 'variables_persona.id', '=', 'extra_denunciante.idVariablesPersona')
            ->where('variables_persona.idCarpeta',$idCarpeta)
            ->select('persona.nombres','persona.primerAp','persona.segundoAp', 'persona.id')
            ->get();

            $TablaProvidencia = DB::table('providencias_precautorias')
            ->join('cat_providencia_precautoria', 'cat_providencia_precautoria.id', '=', 'providencias_precautorias.idProvidencia')
            ->join('ejecutor', 'ejecutor.id', '=', 'providencias_precautorias.idEjecutor')
            ->join('persona', 'persona.id', '=', 'providencias_precautorias.idPersona')
            ->select('cat_providencia_precautoria.nombre as providencia', 'cat_providencia_precautoria.id as idprovidencia', 'providencias_precautorias.id as id',  'ejecutor.nombre as ejecutor','ejecutor.id as idejecutor', 'persona.nombres as persona', 'providencias_precautorias.observacion as observacion','providencias_precautorias.fechaInicio as fechainicio', 'providencias_precautorias.fechaFin as fechafin' )
            ->get();

            foreach($providencias2 as $providencia){
                $providencias[$providencia->id] = $providencia->nombre;
            }
            foreach($ejecutores2 as $ejecutor){
                $ejecutores[$ejecutor->id] = $ejecutor->nombre;
            }
            foreach($victimas2 as $victima){
                $victimas[$victima->id] = $victima->nombres.' '.$victima->primerAp.' '.$victima->segundoAp;
            }
            return view('forms.medidas', compact('TablaProvidencia','providencias','ejecutores','victimas','denunciantes','denunciados','idCarpeta','acusaciones','delitos'));
        }
        else{
            return redirect(url('registros'));
        }
    }



}
