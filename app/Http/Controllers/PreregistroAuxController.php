<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

use DB;
use Mail;
//use App\Http\Controllers\sendMail;
use App\Mail\EnviarCorreo as sendMail;
use App\Models\Preregistro;
use App\Models\Domicilio;
use App\User;
use Alert;
use App\Models\CatEstado;
use App\Models\CatMunicipio;
use App\Models\CatLocalidad;
use App\Models\CatColonia;
use App\Models\Razon;
use Carbon\Carbon;
use App\Models\Carpeta;
use App\Models\CatEscolaridad;
use App\Models\CatEstadoCivil;
use App\Models\CatEtnia;
use App\Models\CatLengua;
use App\Models\CatNacionalidad;
use App\Models\CatOcupacion;
use App\Models\CatReligion;
use App\Models\CatIdentificacion;
use App\Models\BitacoraNavCaso;
use RFC\RfcBuilder;


use Illuminate\Support\Facades\Session;
class PreregistroAuxController extends Controller
{

    public function index()
    {
        $registros = DB::table('preregistros')
        ->leftJoin('cat_identificacion','cat_identificacion.id','=','preregistros.docIdentificacion')
        ->join('razones','razones.id','=','preregistros.idRazon')
        ->orderBy('id','desc')
        ->whereNull('statusCola')
        ->select('preregistros.id as id','idDireccion','idRazon','esEmpresa','preregistros.nombre as nombre',
        'primerAp','segundoAp','rfc','fechaNac','edad','sexo','curp','telefono',
        'cat_identificacion.documento as docIdentificacion','numDocIdentificacion','conViolencia','narracion','folio','representanteLegal',
        'statusCancelacion','statusOrigen','statusCola','horaLlegada','unidad','zona','razones.nombre as razon')
        ->paginate('10');
        
        $municipios = CatMunicipio::where('idEstado',30)
        ->where('nombre', '!=', 'SIN INFORMACION')
        ->orderBy('nombre','asc')
        ->get();

        return view('servicios.recepcion.preregistros',compact('registros','municipios'));
    }

    
    public function edit($id)
    {
        
        $tiposDeConstancia= array(0=>'PASAPORTE',1=>'CREDENCIAL DE TRABAJO/GAFFETE',2=>'TARJETA DE CRÉDITO/DÉBITO',3=>'TELÉFONO CELULAR',4=>'EQUIPO DE TRABAJO(CELULARES,RADIOS,ETC)',5=>
        'PERMISO DE TRÁNSITO PARA EMPLACAMIENTO DE TAXIS',6=>'FACTURA DE VEHICULO/MOTOCICLETA',7=>'TARJETA DE CIRCULACIÓN',8=>'PLACAS DE CIRCULACIÓN',9=>
        'LICENCIA DE CONDUCIR ESTATAL',10=>'LICENCIA DE CONDUCIR FEDERAL',11=>'DOCUMENTO/BIEN EXTRAVIADO O ROBADO',12=>'CERTIFICADO DE ALUMBRAMIENTO');
        
        $estados=CatEstado::orderBy('nombre', 'ASC')->pluck('nombre','id');

        $preregistro = Preregistro::find($id);            
        $idDireccionPregistro =$preregistro->idDireccion;//id direccion
        $direccionTB=DB::table('domicilio') //id's de domicilios (municipio,localidad)
        ->where('domicilio.id','=',$idDireccionPregistro)
        ->get();

        $municipio=DB::table('cat_municipio')//nombre municipio
        ->where('cat_municipio.id','=',$direccionTB[0]->idMunicipio)
        ->get();
        
        $coloniaRow=DB::table('cat_colonia')//nombre municipio
        ->where('cat_colonia.id','=',$direccionTB[0]->idColonia)
        ->get();
        $idMunicipioSelect = $municipio[0]->id;
        $idEstadoSelect = $municipio[0]->idEstado; 
        $idLocalidadSelect = $direccionTB[0]->idLocalidad;
        $idColoniaSelect = $direccionTB[0]->idColonia;
        $idCodigoPostalSelect = $coloniaRow[0]->codigoPostal;
          
        /* inicio pruebas */
        //nombre del estado
        $nombreEstado=DB::table('cat_estado')
        ->where('cat_estado.id','=',$municipio[0]->idEstado)
        ->get();
        $nombreEstado=$nombreEstado[0]->nombre;
        
        //nombre del municipio
        $nombreMunicipio=DB::table('cat_municipio')
        ->where('cat_municipio.id','=',$municipio[0]->id)
        ->get();
        $nombreMunicipio=$nombreMunicipio[0]->nombre;

        //nombre del localidad
        $nombreLocalidad=DB::table('cat_localidad')
        ->where('cat_localidad.id','=',$direccionTB[0]->idLocalidad)
        ->get();
        $nombreLocalidad=$nombreLocalidad[0]->nombre;

        $razones=Razon::orderBy('nombre', 'ASC')->pluck('nombre','id');
        
        $razon=Razon::select('nombre')->where('id',$preregistro->idRazon)->get();
        $razon=$razon[0]->nombre;

        //Saber si la razón es solicitud de constancia de extravio
        $tipoActa = $preregistro->tipoActa;
        if($tipoActa){
            if(array_search($tipoActa, $tiposDeConstancia)){
                $tipoActa=$preregistro->tipoActa;
            }else{//Si el tipo de constancia de extravio es OTROS DOCUMENTOS
                $tipoActa='OTROS'; 
            }
        }
        

        
        //nombre del colonia
        $Colonia=DB::table('cat_colonia')
        ->where('cat_colonia.id','=',$direccionTB[0]->idColonia)
        ->get();
        $nombreColonia=$Colonia[0]->nombre;
        $nombreCP=$Colonia[0]->codigoPostal;

        $MunicipioOrigen = DB::table('cat_municipio')        
        ->select('idEstado','idMunicipio','nombre')
        ->where('id','=', $preregistro->idMunicipioOrigen)->first();
        

        $catMunicipiosOrigen=DB::table('cat_municipio')
        ->where('cat_municipio.idEstado','=',$MunicipioOrigen->idEstado)
        ->orderBy('nombre','asc')
        ->pluck('nombre','id');

        $estadoOrigen = DB::table('cat_estado')        
        ->select('nombre')
        ->where('id','=', $MunicipioOrigen->idEstado)->first();

        /* FIN DE PRUEBAS PARA NOMBRES DE DIRECCIONES */
        $catMunicipios=DB::table('cat_municipio')
        ->where('cat_municipio.idEstado','=',$idEstadoSelect)
        ->orderBy('nombre','asc')
        ->pluck('nombre','id');
        $catLocalidades=DB::table('cat_localidad')
        ->where('cat_localidad.idMunicipio','=',$municipio[0]->id)
        ->orderBy('nombre','asc')
        ->pluck('nombre','id');
        $catColonias=DB::table('cat_colonia')
        ->where('cat_colonia.codigoPostal','=',$coloniaRow[0]->codigoPostal)
        ->orderBy('nombre','asc')
        ->pluck('nombre','id');
        $catCodigoPostal=DB::table('cat_colonia')
        ->where('cat_colonia.idMunicipio','=',$idMunicipioSelect)
        ->where('cat_colonia.codigoPostal','!=',0)
        ->orderBy('codigoPostal','asc')
        ->groupBy('codigoPostal')
        ->pluck('codigoPostal','codigoPostal');
        $identificaciones = CatIdentificacion::orderBy('id', 'ASC')
        ->pluck('documento', 'id');
        $docIdent = CatIdentificacion::select('documento')
        ->where('cat_identificacion.id','=',$preregistro->docIdentificacion)
        ->orderBy('id', 'ASC')
        ->get();
        if(count($docIdent)>0){
            $docIdent=$docIdent[0]->documento;
        }

        //dd($docIdent);                     
        $persona= $preregistro->esEmpresa;//persona fisica o empresa

        if($persona==1){
            return view('servicios.recepcion.forms.editconrecepcion-empresa', compact('idEstadoSelect', 'idMunicipioSelect' ,'idLocalidadSelect', 'idColoniaSelect', 'catMunicipios', 'catLocalidades', 'catColonias', 'estados', 'preregistro','direccionTB', 'idCodigoPostalSelect', 'catCodigoPostal','nombreEstado','nombreMunicipio','nombreLocalidad', 'nombreColonia','nombreCP','razones','razon','identificaciones','docIdent','tipoActa'));
        }
        else{
            return view('servicios.recepcion.forms.editconrecepcion-persona', compact('catMunicipiosOrigen','estadoOrigen','MunicipioOrigen','idEstadoSelect', 'idMunicipioSelect' ,'idLocalidadSelect', 'idColoniaSelect', 'catMunicipios', 'catLocalidades', 'catColonias', 'estados', 'preregistro','direccionTB', 'idCodigoPostalSelect', 'catCodigoPostal','nombreEstado','nombreMunicipio','nombreLocalidad', 'nombreColonia','nombreCP','razones','razon','identificaciones','docIdent','tipoActa','tiposDeConstancia'));
        }
    }

