<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Carpeta;
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



    public function index(){
     $idCarpeta=session('carpeta');
     
    //  $casoNuevo = Carpeta::where('id', $idCarpeta)->get();
    // $carpetaNueva = Carpeta::find($idCarpeta);
// dd($carpetaNueva);

//    $idEstadocarpeta = $carpetaNueva->idEstadoCarpeta;//id direccion

  
        
        
    $estatus=DB::table('carpeta') //id's de domicilios (municipio,localidad)
       ->join('cat_estatus_casos','cat_estatus_casos.id','=','carpeta.idEstadoCarpeta') 
       ->select('cat_estatus_casos.nombreEstatus as estatus')
       ->where('carpeta.id','=', $idCarpeta)
        ->get();
        

      $informacion = CatEstatusCaso::orderBy('nombreEstatus', 'ASC')
      ->pluck('nombreEstatus','id');
        return view('forms.turnar-carpeta')->with('informacion', $informacion)->with('estatus', $estatus);
    }


    public function editar(Request $request ){
      
        $nombre= $request->EstadoCarpeta; //Sacar el id del select  //EstadoCarpeta es variable del select
        $idCarpeta=session('carpeta');  //id de Variable de sesion
        $id = Carpeta::find($idCarpeta); //seleccinar toda la fila del primer id con  el valor de idCarpeta 
        $id->idEstadoCarpeta = $nombre;  //cambiar el campo idEstadpCarpeta por el valor $nombre
        $id->save();   // para guardar el registro
       
        Alert::success('Registro modificado con exito','Hecho');
        return redirect('/cestado');
    
  
   

       }


}



