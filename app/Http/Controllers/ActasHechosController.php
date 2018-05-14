<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActasHechos;
use App\Models\Domicilio;
use App\Models\CatEscolaridad;
use App\Models\CatEstado;
use App\Models\CatEstadoCivil;
use App\Models\CatOcupacion;
use App\Models\CatNacionalidad;
use App\Models\Preregistro;
use App\Models\Oficio;
use App\Http\Requests\ActaRequest;
use DB;
use Alert;
use Carbon\Carbon;
use Jenssegers\Date\Date;

class ActasHechosController extends Controller
{

    public function actasPendientes(){
        $actas=Preregistro::where('tipoActa','!=',null)
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
        return view('forms.acta-hechos',compact('ocupaciones','escolaridades','estadocivil','estados','acta','catMunicipios','catLocalidades','catColonias','catCodigoPostal'));
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
        return view('forms.acta-hechos',compact('ocupaciones','escolaridades','estadocivil','nacionalidades','estados'));
    }

    public function addActas(ActaRequest $request){
        DB::beginTransaction();
        try{
            $acta = new ActasHechos;
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
            $ultimo = ActasHechos::latest()->first();
            if($ultimo){
                $new = $ultimo->folio+1;
            }
            else{
                $new = 1;
            }
            $acta->folio = $new;
            $acta->hora = Date::now()->format('H:i:s');
            $acta->fecha = Date::now()->format('Y-m-d');
            $acta->fiscal = "xxxxxx";
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
                case 'CREDENCIAL PARA VOTAR':
                $acta->expedido ="POR EL INEW";

                case 'PASAPORTE':
                $acta->expedido ="INSTITUCION";
                
                case 'CEDULA PROFESIONAL':
                $acta->expedido ="POR EL INEW";

                case 'CARTILLA DEL SERVICIO MILITAR NACIONAL':
                $acta->expedido ="INSTITUCION";
                
                case 'TARJETA UNICA DE IDENTIDAD MILITAR':
                $acta->expedido ="POR EL INEW";
            
                case 'TARJETA DE AFILIACION AL INSTITUTO NACIONAL DE PERSONAS ADULTAS MAYORES':
                $acta->expedido ="INSTITUCION";
                
                case 'CREDENCIAL DE SALUD EXPEDIDO POR EL INSTITUTO MEXICANO DEL SEGURO SOCIAL':
                $acta->expedido ="POR EL INEW";

                case 'CREDENCIALES DE EDUCACION MEDIA SUPERIOR Y SUPERIOR':
                $acta->expedido ="INSTITUCION";
                
                case 'LICENCIA DE CONDUCIR':
                $acta->expedido ="DDSDD";
                
                case 'CERTIFICADO DE MATRICULA CONSULAR':
                $acta->expedido ="POR EL INEW";

                case 'ACTA DE NACIMIENTO':
                $acta->expedido ="INSTITUCION";

                case 'CURP':
                $acta->expedido ="INSTITUCION";

                case 'CONSTANCIA DE RESIDENCIA':
                $acta->expedido ="INSTITUCION";
                
                break;
                
                default:
                    $acta->expedido = $request->expedido;
                    break;
            }
            if (!is_null($request->tipoActa)){
                $acta->tipoActa = (!is_null($request->otro))?$request->otro:$request->tipoActa;
            }
            $acta->save();
            if (!is_null($request->idPreregistro)){
                $preregistro = Preregistro::find($request->idPreregistro);
                $preregistro->statusCola = 22;
                $preregistro->save();
            }
            DB::commit();
            
            $catalogos = DB::table('actas_hechos')->where('actas_hechos.id', $acta->id)
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
            'cat_estado.nombre as nombreEstado')
            ->first();
            //dd($catalogos);
            
