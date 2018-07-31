<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Domicilio;
use App\Models\CatEscolaridad;
use App\Models\CatEstado;
use App\Models\CatEstadoCivil;
use App\Models\CatOcupacion;
use App\Models\CatNacionalidad;
use App\Models\Preregistro;
use App\Models\CatMunicipio;
use App\Models\CatIdentificacion;
use App\Models\ActaCircunstanciada;
use Illuminate\Support\Facades\Auth;
use DB;
use Alert;
use Carbon\Carbon;
use Jenssegers\Date\Date;

class ActaCircunstanciadaController extends Controller
{
    
    public function showform(){
        return view('servicios.actas.acta-circunstanciada');
    }


    /*COMPONENTE */
    public function addExtrasActas(Request $request){
        try{
            DB::beginTransaction();
            $fiscaldb = DB::table('users')->where('id',$request->usuario)->first();
            if($request->idExtrasActas!=""){
                $acta = ActaCircunstanciada::find($request->idExtrasActas);
            }else{
                $acta = new ActaCircunstanciada();
                $acta->varPersona = $request->idPersona;
                $ultimo = ActaCircunstanciada::orderBy('id','desc')->first();
                $new = ($ultimo)?$ultimo->folio+1:1;

                $acta->folio = $new;   
            } 
            $acta->hora = Date::now()->format('H:i:s');
            $acta->fecha = Date::now()->format('Y-m-d');
            $acta->fiscal = $fiscaldb->nombreC;
            $acta->narracion = $request->narracion;
            $acta->varPersona = $request->idPersona;          
            $acta->idUnidad = $fiscaldb->idUnidad;
            $acta->save();

            DB::commit();
            return $acta->id;
        }
        catch(Exception $e){
            DB::rollback();
            return false;
        }
    }

    public function getExpedido($tipo){
        switch ($tipo) {
            case '11':$acta2 ="REGISTRO NACIONAL DE POBLACIÓN"; //ACTA DE NACIMIENTO
            break;
            case '4':$acta2 ="SECRETARÍA DE LA DEFENSA NACIONAL"; //CARTILLA DEL SERVICIO MILITAR NACIONAL
            break;
            case '3':$acta2 ="DIRECCIÓN GENERAL DE PROFESIONES"; //CEDULA PROFESIONAL
            break;
            case '10':$acta2 ="CERTIFICADO DE MATRICULA CONSULAR"; //CERTIFICADO DE MATRICULA CONSULAR
            break;
            case '13':$acta2 ="SERVICIO DE ADMINISTRACIÓN TRIBUTARIA"; //CONSTANCIA DE RESIDENCIA
            break;
            case '7':$acta2 ="IMSS"; //CREDENCIAL DE SALUD EXPEDIDO POR EL INSTITUTO MEXICANO DEL SEGURO SOCIAL
            break;
            case '1': $acta2 ="INSTITUTO NACIONAL ELECTORAL"; //CREDENCIAL PARA VOTAR
            break;
            case '8':$acta2 ="DIRECCIÓN GENERAL DE ACREDITACIÓN, INCORPORACIÓN Y REVALIDACIÓN"; //CREDENCIALES DE EDUCACION MEDIA SUPERIOR Y SUPERIOR
            break;
            case '12':$acta2 ="REGISTRO NACIONAL DE POBLACIÓN"; //CURP
            break;
            case '9':$acta2 ="SECRETARÍA DE COMUNICACIONES Y TRANSPORTES"; //LICENCIA DE CONDUCIR
            break;
            case '2':$acta2 ="SECRETARÍA DE RELACIONES EXTERIORES"; //PASAPORTE
            break; 
            case '6':$acta2 ="INAPAM"; //TARJETA DE AFILIACION AL INSTITUTO NACIONAL DE PERSONAS ADULTAS MAYORES
            break;
            case '5':$acta2 ="DISPOSICIONES DE CARÁCTER GENERAL"; //TARJETA UNICA DE IDENTIDAD MILITAR
            break;
            default:$acta2 = $tipo;
            break;
        }
        return $acta2;
    }

    public function actaCircunstanciada($id){
        return view("documentos/actaCircunstanciada")->with('id',$id);
    }

