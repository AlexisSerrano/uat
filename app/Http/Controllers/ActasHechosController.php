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
use App\Models\CatIdentificacion;
use App\Models\CatMunicipio;
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
        ->join('cat_municipio as morienge','preregistros.idMunicipioOrigen','=','morienge.id')
        ->select(
            'preregistros.id as id',
            'idRazon',
            'esEmpresa',
            'preregistros.nombre as nombre',
            'primerAp',
            'segundoAp',
            'rfc',
            'fechaNac',
            'idEscolaridad',
            'idEstadoCivil', 
            'idMunicipioOrigen',
            'morienge.idEstado as idEstadoOrigen',
            'idOcupacion',
            'edad',
            'sexo',
            'curp',
            'telefono',
            'cat_identificacion.documento as docIdentificacion',
            'numDocIdentificacion',
            'conViolencia',
            'narracion',
            'folio',
            'tipoActa as tipoActa',
            'tipoActa as otro',
            'representanteLegal',
            'statusCancelacion',
            'statusOrigen',
            'statusCola',
            'domicilio.idMunicipio',
            'domicilio.idLocalidad',
            'domicilio.idColonia',  
            'cat_municipio.idEstado',
            'horaLlegada',
            'domicilio.calle as calle',
            'domicilio.numInterno as numInterno',
            'domicilio.numExterno as numExterno', 
            'cat_colonia.codigoPostal' 
            )
        ->where('preregistros.id',$id)->where('preregistros.idRazon',4)->first();
        // dd($acta);
        if($acta->tipoActa=='PASAPORTE'||$acta->tipoActa=='CREDENCIAL DE TRABAJO/GAFFETE'||$acta->tipoActa=='TARJETA DE CREDITO/DEBITO'||$acta->tipoActa=='TELEFONO CELULAR'||$acta->tipoActa=='EQUIPO DE TRABAJO(CELULARES,RADIOS,ETC)'||$acta->tipoActa=='PERMISO DE TRANSITO PARA EMPLACAMIENTO DE TAXIS'||$acta->tipoActa=='FACTURA DE VEHICULO/MOTOCICLETA'||$acta->tipoActa=='TARJETA DE CIRCULACION'||$acta->tipoActa=='PLACAS DE CIRCULACION'||$acta->tipoActa=='LICENCIA DE CONDUCIR ESTATAL'||$acta->tipoActa=='LICENCIA DE CONDUCIR FEDERAL'||$acta->tipoActa=='DOCUMENTO/BIEN EXTRAVIADO O ROBADO'||$acta->tipoActa=='CERTIFICADO DE ALUMBRAMIENTO'){
        }else{
            $acta->tipoActa='OTROS DOCUMENTOS';
        }
        // dd($acta);

        $estados = DB::table('cat_estado')->pluck('nombre','id');
        
        $catMunicipioOrigen=DB::table('cat_municipio')
		->where('cat_municipio.idEstado','=',$acta->idEstadoOrigen)
		->orderBy('nombre','asc')
		->pluck('nombre','id');
        
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
        return view('servicios.actas.acta-hechos',compact('catMunicipioOrigen','ocupaciones','escolaridades','estadocivil','estados','acta','catMunicipios','catLocalidades','catColonias','catCodigoPostal'));
    }
    

    public function showform(){
        // $estados=CatEstado::orderBy('nombre', 'ASC')
        // ->pluck('nombre','id');
        // $ocupaciones=CatOcupacion::orderBy('nombre', 'ASC')
        // ->pluck('nombre', 'id');
        // $estadocivil = CatEstadoCivil::orderBy('nombre', 'ASC')
        // ->pluck('nombre', 'id');
        // $escolaridades = CatEscolaridad::orderBy('id', 'ASC')
        // ->pluck('nombre', 'id');
        // $nacionalidades = CatNacionalidad::orderBy('nombre', 'ASC')
        // ->pluck('nombre', 'id');
        // $municipios = CatMunicipio::orderBy('nombre', 'ASC')
        // ->where('idEstado',30)
        // ->pluck('nombre', 'id');
        // return view('servicios.actas.acta-hechos',compact('ocupaciones','escolaridades','estadocivil','nacionalidades','estados','municipios'));
        return view('servicios.actas.acta-hechos');
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

    
     
    
    public function actaoficio($id){
        return view("documentos/actashechos")->with('id',$id);
    }

    public function getoficioah($id){
        $variable = DB::table('uat.actas_hechos as uat_ah')
        ->join('componentes.variables_persona_fisica as comp_vpf','uat_ah.varPersona','=','comp_vpf.id')
        ->join('componentes.persona_fisica as comp_pf','comp_vpf.idPersona','=','comp_pf.id')
        ->join('componentes.cat_ocupacion as comp_co','comp_vpf.idOcupacion','=','comp_co.id')
        ->join('componentes.cat_estado_civil as comp_cec','comp_vpf.idEstadoCivil','=','comp_cec.id')
        ->join('componentes.cat_escolaridad as comp_ce','comp_vpf.idEscolaridad','=','comp_ce.id')
        ->join('componentes.domicilio as comp_d','comp_vpf.idDomicilio','=','comp_d.id')
        ->join('componentes.cat_municipio as comp_cm','comp_d.idMunicipio','=','comp_cm.id')
        ->join('componentes.cat_localidad as comp_cl','comp_d.idLocalidad','=','comp_cl.id')
        ->join('componentes.cat_colonia as comp_cc','comp_d.idColonia','=','comp_cc.id')
        ->join('componentes.cat_estado as comp_ces','comp_cm.idEstado','=','comp_ces.id')
        ->join('componentes.cat_identificacion as comp_ci','comp_vpf.docIdentificacion','=','comp_ci.id')
        ->where('uat_ah.id',$id)
        ->select('comp_co.nombre as nombreOcupacion',
        'comp_cec.nombre as nombreEstadoCivil',
        'comp_ce.nombre as nombreEscolaridad',
        'comp_cm.nombre as nombreMunicipio',
        'comp_cl.nombre as nombreLocalidad',
        'comp_cc.nombre as nombreColonia',
        'comp_ces.nombre as nombreEstado',
        'comp_d.numInterno as numInterno', 'comp_d.numExterno as numExterno', 'comp_d.calle as calle',
        'comp_pf.fechaNacimiento as fecha_nac', 'comp_vpf.telefono as telefono', 
        'comp_pf.nombres as nombrePersona','comp_pf.primerAp as primer_ap',
        'comp_pf.segundoAp as segundo_ap','comp_pf.idMunicipioOrigen as idMunicipioOrigen',
        'comp_ci.id as identificacion1',
        'comp_ci.documento as identificacion', 'comp_vpf.numDocIdentificacion as num_identificacion',
        'comp_cc.codigoPostal as cp','uat_ah.idUnidad as idUnidad','uat_ah.fecha as fecha','uat_ah.folio as folio',
        'uat_ah.tipoActa as tipoActa','uat_ah.hora as hora','uat_ah.fiscal as fiscal','uat_ah.narracion as narracion')
        ->first();
        // $acta = ActasHechos::find($id);
        // $variable = DB::connection('componentes')->table('variables_persona_fisica')
        // ->join('persona_fisica','variables_persona_fisica.idPersona','=','persona_fisica.id')
        // ->join('cat_ocupacion','variables_persona_fisica.idOcupacion','=','cat_ocupacion.id')
        // ->join('cat_estado_civil','variables_persona_fisica.idEstadoCivil','=','cat_estado_civil.id')
        // ->join('cat_escolaridad','variables_persona_fisica.idEscolaridad','=','cat_escolaridad.id')
        // ->join('domicilio','variables_persona_fisica.idDomicilio','=','domicilio.id')
        // ->join('cat_municipio','domicilio.idMunicipio','=','cat_municipio.id')
        // ->join('cat_localidad','domicilio.idLocalidad','=','cat_localidad.id')
        // ->join('cat_colonia','domicilio.idColonia','=','cat_colonia.id')
        // ->join('cat_estado','cat_municipio.idEstado','=','cat_estado.id')
        // ->join('cat_identificacion','variables_persona_fisica.docIdentificacion','=','cat_identificacion.id')
        // ->where('variables_persona_fisica.id',$acta->varPersona)
        // ->select('cat_ocupacion.nombre as nombreOcupacion',
        // 'cat_estado_civil.nombre as nombreEstadoCivil',
        // 'cat_escolaridad.nombre as nombreEscolaridad',
        // 'cat_municipio.nombre as nombreMunicipio',
        // 'cat_localidad.nombre as nombreLocalidad',
        // 'cat_colonia.nombre as nombreColonia',
        // 'cat_estado.nombre as nombreEstado',
        // 'domicilio.numInterno as numInterno', 'domicilio.numExterno as numExterno', 'domicilio.calle as calle',
        // 'persona_fisica.fechaNacimiento as fecha_nac', 'variables_persona_fisica.telefono as telefono', 
        // 'persona_fisica.nombres as nombrePersona','persona_fisica.primerAp as primer_ap',
        // 'persona_fisica.segundoAp as segundo_ap','persona_fisica.idMunicipioOrigen as idMunicipioOrigen',
        // 'cat_identificacion.documento as identificacion', 'variables_persona_fisica.numDocIdentificacion as num_identificacion',
        // 'cat_colonia.codigoPostal as cp')
        // ->first();
        $origen = DB::connection('componentes')->table('cat_municipio')
        ->join('cat_estado','cat_municipio.idEstado','=','cat_estado.id')
        ->where('cat_municipio.id',$variable->idMunicipioOrigen)
        ->select('cat_municipio.nombre as municipioOrigen','cat_estado.nombre as estadoOrigen')
        ->first();
        $unidad = DB::table('unidad')->where('id',$variable->idUnidad)->first();
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
        $fechaactual = new Date($variable->fecha);
        $fechahum = $fechaactual->format('l j').' de '.$fechaactual->format('F').' de '.$fechaactual->format('Y');
        $date = new Date($variable->fecha_nac);
        $fechanachum = $date->format('j').' de '.$date->format('F').' de '.$date->format('Y');
        $fechasep = explode("-", $variable->fecha_nac);
        $edad = Date::createFromDate($fechasep[0],$fechasep[1],$fechasep[2])->age;
        $data = array('estado' => $variable->nombreEstado, 
        'unidadMunicipio' => strtr(($localidad),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ"), 
        'municipio' => strtr(($variable->nombreMunicipio),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ"),   
        'localidad' =>strtr(($variable->nombreLocalidad),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ"), 
        'colonia' => strtr(($variable->nombreColonia),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ"),
        'calle' =>strtr(($variable->calle),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ"), 
        'cp' => $variable->cp,
        'numExterno' => $numExterno,
        'folio' => $unidad->abreviacion."/AH-".$variable->folio."/".$fechaactual->format('Y'),
        'perdida'=>strtr(strtoupper($variable->tipoActa),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ"),
        'hora' => $date->parse($variable->hora)->format('H:i'),
        'fecha' => strtr(strtoupper($fechahum),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ"),
        'fiscal' => strtr(strtoupper($variable->fiscal),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ"),
        'puesto' => strtr(strtoupper(Auth::user()->puesto),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ"),
        'nombre' =>strtr(($variable->nombrePersona.' '.$variable->primer_ap.' '.$variable->segundo_ap),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ"),
        'identificacion' => strtr(($variable->identificacion),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ"),
        'numIdentificacion' => $variable->num_identificacion,
        'fechaNacimiento' =>strtr(($fechanachum),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ"), 
        'ocupacion' =>strtr(($variable->nombreOcupacion),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ"), 
        'estadoCivil' =>strtr(($variable->nombreEstadoCivil),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ"),  
        'escolaridad' => strtr(($variable->nombreEscolaridad),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ"),  
        'telefono' => $variable->telefono,
        'narracion' => strtr(($variable->narracion),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ"),
        'expedido' => strtr((ActasHechosController::getExpedido($variable->identificacion1)),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ"),
        'edad' => $edad,
        'img' => asset('img/logo.png'),
        'municipioOrigen' => $origen->municipioOrigen,
        'estadoOrigen' => $origen->estadoOrigen,
        'id' => $id);
        return response()->json($data);
    }

    public function actaOficioMoral($id){
        return view("documentos/actashechosM")->with('id',$id);
    }

    public function getoficioahm($id){
        $acta = ActasHechos::find($id);
        $variable = DB::connection('componentes')->table('variables_persona_moral')
        ->join('persona_moral','variables_persona_moral.idPersona','=','persona_moral.id')
        ->join('domicilio','variables_persona_moral.idDomicilio','=','domicilio.id')
        ->join('cat_municipio','domicilio.idMunicipio','=','cat_municipio.id')
        ->join('cat_localidad','domicilio.idLocalidad','=','cat_localidad.id')
        ->join('cat_colonia','domicilio.idColonia','=','cat_colonia.id')
        ->join('cat_estado','cat_municipio.idEstado','=','cat_estado.id')
        ->join('cat_identificacion','variables_persona_moral.docIdentificacion','=','cat_identificacion.id')
        ->where('variables_persona_moral.id',$acta->varPersona)
        ->select('cat_municipio.nombre as nombreMunicipio',
        'cat_localidad.nombre as nombreLocalidad',
        'cat_colonia.nombre as nombreColonia',
        'cat_estado.nombre as nombreEstado',
        'domicilio.numInterno as numInterno', 
        'domicilio.numExterno as numExterno', 
        'domicilio.calle as calle',
        'variables_persona_moral.telefono as telefono', 
        'persona_moral.nombre as nombreEmpresa',
        'persona_moral.fechaCreacion as fechaCreacion',
        'persona_moral.rfc as rfc',
        'cat_colonia.codigoPostal as cp',
        'variables_persona_moral.nombreRep as nombreRep',
        'variables_persona_moral.primerApRep as primerApRep',
        'variables_persona_moral.segundoApRep as segundoApRep',
        'cat_identificacion.id as documento',
        'cat_identificacion.documento as documento1',
        'variables_persona_moral.numDocIdentificacion as numDocIdentificacion')
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
        $date = new Date($variable->fechaCreacion);
        $fechanachum = $date->format('j').' de '.$date->format('F').' de '.$date->format('Y');
        $data = array('estado' => $variable->nombreEstado, 
            'unidadMunicipio' => strtr(($localidad),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ"), 
            'municipio' => strtr(($variable->nombreMunicipio),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ"),   
            'localidad' =>strtr(($variable->nombreLocalidad),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ"), 
            'colonia' => strtr(($variable->nombreColonia),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ"),
            'calle' =>strtr(($variable->calle),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ"), 
            'cp' => $variable->cp,
            'numExterno' => $numExterno,
            'perdida'=>strtr(strtoupper($acta->tipoActa),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ"),
            'folio' => $unidad->abreviacion."/AH-".$acta->folio."/".$fechaactual->format('Y'),
            'hora' => $date->parse($acta->hora)->format('H:i'),
            'fecha' => strtr(strtoupper($fechahum),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ"),
            'fiscal' => strtr(strtoupper($acta->fiscal),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ"),
            'nombre' =>strtr(($variable->nombreRep." ".$variable->primerApRep." ".$variable->segundoApRep),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ"),
            'nombreEmpresa' =>strtr(($variable->nombreEmpresa),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ"),
            'identificacion' => strtr(($variable->documento1),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ"),
            'numIdentificacion' => $variable->numDocIdentificacion,
            'fechaNacimiento' => strtr(strtoupper($fechanachum),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ"),
            'telefono' => $variable->telefono,
            'narracion' => strtr(($acta->narracion),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ"),
            'expedido' => strtr((ActasHechosController::getExpedido($variable->documento)),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ"),
            'puesto' => strtr(strtoupper(Auth::user()->puesto),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ"),
            'id' => $id);
         return response()->json($data);
    }

    /*COMPONENTE */
    public function addExtrasActas(Request $request){
        try{
            DB::beginTransaction();
            $fiscaldb = DB::table('users')->where('id',$request->usuario)->first();
            if($request->idExtrasActas!=""){
                $acta = ActasHechos::find($request->idExtrasActas);
            }else{
                $acta = new ActasHechos();
                $acta->varPersona = $request->idPersona;
                $ultimo = ActasHechos::orderBy('id','desc')->first();
                $new = ($ultimo)?$ultimo->folio+1:1;

                $acta->folio = $new;   
            } 
            $acta->hora = Date::now()->format('H:i:s');
            $acta->fecha = Date::now()->format('Y-m-d');
            $acta->fiscal = $fiscaldb->nombreC;
            $acta->tipoActa = $request->tipoActa;
            $acta->esEmpresa = $request->empresa; 
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

    public function recuperar(Request $request){
        $oficio = DB::table('oficios')
        ->join('oficios_hechos', 'oficios.id','=','oficios_hechos.idOficio')
        ->where('oficios.nombre', $request->tipo)
        ->where('oficios_hechos.idTabla', $request->id)
        ->select('html','token')
        ->orderBy('oficios_hechos.id','desc')
        ->first();
        return response()->json($oficio);
    }

    public function recuperar_token(Request $request){
        $oficio = DB::table('oficios')
        ->join('oficios_hechos', 'oficios.id','=','oficios_hechos.idOficio')
        ->where('oficios_hechos.token', $request->token)
        ->select('html','token')
        ->orderBy('oficios_hechos.id','desc')
        ->first();
        return response()->json($oficio);
    }

    public function getOficiosApp($token){
        return view("servicios.actas.recuperar")->with('token',$token)->with('id','');
    }
    public function getOficiosid($id){
        return view("servicios.actas.recuperar")->with('token','')->with('id',$id);
    }

    public function getPreregistro($id){
        $preregistro = DB::table('preregistros')
        ->join('domicilio as dom', 'dom.id','=','preregistros.idDireccion')
        ->join('cat_municipio as mun', 'mun.id','=','dom.idMunicipio')
		->join('cat_estado as edo', 'edo.id','=','mun.idEstado')
		->join('cat_localidad as loc', 'loc.id','=','dom.idLocalidad')
		->join('cat_colonia as col', 'col.id','=','dom.idColonia')
        ->where('preregistros.id',$id)
        ->select(
            'dom.id as id','mun.idEstado','dom.idMunicipio','dom.idLocalidad','calle','numExterno','numInterno',
            'dom.idColonia','col.nombre as descColonia','edo.nombre as descEstado','mun.nombre as descMunicipio',
            'loc.nombre as descLocalidad','col.codigoPostal','preregistros.esEmpresa','preregistros.tipoActa',
            'preregistros.narracion'
		)
        ->first();
        $dom = array(
			'id'=>$preregistro->id,
			'idEstado'=>array("nombre"=>$preregistro->descEstado, "id"=>$preregistro->idEstado),
			'idMunicipio'=>array("nombre"=>$preregistro->descMunicipio, "id"=>$preregistro->idMunicipio),
			'idLocalidad'=>array("nombre"=>$preregistro->descLocalidad, "id"=>$preregistro->idLocalidad),
			'idColonia'=>array("nombre"=>$preregistro->descColonia, "id"=>$preregistro->idColonia),
			'codigoPostal'=>array("codigoPostal"=>(string)$preregistro->codigoPostal, "id"=>$preregistro->codigoPostal),
			'calle'=>$preregistro->calle,
			'numExterno'=>$preregistro->numExterno,
			'numInterno'=>$preregistro->numInterno
        );
        $extra = array(
			'tipoActa'=>$preregistro->tipoActa,
			'narracion'=>$preregistro->narracion
		);
        if($preregistro->esEmpresa){
            $data['domicilio'] = $dom;
            $data['extra'] = $extra;
            var_dump($data);
        }
        else{
            $data['domicilio'] = $dom;
            $data['extra'] = $extra;
            var_dump($data);
        }
    }

    // $personaExisteP = DB::table('persona_fisica')
	// 	->join('variables_persona_fisica', 'variables_persona_fisica.idPersona', '=', 'persona_fisica.id')
	// 	->join('cat_nacionalidad','cat_nacionalidad.id','=','persona_fisica.idNacionalidad')
	// 	->join('cat_etnia','cat_etnia.id','=','persona_fisica.idEtnia')
	// 	->join('cat_lengua','cat_lengua.id','=','persona_fisica.idLengua')
	// 	->join('cat_municipio','cat_municipio.id','=','persona_fisica.idMunicipioOrigen')
	// 	->join('cat_ocupacion', 'variables_persona_fisica.idOcupacion', '=', 'cat_ocupacion.id')
	// 	->join('cat_estado_civil', 'variables_persona_fisica.idEstadoCivil', '=', 'cat_estado_civil.id')
	// 	->join('cat_escolaridad', 'variables_persona_fisica.idEscolaridad', '=', 'cat_escolaridad.id')
	// 	->join('cat_religion', 'variables_persona_fisica.idReligion', '=', 'cat_religion.id')
	// 	->join('cat_identificacion', 'variables_persona_fisica.docIdentificacion', '=', 'cat_identificacion.id')
	// 	->join('sexos', 'persona_fisica.sexo', '=', 'sexos.id')
	// 	->join('cat_interprete', 'variables_persona_fisica.idInterprete', '=', 'cat_interprete.id')
	// 	->join('cat_estado', 'cat_municipio.idEstado', '=', 'cat_estado.id')
	// 	->where($tipoBusqueda,$rfcCurp)
	// 	->select('persona_fisica.id as id','persona_fisica.nombres','persona_fisica.primerAp','persona_fisica.segundoAp',
	// 	'persona_fisica.fechaNacimiento','persona_fisica.rfc','persona_fisica.curp','persona_fisica.sexo',
	// 	'variables_persona_fisica.edad','variables_persona_fisica.telefono','variables_persona_fisica.motivoEstancia',
	// 	'variables_persona_fisica.numDocIdentificacion',/*'variables_persona_fisica.alias',*/'variables_persona_fisica.id as idVar',
	// 	'variables_persona_fisica.idDomicilio','variables_persona_fisica.idTrabajo','variables_persona_fisica.idNotificacion',
	// 	'cat_nacionalidad.id as idNacionalidad','cat_nacionalidad.nombre as nombreNacionalidad',
	// 	'cat_etnia.id as idEtnia','cat_etnia.nombre as nombreEtnia',
	// 	'cat_lengua.id as idLengua','cat_lengua.nombre as nombreLengua',
	// 	'cat_municipio.id as idMunOrigen','cat_municipio.nombre as nombreMunOrigen','cat_municipio.idEstado as idEstado',
	// 	'cat_ocupacion.id as idOcupacion','cat_ocupacion.nombre as nombreOcupacion',
	// 	'cat_estado_civil.id as idEstadoCivil','cat_estado_civil.nombre as nombreEstadoCivil',
	// 	'cat_escolaridad.id as idEscolaridad','cat_escolaridad.nombre as nombreEscolaridad',
	// 	'cat_religion.id as idReligion','cat_religion.nombre as nombreReligion',
	// 	'cat_identificacion.id as idIdentificacion','cat_identificacion.documento as documentoIdentificacion',
	// 	'sexos.id as idSexo','sexos.nombre as nombreSexo',
	// 	'cat_interprete.id as idInterprete','cat_interprete.nombre as nombreInterprete',
	// 	'cat_estado.id as idEstado','cat_estado.nombre as nombreEstado')
	// 	->orderBy('variables_persona_fisica.id','desc')
	// 	->first();
    //     if($personaExisteP){
	// 		$data = array(
	// 			'nombres'=>$personaExisteP->nombres,
	// 			'primerAp'=>$personaExisteP->primerAp,
	// 			'segundoAp'=>$personaExisteP->segundoAp,
	// 			'fechaNacimiento'=>$personaExisteP->fechaNacimiento,
	// 			'rfc'=>$personaExisteP->rfc,
	// 			'curp'=>$personaExisteP->curp,
	// 			'sexo'=>array("nombre"=>$personaExisteP->nombreSexo, "id"=>$personaExisteP->idSexo),
	// 			'idNacionalidad' => array("nombre"=>$personaExisteP->nombreNacionalidad, "id"=>$personaExisteP->idNacionalidad),
	// 			'idEtnia'=>array("nombre"=>$personaExisteP->nombreEtnia, "id"=>$personaExisteP->idEtnia),
	// 			'idLengua'=>array("nombre"=>$personaExisteP->nombreLengua, "id"=>$personaExisteP->idLengua),
	// 			'idMunicipioOrigen'=>array("nombre"=>$personaExisteP->nombreMunOrigen, "id"=>$personaExisteP->idMunOrigen),
	// 			'idEstado'=>array("nombre"=>$personaExisteP->nombreEstado, "id"=>$personaExisteP->idEstado),
	// 			'edad'=>$personaExisteP->edad,
	// 			'motivoEstancia'=>$personaExisteP->motivoEstancia,
	// 			'idOcupacion'=>array("nombre"=>$personaExisteP->nombreOcupacion, "id"=>$personaExisteP->idOcupacion),
	// 			'idEstadoCivil'=>array("nombre"=>$personaExisteP->nombreEstadoCivil, "id"=>$personaExisteP->idEstadoCivil),
	// 			'idEscolaridad'=>array("nombre"=>$personaExisteP->nombreEscolaridad, "id"=>$personaExisteP->idEscolaridad),
	// 			'idReligion'=>array("nombre"=>$personaExisteP->nombreReligion, "id"=>$personaExisteP->idReligion),
	// 			'idDomicilio'=>$personaExisteP->idDomicilio,
	// 			'docIdentificacion'=>array("documento"=>$personaExisteP->documentoIdentificacion, "id"=>$personaExisteP->idIdentificacion),
	// 			'idInterprete'=>array("nombre"=>$personaExisteP->nombreInterprete, "id"=>$personaExisteP->idInterprete),
	// 			'numDocIdentificacion'=>$personaExisteP->numDocIdentificacion,
	// 			'idDomicilioTrabajo'=>$personaExisteP->idTrabajo,
	// 			'idDomicilioNotificacion'=>$personaExisteP->idNotificacion,
	// 			'idPersona'=>$personaExisteP->id,
	// 			'idVarPersona'=>$personaExisteP->idVar,
	// 			'telefono'=>$personaExisteP->telefono
	// 		);
	// 	}
}