            $word = new \PhpOffice\PhpWord\TemplateProcessor('formatos/plantillaAH.docx');
            $word->setValue('estado', $catalogos->nombreEstado);
            $word->setValue('municipio', $catalogos->nombreMunicipio);
            $word->setValue('localidad', $catalogos->nombreLocalidad);
            $word->setValue('colonia', $catalogos->nombreColonia);
            $word->setValue('calle', $direccion->calle);
            $word->setValue('cp', $request->cp2);
            if($request->numInterno2==''){
                $word->setValue('numExterno', $direccion->numExterno);
            }
            else{
                $numeros = $direccion->numExterno.' interior '.$direccion->numInterno;
                $word->setValue('numExterno', $numeros);
            }
            $word->setValue('folio', $new);
            $word->setValue('hora', Date::now()->format('H:i:'));
            $fechahum = Date::now()->format('l j').' de '.Date::now()->format('F').' del año '.Date::now()->format('Y');
            $word->setValue('fecha',$fechahum);
            $word->setValue('fiscal', $acta->fiscal);
            $word->setValue('nombre', $acta->nombre.' '.$acta->primer_ap.' '.$acta->segundo_ap);
            $word->setValue('identificacion', $acta->identificacion);
            $word->setValue('numIdentificacion', $acta->num_identificacion);
            $date = new Date($acta->fecha_nac);
            $fechanachum = $date->format('j').' de '.$date->format('F').' del año '.$date->format('Y');
            $word->setValue('fechaNacimiento', $fechanachum);
            $word->setValue('ocupacion', $catalogos->nombreOcupacion);
            $word->setValue('estadoCivil', $catalogos->nombreEstadoCivil);
            $word->setValue('escolaridad', $catalogos->nombreEscolaridad);
            $word->setValue('telefono', $acta->telefono);
            $word->setValue('narracion', $acta->narracion);
            $word->setValue('expedido', $acta->expedido);

            $fechasep = explode("-", $request->fecha_nac);
            $edad = Date::createFromDate($fechasep[0],$fechasep[1],$fechasep[2])->age;
            $word->setValue('edad', $edad);
    
