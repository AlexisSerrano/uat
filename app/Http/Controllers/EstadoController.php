<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\Carpeta;
use App\Models\Acusacion;
use App\Models\ExtraAbogado;
use App\Models\ExtraAutoridad;
use App\Models\ExtraDenunciado;
use App\Models\ExtraDenunciante;
use App\Models\DirNotificaciones;
use App\Models\TipifDelito;
use App\Models\VariablesPersona;

use App\Models\uatuipj\ConCarpeta;
use App\Models\uatuipj\ConAcusacion;
use App\Models\uatuipj\ConExtraAbogado;
use App\Models\uatuipj\ConExtraAutoridad;
use App\Models\uatuipj\ConExtraDenunciado;
use App\Models\uatuipj\ConExtraDenunciante;
use App\Models\uatuipj\ConNotificaciones;
use App\Models\uatuipj\ConTipifDelito;
use App\Models\uatuipj\ConVariablesPersona;

use App\Models\CatEscolaridad;
use App\Models\CatEstadoCivil;
use App\Models\CatEtnia;
use App\Models\CatLengua;
use App\Models\CatNacionalidad;
use App\Models\CatOcupacion;
use App\Models\CatEstatusCaso;
use Illuminate\Support\Facades\Session;
use App\Models\Admin;
use DB;
use Alert;

class EstadoController extends Controller
{
    //



    public function index($id){
    // $idCarpeta=session('carpeta');
     
    // $casoNuevo = Carpeta::where($id, $idCarpeta)->get();
    // $carpetaNueva = Carpeta::find($idCarpeta);
// dd($carpetaNueva);

//    $idEstadocarpeta = $carpetaNueva->idEstadoCarpeta;//id direccion

  
        
        
    $estatus=DB::table('carpeta') //id's de domicilios (municipio,localidad)
       ->join('cat_estatus_casos','cat_estatus_casos.id','=','carpeta.idEstadoCarpeta') 
       ->select('cat_estatus_casos.nombreEstatus as estatus', 'carpeta.id as id')
       ->where('carpeta.id','=', $id)
        ->get();
        

      $informacion = CatEstatusCaso::orderBy('nombreEstatus', 'ASC')
      ->pluck('nombreEstatus','id');
        return view('forms.turnar-carpeta')->with('informacion', $informacion)->with('estatus', $estatus);
    }


    public function editar(Request $request){
        

        // DB::beginTransaction();
        // try{
             //Sacar el id del select  //EstadoCarpeta es variable del select
            $idCarpeta=$request->idCarpeta;  //id de Variable de sesion
            //$idCarpeta=session('carpeta');  //id de Variable de sesion
            //dd($idCarpeta);
            $id = Carpeta::find($idCarpeta); //seleccinar toda la fila del primer id con  el valor de idCarpeta 
            $id->idEstadoCarpeta = $request->EstadoCarpeta;  //cambiar el campo idEstadpCarpeta por el valor $nombre
            $id->save();   // para guardar el registro
            
            if ($request->EstadoCarpeta==3) {
                $carpeta=Carpeta::where('id',$idCarpeta)->first();
                //dd($carpeta);
                if (count($carpeta)!=null) {
                    $concarpeta= new ConCarpeta;
                    $concarpeta->idUnidad = 11;
                    $concarpeta->fechaInicio = $carpeta->fechaInicio;
                    $concarpeta->conDetenido = $carpeta->conDetenido;
                    $concarpeta->esRelevante = $carpeta->esRelevante;
                    $concarpeta->idEstadoCarpeta = $carpeta->idEstadoCarpeta;
                    $concarpeta->horaIntervencion = $carpeta->horaIntervencion;
                    $concarpeta->npd = $carpeta->npd;
                    $concarpeta->fechaIph = $carpeta->fechaIph;
                    $concarpeta->numIph = $carpeta->numIph;
                    $concarpeta->narracionIph = $carpeta->narracionIph;
                    $concarpeta->descripcionHechos = $carpeta->descripcionHechos;
                    $concarpeta->nombreFiscalUat = 'XXXXXXXXXXXXXXX XXXXXXXXXXX XXXXXXXXXXXXXXx';
                    $concarpeta->numCarpetaUat = $carpeta->numCarpeta;
                    $concarpeta->asignada = 0;
                    $concarpeta->observacionesEstatus = $carpeta->observacionesEstatus;
                    $concarpeta->save();
                    dd($concarpeta);
                }
            }
            // DB::commit();
            Alert::success('Registro modificado con exito','Hecho');
            return back();
        // }catch (\PDOException $e){
        //     DB::rollBack();
        //     Alert::error('Se presentó un problema al guardar su los datos, intente de nuevo', 'Error');
        //     return back()->withInput();
        // }
    
  
   

       }


}



