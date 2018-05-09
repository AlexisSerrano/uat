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

class MedidasProteccionController extends Controller
{
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
            return view('forms.medidasProteccion', compact('TablaProvidencia','providencias','ejecutores','victimas','denunciantes','denunciados','idCarpeta','acusaciones','delitos'));
        }
        else{
            return redirect(url('registros'));
        }
    }

    public function addMedidas(MedidasRequest $request){
        
        DB::beginTransaction();
        try{
            $idCarpeta = session('carpeta');
            $providenciaBD = new Providencia;
            $providenciaBD->idProvidencia = $request->tipoProvidencia;
            $providenciaBD->idEjecutor = $request->quienEjecuta;
            $providenciaBD->idPersona = $request->victima;
            $providenciaBD->fechaInicio = $request->fechaInicio;
            $providenciaBD->fechaFin = $request->fechaFinal;
            $providenciaBD->observacion = $request->ObservacionesM;
            $providenciaBD->idCarpeta = $idCarpeta;
            if($providenciaBD->save()){
                Alert::success('Medida de protección creada con éxito', 'Hecho');
                $bdbitacora = BitacoraNavCaso::where('idCaso',session('carpeta'))->first();
                $bdbitacora->medidas = $bdbitacora->medidas+1;
                $bdbitacora->save();
            }
            else{
                Alert::error('Se presentó un problema al crear su medida de protección', 'Error');
            }
            DB::commit();
            return redirect("medidas");
        }catch (\PDOException $e){
            DB::rollBack();
            Alert::error('Se presentó un problema al guardar su los datos, intente de nuevo', 'Error');
            return back()->withInput();
        }
    }

    public function getMedidas(){
        $idCarpeta = session('carpeta');
        $providencias = DB::table('providencias_precautorias')
        ->join('cat_providencia_precautoria', 'providencias_precautorias.idProvidencia', '=', 'cat_providencia_precautoria.id')
        ->join('ejecutor','providencias_precautorias.idEjecutor','=','ejecutor.id')
        ->join('persona','providencias_precautorias.idPersona','=','persona.id')
        ->where('providencias_precautorias.idCarpeta',$idCarpeta)
        ->where('providencias_precautorias.deleted_at',null)
        ->select('providencias_precautorias.id as id',  'cat_providencia_precautoria.nombre as providencia', 'ejecutor.nombre as ejecutor', 'providencias_precautorias.fechaInicio as fechaInicio', 'providencias_precautorias.fechaFin as fechaFin', 'providencias_precautorias.observacion as observacion', DB::raw("CONCAT(`persona`.`nombres`,' ',CASE WHEN `persona`.`primerAp` IS NULL  THEN '' ELSE `persona`.`primerAp` END,' ',CASE WHEN `persona`.`segundoAp` IS NULL  THEN '' ELSE `persona`.`segundoAp` END) as nombre"))->get();
        return Datatables::of($providencias)->make(true);
    }

    public function deleteMedida($id){
        $post = Providencia::findOrFail($id);
        if($post->delete()){
            Alert::success('Medida de protección eliminada con éxito', 'Hecho');
        }
        else{
            Alert::error('Se presentó un problema al eliminar su medida de protección', 'Error');
        }
        return redirect("medidas");
    }


    public function delete($id){
        $Providencia =Providencia::find($id);
        $Providencia->delete();
        Alert::success('Registrado eliminado con éxito', 'Hecho');
        $bdbitacora = BitacoraNavCaso::where('idCaso',session('carpeta'))->first();
            $bdbitacora->medidas = $bdbitacora->medidas-1;
            $bdbitacora->save();
        return back();
    }

    

    public function editar(Request $request ){
     $providencia = Providencia::find($request->input('idr')); 
     $providencia->fechaInicio = $request->fechaInicio1;
     $providencia->fechaFin = $request->fechaFinal1;
     $providencia->idEjecutor = $request->quienEjecuta1;
     $providencia->idPersona = $request->victima1;
     $providencia->observacion = $request->observaciones1;
     $providencia->save(); 
    if ($providencia->save()){
        return 1;
    }
    else{
        return 0;
    }
  }

    public function getMedidasAjax($id){
        $providencia = DB::table('providencias_precautorias')
        ->join('cat_providencia_precautoria','providencias_precautorias.idProvidencia','=','cat_providencia_precautoria.id')
        ->where('providencias_precautorias.id',$id)
        ->select('cat_providencia_precautoria.nombre','providencias_precautorias.id','providencias_precautorias.idEjecutor','providencias_precautorias.idPersona','providencias_precautorias.observacion','providencias_precautorias.fechaInicio','providencias_precautorias.fechaFin')
        ->first();
        return response()->json($providencia);
    }
}