            $word->saveAs('../storage/oficios/ActasHechos'.$acta->id.'.docx');
            return response()->download('../storage/oficios/ActasHechos'.$acta->id.'.docx');
        }
        catch (\PDOException $e){
            DB::rollBack();
            Alert::error('Se presentó un problema al guardar su acta de hecho, intente de nuevo', 'Error');
            return redirect('actas');
        }
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

        $actas = Preregistro::where('tipoActa','!=',null)
       ->where('statusCola',null)
       ->where(function($query) use ($folio){
           $query
           ->orWhere(DB::raw("CONCAT(preregistros.nombre,' ',primerAp,' ',segundoAp)"), 'LIKE', '%' . $folio . '%')
           ->orWhere('representanteLegal', 'like', '%' . $folio . '%')
           ->orWhere('tipoActa', 'like', '%' . $folio . '%');
       })
       ->orderBy('id','desc')
       ->paginate(10);
        return view('tables.actas-hechos', compact('actas'));
    }


    public function descActas($id){
        return response()->download('../storage/oficios/ActasHechos'.$id.'.docx');
    }

    public function addActas2(ActaRequest $request){
        DB::beginTransaction();
        try{
            $acta = new ActasHechos;
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
            $acta->fiscal = "xxxxxx";
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
                case 'CREDENCIAL PARA VOTAR': $acta->expedido ="POR EL INEW";
                case 'PASAPORTE':$acta->expedido ="INSTITUCION";
                case 'CEDULA PROFESIONAL':$acta->expedido ="POR EL INEW";
                case 'CARTILLA DEL SERVICIO MILITAR NACIONAL':$acta->expedido ="INSTITUCION";
                case 'TARJETA UNICA DE IDENTIDAD MILITAR':$acta->expedido ="POR EL INEW";
                case 'TARJETA DE AFILIACION AL INSTITUTO NACIONAL DE PERSONAS ADULTAS MAYORES':$acta->expedido ="INSTITUCION";
                case 'CREDENCIAL DE SALUD EXPEDIDO POR EL INSTITUTO MEXICANO DEL SEGURO SOCIAL':$acta->expedido ="POR EL INEW";
                case 'CREDENCIALES DE EDUCACION MEDIA SUPERIOR Y SUPERIOR':$acta->expedido ="INSTITUCION";
                case 'LICENCIA DE CONDUCIR':$acta->expedido ="DDSDD";
                case 'CERTIFICADO DE MATRICULA CONSULAR':$acta->expedido ="POR EL INEW";
                case 'ACTA DE NACIMIENTO':$acta->expedido ="INSTITUCION";
                case 'CURP':$acta->expedido ="INSTITUCION";
                case 'CONSTANCIA DE RESIDENCIA':$acta->expedido ="INSTITUCION";
                break;
                default:$acta->expedido = $request->expedido;
                break;
            }
            if (!is_null($request->tipoActa)){
                $acta->tipoActa = (!is_null($request->otro))?$request->otro:$request->tipoActa;
            }
            $acta->save();
            if (!is_null($request->idPreregistro)){
                $preregistro = Preregistro::find($request->idPreregistro);
                $preregistro->statusCola = 22;
                $preregistro->save();
            }
            DB::commit();
            $request->session()->flash('redirectoficio', url("oficioah/$acta->id"));
            return redirect("actas-pendientes");
        }
        catch (\PDOException $e){
            DB::rollBack();
            Alert::error('Se presentó un problema al guardar su acta de hecho, intente de nuevo', "Error $e");
            return redirect('actas');
        }
    }

    public function getRandom($length = 3) { 
        return substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length); 
    } 

    public function getToken($id){
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
            'actas_hechos.fecha as fecha','cat_estado.id as idEstado','domicilio.idMunicipio as idMunicipio',
            'domicilio.idLocalidad as idLocalidad','actas_hechos.tipoActa as tipoActa')
            ->first();
            $numLetras = strlen($catalogos->narracion)*2;
            $random = rand(3, 999);
            $letrasrandom = $this->getRandom();
            $fechasep = explode("-", $catalogos->fecha_nac);
            $tiposep = explode(" ", $catalogos->tipoActa);
            $tipofinal = '';
            foreach($tiposep as $tipo){
                $tipofinal = $tipofinal.substr($tipo,0,2);
            }
            //$token = $catalogos->nombrePersona."_".
            $token = substr($catalogos->primer_ap,0,2)."_".
            substr($catalogos->segundo_ap,0,2)."_".
            $fechasep[2].$fechasep[1].substr($fechasep[0],-2)."_".
            //$catalogos->num_identificacion."_".
            $catalogos->idEstado."_".
            $catalogos->idMunicipio."_".
            $catalogos->idLocalidad."_".
            $tipofinal."_".
            $numLetras."_".
            Date::now()->format('Y_m_d_H_i_s')."_".
            $random."_".
            $letrasrandom;
            $token = str_replace(' ', '', $token);
            //dd($token);
        //$token = substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 25);
        echo $token;
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
        return view('impresion')
        ->with('estado', $catalogos->nombreEstado)
        ->with('municipio', $catalogos->nombreMunicipio)
        ->with('localidad', $catalogos->nombreLocalidad)
        ->with('colonia', $catalogos->nombreColonia)
        ->with('calle', $catalogos->calle)
        ->with('cp', $catalogos->cp)
        ->with('numExterno', $numExterno)
        ->with('folio', $catalogos->folio)
        ->with('hora', $date->parse($catalogos->hora)->format('H:i'))
        ->with('fecha',$fechahum)
        ->with('fiscal', $catalogos->fiscal)
        ->with('nombre', $catalogos->nombrePersona.' '.$catalogos->primer_ap.' '.$catalogos->segundo_ap)
        ->with('identificacion', $catalogos->identificacion)
        ->with('numIdentificacion', $catalogos->num_identificacion)
        ->with('fechaNacimiento', $fechanachum)
        ->with('ocupacion', $catalogos->nombreOcupacion)
        ->with('estadoCivil', $catalogos->nombreEstadoCivil)
        ->with('escolaridad', $catalogos->nombreEscolaridad)
        ->with('telefono', $catalogos->telefono)
        ->with('narracion', $catalogos->narracion)
        ->with('expedido', $catalogos->expedido)
        ->with('edad', $edad)
        ->with('id', $id);
    }

    public function saveOficio(Request $request){
        if($request->ajax()){
            $oficio = new Oficio();
            $oficio->html = $request->html;
            $oficio->tipo = $request->tipo;
            $oficio->id_tipo = $request->id_tipo;
            $oficio->token = $request->token;
            if($oficio->save()){
                echo 1;
            }
            else{
                echo 0;
            }
        }
    }
}
