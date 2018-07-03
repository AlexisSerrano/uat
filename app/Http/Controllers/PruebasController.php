<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use Alert;
use DATEDIFF;
use Carbon\Carbon;
use App\Models\Carpeta;
use App\Models\CatEscolaridad;
use App\Models\CatEstado;
use App\Models\CatEstadoCivil;
use App\Models\CatEtnia;
use App\Models\CatLengua;
use App\Models\CatNacionalidad;
use App\Models\Preregistro;
use App\Models\CatOcupacion;
use App\Models\CatReligion;
use App\Models\Razon;
use App\Http\Controllers\PruebasController;


class PruebasController extends Controller
{

    public function metodo(){
        // // $comprobacionFolio=null;
        // // $folio=null;
        // // while($comprobacionFolio==$folio){
        // // }

        // $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        // $charactersLength = strlen($characters);
        // $randomString = '';
        // for ($i = 0; $i < 6; $i++) {
        //     $randomString .= $characters[rand(0, $charactersLength - 1)];
        // }
        // dd($randomString);
        //     // while(strlen($folio)==6-1) {
        //     //     $cadena = '1234567890ABCDEFGHIJKLMNOPKRSTUVWXYZ';
        //     //     // $folio=$folio.substr($cadena,rand(0,35));
        //     //     $folio=$folio.$cadena[rand(0,35)];
        //     //     dd($folio);
        //     // }
            
        //     // $comprobacionFolio=Preregistro::where('folio','=',$folio);
            





        
    }
    public function create()
    {

        {

            $razones=Razon::orderBy('nombre', 'ASC')
            ->pluck('nombre','id');
            $estados=CatEstado::orderBy('nombre', 'ASC')
            ->pluck('nombre','id');
            $ocupaciones=CatOcupacion::orderBy('nombre', 'ASC')
            ->pluck('nombre', 'id');
            $estadocivil = CatEstadoCivil::orderBy('nombre', 'ASC')
            ->pluck('nombre', 'id');
            $escolaridades = CatEscolaridad::orderBy('id', 'ASC')
            ->pluck('nombre', 'id');
            $nacionalidades = CatNacionalidad::orderBy('nombre', 'ASC')
            ->pluck('nombre', 'id');
           
    
    
        //dd($delitos);
             
        return view('pruebas.pruebas-Web')
            ->with('ocupaciones',$ocupaciones)
            ->with('escolaridades',$escolaridades)
            ->with('estadocivil',$estadocivil)
            ->with('razones',$razones)
            ->with('nacionalidades', $nacionalidades)
            ->with('estados',$estados);
    }
    
        

    }

    public function hechos()
    {

     $casonuevo=1;

    dd($casonuevo);
         
        return view('orientador.modulo-orientador')->with('casonuevo',$casonuevo);
}

public function delitos()
    {

     $delitos='delito';
    
     $estados=CatEstado::orderBy('nombre', 'ASC')
        ->pluck('nombre','id');

    //dd($delitos);
         
        return view('orientador.delitos-orientador')
        ->with('delito',$delitos)
        
        ->with('estados',$estados);
}

public function denunciado()
    {

     $delitos='denunciado';
     $nacionalidades = CatNacionalidad::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
     $estados=CatEstado::orderBy('nombre', 'ASC')
        ->pluck('nombre','id');
    

    //dd($delitos);
         
        return view('orientador.denunciado.denunciado')
        ->with('delito',$delitos)
        ->with('nacionalidades', $nacionalidades)
        ->with('estados',$estados);
}

public function actas()
    {

        $razones=Razon::orderBy('nombre', 'ASC')
        ->pluck('nombre','id');
        $estados=CatEstado::orderBy('nombre', 'ASC')
        ->pluck('nombre','id');
        $ocupaciones=CatOcupacion::orderBy('nombre', 'ASC')
        ->pluck('nombre', 'id');
        $estadocivil = CatEstadoCivil::orderBy('nombre', 'ASC')
        ->pluck('nombre', 'id');
        $escolaridades = CatEscolaridad::orderBy('id', 'ASC')
        ->pluck('nombre', 'id');
        $nacionalidades = CatNacionalidad::orderBy('nombre', 'ASC')
        ->pluck('nombre', 'id');
       


    //dd($delitos);
         
        return view('forms.acta-hechos')
        ->with('ocupaciones',$ocupaciones)
        ->with('escolaridades',$escolaridades)
        ->with('estadocivil',$estadocivil)
        ->with('razones',$razones)
        ->with('nacionalidades', $nacionalidades)
        ->with('estados',$estados);
}

public function impresion(){
    $fiscalAtiende=DB::table('users')
            ->join('unidad','unidad.id','=','users.id')
            ->join('unidad as unid','unid.id','=','users.idUnidad')
            ->where('users.id', Auth::user()->id)
            ->select('users.nombreC','users.puesto','users.numFiscal','unid.descripcion','users.numFiscalLetras as letra')
            ->first();

            
            $arr = explode(" ",$fiscalAtiende->descripcion);
            $aux=9;
            $localidad="";
            // dd(count($arr)-1);
            while(count($arr)-1 >= $aux){
                $localidad=$localidad." ".$arr[$aux];
                $aux=$aux+1;
            }
            dd($localidad);

            
            return view('tables.pruebas')->with('fiscalAtiende',$fiscalAtiende);
}


public function pruebas($id){

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
     'ejecutor.nombre as ejecutor', DB::raw("DATEDIFF(providencias_precautorias.fechaFin,providencias_precautorias.fechaInicio) AS VIGENCIA"), 'providencias_precautorias.id', 'providencias_precautorias.fechaInicio AS fecha','providencias_precautorias.idCarpeta as carpeta' , 'variables_persona.telefono as telefono')
      
      ->first();
     
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
    'telefono' => $oficio->telefono,
    'img' => asset('img/logo.png'),
    'id' => $id);
    return response()->json($data);
    dd($data);
}

public function alfred(){
    $texto = array('Décimo séptimo-17' => 'decimo septimo', '2°' => 'segundo', '3°' => 'primero');
    $cadena = "físcal décimo séptimo prueba";
    $cadena = normaliza($cadena);
    foreach($texto as $text => $valor){
        if(strpos($cadena, $valor)){
            $numero = $text;
            $arr = explode("-",$numero);
            $letra = $arr[0];
            $numero = $arr[1];
            break;
        }
    }
    echo $letra."<br>".$numero;
    
}
}
