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
use App\Http\Requests\ActaCircRequest;
use Illuminate\Support\Facades\Auth;
use DB;
use Alert;
use Carbon\Carbon;
use Jenssegers\Date\Date;

class ActaCircunstanciadaController extends Controller
{
    
    public function showform(){
        $estados=CatEstado::orderBy('nombre', 'ASC')->pluck('nombre','id');
        $ocupaciones=CatOcupacion::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
        $estadocivil = CatEstadoCivil::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
        $escolaridades = CatEscolaridad::orderBy('id', 'ASC')->pluck('nombre', 'id');
        $nacionalidades = CatNacionalidad::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
        $municipios = CatMunicipio::orderBy('nombre', 'ASC')->where('idEstado',30)->pluck('nombre', 'id');
        return view('servicios.actas.acta-circunstanciada',compact('ocupaciones','escolaridades','estadocivil','nacionalidades','estados','municipios'));
    }

    public function addActaCirc(ActaCircRequest $request){
        DB::beginTransaction();
        try{
            $direccion = new Domicilio;
            $direccion->idMunicipio = $request->idMunicipio2;
            $direccion->idLocalidad = $request->idLocalidad2;
            $direccion->idColonia = $request->idColonia2;
            $direccion->calle = $request->calle2;   
            if($request->numInterno2!=''){
                $direccion->numInterno = $request->numInterno2;
            }
            $direccion->numExterno = $request->numExterno2;
            $direccion->save();
            
            $acta = new ActaCircunstanciada;
            $acta->hora = Date::now()->format('H:i:s');
            $acta->fecha = Date::now()->format('Y-m-d');
            $acta->fiscal = Auth::user()->nombreC;
            $acta->nombre = $request->nombre2;
            $acta->primer_ap = $request->primerAp;
            $acta->segundo_ap = $request->segundoAp;
            $acta->identificacion = $request->docIdentificacion;
            $acta->num_identificacion = $request->numDocIdentificacion;
            $acta->fecha_nac = $request->fecha_nac;
            $acta->idEstadoOrigen = $request->idEstadoOrigen;
            $acta->idMunicipioOrigen = $request->idMunicipioOrigen;
            $acta->idDomicilio = $direccion->id;
            $acta->idOcupacion = $request->ocupActa1;
            $acta->idEstadoCivil = $request->estadoCivilActa1;
            $acta->idEscolaridad = $request->escActa1;
            $acta->telefono = $request->telefono;
            $acta->narracion = $request->narracion;
            
            switch ($request->docIdentificacion) {
                case 'CREDENCIAL PARA VOTAR': $acta->expedido ="INSTITUTO NACIONAL ELECTORAL";
                break;
                case 'PASAPORTE':$acta->expedido ="SECRETARÍA DE RELACIONES EXTERIORES";
                break;
                case 'CEDULA PROFESIONAL':$acta->expedido ="DIRECCIÓN GENERAL DE PROFESIONES";
                break;
                case 'CARTILLA DEL SERVICIO MILITAR NACIONAL':$acta->expedido ="SECRETARÍA DE LA DEFENSA NACIONAL";
                break;
                case 'TARJETA UNICA DE IDENTIDAD MILITAR':$acta->expedido ="DISPOSICIONES DE CARÁCTER GENERAL";
                break;
                case 'TARJETA DE AFILIACION AL INSTITUTO NACIONAL DE PERSONAS ADULTAS MAYORES':$acta->expedido ="INAPAM";
                break;
                case 'CREDENCIAL DE SALUD EXPEDIDO POR EL INSTITUTO MEXICANO DEL SEGURO SOCIAL':$acta->expedido ="IMSS";
                break;
                case 'CREDENCIALES DE EDUCACION MEDIA SUPERIOR Y SUPERIOR':$acta->expedido ="DIRECCIÓN GENERAL DE ACREDITACIÓN, INCORPORACIÓN Y REVALIDACIÓN";
                break;
                case 'LICENCIA DE CONDUCIR':$acta->expedido ="SECRETARÍA DE COMUNICACIONES Y TRANSPORTES";
                break;
                case 'CERTIFICADO DE MATRICULA CONSULAR':$acta->expedido ="CERTIFICADO DE MATRICULA CONSULAR";
                break;
                case 'ACTA DE NACIMIENTO':$acta->expedido ="REGISTRO NACIONAL DE POBLACIÓN";
                break;
                case 'CURP':$acta->expedido ="REGISTRO NACIONAL DE POBLACIÓN";
                break;
                case 'CONSTANCIA DE RESIDENCIA':$acta->expedido ="SERVICIO DE ADMINISTRACIÓN TRIBUTARIA";
                break;
                default:$acta->expedido = $request->expedido;
                break;
            }
          
            $acta->save();
           // dd($acta);
            if($acta->save()){
                Alert::success('Datos registrados con éxito', 'Hecho');
            }
            else{
                Alert::error('Se presentó un problema al guardar los datos', 'Error');
            }
    
            DB::commit();
            return view('documentos/actaCircunstanciada')->with('id',$acta->id);

        }catch (\PDOException $e){
            DB::rollBack();
            Alert::error('Se presentó un problema al guardar  los datos, intente de nuevo', 'Error');
            return back()->withInput();
        }

    }

    // public function getcircunstanciada($id){

