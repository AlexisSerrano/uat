<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Alert;
use Carbon\Carbon;
use App\Models\CatAgrupacion1;
use App\Models\CatAgrupacion2;
use App\Models\Acusacion;
use App\Models\TipifDelito;
use App\Models\CatMunicipio;
use App\Models\CatLocalidad;
use App\Models\CatColonia;
use App\Models\CatEstado;
use App\Models\Domicilio;
use App\Models\CatLugar;
use App\Models\CatZona;
use App\Models\Carpeta;
use App\Models\CatDelito;
use App\Http\Requests\StoreDelito;
use App\Models\BitacoraNavCaso;
use App\Models\VehiculoCarpeta;  

class DelitoController extends Controller
{
 public function showForm()
    {
       $idCarpeta=session('carpeta');
        $carpetaNueva = Carpeta::where('id', $idCarpeta)->get();//->where('idFiscal', Auth::user()->id)->get();
        if(count($carpetaNueva)>0){ 
            $delitos = CarpetaController::getDelitos($idCarpeta);
            $acusaciones = CarpetaController::getAcusaciones($idCarpeta);
            $delits = CatDelito::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
            // $posiblescausas = CatPosibleCausa::select('id', 'nombre')->orderBy('nombre', 'ASC')->pluck('nombre', 'id');
            $estados = CatEstado::select('id', 'nombre')->orderBy('nombre', 'ASC')->pluck('nombre', 'id');
            $municipios = CatMunicipio::select('id', 'nombre')->orderBy('nombre', 'ASC')->where('idEstado',30)->pluck('nombre', 'id');
            $lugares = CatLugar::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
            // $marcas = CatMarca::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
            // $modalidades = CatModalidad::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
            // $tiposarma = CatTipoArma::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
            $zonas = CatZona::orderBy('nombre', 'ASC')->pluck('nombre', 'id');   
            // dd($delitos);
           
            $maximo=Carbon::now()->subYears(18)->toDateString();

            return view('forms.delitos')->with('idCarpeta', $idCarpeta)
                ->with('delitos', $delitos)
                ->with('maximo', $maximo)
                ->with('delits', $delits)
                ->with('estados', $estados)
                ->with('municipios', $municipios)
                ->with('lugares', $lugares)
                ->with('zonas', $zonas);
                // ->with('posiblescausas', $posiblescausas)
                // ->with('marcas', $marcas)
                // ->with('modalidades', $modalidades)
                // ->with('tiposarma', $tiposarma)
        }else{
            return redirect()->route('new.delito');
        }
    }