    public function update(Request $request, $id)
    {
        //dd($request);
        $idDireccion=Preregistro::select('idDireccion')->where('id','=',$id)->get();
        $idDireccion=$idDireccion[0]->idDireccion;
        //dd($idDireccion);
        
        // DB::beginTransaction();
        // try{
            if ($request->esEmpresa==0){
                $domicilio = Domicilio::find($idDireccion);
                if (!is_null($request->idMunicipio)){
                    $domicilio->idMunicipio = $request->idMunicipio;
                }
                if (!is_null($request->idLocalidad)){
                    $domicilio->idLocalidad = $request->idLocalidad;
                }
                if (!is_null($request->idColonia)){
                    $domicilio->idColonia = $request->idColonia;
                }
                if (!is_null($request->calle)){
                    $domicilio->calle = $request->calle;
                }
                if (!is_null($request->numExterno)){
                    $domicilio->numExterno = $request->numExterno;
                }
                if (!is_null($request->numInterno)){
                    $domicilio->numInterno = $request->numInterno;
                }
                $domicilio->save();
                $idD1 = $domicilio->id;
                
                if (!is_null($request->fechaNacimiento)){                    
                    $edad= Carbon::parse($request->fechaNacimiento)->age;
                }
                $preregistro = Preregistro::find($id);
                $preregistro->nombre = $request->nombres;
                $preregistro->primerAp = $request->primerAp;
                $preregistro->segundoAp = $request->segundoAp;
                $preregistro->telefono = $request->telefono;
                $preregistro->narracion = $request->narracion;
                $preregistro->idDireccion = $idD1;
                if (!is_null($request->fechaNacimiento)){
                    $preregistro->fechaNac = $request->fechaNacimiento;
                }
                $preregistro->edad = $edad;
                if (!is_null($request->rfc2) && !is_null($request->homo2) ){
                    $preregistro->rfc = $request->rfc2.$request->homo2;
                }
                $preregistro->curp = $request->curp;
                if (!is_null($request->sexo)){
                    $preregistro->sexo = $request->sexo;
                }
                $preregistro->docIdentificacion = $request->docIdentificacion;
                $preregistro->numDocIdentificacion = $request->numDocIdentificacion;
                if (!is_null($request->idRazon)){
                    $preregistro->idRazon = $request->idRazon;
                }
                $preregistro->idMunicipioOrigen = $request->idMunicipioOrigen;
                $preregistro->save();
                $id = $preregistro->id;
                
            }elseif($request->esEmpresa==1){
                $domicilio = Domicilio::find($idDireccion);
                if (!is_null($request->idMunicipio)){
                    $domicilio->idMunicipio = $request->idMunicipio;
                }
                if (!is_null($request->idLocalidad)){
                    $domicilio->idLocalidad = $request->idLocalidad;
                }
                if (!is_null($request->idColonia)){
                    $domicilio->idColonia = $request->idColonia;
                }
                if (!is_null($request->calle)){
                    $domicilio->calle = $request->calle;
                }
                if (!is_null($request->numExterno)){
                    $domicilio->numExterno = $request->numExterno;
                }
                if (!is_null($request->numInterno)){
                    $domicilio->numInterno = $request->numInterno;
                }
                
                $domicilio->save();
                $idD1 = $domicilio->id;
                
                $preregistro =Preregistro::find($id);
                $preregistro->esEmpresa = 1;    
                $preregistro->nombre = $request->nombres2;
                $preregistro->primerAp = $request->primerAp;
                $preregistro->segundoAp = $request->segundoAp;
                $preregistro->idDireccion = $idD1;
                $preregistro->rfc = $request->rfc2 . $request->homo2;
                $preregistro->representanteLegal = $request->repLegal;
                $preregistro->telefono = $request->telefono;
                $preregistro->conViolencia = $request->conViolencia;
                $preregistro->narracion = $request->narracion;
                if (!is_null($request->idRazon)){
                    $preregistro->idRazon = $request->idRazon;
                }
                $preregistro->save();
                $id = $preregistro->id;   
            }
            // DB::commit();
            Alert::success('Registro modificado con éxito','Hecho');
            return redirect()->route('predenuncias.edit',$id);
        // }catch (\PDOException $e){
        //     DB::rollBack();
        //     Alert::error('Se presentó un problema al guardar los datos, intente de nuevo', 'Error');
        //     return back()->withInput();
        // }
    }


