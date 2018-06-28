<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ActasHechos;
use App\Models\Domicilio;
use App\Models\CatEscolaridad;
use App\Models\CatEstado;
use App\Models\CatEstadoCivil;
use App\Models\CatOcupacion;
use App\Models\CatNacionalidad;
use App\Models\Preregistro;
use App\Models\Oficio;
use App\Models\catIdentificacion;
use App\Models\CatMunicipio;
use App\Http\Requests\ActaRequest;
use DB;
use Alert;
use Carbon\Carbon;
use Jenssegers\Date\Date;

class ActasHechosController extends Controller
{

    public function actasPendientes(){
        $actas=Preregistro::where('idRazon','=',4)
        ->where('statusCola',null)
        ->paginate(10);
        return view('tables.actas-hechos')->with('actas',$actas);
    }
    
    public function actasPreregistro($id){
        //$acta=Preregistro::find($id);
        $acta=DB::table('preregistros')
        ->leftJoin('cat_identificacion','cat_identificacion.id','=','preregistros.docIdentificacion')
        ->join('domicilio','preregistros.idDireccion','=','domicilio.id')
        ->join('cat_colonia','domicilio.idColonia','=','cat_colonia.id')
        ->join('cat_municipio','domicilio.idMunicipio','=','cat_municipio.id')
        ->select('preregistros.id as id','idRazon','esEmpresa',
        'preregistros.nombre as nombre','primerAp','segundoAp','rfc','fechaNac',
        'idEscolaridad','idEstadoCivil','idOcupacion','edad','sexo','curp','telefono',
        'cat_identificacion.documento as docIdentificacion','numDocIdentificacion',
        'conViolencia','narracion','folio','tipoActa','representanteLegal',
        'statusCancelacion','statusOrigen','statusCola','domicilio.idMunicipio','domicilio.idLocalidad',
        'domicilio.idColonia','cat_municipio.idEstado','horaLlegada','domicilio.calle as calle',
        'domicilio.numInterno as numInterno','domicilio.numExterno as numExterno', 'cat_colonia.codigoPostal' )
        ->where('preregistros.id',$id)->where('preregistros.idRazon',4)->get();
        $acta=$acta[0];
        //dd($acta);

        $estados = DB::table('cat_estado')->pluck('nombre','id');
		$catMunicipios=DB::table('cat_municipio')
		->where('cat_municipio.idEstado','=',$acta->idEstado)
		->orderBy('nombre','asc')
		->pluck('nombre','id');
		$catLocalidades=DB::table('cat_localidad')
		->where('cat_localidad.idMunicipio','=',$acta->idMunicipio)
		->orderBy('nombre','asc')
		->pluck('nombre','id');
		$catColonias=DB::table('cat_colonia')
		->where('cat_colonia.codigoPostal','=',$acta->codigoPostal)
		->orderBy('nombre','asc')
		->pluck('nombre','id');
		$catCodigoPostal=DB::table('cat_colonia')
		->where('cat_colonia.idMunicipio','=',$acta->idMunicipio)
		->where('cat_colonia.codigoPostal','!=',0)
		->orderBy('codigoPostal','asc')
		->groupBy('codigoPostal')
        ->pluck('codigoPostal','codigopostal');
        
        $ocupaciones=CatOcupacion::orderBy('nombre', 'ASC')
        ->pluck('nombre', 'id');
        $estadocivil = CatEstadoCivil::orderBy('nombre', 'ASC')
        ->pluck('nombre', 'id');
        $escolaridades = CatEscolaridad::orderBy('id', 'ASC')
        ->pluck('nombre', 'id');
        return view('servicios.actas.acta-hechos',compact('ocupaciones','escolaridades','estadocivil','estados','acta','catMunicipios','catLocalidades','catColonias','catCodigoPostal'));
    }
    

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
        return view('servicios.actas.acta-hechos',compact('ocupaciones','escolaridades','estadocivil','nacionalidades','estados','municipios'));
    }

    public function showActas(){
        $actas = ActasHechos::orderBy('id','desc')->paginate('15');
        $year = Date::now()->format('Y');
        return view('tables.consulta-actas', compact('actas','year'));
    }

    public function filtroActas(Request $request){
        if($request->input("filtro")!=''){
            if($request->input("filtro")){
                $filtro = $request->input("filtro");
                $request->session()->flash('filtro', $filtro);
            }
            else{
                $filtro = $request->session()->get('filtro');
                $request->session()->flash('filtro', $filtro);
    
            }
            $year = Date::now()->format('Y');
            $actas = ActasHechos::
            where(DB::raw("CONCAT(nombre,' ',primer_ap,' ',segundo_ap)"), 'LIKE', '%' . $filtro . '%')
            ->orWhere('folio', 'like', '%' . $filtro . '%')
            ->paginate('15');
            return view('tables.consulta-actas', compact('actas','year'));
        }
        else{
            return redirect('listaActas');
        }
    }

    public function filtroActasPendientes(Request $request){
        if ($request->input("folio")==null||$request->input("folio")=='') {
            return redirect(route('actaspendientes'));
        }
        if($request->input("folio")){
            $folio = $request->input("folio");
            $request->session()->flash('folio', $folio);
        }
        else{
            $folio = $request->session()->get('folio');
            $request->session()->flash('folio', $folio);
        }

        // $actas = Preregistro::where('folio', $folio)
        // ->where('tipoActa','!=',null)
        // ->where('statusCola',null)
        // ->orWhere(DB::raw("CONCAT(preregistros.nombre,' ',primerAp,' ',segundoAp)"), 'LIKE', '%' . $folio . '%')
        // ->orWhere('representanteLegal', 'like', '%' . $folio . '%')
        // ->orderBy('id','desc')
        // ->paginate(10);

        $actas = Preregistro::where('idRazon','=',4)
       ->where('statusCola',null)
       ->where(function($query) use ($folio){
           $query
           ->orWhere(DB::raw("CONCAT(preregistros.nombre,' ',primerAp,' ',segundoAp)"), 'LIKE', '%' . $folio . '%')
           ->orWhere('representanteLegal', 'like', '%' . $folio . '%')
           ->orWhere('tipoActa', 'like', '%' . $folio . '%')
           ->orWhere('folio', 'like', '%' . $folio . '%');
       })
       ->orderBy('id','desc')
       ->paginate(10);
        return view('tables.actas-hechos', compact('actas'));
    }

    public function addActas2(ActaRequest $request){
        DB::beginTransaction();
        try{
            if($request->esEmpresa==0){
            $acta = new ActasHechos;
            $direccion = new Domicilio;
            $direccion->idMunicipio = $request->idMunicipio2;
            $direccion->idLocalidad = $request->idLocalidad2;
            $direccion->idColonia = $request->idColonia2;
            $direccion->calle = $request->calle;   
            if($request->numInterno!=''){
                $direccion->numInterno = $request->numInterno;
            }
            $direccion->numExterno = $request->numExterno;
            $direccion->save();
            $ultimo = ActasHechos::orderBy('id','desc')->first();
            if($ultimo){
                $new = $ultimo->folio+1;
            }
            else{
                $new = 1;
            }
            $acta->folio = $new;
            $acta->hora = Date::now()->format('H:i:s');
            $acta->fecha = Date::now()->format('Y-m-d');
            $acta->fiscal = Auth::user()->nombreC;
            $acta->nombre = $request->nombre2;
            $acta->primer_ap = $request->primerAp;
            $acta->segundo_ap = $request->segundoAp;
            $acta->identificacion = $request->docIdentificacion;
            $acta->num_identificacion = $request->numDocIdentificacion;
            $acta->fecha_nac = $request->fecha_nac;
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
            if (!is_null($request->tipoActa)){
                $acta->tipoActa = (!is_null($request->otro))?$request->otro:$request->tipoActa;
            }
            $acta->save();
            dd($acta);
            if (!is_null($request->idPreregistro)){
                $preregistro = Preregistro::find($request->idPreregistro);
                $preregistro->statusCola = 22;
                $preregistro->save();
            }
        }elseif($request->esEmpresa==1){

            $acta = new ActasHechos;
            $direccion = new Domicilio;
            $direccion->idMunicipio = $request->idMunicipio;
            $direccion->idLocalidad = $request->idLocalidad;
            $direccion->idColonia = $request->idColonia;
            $direccion->calle = $request->calle2;   
            if($request->numInterno2!=''){
                $direccion->numInterno = $request->numInterno2;
            }
            $direccion->numExterno = $request->numExterno2;
            $direccion->save();
            $ultimo = ActasHechos::orderBy('id','desc')->first();
            if($ultimo){
                $new = $ultimo->folio+1;
            }
            else{
                $new = 1;
            }
            $acta->folio = $new;
            $acta->hora = Date::now()->format('H:i:s');
            $acta->fecha = Date::now()->format('Y-m-d');
            $acta->fiscal = Auth::user()->nombreC;
            $acta->nombre = $request->nombre2;
            $acta->esEmpresa = 1;
            // $acta->primer_ap = $request->primerAp;
            // $acta->segundo_ap = $request->segundoAp;
            $acta->identificacion = $request->docIdentificacion2;
            $acta->num_identificacion = $request->numDocIdentificacion2;
            $acta->fecha_nac = $request->fechaAltaEmpresa;
            $acta->idDomicilio = $direccion->id;
            // $acta->idOcupacion = $request->ocupActa1;
            // $acta->idEstadoCivil = $request->estadoCivilActa1;
            // $acta->idEscolaridad = $request->escActa1;
            $acta->telefono = $request->telefono2;
            $acta->narracion = $request->narracion2;
            
            switch ($request->docIdentificacion2) {
                case 'CREDENCIAL PARA VOTAR': $acta->expedido2 ="INSTITUTO NACIONAL ELECTORAL";
                break;
                case 'PASAPORTE':$acta->expedido2 ="SECRETARÍA DE RELACIONES EXTERIORES";
                break;
                case 'CEDULA PROFESIONAL':$acta->expedido2 ="DIRECCIÓN GENERAL DE PROFESIONES";
                break;
                case 'CARTILLA DEL SERVICIO MILITAR NACIONAL':$acta->expedido2 ="SECRETARÍA DE LA DEFENSA NACIONAL";
                break;
                case 'TARJETA UNICA DE IDENTIDAD MILITAR':$acta->expedido2 ="DISPOSICIONES DE CARÁCTER GENERAL";
                break;
                case 'TARJETA DE AFILIACION AL INSTITUTO NACIONAL DE PERSONAS ADULTAS MAYORES':$acta->expedido2 ="INAPAM";
                break;
                case 'CREDENCIAL DE SALUD EXPEDIDO POR EL INSTITUTO MEXICANO DEL SEGURO SOCIAL':$acta->expedido2 ="IMSS";
                break;
                case 'CREDENCIALES DE EDUCACION MEDIA SUPERIOR Y SUPERIOR':$acta->expedido2 ="DIRECCIÓN GENERAL DE ACREDITACIÓN, INCORPORACIÓN Y REVALIDACIÓN";
                break;
                case 'LICENCIA DE CONDUCIR':$acta->expedido2 ="SECRETARÍA DE COMUNICACIONES Y TRANSPORTES";
                break;
                case 'CERTIFICADO DE MATRICULA CONSULAR':$acta->expedido2 ="CERTIFICADO DE MATRICULA CONSULAR";
                break;
                case 'ACTA DE NACIMIENTO':$acta->expedido2 ="REGISTRO NACIONAL DE POBLACIÓN";
                break;
                case 'CURP':$acta->expedido2 ="REGISTRO NACIONAL DE POBLACIÓN";
                break;
                case 'CONSTANCIA DE RESIDENCIA':$acta->expedido2 ="SERVICIO DE ADMINISTRACIÓN TRIBUTARIA";
                break;
                default:$acta->expedido2 = $request->expedido2;
                break;
            }
            if (!is_null($request->tipoActa2)){
                $acta->tipoActa2 = (!is_null($request->otro))?$request->otro:$request->tipoActa2;
            }
            $acta->save();
            dd($acta);
            if (!is_null($request->idPreregistro)){
                $preregistro = Preregistro::find($request->idPreregistro);
                $preregistro->statusCola = 22;
                $preregistro->save();
            }
        }


            DB::commit();
            $request->session()->flash('redirectoficio', url("actaoficio/$acta->id"));
            return redirect("actas-pendientes");
        }
        catch (\PDOException $e){
            DB::rollBack();
            Alert::error('Se presentó un problema al guardar su acta de hecho, intente de nuevo', "Error $e");
            return redirect('actas');
        }
    }

    public function actaoficio($id){
        return view("documentos/actashechos")->with('id',$id);
    }

    public function getoficioah($id){
        $catalogos = DB::table('actas_hechos')->where('actas_hechos.id', $id)
        ->join('cat_ocupacion','actas_hechos.idOcupacion','=','cat_ocupacion.id')
        ->join('cat_estado_civil','actas_hechos.idEstadoCivil','=','cat_estado_civil.id')
        ->join('cat_escolaridad','actas_hechos.idEscolaridad','=','cat_escolaridad.id')
        ->join('domicilio','actas_hechos.idDomicilio','=','domicilio.id')
        ->join('cat_municipio','domicilio.idMunicipio','=','cat_municipio.id')
        ->join('cat_localidad','domicilio.idLocalidad','=','cat_localidad.id')
        ->join('cat_colonia','domicilio.idColonia','=','cat_colonia.id')
        ->join('cat_estado','cat_municipio.idEstado','=','cat_estado.id')
        ->select('cat_ocupacion.nombre as nombreOcupacion',
        'cat_estado_civil.nombre as nombreEstadoCivil',
        'cat_escolaridad.nombre as nombreEscolaridad',
        'cat_municipio.nombre as nombreMunicipio',
        'cat_localidad.nombre as nombreLocalidad',
        'cat_colonia.nombre as nombreColonia',
        'cat_estado.nombre as nombreEstado',
        'domicilio.numInterno as numInterno', 'domicilio.numExterno as numExterno', 'domicilio.calle as calle',
        'actas_hechos.fecha_nac as fecha_nac', 'actas_hechos.telefono as telefono', 'actas_hechos.narracion as narracion',
        'actas_hechos.expedido as expedido', 'actas_hechos.fiscal as fiscal', 'actas_hechos.nombre as nombrePersona',
        'actas_hechos.primer_ap as primer_ap', 'actas_hechos.segundo_ap as segundo_ap',
        'actas_hechos.identificacion as identificacion', 'actas_hechos.num_identificacion as num_identificacion',
        'cat_colonia.codigoPostal as cp', 'actas_hechos.folio as folio', 'actas_hechos.hora as hora',
        'actas_hechos.fecha as fecha')
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
        'numExterno' => $numExterno,
        'folio' => $catalogos->folio,
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
