<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ejecutor;
use App\Models\Providencia;
use App\Models\CatProvidencias;
use Yajra\DataTables\Datatables;
use App\Models\Carpeta;
use App\Models\BitacoraNavCaso;
use Illuminate\Support\Facades\Auth;
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
            ->where('providencias_precautorias.idCarpeta',$idCarpeta)
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
            $request->session()->flash('redirectoficio', url("medidaoficio/$providenciaBD->id"));
            return redirect('medidas');
            //  return view('documentos.medidas-proteccion')

      
            //   ->with('id',  $providenciaBD->id );

            //   return redirect('medidas')
           //  return redirect('getoficio/'.$providenciaBD->id.'/medida');
        }catch (\PDOException $e){
            DB::rollBack();
            Alert::error('Se presentó un problema al guardar los datos, intente de nuevo', 'Error');
            return back()->withInput();
        }
    }

    public function medidaoficio($id){
        return view("documentos.medidas-proteccion")->with('id',$id);
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


    
public function oficio($id){
   
    $oficio = DB::table('providencias_precautorias')->where('providencias_precautorias.id', $id)
    ->join('cat_providencia_precautoria', 'providencias_precautorias.idProvidencia','=', 'cat_providencia_precautoria.id')
    ->join('ejecutor', 'providencias_precautorias.idEjecutor', '=', 'ejecutor.id')
    ->join('persona', 'providencias_precautorias.idPersona', '=', 'persona.id')
    ->join('variables_persona', 'persona.id', '=', 'variables_persona.idPersona')
    ->join('domicilio', 'variables_persona.idDomicilio', '=', 'domicilio.id')
    ->join('cat_municipio', 'domicilio.idMunicipio', '=', 'cat_municipio.id')
    ->join('cat_localidad', 'domicilio.idLocalidad', '=', 'cat_localidad.id')
    ->join('cat_colonia', 'domicilio.idColonia', '=', 'cat_colonia.id')
    ->join('cat_estado', 'cat_municipio.idEstado', '=', 'cat_estado.id')
    ->join('carpeta', 'providencias_precautorias.idCarpeta', '=', 'carpeta.id')
  
    ->select( DB::raw("CONCAT(`persona`.`nombres`,' ',CASE WHEN `persona`.`primerAp` IS NULL  THEN '' ELSE `persona`.`primerAp` END,' ',CASE WHEN `persona`.`segundoAp` IS NULL  THEN '' ELSE `persona`.`segundoAp` END) as nombre"),
     'domicilio.calle', 'domicilio.numExterno', 'cat_colonia.nombre as colonia','cat_colonia.codigoPostal as cp','cat_municipio.nombre as municipio','cat_estado.nombre as estado',
     'ejecutor.nombre as ejecutor', DB::raw("DATEDIFF(providencias_precautorias.fechaFin,providencias_precautorias.fechaInicio) AS VIGENCIA"), 'providencias_precautorias.id', 'providencias_precautorias.fechaInicio AS fecha','carpeta.numCarpeta as carpeta' , 'variables_persona.telefono as telefono')
      
      ->first();

      $denunciado2= DB::table('variables_persona')
      ->join('persona', 'variables_persona.idPersona', '=', 'persona.id')
      ->join('extra_denunciado', 'variables_persona.id', '=', 'extra_denunciado.idVariablesPersona')
      ->where('variables_persona.id',$id)
      ->select('persona.nombres','persona.primerAp','persona.segundoAp', 'persona.id')
      ->first();

      $fiscalAtiende=DB::table('users')
        ->join('unidad','unidad.id','=','users.id')
        ->join('unidad as unid','unid.id','=','users.idUnidad')
        ->join('zona','zona.id','=','users.idZona')
        ->where('users.id', Auth::user()->id)
        ->select('users.nombreC','users.puesto','users.numFiscal','unid.descripcion','zona.descripcion as zona')
        ->first();

        $TipifDelito=DB::table('tipif_delito')
        ->join('cat_delito','cat_delito.id','=','tipif_delito.idDelito')
        ->where('tipif_delito.id',$id)
        ->select('cat_delito.nombre as delito')
        ->first();

        $puesto=$fiscalAtiende->puesto;
        $puesto = strtr(strtoupper($puesto),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ");
     
    $data = array('nombre' => $oficio->nombre, 
    'calle' => $oficio->calle, 
    'numExterno' => $oficio->numExterno,
    'colonia' => $oficio->colonia,
    'cp' => $oficio->cp,
    'municipio' => $oficio->municipio,
    'estado' => $oficio->estado,
    'ejecutor' => $oficio->ejecutor,
    'vigencia' => $oficio->VIGENCIA,
    'id' => $oficio->id,
    'fecha' => $oficio->fecha,
    'carpeta' => $oficio->carpeta,
    'fiscalAtiende' =>  $fiscalAtiende->nombreC,
    'NF' => $fiscalAtiende->numFiscal,
    'puestoFiscal' => $puesto,
    'telefono' => $oficio->telefono,
    // 'delito' => $TipifDelito->delito,
    'zona' => $fiscalAtiende->zona,
    // 'denunciado' => $denunciado2->nombres.' '.$denunciado2->primerAp.' '.$denunciado2->segundoAp,
    'img' => asset('img/logo.png'),
    'id' => $id);
    return response()->json($data);
    // dd($data);
}


}
