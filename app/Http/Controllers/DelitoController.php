<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Alert;

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


class DelitoController extends Controller
{
    
   


 public function showForm()
    {
        //$idCarpeta='2';
       
        $idCarpeta=session('carpeta');
        $carpetaNueva = Carpeta::where('id', $idCarpeta)->get();//->where('idFiscal', Auth::user()->id)->get();
        if(count($carpetaNueva)>0){ 
            $denunciados = CarpetaController::getDenunciados($idCarpeta);
            $denunciantes = CarpetaController::getDenunciantes($idCarpeta);
            $medidasP= CarpetaController::getMedidasP($idCarpeta);      
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
                ->with('denunciados', $denunciados)
                ->with('denunciantes', $denunciantes)
                ->with('acusaciones', $acusaciones)
                ->with('medidasP', $medidasP)
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
       //$idCarpeta='2';
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
        /*
        Flash::success("Se ha registrado ".$user->name." de forma satisfactoria")->important();
        //Para mostrar modal
        //flash()->overlay('Se ha registrado '.$user->name.' de forma satisfactoria!', 'Hecho');
        */
        if($tipifDelito->save()){
            Alert::success('Delito registrado con éxito', 'Hecho')->persistent("Aceptar");
        }
        else{
            Alert::error('Se presentó un problema al agregar el delito', 'Error')->persistent("Aceptar");
        }
    
        $delitos = DB::table('tipif_delito')
        ->join('cat_delito', 'cat_delito.id', '=', 'tipif_delito.idDelito')
        ->join('domicilio', 'domicilio.id', '=', 'tipif_delito.idDomicilio')
        ->select('tipif_delito.id','domicilio.id as idDomicilio','domicilio.calle as domicilio','cat_delito.id as idDelito', 'cat_delito.nombre as delito',  'tipif_delito.fecha', 'tipif_delito.hora')
       // ->where('tipif_delito.idCarpeta', '=', $idCarpeta)
        ->get();

       // dd($delitos);
        return redirect()->route('new.delito', $idCarpeta)->with('delitos', $delitos);


    }


    public function delete($id){

        $TipifDelito =  TipifDelito::find($id);
        $TipifDelito->delete();
        Alert::success('Registro eliminado con éxito', 'Hecho')->persistent("Aceptar");
        return back();


    }
    
      
}