 public function storeDelito(StoreDelito $request){
        //dd($request->all());
        DB::beginTransaction();
        try{
            $idCarpeta=session('carpeta');
            //$idCarpeta='1';
            $domicilio = new Domicilio();
            $domicilio->idMunicipio = $request->idMunicipio;
            $domicilio->idLocalidad = $request->idLocalidad;
            $domicilio->idColonia = $request->idColonia;
            if (is_null($request->numInterno)) {
                $domicilio->calle = $request->calle;
            }else{
                $domicilio->calle = 'SIN INFORMACION';
            }
            if (is_null($request->numInterno)) {
                $domicilio->numExterno = 'S/N';
            }else{
                $domicilio->numExterno = $request->numExterno;
            }
            if (is_null($request->numInterno)) {
                $domicilio->numInterno = 'S/N';
            }else{
                $domicilio->numInterno = $request->numInterno;
            }
            $domicilio->save();
            $idD1 = $domicilio->id;

            $tipifDelito = new TipifDelito();
            $tipifDelito->idCarpeta = $idCarpeta;
            $tipifDelito->idDelito = $request->idDelito;
            $tipifDelito->idAgrupacion1 = $request->idAgrupacion1;
            $tipifDelito->idAgrupacion2 = $request->idAgrupacion2;
            if ($request->conViolencia==="1") {
                $tipifDelito->conViolencia = 1;
            } else {
                $tipifDelito->conViolencia = 0;
            }
           $tipifDelito->formaComision = $request->formaComision;
            $tipifDelito->fecha = $request->fecha;
            $tipifDelito->hora = $request->hora;
            $tipifDelito->idLugar = $request->idLugar;
            $tipifDelito->idZona = $request->idZona;
            $tipifDelito->idDomicilio = $idD1;
            if (is_null($request->entreCalle)) {
                $tipifDelito->entreCalle = 'SIN INFORMACION';
            } else {
                $tipifDelito->entreCalle = $request->entreCalle;
            }
            if (is_null($request->yCalle)) {
                $tipifDelito->yCalle = 'SIN INFORMACION';
            } else {
                $tipifDelito->yCalle = $request->yCalle;
            }
            if (is_null($request->calleTrasera)) {
                $tipifDelito->calleTrasera = 'SIN INFORMACION';
            } else {
                $tipifDelito->calleTrasera = $request->calleTrasera;
            }
            if (is_null($request->puntoReferencia)) {
                $tipifDelito->puntoReferencia = 'SIN INFORMACION';
            } else {
                $tipifDelito->puntoReferencia = $request->puntoReferencia;
            }
            
            $tipifDelito->save();
            if($tipifDelito->save()){
                Alert::success('Delito registrado con éxito', 'Hecho');
                $bdbitacora = BitacoraNavCaso::where('idCaso',session('carpeta'))->first();
                $bdbitacora->delitos = $bdbitacora->delitos+1;
                $bdbitacora->save();
            }
            else{
                Alert::error('Se presentó un problema al agregar el delito', 'Error');
            }
    
            DB::commit();
            $delitos = DB::table('tipif_delito')
            ->join('cat_delito', 'cat_delito.id', '=', 'tipif_delito.idDelito')
            ->join('domicilio', 'domicilio.id', '=', 'tipif_delito.idDomicilio')
            ->select('tipif_delito.id','domicilio.id as idDomicilio','domicilio.calle as domicilio','cat_delito.id as idDelito', 'cat_delito.nombre as delito',  'tipif_delito.fecha', 'tipif_delito.hora')
        // ->where('tipif_delito.idCarpeta', '=', $idCarpeta)
            ->get();

        // dd($delitos);
            return redirect()->route('new.delito')->with('delitos', $delitos);

        }catch (\PDOException $e){
            DB::rollBack();
            Alert::error('Se presentó un problema al guardar sus datos, intente de nuevo', 'Error');
            return back()->withInput();
        }

    }




    public function delete($id){
        $idCarpeta=session('carpeta');
        DB::beginTransaction();
        try{
            $vehiculos = VehiculoCarpeta::where('idTipifDelito',$id)->count();
            $acusaciones = Acusacion::where('idCarpeta',$idCarpeta)->where('idTipifDelito',$id)->count();
            $TipifDelito = TipifDelito::find($id);
            $TipifDelito->delete();
            $bdbitacora = BitacoraNavCaso::where('idCaso',session('carpeta'))->first();
            $bdbitacora->delitos = $bdbitacora->delitos-1;
            $bdbitacora->acusaciones = $bdbitacora->acusaciones-$acusaciones;
            $bdbitacora->vehiculos = $bdbitacora->vehiculos-$vehiculos;
            $bdbitacora->save();
            DB::commit();
            Alert::success('Registro eliminado con éxito', 'Hecho');
            return redirect()->route('new.delito');
        }
        catch (\PDOException $e){
            DB::rollBack();
            Alert::error('Se presentó un problema al guardar los datos, intente de nuevo', 'Error');
            return back()->withInput();
        }
    }

    public function getAgrupaciones1(Request $request, $id)
    {
        if ($request->ajax()) {
            $agrupaciones1 = CatAgrupacion1::agrupaciones1($id);
            return response()->json($agrupaciones1);
        }
    }

    public function getAgrupaciones2(Request $request, $id)
    {
        if ($request->ajax()) {
            $agrupaciones2 = CatAgrupacion2::agrupaciones2($id);
            return response()->json($agrupaciones2);
        }
    }


  