    //     $catalogos = DB::table('acta_circunstanciada')->where('acta_circunstanciada.id', $id)
    //     ->join('cat_ocupacion','acta_circunstanciada.idOcupacion','=','cat_ocupacion.id')
    //     ->join('cat_estado_civil','acta_circunstanciada.idEstadoCivil','=','cat_estado_civil.id')
    //     ->join('cat_escolaridad','acta_circunstanciada.idEscolaridad','=','cat_escolaridad.id')
    //     ->join('domicilio','acta_circunstanciada.idDomicilio','=','domicilio.id')
    //     ->join('cat_municipio','domicilio.idMunicipio','=','cat_municipio.id')
    //     ->join('cat_localidad','domicilio.idLocalidad','=','cat_localidad.id')
    //     ->join('cat_colonia','domicilio.idColonia','=','cat_colonia.id')
    //     ->join('cat_estado','cat_municipio.idEstado','=','cat_estado.id')
    //     ->join('cat_estado as catestado','acta_circunstanciada.idEstadoOrigen','=','catestado.id')
    //     ->join('cat_municipio as catmunicipio','acta_circunstanciada.idMunicipioOrigen','=','catmunicipio.id')
    //     ->select('cat_ocupacion.nombre as nombreOcupacion',
    //     'cat_estado_civil.nombre as nombreEstadoCivil',
    //     'cat_escolaridad.nombre as nombreEscolaridad',
    //     'cat_municipio.nombre as nombreMunicipio',
    //     'cat_localidad.nombre as nombreLocalidad',
    //     'cat_colonia.nombre as nombreColonia',
    //     'cat_estado.nombre as nombreEstado',
    //     'catestado.nombre as edoOrigen',
    //     'catmunicipio.nombre as MunicipioOrigen',
    //     'domicilio.numInterno as numInterno', 'domicilio.numExterno as numExterno', 'domicilio.calle as calle',
    //     'acta_circunstanciada.fecha_nac as fecha_nac', 'acta_circunstanciada.telefono as telefono', 'acta_circunstanciada.narracion as narracion',
    //     'acta_circunstanciada.expedido as expedido', 'acta_circunstanciada.fiscal as fiscal', 'acta_circunstanciada.nombre as nombrePersona',
    //     'acta_circunstanciada.primer_ap as primer_ap', 'acta_circunstanciada.segundo_ap as segundo_ap',
    //     'acta_circunstanciada.identificacion as identificacion', 'acta_circunstanciada.num_identificacion as num_identificacion',
    //     'cat_colonia.codigoPostal as cp', 'acta_circunstanciada.hora as hora',
    //     'acta_circunstanciada.fecha as fecha')
    //     ->first();
    //     if($catalogos->numInterno==''){
    //         $numExterno = $catalogos->numExterno;
    //     }
    //     else{
    //         $numExterno = $catalogos->numExterno.' interior '.$catalogos->numInterno;
    //     }
    //     $fechaactual = new Date($catalogos->fecha);
    //     $fechahum = $fechaactual->format('l j').' de '.$fechaactual->format('F').' del año '.$fechaactual->format('Y');
    //     $date = new Date($catalogos->fecha_nac);
    //     $fechanachum = $date->format('j').' de '.$date->format('F').' del año '.$date->format('Y');
    //     $fechasep = explode("-", $catalogos->fecha_nac);
    //     $edad = Date::createFromDate($fechasep[0],$fechasep[1],$fechasep[2])->age;
    //     $puestoFiscal = Auth::user()->puesto;

        
    //     $puestoFiscal = strtr(strtoupper($puestoFiscal),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ");


    //     $data = array('estado' => $catalogos->nombreEstado, 
    //     'municipio' => $catalogos->nombreMunicipio, 
    //     'localidad' => $catalogos->nombreLocalidad,
    //     'colonia' => $catalogos->nombreColonia,
    //     'calle' => $catalogos->calle,
    //     'cp' => $catalogos->cp,
    //     'numExterno' => $catalogos->numExterno,
    //     'estadoOrigen' => $catalogos->edoOrigen,
    //     'municipioOrigen' => $catalogos->MunicipioOrigen,
    //     // 'folio' => $catalogos->folio,
    //     'hora' => $date->parse($catalogos->hora)->format('H:i'),
    //     'fecha' => $fechahum,
    //     'fiscal' => $catalogos->fiscal,
    //     'puestoFiscal' => $puestoFiscal,
    //     'nombre' => $catalogos->nombrePersona.' '.$catalogos->primer_ap.' '.$catalogos->segundo_ap,
    //     'identificacion' => $catalogos->identificacion,
    //     'numIdentificacion' => $catalogos->num_identificacion,
    //     'fechaNacimiento' => $fechanachum,
    //     'ocupacion' => $catalogos->nombreOcupacion,
    //     'estadoCivil' => $catalogos->nombreEstadoCivil,
    //     'escolaridad' => $catalogos->nombreEscolaridad,
    //     'telefono' => $catalogos->telefono,
    //     'narracion' => $catalogos->narracion,
    //     'expedido' => $catalogos->expedido,
    //     'edad' => $edad,
    //     'img' => asset('img/logo.png'),
    //     'id' => $id);
    //     return response()->json($data);
        
    // }

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
        'folio' => $unidad->abreviacion."/AH-".$acta->folio."/".$fechaactual->format('Y'),
        'hora' => $date->parse($acta->hora)->format('H:i'),
        'fecha' => strtr(strtoupper($fechahum),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ"),
        'fiscal' => strtr(strtoupper($acta->fiscal),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ"),
        'puesto' => strtr(strtoupper(Auth::user()->puesto),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ"),
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
