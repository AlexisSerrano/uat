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
            ->select('cat_providencia_precautoria.nombre as providencia', 'cat_providencia_precautoria.id as idprovidencia', 'providencias_precautorias.id as id',  'ejecutor.nombre as ejecutor','ejecutor.id as idejecutor',  DB::raw("CONCAT(`persona`.`nombres`,' ',CASE WHEN `persona`.`primerAp` IS NULL  THEN '' ELSE `persona`.`primerAp` END,' ',CASE WHEN `persona`.`segundoAp` IS NULL  THEN '' ELSE `persona`.`segundoAp` END) as nombre"), 'providencias_precautorias.observacion as observacion','providencias_precautorias.fechaInicio as fechainicio', 'providencias_precautorias.fechaFin as fechafin' )
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
                Alert::error('Se presentó un problema al crear la medida de protección', 'Error');
            }
            DB::commit();
            return redirect("medidas");
        }catch (\PDOException $e){
            DB::rollBack();
            Alert::error('Se presentó un problema al guardar los datos, intente de nuevo', 'Error');
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


    public function getoficioah($id){
        $catalogos = DB::table('actas_hechos')->where('actas_hechos.id', $id)
        ->join('cat_ocupacion','actas_hechos.idOcupacion','=','cat_ocupacion.id')
        ->join('cat_estado_civil','actas_hechos.idEstadoCivil','=','cat_estado_civil.id')
        ->join('cat_escolaridad','actas_hechos.idEscolaridad','=','cat_escolaridad.id')
        ->join('domicilio','actas_hechos.idDomicilio','=','domicilio.id')
        ->join('cat_municipio','domicilio.idMunicipio','=','cat_municipio.id')
        ->join('cat_localidad','domicilio.idLocalidad','=','cat_localidad.id')
        ->join('cat_colonia','domicilio.idColonia','=','cat_colonia.id')
        ->join('cat_estado','cat_municipio.idEstado','=','cat_estado.id')
        ->select('cat_ocupacion.nombre as nombreOcupacion',
        'cat_estado_civil.nombre as nombreEstadoCivil',
        'cat_escolaridad.nombre as nombreEscolaridad',
        'cat_municipio.nombre as nombreMunicipio',
        'cat_localidad.nombre as nombreLocalidad',
        'cat_colonia.nombre as nombreColonia',
        'cat_estado.nombre as nombreEstado',
        'domicilio.numInterno as numInterno', 'domicilio.numExterno as numExterno', 'domicilio.calle as calle',
        'actas_hechos.fecha_nac as fecha_nac', 'actas_hechos.telefono as telefono', 'actas_hechos.narracion as narracion',
        'actas_hechos.expedido as expedido', 'actas_hechos.fiscal as fiscal', 'actas_hechos.nombre as nombrePersona',
        'actas_hechos.primer_ap as primer_ap', 'actas_hechos.segundo_ap as segundo_ap',
        'actas_hechos.identificacion as identificacion', 'actas_hechos.num_identificacion as num_identificacion',
        'cat_colonia.codigoPostal as cp', 'actas_hechos.folio as folio', 'actas_hechos.hora as hora',
        'actas_hechos.fecha as fecha')
        ->first();
        if($catalogos->numInterno==''){
            $numExterno = $catalogos->numExterno;
        }
        else{
            $numExterno = $catalogos->numExterno.' interior '.$catalogos->numInterno;
        }
        // $fechaactual = new Date($catalogos->fecha);
        // $fechahum = $fechaactual->format('l j').' de '.$fechaactual->format('F').' del año '.$fechaactual->format('Y');
        // $date = new Date($catalogos->fecha_nac);
        // $fechanachum = $date->format('j').' de '.$date->format('F').' del año '.$date->format('Y');
        // $fechasep = explode("-", $catalogos->fecha_nac);
        // $edad = Date::createFromDate($fechasep[0],$fechasep[1],$fechasep[2])->age;
        // $data = array('estado' => $catalogos->nombreEstado, 
        // 'municipio' => $catalogos->nombreMunicipio, 
        // 'localidad' => $catalogos->nombreLocalidad,
        // 'colonia' => $catalogos->nombreColonia,
        // 'calle' => $catalogos->calle,
        // 'cp' => $catalogos->cp,
        // 'numExterno' => $numExterno,
        // 'folio' => $catalogos->folio,
        // 'hora' => $date->parse($catalogos->hora)->format('H:i'),
        // 'fecha' => $fechahum,
        // 'fiscal' => $catalogos->fiscal,
        // 'nombre' => $catalogos->nombrePersona.' '.$catalogos->primer_ap.' '.$catalogos->segundo_ap,
        // 'identificacion' => $catalogos->identificacion,
        // 'numIdentificacion' => $catalogos->num_identificacion,
        // 'fechaNacimiento' => $fechanachum,
        // 'ocupacion' => $catalogos->nombreOcupacion,
        // 'estadoCivil' => $catalogos->nombreEstadoCivil,
        // 'escolaridad' => $catalogos->nombreEscolaridad,
        // 'telefono' => $catalogos->telefono,
        // 'narracion' => $catalogos->narracion,
        // 'expedido' => $catalogos->expedido,
        // 'edad' => $edad,
        // 'img' => asset('img/logo.png'),
        // 'id' => $id);
        // return response()->json($data);
    }
}