    public function showbyfolio(Request $request){
        if($request->input("folio")){
            $folio = $request->input("folio");
            $request->session()->flash('folio', $folio);
        }
        else{
            $folio = $request->session()->get('folio');
            $request->session()->flash('folio', $folio);

        }
        if($request->folio==null){
            return redirect(route('predenuncias.index'));

        }

        $registros = DB::table('preregistros')
        ->join('razones','razones.id','=','preregistros.idRazon')
        ->leftJoin('cat_identificacion','cat_identificacion.id','=','preregistros.docIdentificacion') 
        ->where('tipoActa', null)
        ->where('razones.nombre','!=' ,'SOLICITUD DE CONSTANCIA DE EXTRAVIO')
        ->where(function($query) use ($folio){
            $query
            ->orWhere(DB::raw("CONCAT(preregistros.nombre,' ',primerAp,' ',segundoAp)"), 'LIKE', '%' . $folio . '%')
            ->orWhere('representanteLegal', 'like', '%' . $folio . '%')
            ->orWhere('razones.nombre', 'like', '%' . $folio . '%')
            ->orWhere('folio', 'like', '%' . $folio . '%');
        })
        ->orderBy('id','desc')
        ->select('tipoActa','preregistros.id as id','idDireccion','idRazon','esEmpresa','preregistros.nombre as nombre',
        'primerAp','segundoAp','rfc','fechaNac','edad','sexo','curp','telefono',
        'cat_identificacion.documento as docIdentificacion','numDocIdentificacion','conViolencia','narracion','folio','representanteLegal',
        'statusCancelacion','statusOrigen','statusCola','horaLlegada','unidad','zona','razones.nombre as razon')
        ->paginate(10);
        $municipios = CatMunicipio::where('idEstado',30)
        ->where('nombre', '!=', 'SIN INFORMACION')
        ->orderBy('nombre','asc')
        ->get();
        //dd($preregistros);
        return view('servicios.recepcion.preregistros')->with('registros',$registros)->with('municipios', $municipios);
    }

