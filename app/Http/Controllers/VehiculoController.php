<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CatAseguradora;
use App\Models\CatClaseVehiculo;
use App\Models\CatColor;
use App\Models\CatEstado;
use App\Models\CatMarca;
use App\Models\CatProcedencia;
use App\Models\CatTipoUso;
use App\Models\Carpeta;
use App\Models\CatDelito;
use App\Models\CatSubmarca;
use App\Models\CatTipoVehiculo;
use App\Models\VehiculoCarpeta;
use App\Models\BitacoraNavCaso;
use App\Http\Controllers\CarpetaController;
use DB;
use Alert;

    class VehiculoController extends Controller
{
    public function showForm()
    {
        $idCarpeta=session('carpeta');
        // $carpetaNueva = CarpetaController::getCarpeta($idCarpeta);
        // if ($carpetaNueva->isEmpty()) return CarpetaController::redirectHome();
        
        // $numCarpeta   = $carpetaNueva[0]->numCarpeta;
        $vehiculos    = CarpetaController::getVehiculos($idCarpeta);
        //  dd($vehiculos);
        $aseguradoras = CatAseguradora::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
        $clasesveh    = CatClaseVehiculo::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
        $colores      = CatColor::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
        $estados      = CatEstado::select('id', 'nombre')->orderBy('nombre', 'ASC')->pluck('nombre', 'id');
        $marcas       = CatMarca::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
        $procedencias = CatProcedencia::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
        $tiposuso     = CatTipoUso::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
        $delitos = CarpetaController::getDelitos($idCarpeta);
        $tipifdelitos = DB::table('tipif_delito')
                ->join('cat_delito', 'cat_delito.id', '=', 'tipif_delito.idDelito')
                ->join('cat_agrupacion1', 'cat_agrupacion1.id', '=', 'tipif_delito.idAgrupacion1')
                ->join('cat_agrupacion2', 'cat_agrupacion2.id', '=', 'tipif_delito.idAgrupacion2')
                ->select('tipif_delito.id', 'cat_delito.nombre as delito', 'cat_agrupacion1.nombre as desagregacion1', 'cat_agrupacion2.nombre as desagregacion2')
                ->where('tipif_delito.idCarpeta', '=', $idCarpeta)
                ->orderBy('cat_delito.nombre', 'ASC')
                ->get();
        // $tipifdelitos = DB::table('tipif_delito')
        //     ->join('cat_delito', 'cat_delito.id', '=', 'tipif_delito.idDelito')
        //     ->join('cat_agrupacion1', 'cat_agrupacion1.id', '=', 'tipif_delito.idAgrupacion1')
        //     ->join('cat_agrupacion2', 'cat_agrupacion2.id', '=', 'tipif_delito.idAgrupacion2')
        //     ->select('tipif_delito.id', 'cat_delito.nombre as delito', 'cat_agrupacion1.nombre as desagregacion1', 'cat_agrupacion2.nombre as desagregacion2')
        //     ->where('tipif_delito.idCarpeta', '=', $idCarpeta)
        //     ->orderBy('cat_delito.nombre', 'ASC')
        //     ->get();
        // $cont = 0;
        // foreach ($tipifdelitos as $delito => $nombre) {
        //     if ($tipifdelitos[$cont]->desagregacion1 == 'SIN AGRUPACION') {
        //         $tipifdelitos[$cont]->desagregacion1 = " ";
        //     }
        //     if ($tipifdelitos[$cont]->desagregacion2 == 'SIN AGRUPACION') {
        //         $tipifdelitos[$cont]->desagregacion2 = " ";
        //     }
        //     $cont = $cont + 1;
        // }
        return view('forms.vehiculos')
        ->with('idCarpeta', $idCarpeta)
             ->with('vehiculos', $vehiculos)
            ->with('tipifdelitos', $tipifdelitos)
            ->with('aseguradoras', $aseguradoras)
            ->with('clasesveh', $clasesveh)
            ->with('colores', $colores)
            ->with('estados', $estados)
            ->with('marcas', $marcas)
            ->with('procedencias', $procedencias)
            ->with('tiposuso', $tiposuso);
    }



public function getSubmarcas(Request $request, $id)
{
    if ($request->ajax()) {
        $submarcas = CatSubmarca::submarcas($id);
        return response()->json($submarcas);
    }
}

public function getTipoVehiculos(Request $request, $id)
{
    if ($request->ajax()) {
        $tipoVehiculos = CatTipoVehiculo::tipoVehiculos($id);
        return response()->json($tipoVehiculos);
    }
}

// public function storeVehiculo(StoreVehiculo $request)
public function storeVehiculo(Request $request)
{
        // $idCarpeta=session('carpeta');
        //dd($request->all());
    $carpetaNueva = CarpetaController::getCarpeta($request->idCarpeta);
    // if ($carpetaNueva->isEmpty()) return CarpetaController::redirectHome();
    // $idFiscal = CarpetaController::getIdFiscal();
    $vehiculo = new VehiculoCarpeta();

    if (!is_null($request->idTipifDelito)) {    
        $vehiculo->idTipifDelito = $request->idTipifDelito;
    }
    if (!is_null($request->placas)) {    
        $vehiculo->placas = $request->placas;
    }
    if (!is_null($request->idEstado)) {    
        $vehiculo->idEstado = $request->idEstado;
    }
    if (!is_null($request->idSubmarca)) {    
        $vehiculo->idSubmarca= $request->idSubmarca;
    }
    if (!is_null($request->modelo)) {    
        $vehiculo->modelo= $request->modelo;
    }
    if (!is_null($request->nrpv)) {    
        $vehiculo->nrpv= $request->nrpv;
    }
    if (!is_null($request->idColor)) {    
        $vehiculo->idColor= $request->idColor;
    }
    if (!is_null($request->permiso)) {    
        $vehiculo->permiso= $request->permiso;
    }
    if (!is_null($request->numSerie)) {    
        $vehiculo->numSerie       = $request->numSerie;
    }
    if (!is_null($request->numMotor)) {    
        $vehiculo->numMotor       = $request->numMotor;
    }
    if (!is_null($request->idTipoVehiculo)) {    
        $vehiculo->idTipoVehiculo = $request->idTipoVehiculo;
    }
    if (!is_null($request->idTipoUso)) {    
        $vehiculo->idTipoUso      = $request->idTipoUso;
    }
    if (!is_null($request->senasPartic)) {    
        $vehiculo->senasPartic    = $request->senasPartic;
    }
    if (!is_null($request->idProcedencia)) {    
        $vehiculo->idProcedencia  = $request->idProcedencia;
    }
    if ($request->filled('idAseguradora')) {    
        $vehiculo->idAseguradora  = $request->idAseguradora;
    }
    $vehiculo->save();
    // dd($request);
    $bdbitacora = BitacoraNavCaso::where('idCaso',session('carpeta'))->first();
    $bdbitacora->vehiculos = $bdbitacora->vehiculos+1;
    $bdbitacora->save();
    //Agregar a Bitacora
   //  Bitacora::create(['idUsuario' => $idFiscal, 'tabla' => 'vehiculo', 'accion' => 'insert', 'descripcion' => 'Se han registrado datos generales de un Vehículo del delito: ' . $request->idTipifDelito . ' con Placas: ' . $request->placas . ' Del estado: ' . $request->idEstado, 'idFilaAccion' => $vehiculo->id]);
    
    Alert::success('Vehículo registrado con éxito', 'Hecho')->persistent("Aceptar");
    return redirect()->route('vehiculo.carpeta');
}

public function addbitacora(){
    $bdbitacora = BitacoraNavCaso::where('idCaso',session('carpeta'))->first();
        $bdbitacora->denunciante = $bdbitacora->denunciante+1;
        $bdbitacora->save();
}

public function getVh($id){

           
    $vehiculo = DB::table('vehiculos')
    ->where('vehiculos.id', $id)
    ->join('cat_municipio','cat_municipio.id','=','vehiculos.idMunicipio')
    ->join('cat_localidad','cat_localidad.id','=','vehiculos.idLocalidad')
    ->join('cat_colonia','cat_colonia.id','=','vehiculos.idColonia')
    ->join('cat_estado','cat_estado.id','=','vehiculos.idEstado')
    ->select( 'cat_municipio.nombre as nombreMunicipio',
    'cat_localidad.nombre as nombreLocalidad',
    'cat_colonia.nombre as nombreColonia',
    'cat_estado.nombre as nombreEstado',
    'cat_colonia.codigoPostal',
    'vehiculos.id','vehiculos.idCarpeta','vehiculos.marca'
   ,'vehiculos.linea',
    'vehiculos.modelo','vehiculos.color','vehiculos.numero_serie',
    'vehiculos.lugar_fabricacion','vehiculos.placas','vehiculos.nombre',
    'vehiculos.primerAp','vehiculos.segundoAp','vehiculos.numero',
    'vehiculos.calle','vehiculos.num_ext','vehiculos.num_int','vehiculos.id','vehiculos.fecha')
    ->first();

    $data = array('id' => $id,
    'idCarpeta' => $vehiculo->idCarpeta,
    'marca' => $vehiculo->marca,
    'linea' => $vehiculo->linea,
    'modelo' => $vehiculo->modelo,
    'color' => $vehiculo->color,
    'numero_serie' => $vehiculo->numero_serie,
    'lugar_fabricacion' => $vehiculo->lugar_fabricacion,
    'placas' => $vehiculo->placas,
    'nombre' => $vehiculo->nombre,
    'primerAp' => $vehiculo->primerAp,
    'segundoAp' => $vehiculo->segundoAp,
    'numero' => $vehiculo->numero,
    'num_ext' => $vehiculo->num_ext,
    'num_int' => $vehiculo->num_int,
    'Estado' => $vehiculo->nombreEstado,
    'Municipio' => $vehiculo->nombreMunicipio,
    'Localidad' => $vehiculo->nombreLocalidad,
    'Colonia' => $vehiculo->nombreColonia,
    'CP' => $vehiculo->codigoPostal,
    'fecha' => $vehiculo->fecha);


    return response()->json($data);
 }


