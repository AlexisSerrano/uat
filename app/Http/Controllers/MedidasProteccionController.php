<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ejecutor;
use App\Models\Providencia;
use App\Models\CatProvidencias;
use Yajra\DataTables\Datatables;
use App\Models\Carpeta;
use DB;
use Alert;

class MedidasProteccionController extends Controller
{
    public function index(){
        $idCarpeta = session('carpeta');
        $casoNuevo = Carpeta::where('id', $idCarpeta)->get();
        //dd($idCarpeta);
        if(count($casoNuevo)>0){ 
            $denunciantes = CarpetaController::getDenunciantes($idCarpeta);
            $denunciados = CarpetaController::getDenunciados($idCarpeta);
            $medidasP= CarpetaController::getMedidasP($idCarpeta);
            $providencias[''] = 'SELECCIONE UNA PROVIDENCIA PRECAUTORIA';
            $ejecutores[''] = 'SELECCIONE UN EJECUTOR';
            $victimas[''] = 'SELECCIONE UNA VÍCTIMA';
            $providencias2 = CatProvidencias::get();
            $ejecutores2 = Ejecutor::get();
            $victimas2 = DB::table('variables_persona')
            ->join('persona', 'variables_persona.idPersona', '=', 'persona.id')
            ->join('extra_denunciante', 'variables_persona.id', '=', 'extra_denunciante.idVariablesPersona')
            ->where('variables_persona.idCarpeta',$idCarpeta)
            ->select('persona.nombres','persona.primerAp','persona.segundoAp', 'persona.id')
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
            return view('forms.medidasProteccion', compact('providencias','ejecutores','victimas','denunciantes','denunciados','idCarpeta'));
        }
        else{
            return redirect(url('registros'));
        }
    }

    public function addMedidas(MedidasRequest $request){
        $idCarpeta = session('carpeta');
        //$idCarpeta = 1;
        $providenciaBD = new Providencia;
        $providenciaBD->idProvidencia = $request->tipoProvidencia;
        $providenciaBD->idEjecutor = $request->quienEjecuta;
        $providenciaBD->idPersona = $request->victima;
        $providenciaBD->fechaInicio = $request->fechaInicio;
        $providenciaBD->fechaFin = $request->fechaFin;
        $providenciaBD->observacion = $request->ObservacionesM;
        $providenciaBD->idCarpeta = $idCarpeta;
        if($providenciaBD->save()){
            Alert::success('Medida de protección creada con éxito', 'Hecho')->persistent("Aceptar");
        }
        else{
            Alert::error('Se presentó un problema al crear su medida de protección', 'Error');
        }
        return redirect("medidas");
    }

    public function getMedidas(){
        $idCarpeta = session('carpeta');
        //$idCarpeta = 1;
        $providencias = DB::table('providencias_precautorias')
        ->join('cat_providencia_precautoria', 'providencias_precautorias.idProvidencia', '=', 'cat_providencia_precautoria.id')
        ->join('ejecutor','providencias_precautorias.idEjecutor','=','ejecutor.id')
        ->join('persona','providencias_precautorias.idPersona','=','persona.id')
        ->where('providencias_precautorias.idCarpeta',$idCarpeta)
        ->where('providencias_precautorias.deleted_at',null)
        ->select('providencias_precautorias.id as id','cat_providencia_precautoria.nombre as providencia', 'ejecutor.nombre as ejecutor', 'providencias_precautorias.fechaInicio as fechaInicio', 'providencias_precautorias.fechaFin as fechaFin', 'providencias_precautorias.observacion as observacion', DB::raw("CONCAT(`persona`.`nombres`,' ',CASE WHEN `persona`.`primerAp` IS NULL  THEN '' ELSE `persona`.`primerAp` END,' ',CASE WHEN `persona`.`segundoAp` IS NULL  THEN '' ELSE `persona`.`segundoAp` END) as nombre"))->get();
        //dd($providencias);
        return Datatables::of($providencias)->make(true);
    }

    public function deleteMedida($id){
        $post = Providencia::findOrFail($id);
        if($post->delete()){
            Alert::success('Medida de protección eliminada con éxito', 'Hecho')->persistent("Aceptar");
        }
        else{
            Alert::error('Se presentó un problema al eliminar su medida de protección', 'Error');
        }
        return redirect("medidas");
    }
}