    public function filtroPrioridad(Request $request){
        if($request->folio==null||$request->tipo==null){
            return redirect(route('predenuncias.index'));
        }
        $folio=$request->folio;
        $prioridad=$request->tipo;
        $registros = DB::table('preregistros')
        ->join('razones','razones.id','=','preregistros.idRazon')
        ->leftJoin('cat_identificacion','cat_identificacion.id','=','preregistros.docIdentificacion') 
        ->where('statusCola', $prioridad)
        ->where(function($query) use ($folio){
            $query
            ->orWhere(DB::raw("CONCAT(preregistros.nombre,' ',primerAp,' ',segundoAp)"), 'LIKE', '%' . $folio . '%')
            ->orWhere('representanteLegal', 'like', '%' . $folio . '%')
            ->orWhere('razones.nombre', 'like', '%' . $folio . '%')
            ->orWhere('folio', 'like', '%' . $folio . '%');
        })
        ->orderBy('id','desc')
        ->select('preregistros.id as id','idDireccion','idRazon','esEmpresa','preregistros.nombre as nombre',
        'primerAp','segundoAp','rfc','fechaNac','edad','sexo','curp','telefono',
        'cat_identificacion.documento as docIdentificacion','numDocIdentificacion','conViolencia','narracion','folio','representanteLegal',
        'statusCancelacion','statusOrigen','statusCola','horaLlegada','unidad','zona','razones.nombre as razon')
        ->paginate(10);
        
        return view('servicios.recepcion.cola-preregistro')->with('registros',$registros)->with('status',$prioridad);
    }