 public function getVehiculoAjax($id){
      $vehiculo = DB::table('vehiculo')
    ->join('tipif_delito', 'vehiculo.idTipifDelito', '=', 'tipif_delito.id')
    ->join('cat_delito', 'tipif_delito.idDelito', '=', 'cat_delito.id')
    ->join('cat_estado', 'vehiculo.idEstado', '=', 'cat_estado.id')
    ->join('cat_submarcas', 'vehiculo.idSubmarca', '=', 'cat_submarcas.id')
    ->join('cat_color', 'vehiculo.idColor', '=', 'cat_color.id')
    ->join('cat_tipo_vehiculo', 'vehiculo.idTipoVehiculo', '=', 'cat_tipo_vehiculo.id')
    ->join('cat_tipo_uso', 'vehiculo.idTipoUso', '=', 'cat_tipo_uso.id')
    ->join('cat_procedencia', 'vehiculo.idProcedencia', '=', 'cat_procedencia.id')
    ->join('cat_aseguradoras', 'vehiculo.idAseguradora', '=', 'cat_aseguradoras.id')
    ->where('vehiculo.id', '=', $id)
    ->select('vehiculo.idTipifDelito as Delito', 'vehiculo.placas as Placas', 'cat_estado.nombre as Estado', 'cat_submarcas.nombre as Submarca', 'vehiculo.modelo as Modelo', 'vehiculo.nrpv as nrpv',
            'cat_color.nombre as Color', 'vehiculo.permiso as Permiso', 'vehiculo.numSerie as Serie', 'vehiculo.numMotor as Motor', 'cat_tipo_vehiculo.nombre as TipoVehiculo', 'cat_tipo_uso.nombre as TipoUso', 'vehiculo.senasPartic as SParticulares', 
            'cat_procedencia.nombre as Procedencia', 'cat_aseguradoras.nombre' )
    ->first();


    return response()->json($vehiculo);
}


public function delete($id){
    DB::beginTransaction();
    try{
        // $acusaciones = Acusacion::where('idCarpeta',session('carpeta'))->where('idDenunciante',$id)->count();
        // $vpersonas = DB::table('extra_denunciante')
        // ->join('variables_persona','variables_persona.id','=','extra_denunciante.idVariablesPersona')
        // ->where('extra_denunciante.id', '=', $id)
        // ->select('variables_persona.id as id')
        // ->first();
        $vehiculo =  VehiculoCarpeta::find($id);
        $vehiculo->delete();
        // $vp= VariablesPersona::find($vpersonas->id);
        // $vp->idCarpeta = null;
        // $vp->save();
        $bdbitacora = BitacoraNavCaso::where('idCaso',session('carpeta'))->first();
        $bdbitacora->vehiculos = $bdbitacora->vehiculos-1;
        $bdbitacora->save();
        DB::commit();
        Alert::success('Registrado eliminado con éxito', 'Hecho');
        return back();
    }
    catch (\PDOException $e){
        DB::rollBack();
        Alert::error('Se presentó un problema al guardar los datos, intente de nuevo', 'Error');
        return back()->withInput();
    }
}








}

