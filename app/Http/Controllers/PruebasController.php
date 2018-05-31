<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Alert;
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
    return view('impresion');
}


public function pruebas($id){
    // $catalogos = DB::table('actas_hechos')->where('actas_hechos.id', $id)
    // ->join('cat_ocupacion','actas_hechos.idOcupacion','=','cat_ocupacion.id')
    // ->join('cat_estado_civil','actas_hechos.idEstadoCivil','=','cat_estado_civil.id')
    // ->join('cat_escolaridad','actas_hechos.idEscolaridad','=','cat_escolaridad.id')
    // ->join('domicilio','actas_hechos.idDomicilio','=','domicilio.id')
    // ->join('cat_municipio','domicilio.idMunicipio','=','cat_municipio.id')
    // ->join('cat_localidad','domicilio.idLocalidad','=','cat_localidad.id')
    // ->join('cat_colonia','domicilio.idColonia','=','cat_colonia.id')
    // ->join('cat_estado','cat_municipio.idEstado','=','cat_estado.id')
    // ->select('cat_ocupacion.nombre as nombreOcupacion',
    // 'cat_estado_civil.nombre as nombreEstadoCivil',
    // 'cat_escolaridad.nombre as nombreEscolaridad',
    // 'cat_municipio.nombre as nombreMunicipio',
    // 'cat_localidad.nombre as nombreLocalidad',
    // 'cat_colonia.nombre as nombreColonia',
    // 'cat_estado.nombre as nombreEstado',
    // 'domicilio.numInterno as numInterno', 'domicilio.numExterno as numExterno', 'domicilio.calle as calle',
    // 'actas_hechos.fecha_nac as fecha_nac', 'actas_hechos.telefono as telefono', 'actas_hechos.narracion as narracion',
    // 'actas_hechos.expedido as expedido', 'actas_hechos.fiscal as fiscal', 'actas_hechos.nombre as nombrePersona',
    // 'actas_hechos.primer_ap as primer_ap', 'actas_hechos.segundo_ap as segundo_ap',
    // 'actas_hechos.identificacion as identificacion', 'actas_hechos.num_identificacion as num_identificacion',
    // 'cat_colonia.codigoPostal as cp', 'actas_hechos.folio as folio', 'actas_hechos.hora as hora',
    // 'actas_hechos.fecha as fecha')
    // ->first();




    $FormatoMedidas = DB::table('providencias_precautorias')->where('providencias_precautorias.id', $id)
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
    ->select('persona.nombres', 'persona.primerAp','persona.segundoAp',
     'domicilio.calle', 'domicilio.numExterno', 'cat_colonia.nombre as colonia','cat_colonia.codigoPostal as cp','cat_municipio.nombre as municipio','cat_estado.nombre as estado',
     'ejecutor.nombre as ejecutor','providencias_precautorias.fechaFin', 'providencias_precautorias.fechaInicio', 'providencias_precautorias.id', 'providencias_precautorias.idCarpeta as carpeta'  )
    
      ->first();
dd($FormatoMedidas);


    // if($catalogos->numInterno==''){
    //     $numExterno = $catalogos->numExterno;
    // }
    // else{
    //     $numExterno = $catalogos->numExterno.' interior '.$catalogos->numInterno;
    // }
    // $fechaactual = new Date($catalogos->fecha);
    // $fechahum = $fechaactual->format('l j').' de '.$fechaactual->format('F').' del año '.$fechaactual->format('Y');
    // $date = new Date($catalogos->fecha_nac);
    // $fechanachum = $date->format('j').' de '.$date->format('F').' del año '.$date->format('Y');
    // $fechasep = explode("-", $catalogos->fecha_nac);
    // $edad = Date::createFromDate($fechasep[0],$fechasep[1],$fechasep[2])->age;
    // $data = array('estado' => $catalogos->nombreEstado, 
    // 'municipio' => $catalogos->nombreMunicipio, 
    // 'localidad' => $catalogos->nombreLocalidad,
    // 'colonia' => $catalogos->nombreColonia,
    // 'calle' => $catalogos->calle,
    // 'cp' => $catalogos->cp,
    // 'numExterno' => $numExterno,
    // 'folio' => $catalogos->folio,
    // 'hora' => $date->parse($catalogos->hora)->format('H:i'),
    // 'fecha' => $fechahum,
    // 'fiscal' => $catalogos->fiscal,
    // 'nombre' => $catalogos->nombrePersona.' '.$catalogos->primer_ap.' '.$catalogos->segundo_ap,
    // 'identificacion' => $catalogos->identificacion,
    // 'numIdentificacion' => $catalogos->num_identificacion,
    // 'fechaNacimiento' => $fechanachum,
    // 'ocupacion' => $catalogos->nombreOcupacion,
    // 'estadoCivil' => $catalogos->nombreEstadoCivil,
    // 'escolaridad' => $catalogos->nombreEscolaridad,
    // 'telefono' => $catalogos->telefono,
    // 'narracion' => $catalogos->narracion,
    // 'expedido' => $catalogos->expedido,
    // 'edad' => $edad,
    // 'img' => asset('img/logo.png'),
    // 'id' => $id);
    // return response()->json($data);
}


}