    public function encola()
    {
        // $preregistros = Preregistro::where('statusCola', 0)
        // ->where('conViolencia', 0)
        // ->orderBy('horaLlegada','asc')
        // ->paginate(10);
        $registros = DB::table('preregistros')->where('statusCola', 0)
        ->join('razones','razones.id','=','preregistros.idRazon')
        ->leftJoin('cat_identificacion','cat_identificacion.id','=','preregistros.docIdentificacion')        
        ->orderBy('horaLlegada','asc')
        ->select('preregistros.id as id','idDireccion','idRazon','esEmpresa','preregistros.nombre as nombre',
        'primerAp','segundoAp','rfc','fechaNac','edad','sexo','curp','telefono',
        'cat_identificacion.documento as docIdentificacion','numDocIdentificacion','conViolencia','narracion','folio','representanteLegal',
        'statusCancelacion','statusOrigen','statusCola','horaLlegada','unidad','zona','razones.nombre as razon')
        ->paginate(10);
        // dd($registros);
        return view('servicios.recepcion.cola-preregistro')->with('registros',$registros)->with('status',0);
    }

    public function urgentes()
    {
  
        $registros = DB::table('preregistros')->where('statusCola', 1)
        ->join('razones','razones.id','=','preregistros.idRazon')
        ->leftJoin('cat_identificacion','cat_identificacion.id','=','preregistros.docIdentificacion')
        ->orderBy('horaLlegada','asc')
        ->select('preregistros.id as id','idDireccion','idRazon','esEmpresa','preregistros.nombre as nombre',
        'primerAp','segundoAp','rfc','fechaNac','edad','sexo','curp','telefono',
        'cat_identificacion.documento as docIdentificacion','numDocIdentificacion','conViolencia','narracion','folio','representanteLegal',
        'statusCancelacion','statusOrigen','statusCola','horaLlegada','unidad','zona','razones.nombre as razon')
        ->paginate(10);
        // dd($registros);
        return view('servicios.recepcion.cola-preregistro')->with('registros',$registros)->with('status',1);

        
    }

    public function showbymunicipio($id){
        $registros = DB::table('preregistros')->where('tipoActa', null)
        ->leftJoin('cat_identificacion','cat_identificacion.id','=','preregistros.docIdentificacion') 
        ->join('razones','razones.id','=','preregistros.idRazon')
        ->join('domicilio', 'preregistros.idDireccion', '=', 'domicilio.id')
        ->where('domicilio.idMunicipio',$id)
        ->where('statusCola', null)
        ->where('idMunicipio',$id)
        ->orderBy('id','desc')
        ->select('preregistros.id as id','idDireccion','idRazon','esEmpresa','preregistros.nombre as nombre',
        'primerAp','segundoAp','rfc','fechaNac','edad','sexo','curp','telefono',
        'cat_identificacion.documento as docIdentificacion','numDocIdentificacion','conViolencia','narracion','folio','representanteLegal',
        'statusCancelacion','statusOrigen','statusCola','horaLlegada','unidad','zona','razones.nombre as razon')
        ->paginate('15');

         $municipios = CatMunicipio::where('idEstado',30)
        ->where('nombre', '!=', 'SIN INFORMACION')
        ->orderBy('nombre','asc')
        ->get();
        return view('servicios.recepcion.preregistros')->with('registros',$registros)->with('municipios', $municipios)->with('idMunicipioSelect',$id);
    }

 
    public function atender($id){
        DB::beginTransaction();
        try{
            $estado = Preregistro::find($id);
            // dd($estado);
            DB::commit();
            return redirect(url("turno")."/".$estado->id."/".$estado->idRazon);
        }catch (\PDOException $e){
            DB::rollBack();
            Alert::error('Se presentó un problema al guardar los datos, intente de nuevo', 'Error');
            return back()->withInput();
        }
    }