//     public function storeVehiculo(StoreVehiculo $request)
//     {
//         //dd($request->all());
//         $carpetaNueva = CarpetaController::getCarpeta($request->idCarpeta);
//         if ($carpetaNueva->isEmpty()) return CarpetaController::redirectHome();
//         $idFiscal = CarpetaController::getIdFiscal();

//         $vehiculo                = new Vehiculo();
//         $vehiculo->idTipifDelito = $request->idTipifDelito;
//         if ($request->filled('placas')) {    
//             $vehiculo->placas         = $request->placas;
//         }
//         if ($request->filled('idEstado')) {    
//             $vehiculo->idEstado       = $request->idEstado;
//         }
//         if ($request->filled('idSubmarca')) {    
//             $vehiculo->idSubmarca     = $request->idSubmarca;
//         }
//         if ($request->filled('modelo')) {    
//             $vehiculo->modelo         = $request->modelo;
//         }
//         if ($request->filled('nrpv')) {    
//             $vehiculo->nrpv           = $request->nrpv;
//         }
//         if ($request->filled('idColor')) {    
//             $vehiculo->idColor        = $request->idColor;
//         }
//         if ($request->filled('permiso')) {    
//             $vehiculo->permiso        = $request->permiso;
//         }
//         if ($request->filled('numSerie')) {    
//             $vehiculo->numSerie       = $request->numSerie;
//         }
//         if ($request->filled('numMotor')) {    
//             $vehiculo->numMotor       = $request->numMotor;
//         }
//         if ($request->filled('idTipoVehiculo')) {    
//             $vehiculo->idTipoVehiculo = $request->idTipoVehiculo;
//         }
//         if ($request->filled('idTipoUso')) {    
//             $vehiculo->idTipoUso      = $request->idTipoUso;
//         }
//         if ($request->filled('senasPartic')) {    
//             $vehiculo->senasPartic    = $request->senasPartic;
//         }
//         if ($request->filled('idProcedencia')) {    
//             $vehiculo->idProcedencia  = $request->idProcedencia;
//         }
//         if ($request->filled('idAseguradora')) {    
//             $vehiculo->idAseguradora  = $request->idAseguradora;
//         }
//         $vehiculo->save();