    public function editarDelitoAjax(Request $request ){
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
   
       public function getDelitoAjax($id){
           $delito = DB::table('tipif_delito')
           ->join('domicilio', 'domicilio.id', '=', 'tipif_delito.idDomicilio')
           ->where('tipif_delito.id',$id)
           ->select('tipif_delito.idDelito','tipif_delito.conViolencia as conViolencia' ,'tipif_delito.idAgrupacion1  as idAgrupacion1','tipif_delito.idAgrupacion2 as idAgrupacion2', 'tipif_delito.FormaComision', 'tipif_delito.idDomicilio as idDomicilio','tipif_delito.entreCalle as entreCalle', 'tipif_Delito.yCalle as yCalle', 'tipif_Delito.calleTrasera as calleTrasera', 'tipif_Delito.puntoReferencia as puntoReferencia', 'tipif_delito.idLugar as idLugar', 'tipif_delito.idZona as idZona' )
           ->first();

        
           $agrupacion1 = CatAgrupacion1::where('id', $delito->idAgrupacion1)
           ->orderBy('nombre', 'ASC')->pluck('nombre', 'id');
      

           $agrupacion2 = CatAgrupacion2::where('id', $delito->idAgrupacion2)
           ->orderBy('nombre', 'ASC')->pluck('nombre', 'id');


           $domicilio = Domicilio::where('id', $delito->idDomicilio)
           ->select('domicilio.idMunicipio', 'domicilio.idLocalidad', 'domicilio.idLocalidad', 'domicilio.idColonia', 'domicilio.calle', 'domicilio.numExterno', 'domicilio.numInterno')
            ->first();
         
           $estado = CatMunicipio::where('id', $domicilio->idMunicipio)
           ->select('cat_municipio.idEstado')
           ->first();

           $municipios = CatMunicipio::where('id', $domicilio->idMunicipio)
           ->orderBy('nombre', 'ASC')->pluck('nombre', 'id');
           
           $localidad = CatLocalidad::where('id', $domicilio->idLocalidad)
           ->orderBy('nombre', 'ASC')->pluck('nombre', 'id');

           $colonia = CatColonia::where('id', $domicilio->idColonia)
           ->orderBy('nombre', 'ASC')->pluck('nombre', 'id');

           $cp = CatColonia::where('id', $domicilio->idColonia)
           ->orderBy('CodigoPostal', 'ASC')->pluck('CodigoPostal', 'id');





           $data = array('delito'=>$delito,'agrupacion1'=>$agrupacion1,
                         'agrupacion2'=>$agrupacion2, 'domicilio'=>$domicilio,
                         'estado'=>$estado, 'municipios'=>$municipios,
                        'localidad'=>$localidad, 'colonia'=>$colonia, 'cp'=>$cp);

           return response()->json($data);
       }
   
       
    
   

public function editarDelito(Request $request ){
    $newDomicilio= new Domicilio;
    $newDomicilio->idMunicipio = $request->idMunicipioD;
    $newDomicilio->idLocalidad = $request->idLocalidadD;
    $newDomicilio->idColonia = $request->idColoniaD;
    $newDomicilio->calle = $request->calleD;
    $newDomicilio->numExterno = $request->numExternoD;
    $newDomicilio->numInterno = $request->numInternoD;
    $newDomicilio->save();

    $idDomicilioN=$newDomicilio->id; //sacamos id del nuevo domicilio 

    
    $deli = TipifDelito::find($request->input('idr')); 
    $oldDomicilio=$deli->idDomicilio; //antiguo Domiciliio
    $domicilio = Domicilio::find($oldDomicilio);
    $deli->idDelito = $request->idDelito2;
    $deli->idAgrupacion1 = $request->idAgrupacion1;
    $deli->idAgrupacion2 = $request->idAgrupacion2;
    $deli->conViolencia = $request->conViolencia;
    $deli->formaComision = $request->formaComisionD2;
    $deli->idLugar = $request->idLugarD;
    $deli->idZona = $request->idZonaD;
    $deli->idDomicilio = $idDomicilioN;

    $deli->entreCalle = $request->entreCalleD;
    $deli->yCalle = $request->yCalleD;
    $deli->calleTrasera = $request->calleTraseraD;
    $deli->puntoReferencia = $request->puntoReferenciaD;
    $deli->save(); 
    $domicilio->delete();
   if ( $deli->save() &  $newDomicilio->save()){
       return 1;
   }
   else{
       return 0;
   }
 }

   


}