    public function turno($id,$tipo){
        switch ($tipo) {
            case 2:

                $estado = Preregistro::find($id);
                $estado->statusCola = 23;
                $estado->save();

                $preregistro = DB::table('preregistros')
                ->leftJoin('cat_identificacion','cat_identificacion.id','=','preregistros.docIdentificacion')
                ->leftJoin('domicilio','domicilio.id','=','preregistros.idDireccion')
                ->join('cat_municipio','domicilio.idMunicipio','=','cat_municipio.id')
                ->join('cat_colonia','domicilio.idColonia','=','cat_colonia.id')
                ->join('cat_municipio as municipioOreigen','preregistros.idMunicipioOrigen','=','municipioOreigen.id')
                ->select('preregistros.id as id',
                    'preregistros.idDireccion',
                    'cat_municipio.idEstado',
                    'domicilio.idMunicipio',
                    'domicilio.idLocalidad',
                    'domicilio.idColonia',
                    'cat_colonia.codigoPostal',
                    'domicilio.calle',
                    'domicilio.numExterno',
                    'domicilio.numInterno',
                    'preregistros.idRazon',
                    'preregistros.esEmpresa',
                    'preregistros.nombre',
                    'preregistros.primerAp',
                    'preregistros.segundoAp',
                    'preregistros.rfc',
                    'preregistros.fechaNac',
                    'preregistros.idEscolaridad',
                    'preregistros.idEstadoCivil',
                    'municipioOreigen.idEstado as idEstadoOrigen',
                    'preregistros.idMunicipioOrigen',
                    'preregistros.idOcupacion',
                    'preregistros.edad',
                    'preregistros.sexo',
                    'preregistros.curp',
                    'preregistros.telefono',
                    'cat_identificacion.documento as docIdentificacion',
                    'preregistros.numDocIdentificacion',
                    'preregistros.conViolencia',
                    'preregistros.narracion',
                    'preregistros.folio',
                    'preregistros.tipoActa',
                    'preregistros.representanteLegal',
                    'preregistros.statusCancelacion',
                    'preregistros.statusOrigen',
                    'preregistros.statusCola',
                    'preregistros.horaLlegada')
                ->where('preregistros.id',$id)->first();
                // dd($preregistro);
                
                $tipopersona=$preregistro->esEmpresa;
                
                $idEstadoOrigenSelect = $preregistro->idEstadoOrigen; 
                $idMunicipioOrigenSelect = $preregistro->idMunicipioOrigen;
                
                $idEstadoSelect = $preregistro->idEstado; 
                $idMunicipioSelect = $preregistro->idMunicipio;
                $idLocalidadSelect = $preregistro->idLocalidad;
                $idColoniaSelect = $preregistro->idColonia;
                $idCodigoPostalSelect = $preregistro->codigoPostal;
                // dd($idMunicipioSelect);

                $estados=CatEstado::orderBy('nombre','asc')->pluck('nombre','id');
                $municipiospre=CatMunicipio::where('idEstado','=',$idEstadoSelect)->orderBy('nombre','asc')->pluck('nombre','id');
                $municipios=CatMunicipio::where('idEstado','=',30)->orderBy('nombre','asc')->pluck('nombre','id');
                $localidades=CatLocalidad::where('idMunicipio','=',$idMunicipioSelect)->orderBy('nombre','asc')->pluck('nombre','id');
                $colonias=CatColonia::where('idMunicipio','=',$idMunicipioSelect)->orderBy('nombre','asc')->pluck('nombre','id');
                $codigoPostal=CatColonia::where('codigoPostal','=',$idCodigoPostalSelect)->orderBy('codigoPostal','asc')->pluck('codigoPostal','codigopostal');
                $municipiosOrigen=CatMunicipio::where('idEstado',$preregistro->idEstadoOrigen)->pluck('nombre','id');
                // dd($municipioOrigen);  
            
                $caso = new Carpeta();
                $caso->fechaInicio = Carbon::now();
                $caso->idFiscal = Auth::user()->id;
                $caso->idUnidad = Auth::user()->idUnidad;
                $caso->horaIntervencion = Carbon::now();
                $caso->fiscalAtendio = Auth::user()->nombreC;
                $caso->save();
                $idCarpeta = $caso->id;
                
                $unidad=DB::table('unidad')->where('id',Auth::user()->idUnidad)->first();
                $unidad=$unidad->abreviacion;
                
                $NuevoNumCarpeta = $unidad."/1/".Carbon::now()->year."-".Auth::user()->numFiscal;
                $buscarConsecutivo = Carpeta::where('numCarpeta',$NuevoNumCarpeta)->get();
                
                while ($buscarConsecutivo->isNotEmpty()) {
                    $buscarConsecutivo=$buscarConsecutivo[0];
                    $partesNumero=explode("/", $buscarConsecutivo->numCarpeta);
                    // dd($buscarConsecutivo);
                    $consecutivo=$partesNumero[3] + 1;
                    $NuevoNumCarpeta = $unidad.'/'.$consecutivo.'/'.$partesNumero[4];                
                    $buscarConsecutivo = Carpeta::where('numCarpeta',$NuevoNumCarpeta)->get();
                }
                


                $numCarpeta=Carpeta::find($caso->id);
                $numCarpeta->numCarpeta = $NuevoNumCarpeta;            
                $numCarpeta->save();
        
                session(['numCarpeta' => $numCarpeta->numCarpeta]);
                
        
                $editpreregistro=Preregistro::find($id);
                $editpreregistro->idCarpeta= $idCarpeta;
                $editpreregistro->save();
        
                session(['preregistro' => $id]);
                session(['foliopreregistro' => $preregistro->folio]);
                session(['carpeta' => $idCarpeta]);
        
                $usuario=User::find(Auth::user()->id);
                $usuario->idCarpeta=session('carpeta');
                $usuario->idPreregistro=session('preregistro');
                $usuario->save();
        
                $bdbitacora = new BitacoraNavCaso;
                $bdbitacora->idCaso = $caso->id;
                $bdbitacora->save();
                
        
                $escolaridades = CatEscolaridad::orderBy('id', 'ASC')->pluck('nombre', 'id');
                $estadoscivil = CatEstadoCivil::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
                $etnias = CatEtnia::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
                $lenguas = CatLengua::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
                $nacionalidades = CatNacionalidad::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
                $ocupaciones = CatOcupacion::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
                $religiones = CatReligion::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
                
                Alert::success('Turno tomado', 'Hecho');
                return view('forms.denunciante-turno')->with('idCarpeta', $idCarpeta)
                ->with('preregistro', $preregistro)
                ->with('tipopersona', $tipopersona)
                ->with('idEstadoOrigenSelect', $idEstadoOrigenSelect)
                ->with('idMunicipioOrigenSelect', $idMunicipioOrigenSelect)
                ->with('idEstadoSelect', $idEstadoSelect)
                ->with('idMunicipioSelect', $idMunicipioSelect)
                ->with('idLocalidadSelect', $idLocalidadSelect)
                ->with('idColoniaSelect', $idColoniaSelect)
                ->with('idCodigoPostalSelect', $idCodigoPostalSelect)
                ->with('estados', $estados)
                ->with('municipios', $municipios)
                ->with('municipiospre', $municipiospre)
                ->with('localidades', $localidades)
                ->with('colonias', $colonias)
                ->with('codigoPostal', $codigoPostal)
                ->with('municipiosOrigen', $municipiosOrigen)
                ->with('idCarpeta', $idCarpeta)
                ->with('escolaridades',  $escolaridades)
                ->with('estadoscivil',   $estadoscivil)
                ->with('etnias',  $etnias)
                ->with('lenguas',  $lenguas)
                ->with('nacionalidades',  $nacionalidades)
                ->with('ocupaciones',  $ocupaciones)
                ->with('religiones',  $religiones);
                // ->with('identificaciones', $identificaciones);
                break;
            
            case 4:
                return redirect(route('actaspreregistro',$id));    
                break;
            
            default:
                return redirect(url('registros'));
                break;
        }
                
    }