//         //Agregar a Bitacora
//         Bitacora::create(['idUsuario' => $idFiscal, 'tabla' => 'vehiculo', 'accion' => 'insert', 'descripcion' => 'Se han registrado datos generales de un Vehículo del delito: ' . $request->idTipifDelito . ' con Placas: ' . $request->placas . ' Del estado: ' . $request->idEstado, 'idFilaAccion' => $vehiculo->id]);
        
//         Alert::success('Vehículo registrado con éxito', 'Hecho')->persistent("Aceptar");
//         return redirect()->route('new.vehiculo', $request->idCarpeta);
//     }

//     /**
//      * Show the form for editing the specified resource.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function edit($idCarpeta, $id)
//     {
//         $carpetaNueva = CarpetaController::getCarpeta($idCarpeta);
//         if ($carpetaNueva->isEmpty()) return CarpetaController::redirectHome();

//         $var = DB::table("vehiculo")
//             ->join('tipif_delito', 'tipif_delito.id', '=', 'vehiculo.idTipifDelito')
//             ->where('tipif_delito.idCarpeta', '=', $idCarpeta)
//             ->where('vehiculo.id', '=', $id)
//             ->get();
//         if($var->isEmpty()){
//             return redirect()->route('carpeta', $idCarpeta);
//         }$idFiscal = CarpetaController::getIdFiscal();

