<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Alert;
use App\Models\CatAgrupacion1;
use App\Models\CatAgrupacion2;
use App\Models\Acusaciones;
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
            $lugares = CatLugar::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
            // $marcas = CatMarca::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
            // $modalidades = CatModalidad::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
            // $tiposarma = CatTipoArma::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
            $zonas = CatZona::orderBy('nombre', 'ASC')->pluck('nombre', 'id');   
            // dd($delitos);
           
            return view('forms.delitos')->with('idCarpeta', $idCarpeta)
                ->with('delitos', $delitos)
                ->with('delits', $delits)
                ->with('estados', $estados)
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
        $idCarpeta=session('carpeta');
       //$idCarpeta='1';
        $domicilio = new Domicilio();
        $domicilio->idMunicipio = $request->idMunicipio;
        $domicilio->idLocalidad = $request->idLocalidad;
        $domicilio->idColonia = $request->idColonia;
        $domicilio->calle = $request->calle;
        $domicilio->numExterno = $request->numExterno;
        $domicilio->numInterno = $request->numInterno;
        $domicilio->save();
        $idD1 = $domicilio->id;

          $tipifDelito = new TipifDelito();
        $tipifDelito->idCarpeta = $idCarpeta;
        $tipifDelito->idDelito = $request->idDelito;
        $tipifDelito->idAgrupacion1 = $request->idAgrupacion1;
        $tipifDelito->idAgrupacion2 = $request->idAgrupacion2;
        if ($request->conViolencia==="1") {
            # code...
            $tipifDelito->conViolencia = 1;
        } else {
            $tipifDelito->conViolencia = 0;
        }
        
        // if ($request->conViolencia==="1"){
        //     $tipifDelito->conViolencia = 1;
        //     $tipifDelito->idArma = $request->idArma;
        //     $tipifDelito->idPosibleCausa = $request->idPosibleCausa;
        // }
        // $tipifDelito->idModalidad = $request->idModalidad;
        $tipifDelito->formaComision = $request->formaComision;
        // $tipifDelito->consumacion = $request->consumacion;
        $tipifDelito->fecha = $request->fecha;
        $tipifDelito->hora = $request->hora;
        $tipifDelito->idLugar = $request->idLugar;
        $tipifDelito->idZona = $request->idZona;
        $tipifDelito->idDomicilio = $idD1;
        $tipifDelito->entreCalle = $request->entreCalle;
        $tipifDelito->yCalle = $request->yCalle;
        $tipifDelito->calleTrasera = $request->calleTrasera;
        $tipifDelito->puntoReferencia = $request->puntoReferencia;
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
    
        $delitos = DB::table('tipif_delito')
        ->join('cat_delito', 'cat_delito.id', '=', 'tipif_delito.idDelito')
        ->join('domicilio', 'domicilio.id', '=', 'tipif_delito.idDomicilio')
        ->select('tipif_delito.id','domicilio.id as idDomicilio','domicilio.calle as domicilio','cat_delito.id as idDelito', 'cat_delito.nombre as delito',  'tipif_delito.fecha', 'tipif_delito.hora')
       // ->where('tipif_delito.idCarpeta', '=', $idCarpeta)
        ->get();

       // dd($delitos);
        return redirect()->route('new.delito')->with('delitos', $delitos);


    }




    public function delete($id){

        $TipifDelito =  TipifDelito::find($id);
        $TipifDelito->delete();
        $bdbitacora = BitacoraNavCaso::where('idCaso',session('carpeta'))->first();
        $bdbitacora->delitos = $bdbitacora->delitos-1;
        $bdbitacora->save();
        Alert::success('Registro eliminado con éxito', 'Hecho');
        return redirect()->route('new.delito');

    }





    public function editar($id){
        
        
       



        $delito = DB::table('tipif_delito')
        ->join('cat_delito', 'tipif_delito.idDelito','=','cat_delito.id') 
        ->where('tipif_delito.id',$id)
        ->select('tipif_delito.idDelito','tipif_delito.formaComision','tipif_delito.fecha', 'tipif_delito.hora',  'tipif_delito.conViolencia')
        ->first();

     
        return response()->json($delito);


    //   return view ('forms.modalDelitosEdit', compact ('TipifDelito','delits','delitos','estados','lugares','zonas','domicilio','direccionTB','municipio','coloniaRow','idMunicipioSelect','idEstadoSelect','idLocalidadSelect','idCodigoPostalSelect','idColoniaSelect','catMunicipios','catLocalidades','catColonias','catCodigoPostal'));
    }

    public function actualizar(Request $request, $id)
    {
      
      
        $domicilio = domicilio::find($id);
        $domicilio->idMunicipio=$request->idMunicipio;
        $domicilio->idLocalidad=$request->idLocalidad;
        $domicilio->idColonia=$request->idColonia;
        $domicilio->calle=$request->calle;
        $domicilio->numExterno=$request->numExterno;
        $domicilio->numInterno=$request->numInterno;
        $domicilio->save();

        $tipifDelito = TipifDelito::find($id);
        $tipifDelito->idDelito = $request->idDelito;
        if ($request->conViolencia==="1") {
            # code...
            $tipifDelito->conViolencia = 1;
        } else {
            $tipifDelito->conViolencia = 0;
        }
        $tipifDelito->formaComision = $request->formaComision;
        $tipifDelito->fecha = $request->fecha;
        $tipifDelito->hora = $request->hora;
        $tipifDelito->idLugar = $request->idLugar;
        $tipifDelito->idZona = $request->idZona;
       // $tipifDelito->idDomicilio = $idD1;
        $tipifDelito->entreCalle = $request->entreCalle;
        $tipifDelito->yCalle = $request->yCalle;
        $tipifDelito->calleTrasera = $request->calleTrasera;
        $tipifDelito->puntoReferencia = $request->puntoReferencia;
        $tipifDelito->save();

//dd($domicilio,$tipifDelito);


        Alert::success('Delito modificado con exito','Hecho');
       

        return redirect()->route('new.delito', $id);
       // return back();
        //return view('forms.editdelitos'); 
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

}