    public function Traerturno(){
        $cola = Preregistro::where('statusCola', 0)
        ->orderBy('horaLlegada','asc')->first();
        $urgente = Preregistro::where('statusCola', 1)
        ->orderBy('horaLlegada','asc')->first();
        if(!$urgente&&!$cola){
            Alert::warning('', 'No hay elemento en cola');
            return back();
        }
        else{
            if(session('enturno')==null){
                if($urgente){
                    $estado = Preregistro::find($urgente->id);
                    $estado->statusCola = 21;
                    $estado->save();
                    session(['enturno' => 'urgente']);
                    // return redirect(url('turno').'/'.$urgente->id.'/'.$estado->idRazon);
                    return redirect()->route('edit.registros.orientador',$urgente->id);
                }else{
                    $estado = Preregistro::find($cola->id);
                    $estado->statusCola = 20;
                    $estado->save();
                    session(['enturno' => 'cola']);
                    // return redirect(url('turno').'/'.$cola->id.'/'.$estado->idRazon);
                    return redirect()->route('edit.registros.orientador',$cola->id);
                }
            }else{
                $anterior = session('enturno');
                if($anterior=='urgente'&&$cola){
                    $estado = Preregistro::find($cola->id);
                    $estado->statusCola = 20;
                    $estado->save();
                    session(['enturno' => 'cola']);
                    // return redirect(url('turno').'/'.$cola->id.'/'.$estado->idRazon);
                    return redirect()->route('edit.registros.orientador',$cola->id);

                }
                else if($anterior=='urgente'&&$urgente){
                    $estado = Preregistro::find($urgente->id);
                    $estado->statusCola = 21;
                    $estado->save();
                    session(['enturno' => 'cola']);
                    // return redirect(url('turno').'/'.$urgente->id.'/'.$estado->idRazon);
                    return redirect()->route('edit.registros.orientador',$urgente->id);
                }
                else if($anterior=='cola'&&$urgente){
                    $estado = Preregistro::find($urgente->id);
                    $estado->statusCola = 21;
                    $estado->save();
                    session(['enturno' => 'cola']);
                    // return redirect(url('turno').'/'.$urgente->id.'/'.$estado->idRazon);
                    return redirect()->route('edit.registros.orientador',$urgente->id);
                }
                else if($anterior=='cola'&&$cola){
                    $estado = Preregistro::find($cola->id);
                    $estado->statusCola = 20;
                    $estado->save();
                    session(['enturno' => 'cola']);
                    // return redirect(url('turno').'/'.$cola->id.'/'.$estado->idRazon);
                    return redirect()->route('edit.registros.orientador',$cola->id);
                }
            }
        }
    }