//         $numCarpeta = $carpetaNueva[0]->numCarpeta;
//         // $tipifdelitos = DB::table('tipif_delito')
//         //     ->join('cat_delito', 'cat_delito.id', '=', 'tipif_delito.idDelito')
//         //     ->select('tipif_delito.id', 'cat_delito.id as idDelito', 'cat_delito.nombre as delito')
//         //     ->where('tipif_delito.idCarpeta', '=', $idCarpeta)->get();
//         //->whereIn('idDelito', [130, 131, 132, 133, 134, 135, 242, 243, 244, 245, 227])
//         $aseguradoras = CatAseguradora::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
//         $clasesveh    = CatClaseVehiculo::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
//         $colores      = CatColor::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
//         $estados      = CatEstado::select('id', 'nombre')->orderBy('nombre', 'ASC')->pluck('nombre', 'id');
//         $marcas       = CatMarca::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
//         $procedencias = CatProcedencia::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
//         $tiposuso     = CatTipoUso::orderBy('nombre', 'ASC')->pluck('nombre', 'id');

//         $tipifdelitos = DB::table('tipif_delito')
//             ->join('cat_delito', 'cat_delito.id', '=', 'tipif_delito.idDelito')
//             ->join('cat_agrupacion1', 'cat_agrupacion1.id', '=', 'tipif_delito.idAgrupacion1')
//             ->join('cat_agrupacion2', 'cat_agrupacion2.id', '=', 'tipif_delito.idAgrupacion2')
//             ->select('tipif_delito.id', 'cat_delito.nombre as delito', 'cat_agrupacion1.nombre as desagregacion1', 'cat_agrupacion2.nombre as desagregacion2')
//             ->where('tipif_delito.idCarpeta', '=', $idCarpeta)
//             ->orderBy('cat_delito.nombre', 'ASC')
//             ->get();
//         $cont = 0;
//         foreach ($tipifdelitos as $delito => $nombre) {
//             if ($tipifdelitos[$cont]->desagregacion1 == 'SIN AGRUPACION') {
//                 $tipifdelitos[$cont]->desagregacion1 = " ";
//             }
//             if ($tipifdelitos[$cont]->desagregacion2 == 'SIN AGRUPACION') {
//                 $tipifdelitos[$cont]->desagregacion2 = " ";
//             }
//             $cont = $cont + 1;
//         }

//         $vehiculo = DB::table('vehiculo')
//             ->join('cat_submarca', 'cat_submarca.id', '=', 'vehiculo.idSubmarca')
//             ->join('cat_tipo_vehiculo', 'cat_tipo_vehiculo.id', '=', 'vehiculo.idTipoVehiculo')
//             ->select('vehiculo.id as idVehiculo', 'vehiculo.idTipifDelito', 'vehiculo.placas', 'vehiculo.idEstado', 'vehiculo.idSubmarca', 'vehiculo.modelo', 'vehiculo.nrpv', 'vehiculo.idColor', 'vehiculo.permiso', 'vehiculo.numSerie', 'vehiculo.numMotor', 'vehiculo.idTipoVehiculo', 'vehiculo.idTipoUso', 'vehiculo.senasPartic', 'vehiculo.idProcedencia', 'vehiculo.idAseguradora', 'cat_submarca.idMarca', 'cat_tipo_vehiculo.idClaseVehiculo')
//             ->where('vehiculo.id', '=', $id)
//             ->get()->first();

