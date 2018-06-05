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
use App\Http\Controllers\CarpetaController;
use DB;

    class VehiculoController extends Controller
{
    public function showForm()
    {
        $idCarpeta=session('carpeta');
        // $carpetaNueva = CarpetaController::getCarpeta($idCarpeta);
        // if ($carpetaNueva->isEmpty()) return CarpetaController::redirectHome();
        
        // $numCarpeta   = $carpetaNueva[0]->numCarpeta;
        $vehiculos    = CarpetaController::getVehiculos($idCarpeta);
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
    if ($carpetaNueva->isEmpty()) return CarpetaController::redirectHome();
    $idFiscal = CarpetaController::getIdFiscal();

    $vehiculo                = new VehiculoCarpeta();
    $vehiculo->idTipifDelito = $request->idTipifDelito;
    if ($request->filled('placas')) {    
        $vehiculo->placas         = $request->placas;
    }
    if ($request->filled('idEstado')) {    
        $vehiculo->idEstado       = $request->idEstado;
    }
    if ($request->filled('idSubmarca')) {    
        $vehiculo->idSubmarca     = $request->idSubmarca;
    }
    if ($request->filled('modelo')) {    
        $vehiculo->modelo         = $request->modelo;
    }
    if ($request->filled('nrpv')) {    
        $vehiculo->nrpv           = $request->nrpv;
    }
    if ($request->filled('idColor')) {    
        $vehiculo->idColor        = $request->idColor;
    }
    if ($request->filled('permiso')) {    
        $vehiculo->permiso        = $request->permiso;
    }
    if ($request->filled('numSerie')) {    
        $vehiculo->numSerie       = $request->numSerie;
    }
    if ($request->filled('numMotor')) {    
        $vehiculo->numMotor       = $request->numMotor;
    }
    if ($request->filled('idTipoVehiculo')) {    
        $vehiculo->idTipoVehiculo = $request->idTipoVehiculo;
    }
    if ($request->filled('idTipoUso')) {    
        $vehiculo->idTipoUso      = $request->idTipoUso;
    }
    if ($request->filled('senasPartic')) {    
        $vehiculo->senasPartic    = $request->senasPartic;
    }
    if ($request->filled('idProcedencia')) {    
        $vehiculo->idProcedencia  = $request->idProcedencia;
    }
    if ($request->filled('idAseguradora')) {    
        $vehiculo->idAseguradora  = $request->idAseguradora;
    }
    $vehiculo->save();

    //Agregar a Bitacora
    // Bitacora::create(['idUsuario' => $idFiscal, 'tabla' => 'vehiculo', 'accion' => 'insert', 'descripcion' => 'Se han registrado datos generales de un Vehículo del delito: ' . $request->idTipifDelito . ' con Placas: ' . $request->placas . ' Del estado: ' . $request->idEstado, 'idFilaAccion' => $vehiculo->id]);
    
    Alert::success('Vehículo registrado con éxito', 'Hecho')->persistent("Aceptar");
    return redirect()->route('vehiculo.carpeta');
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
