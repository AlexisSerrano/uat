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
use App\Models\catIdentificacion;
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
        $municipios = CatMunicipio::orderBy('nombre', 'ASC')
        ->pluck('nombre', 'id');
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
            // $ultimo = ActasHechos::orderBy('id','desc')->first();
            // if($ultimo){
            //     $new = $ultimo->folio+1;
            // }
            // else{
            //     $new = 1;
            // }
            // $acta->folio = $new;
            $acta = new ActaCircunstanciada;
            $acta->hora = Date::now()->format('H:i:s');
            $acta->fecha = Date::now()->format('Y-m-d');
            $acta->fiscal = Auth::user()->id;
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
                // $bdbitacora = BitacoraNavCaso::where('idCaso',session('carpeta'))->first();
                // $bdbitacora->delitos = $bdbitacora->delitos+1;
                // $bdbitacora->save();
            }
            else{
                Alert::error('Se presentó un problema al guardar los datos', 'Error');
            }
    
            DB::commit();
           // dd($acta);
            return view('documentos/actaCircunstanciada')->with('id',$acta->id);
        //     $delitos = DB::table('tipif_delito')
        //     ->join('cat_delito', 'cat_delito.id', '=', 'tipif_delito.idDelito')
        //     ->join('domicilio', 'domicilio.id', '=', 'tipif_delito.idDomicilio')
        //     ->select('tipif_delito.id','domicilio.id as idDomicilio','domicilio.calle as domicilio','cat_delito.id as idDelito', 'cat_delito.nombre as delito',  'tipif_delito.fecha', 'tipif_delito.hora')
        // // ->where('tipif_delito.idCarpeta', '=', $idCarpeta)
        //     ->get();

        // dd($delitos);
           // return redirect()->route('new.actacircunstanciada');

        }catch (\PDOException $e){
            DB::rollBack();
            Alert::error('Se presentó un problema al guardar  los datos, intente de nuevo', 'Error');
            return back()->withInput();
        }

    }

    public function getcircunstanciada($id){

        $catalogos = DB::table('acta_circunstanciada')->where('acta_circunstanciada.id', $id)
        ->join('cat_ocupacion','acta_circunstanciada.idOcupacion','=','cat_ocupacion.id')
        ->join('cat_estado_civil','acta_circunstanciada.idEstadoCivil','=','cat_estado_civil.id')
        ->join('cat_escolaridad','acta_circunstanciada.idEscolaridad','=','cat_escolaridad.id')
        ->join('domicilio','acta_circunstanciada.idDomicilio','=','domicilio.id')
        ->join('cat_municipio','domicilio.idMunicipio','=','cat_municipio.id')
        ->join('cat_localidad','domicilio.idLocalidad','=','cat_localidad.id')
        ->join('cat_colonia','domicilio.idColonia','=','cat_colonia.id')
        ->join('cat_estado','cat_municipio.idEstado','=','cat_estado.id')
        ->join('cat_estado as catestado','acta_circunstanciada.idEstadoOrigen','=','catestado.id')
        ->join('cat_municipio as catmunicipio','acta_circunstanciada.idMunicipioOrigen','=','catmunicipio.id')
        ->select('cat_ocupacion.nombre as nombreOcupacion',
        'cat_estado_civil.nombre as nombreEstadoCivil',
        'cat_escolaridad.nombre as nombreEscolaridad',
        'cat_municipio.nombre as nombreMunicipio',
        'cat_localidad.nombre as nombreLocalidad',
        'cat_colonia.nombre as nombreColonia',
        'cat_estado.nombre as nombreEstado',
        'catestado.nombre as edoOrigen',
        'catmunicipio.nombre as MunicipioOrigen',
        'domicilio.numInterno as numInterno', 'domicilio.numExterno as numExterno', 'domicilio.calle as calle',
        'acta_circunstanciada.fecha_nac as fecha_nac', 'acta_circunstanciada.telefono as telefono', 'acta_circunstanciada.narracion as narracion',
        'acta_circunstanciada.expedido as expedido', 'acta_circunstanciada.fiscal as fiscal', 'acta_circunstanciada.nombre as nombrePersona',
        'acta_circunstanciada.primer_ap as primer_ap', 'acta_circunstanciada.segundo_ap as segundo_ap',
        'acta_circunstanciada.identificacion as identificacion', 'acta_circunstanciada.num_identificacion as num_identificacion',
        'cat_colonia.codigoPostal as cp', 'acta_circunstanciada.hora as hora',
        'acta_circunstanciada.fecha as fecha')
        ->first();
        if($catalogos->numInterno==''){
            $numExterno = $catalogos->numExterno;
        }
        else{
            $numExterno = $catalogos->numExterno.' interior '.$catalogos->numInterno;
        }
        $fechaactual = new Date($catalogos->fecha);
        $fechahum = $fechaactual->format('l j').' de '.$fechaactual->format('F').' del año '.$fechaactual->format('Y');
        $date = new Date($catalogos->fecha_nac);
        $fechanachum = $date->format('j').' de '.$date->format('F').' del año '.$date->format('Y');
        $fechasep = explode("-", $catalogos->fecha_nac);
        $edad = Date::createFromDate($fechasep[0],$fechasep[1],$fechasep[2])->age;



        $data = array('estado' => $catalogos->nombreEstado, 
        'municipio' => $catalogos->nombreMunicipio, 
        'localidad' => $catalogos->nombreLocalidad,
        'colonia' => $catalogos->nombreColonia,
        'calle' => $catalogos->calle,
        'cp' => $catalogos->cp,
        'numExterno' => $catalogos->numExterno,
        'estadoOrigen' => $catalogos->edoOrigen,
        'municipioOrigen' => $catalogos->MunicipioOrigen,
        // 'folio' => $catalogos->folio,
        'hora' => $date->parse($catalogos->hora)->format('H:i'),
        'fecha' => $fechahum,
        'fiscal' => $catalogos->fiscal,
        'nombre' => $catalogos->nombrePersona.' '.$catalogos->primer_ap.' '.$catalogos->segundo_ap,
        'identificacion' => $catalogos->identificacion,
        'numIdentificacion' => $catalogos->num_identificacion,
        'fechaNacimiento' => $fechanachum,
        'ocupacion' => $catalogos->nombreOcupacion,
        'estadoCivil' => $catalogos->nombreEstadoCivil,
        'escolaridad' => $catalogos->nombreEscolaridad,
        'telefono' => $catalogos->telefono,
        'narracion' => $catalogos->narracion,
        'expedido' => $catalogos->expedido,
        'edad' => $edad,
        'img' => asset('img/logo.png'),
        'id' => $id);
        return response()->json($data);
        
    }

}