//         //dump($vehiculo);
//         return view('edit-forms.vehiculo')->with('idCarpeta', $idCarpeta)
//             ->with('numCarpeta', $numCarpeta)
//             ->with('vehiculo', $vehiculo)
//             ->with('tipifdelitos', $tipifdelitos)
//             ->with('aseguradoras', $aseguradoras)
//             ->with('tipifdelitos', $tipifdelitos)
//             ->with('clasesveh', $clasesveh)
//             ->with('colores', $colores)
//             ->with('estados', $estados)
//             ->with('marcas', $marcas)
//             ->with('procedencias', $procedencias)
//             ->with('tiposuso', $tiposuso);
//     }

//     /**
//      * Update the specified resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function update(Request $request, $id)
//     {
//         //dd($request->all());
//         $carpetaNueva = CarpetaController::getCarpeta($request->idCarpeta);
//         if ($carpetaNueva->isEmpty()) return CarpetaController::redirectHome();

//         $var = DB::table("vehiculo")
//             ->join('tipif_delito', 'tipif_delito.id', '=', 'vehiculo.idTipifDelito')
//             ->where('tipif_delito.idCarpeta', '=', $request->idCarpeta)
//             ->where('vehiculo.id', '=', $id)
//             ->get();
//         if($var->isEmpty()){
//             return redirect()->route('carpeta', $request->idCarpeta);
//         }
//         $idFiscal = CarpetaController::getIdFiscal();

//         $vehiculo                 = Vehiculo::find($id);
//         $vehiculo->idTipifDelito  = $request->idTipifDelito;
//         if ($request->filled('placas')) {    
//             $vehiculo->placas         = $request->placas;
//         }
//         if ($request->filled('idEstado')) {    
//             $vehiculo->idEstado       = $request->idEstado;
//         }
//         if ($request->filled('idSubmarca')) {    
//             $vehiculo->idSubmarca     = $request->idSubmarca;
//         }
//         if ($request->filled('modelo')) {    
//             $vehiculo->modelo         = $request->modelo;
//         }
//         if ($request->filled('nrpv')) {    
//             $vehiculo->nrpv           = $request->nrpv;
//         }
//         if ($request->filled('idColor')) {    
//             $vehiculo->idColor        = $request->idColor;
//         }
//         if ($request->filled('permiso')) {    
//             $vehiculo->permiso        = $request->permiso;
//         }
//         if ($request->filled('numSerie')) {    
//             $vehiculo->numSerie       = $request->numSerie;
//         }
//         if ($request->filled('numMotor')) {    
//             $vehiculo->numMotor       = $request->numMotor;
//         }
//         if ($request->filled('idTipoVehiculo')) {    
//             $vehiculo->idTipoVehiculo = $request->idTipoVehiculo;
//         }
//         if ($request->filled('idTipoUso')) {    
//             $vehiculo->idTipoUso      = $request->idTipoUso;
//         }
//         if ($request->filled('senasPartic')) {    
//             $vehiculo->senasPartic    = $request->senasPartic;
//         }
//         if ($request->filled('idProcedencia')) {    
//             $vehiculo->idProcedencia  = $request->idProcedencia;
//         }
//         if ($request->filled('idAseguradora')) {    
//             $vehiculo->idAseguradora  = $request->idAseguradora;
//         }
//         $vehiculo->save();
//         //Agregar a Bitacora
//         Bitacora::create(['idUsuario' => $idFiscal, 'tabla' => 'vehiculo', 'accion' => 'update', 'descripcion' => 'Se han actualizado datos generales de un Vehículo del delito: ' . $request->idTipifDelito . ' con Placas: ' . $request->placas . ' Del estado: ' . $request->idEstado, 'idFilaAccion' => $vehiculo->id]);

//         Alert::success('Vehículo actualizado con éxito', 'Hecho')->persistent("Aceptar");
//         return redirect()->route('carpeta', $request->idCarpeta);
//     }
// }

// }