    public function devolverturno($id){  
        $turno = Preregistro::find($id);
        $turno->idCarpeta=null;
        $status = $turno->statusCola;
        if ($status==23) {
            $turno->statusCola = null;
        }else{
            $turno->statusCola = ($status==21)?1:0;
        }
        $turno->save();
        $idCarpeta=session('carpeta');

        //dd($idCarpeta);
        if (!is_null($idCarpeta)) {
            $usuario=User::find(Auth::user()->id);
            $usuario->idCarpeta=null;
            $usuario->save();
            
            $bdbitacora = BitacoraNavCaso::where('idCaso',$idCarpeta)->first();
            $contero=$bdbitacora->denunciante+$bdbitacora->autoridad;
    
            if($contero>0){
                $carpeta = Carpeta::find($idCarpeta);
                $carpeta->numCarpeta=null;
                $carpeta->save();
            }else{
                $carpeta = Carpeta::find($idCarpeta);
                $carpeta->delete();
    
            }
            
            session()->forget('carpeta');
            session()->forget('preregistro');
            session()->forget('foliopreregistro');
            session()->forget('numCarpeta');
            Alert::info('Los datos del caso que inicio han sido borrados y el turno fue devuelto a la cola ', 'Turno devuelto');
        }
        
        //dd($idCarpeta);
        //dd(session('carpeta'));
        
        return redirect()->route('home');
       }


    public function boton(){
        return view('servicios.email.indexboton');
    }

    public function rfcMoral(Request $request)
    {
        $nombre = $request->nombre;
        $dia    = $request->dia;
        $mes    = $request->mes;
        $ano    = $request->ano;

        $builder = new RfcBuilder();

        $rfc = $builder->legalName($nombre)
            ->creationDate($dia, $mes, $ano)
            ->build()
            ->toString();
        return ['res' => $rfc];
    }

    public function rfcFisico(Request $request)
    {
        $builder = new RfcBuilder();
        $rfc     = $builder->name($request->nombre)
            ->firstLastName($request->apPaterno)
            ->secondLastName($request->apMaterno)
            ->birthday($request->dia, $request->mes, $request->año)
            ->build()
            ->toString();

        return ['res' => $rfc];
    }
}