    public function getcircunstanciada($id){
        $acta = ActaCircunstanciada::find($id);
        $variable = DB::connection('componentes')->table('variables_persona_fisica')
        ->join('persona_fisica','variables_persona_fisica.idPersona','=','persona_fisica.id')
        ->join('cat_ocupacion','variables_persona_fisica.idOcupacion','=','cat_ocupacion.id')
        ->join('cat_estado_civil','variables_persona_fisica.idEstadoCivil','=','cat_estado_civil.id')
        ->join('cat_escolaridad','variables_persona_fisica.idEscolaridad','=','cat_escolaridad.id')
        ->join('domicilio','variables_persona_fisica.idDomicilio','=','domicilio.id')
        ->join('cat_municipio','domicilio.idMunicipio','=','cat_municipio.id')
        ->join('cat_localidad','domicilio.idLocalidad','=','cat_localidad.id')
        ->join('cat_colonia','domicilio.idColonia','=','cat_colonia.id')
        ->join('cat_estado','cat_municipio.idEstado','=','cat_estado.id')
        ->join('cat_identificacion','variables_persona_fisica.docIdentificacion','=','cat_identificacion.id')
        ->where('variables_persona_fisica.id',$acta->varPersona)
        ->select('cat_ocupacion.nombre as nombreOcupacion',
        'cat_estado_civil.nombre as nombreEstadoCivil',
        'cat_escolaridad.nombre as nombreEscolaridad',
        'cat_municipio.nombre as nombreMunicipio',
        'cat_localidad.nombre as nombreLocalidad',
        'cat_colonia.nombre as nombreColonia',
        'cat_estado.nombre as nombreEstado',
        'domicilio.numInterno as numInterno', 'domicilio.numExterno as numExterno', 'domicilio.calle as calle',
        'persona_fisica.fechaNacimiento as fecha_nac', 'variables_persona_fisica.telefono as telefono', 
        'persona_fisica.nombres as nombrePersona','persona_fisica.primerAp as primer_ap',
        'persona_fisica.segundoAp as segundo_ap','persona_fisica.idMunicipioOrigen as idMunicipioOrigen',
        'cat_identificacion.documento as identificacion', 'variables_persona_fisica.numDocIdentificacion as num_identificacion',
        'cat_colonia.codigoPostal as cp')
        ->first();
        $origen = DB::connection('componentes')->table('cat_municipio')
        ->join('cat_estado','cat_municipio.idEstado','=','cat_estado.id')
        ->where('cat_municipio.id',$variable->idMunicipioOrigen)
        ->select('cat_municipio.nombre as municipioOrigen','cat_estado.nombre as estadoOrigen')
        ->first();
        $unidad = DB::table('unidad')->where('id',$acta->idUnidad)->first();
        $arr = explode(" ",$unidad->descripcion);
        $aux=9;
        $localidad="";
        while(count($arr)-1 >= $aux){
           $localidad=$localidad." ".$arr[$aux];
           $aux=$aux+1;
        }
        if($variable->numInterno=='S/N'){
            $numExterno = $variable->numExterno;
        }
        else{
            $numExterno = $variable->numExterno.' INTERIOR '.$variable->numInterno;
        }
        $fechaactual = new Date($acta->fecha);
        $fechahum = $fechaactual->format('l j').' de '.$fechaactual->format('F').' de '.$fechaactual->format('Y');
        $date = new Date($variable->fecha_nac);
        $fechanachum = $date->format('j').' de '.$date->format('F').' de '.$date->format('Y');
        $fechasep = explode("-", $variable->fecha_nac);
        $edad = Date::createFromDate($fechasep[0],$fechasep[1],$fechasep[2])->age;
        $data = array('estado' => $variable->nombreEstado, 
        'unidadMunicipio' => strtr(($localidad),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ"), 
        'municipio' => strtr(($variable->nombreMunicipio),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ"),   
        'localidad' =>strtr(($localidad),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ"), 
        'colonia' => strtr(($variable->nombreColonia),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ"),
        'calle' =>strtr(($variable->calle),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ"), 
        'cp' => $variable->cp,
        'numExterno' => $numExterno,
        'folio' => $unidad->abreviacion."/AC-".$acta->folio."/".$fechaactual->format('Y'),
        'hora' => $date->parse($acta->hora)->format('H:i'),
        'fecha' => strtr(strtoupper($fechahum),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ"),
        'fiscal' => strtr(strtoupper($acta->fiscal),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ"),
        'puesto' => strtr(strtoupper(Auth::user()->puesto),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ"),
        'numFiscal'=>Auth::user()->numFiscal,
        'nombre' =>strtr(($variable->nombrePersona.' '.$variable->primer_ap.' '.$variable->segundo_ap),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ"),
        'identificacion' => strtr(($variable->identificacion),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ"),
        'numIdentificacion' => $variable->num_identificacion,
        'fechaNacimiento' =>strtr(($fechanachum),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ"), 
        'ocupacion' =>strtr(($variable->nombreOcupacion),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ"), 
        'estadoCivil' =>strtr(($variable->nombreEstadoCivil),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ"),  
        'escolaridad' => strtr(($variable->nombreEscolaridad),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ"),  
        'telefono' => $variable->telefono,
        'narracion' => strtr(($acta->narracion),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ"),
        'expedido' => strtr((ActaCircunstanciadaController::getExpedido($variable->identificacion)),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ"),
        'edad' => $edad,
        'img' => asset('img/logo.png'),
        'municipioOrigen' => $origen->municipioOrigen,
        'estadoOrigen' => $origen->estadoOrigen,
        'unidad'=>$unidad->descripcion,
        'id' => $id);
        return response()->json($data);
    }

}
