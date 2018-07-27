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
        $vehiculos    = CarpetaController::getVehiculos($idCarpeta);
        //  dd($vehiculos);
        $aseguradoras = CatAseguradora::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
        $clasesveh    = CatClaseVehiculo::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
        $colores      = CatColor::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
        $estados      = CatEstado::select('id', 'nombre')->orderBy('nombre', 'ASC')->pluck('nombre', 'id');
        $marcas       = CatMarca::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
        $submarcas    = CatSubmarca::orderBy('nombre', 'ASC')->where('idMarca',999)->pluck('nombre', 'id');
        $procedencias = CatProcedencia::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
        $tiposuso     = CatTipoUso::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
        $tiposver     = CatTipoVehiculo::orderBy('nombre', 'ASC')->where('idClaseVehiculo',99)->pluck('nombre', 'id');
        $delitos = CarpetaController::getDelitos($idCarpeta);
        $tipifdelitos = DB::table('tipif_delito')
            ->join('cat_delito', 'cat_delito.id', '=', 'tipif_delito.idDelito')
            ->join('cat_agrupacion1', 'cat_agrupacion1.id', '=', 'tipif_delito.idAgrupacion1')
            ->join('cat_agrupacion2', 'cat_agrupacion2.id', '=', 'tipif_delito.idAgrupacion2')
            ->select('tipif_delito.id', 
                'cat_delito.nombre as delito', 
                DB::raw('(CASE WHEN cat_agrupacion1.nombre = "SIN AGRUPACION" THEN "" ElSE cat_agrupacion1.nombre END) AS desagregacion1'),
                DB::raw('(CASE WHEN cat_agrupacion2.nombre = "SIN AGRUPACION" THEN "" ElSE cat_agrupacion2.nombre END) AS desagregacion2'))
            ->where('tipif_delito.idCarpeta', '=', $idCarpeta)
            ->orderBy('cat_delito.nombre', 'ASC')
            ->get();

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
            ->with('tiposuso', $tiposuso)
            ->with('tiposver', $tiposver)
            ->with('submarcas', $submarcas);
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

    public function storeVehiculo(Request $request)
    {
        $carpetaNueva = CarpetaController::getCarpeta($request->idCarpeta);
        $vehiculo = new VehiculoCarpeta();

        if (!is_null($request->idTipifDelito)) {    
            $vehiculo->idTipifDelito = $request->idTipifDelito;
        }
        if (!is_null($request->placas)) {    
            if ($request->placas=='XXXXXXX') {           
            }else{
                $vehiculo->placas = $request->placas;
            }
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
        'vehiculos.id','vehiculos.idCarpeta',
        'vehiculos.marca',
        'vehiculos.linea',
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
        ->select('vehiculo.idTipifDelito as Delito', 'vehiculo.placas as Placas', 'vehiculo.idEstado as Estado', 'vehiculo.idSubmarca as Submarca', 'cat_submarcas.idMarca as Marca','vehiculo.modelo as Modelo', 'vehiculo.nrpv as nrpv',
                'vehiculo.idColor as Color', 'vehiculo.permiso as Permiso', 'vehiculo.numSerie as Serie', 'vehiculo.numMotor as Motor', 'vehiculo.idTipoVehiculo as TipoVehiculo', 'cat_tipo_vehiculo.idClaseVehiculo as ClaseVehiculo', 'vehiculo.idTipoUso as TipoUso', 'vehiculo.senasPartic as SParticulares', 
                'vehiculo.idProcedencia as Procedencia', 'vehiculo.idAseguradora as Aseguradora' )
        ->first();
        $submarcas = CatSubmarca::where('idMarca',$vehiculo->Marca)
        ->orderBy('nombre', 'ASC')->pluck('nombre', 'id');

        $tipovehiculo = CatTipoVehiculo::where('idClaseVehiculo', $vehiculo->ClaseVehiculo )
        ->orderBy('nombre', 'ASC')->pluck('nombre', 'id');

        $data = array('vehiculo'=>$vehiculo,'submarcas'=>$submarcas,  'tipovehiculo'=> $tipovehiculo);

        return response()->json($data);
    }


    public function delete($id){
        DB::beginTransaction();
        try{
            $vehiculo =  VehiculoCarpeta::find($id);
            $vehiculo->delete();
            
            $bdbitacora = BitacoraNavCaso::where('idCaso',session('carpeta'))->first();
            $bdbitacora->vehiculos = $bdbitacora->vehiculos-1;
            $bdbitacora->save();
            DB::commit();
            Alert::success('Registrado eliminado con éxito', 'Hecho');
            return back();
        }catch (\PDOException $e){
            DB::rollBack();
            Alert::error('Se presentó un problema al guardar los datos, intente de nuevo', 'Error');
            return back()->withInput();
        }
    }

    public function editar(Request $request ){
        $vehi = VehiculoCarpeta::find($request->input('idr')); 
        $vehi->idTipifDelito = $request->idTipifDelito1;
        $vehi->placas = $request->placasv;
        $vehi->idEstado = $request->estadov;
        $vehi->idSubmarca = $request->submarcav;

        $vehi->modelo = $request->modelov;
        $vehi->nrpv = $request->nrpvv;
        $vehi->idColor = $request->colorv;
        $vehi->permiso = $request->permisov;
        $vehi->numSerie = $request->numseriev;
        $vehi->numMotor = $request->motorv;

        $vehi->idTipoVehiculo = $request->tipovv;
        $vehi->idTipoUso = $request->tipousov;
        $vehi->senasPartic = $request->senasv;
        $vehi->idProcedencia = $request->procev;
        $vehi->idAseguradora = $request->asegurav;
        $vehi->save(); 

        if ($vehi->save()){
            return 1;
        }
        else{
            return 0;
        }
    }

}
