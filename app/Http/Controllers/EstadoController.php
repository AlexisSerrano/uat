<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;
use App\Models\Carpeta;
use App\Models\Acusacion;
use App\Models\ExtraAbogado;
use App\Models\ExtraAutoridad;
use App\Models\ExtraDenunciado;
use App\Models\ExtraDenunciante;
use App\Models\DirNotificacion;
use App\Models\TipifDelito;
use App\Models\VariablesPersona;

use App\Models\uatuipj\ConPersona;
use App\Models\uatuipj\ConCarpeta;
use App\Models\uatuipj\ConDomicilio;
use App\Models\uatuipj\ConAcusacion;
use App\Models\uatuipj\ConExtraAbogado;
use App\Models\uatuipj\ConExtraAutoridad;
use App\Models\uatuipj\ConExtraDenunciado;
use App\Models\uatuipj\ConExtraDenunciante;
use App\Models\uatuipj\ConNotificacion;
use App\Models\uatuipj\ConTipifDelito;
use App\Models\uatuipj\ConVariablesPersona;

use App\Models\CatEscolaridad;
use App\Models\CatEstadoCivil;
use App\Models\CatEtnia;
use App\Models\CatLengua;
use App\Models\CatNacionalidad;
use App\Models\CatOcupacion;
use App\Models\CatEstatusCaso;
use App\Models\CatTipoDeterminacion;
use Illuminate\Support\Facades\Session;
use App\Models\HistorialCarpeta;
use App\Models\Admin;
use App\Models\Unidad;

use DB;
use Alert;

class EstadoController extends Controller
{
    //



    public function index(){
        $id=session('carpeta');
        
        // $casoNuevo = Carpeta::where($id, $idCarpeta)->get();
        // $carpetaNueva = Carpeta::find($idCarpeta);
        // dd($carpetaNueva);
        //    $idEstadocarpeta = $carpetaNueva->idEstadoCarpeta;//id direccion
            
        $estatus=DB::table('carpeta') //id's de domicilios (municipio,localidad)
            ->join('cat_estatus_casos','cat_estatus_casos.id','=','carpeta.idEstadoCarpeta') 
            ->select('cat_estatus_casos.nombreEstatus as estatus', 'carpeta.id as id')
            ->where('carpeta.id','=', $id)
            ->get();
            
        $tipoDeterminacion=CatTipoDeterminacion::where('nombre','!=','ARCHIVO TEMPORAL')
        ->orderBy('nombre', 'ASC')
        ->pluck('nombre','id');

        $tipoArchivo=CatTipoDeterminacion::where('nombre','like','%archivo%')
        ->orderBy('nombre', 'ASC')
        ->pluck('nombre','id');
        
        $informacion = CatEstatusCaso::orderBy('nombreEstatus', 'ASC')
            ->pluck('nombreEstatus','id');


        $unidad = Unidad::orderBy('descripcion', 'ASC')
            ->pluck('descripcion','id');
        
        
        return view('fields.resumen-carpeta.estatusCarpeta')
        ->with('informacion', $informacion)
        ->with('tipoDeterminacion', $tipoDeterminacion)
        ->with('tipoArchivo', $tipoArchivo)
        ->with('estatus', $estatus)
        ->with('unidad', $unidad);
    }


    public function editar(Request $request){
        

        // DB::beginTransaction();
        // try{
            //  Sacar el id del select  //EstadoCarpeta es variable del select
            // $idCarpeta=$request->idCarpeta;  //id de Variable de sesion
            $idCarpeta=session('carpeta');  //id de Variable de sesion
            //$idCarpeta=session('carpeta');  //id de Variable de sesion
            //dd($idCarpeta);
            
            
            switch ($request->EstadoCarpeta) {
                case '1':
                    $id = Carpeta::find($idCarpeta); //seleccinar toda la fila del primer id con  el valor de idCarpeta 
                    $id->idEstadoCarpeta = $request->EstadoCarpeta;  //cambiar el campo idEstadpCarpeta por el valor $nombre
                    $id->idTipoDeterminacion = 5;  
                    $id->observacionesEstatus = $request->narracion;  
                    $id->save();   // para guardar el registro
                    
                    $idCarpetaAux=$idCarpeta;
                    $motivo=$id->observacionesEstatus;
                    $numCarpetaAux=$id->numCarpeta;

                    $historial= new HistorialCarpeta;
                    $historial->idCarpeta = $idCarpetaAux;
                    $historial->idEstatusCarpeta = 1;
                    $historial->observacion = $motivo;
                    $historial->fiscal = Auth::user()->nombreC;
                    $historial->numCarpeta = $numCarpetaAux;
                    $historial->fecha = Carbon::now();
                    $historial->save();
                   
                    
                    break;
                
                case '2':
                    $id = Carpeta::find($idCarpeta); //seleccinar toda la fila del primer id con  el valor de idCarpeta 
                    $id->idEstadoCarpeta = $request->EstadoCarpeta;  //cambiar el campo idEstadpCarpeta por el valor $nombre
                    $id->observacionesEstatus = $request->narracion;  
                    $id->idTipoDeterminacion = $request->selectDetermina;  
                    $id->save();   // para guardar el registro

                    $idCarpetaAux=$idCarpeta;
                    $numCarpetaAux=$id->numCarpeta;
                    $motivo=$id->observacionesEstatus;
                    
                    $historial= new HistorialCarpeta;
                    $historial->idCarpeta = $idCarpetaAux;
                    $historial->idEstatusCarpeta = 2;
                    $historial->idTipoDeterminacion = $request->selectDetermina;
                    $historial->observacion = $motivo;
                    $historial->numCarpeta = $numCarpetaAux;
                    $historial->fiscal = Auth::user()->nombreC;
                    $historial->fecha = Carbon::now();
                    $historial->save();
                   
                    break;
                
                
                case '3':
                    $id = Carpeta::find($idCarpeta); //seleccinar toda la fila del primer id con  el valor de idCarpeta 
                    $id->idEstadoCarpeta = $request->EstadoCarpeta;  //cambiar el campo idEstadpCarpeta por el valor $nombre
                    $id->observacionesEstatus = $request->narracion;  
                    $id->save();   // para guardar el registro

                    $idCarpetaAux=$idCarpeta;
                    $numCarpetaAux=$id->numCarpeta;
                    $motivo=$id->observacionesEstatus;
                    
                    $historial= new HistorialCarpeta;
                    $historial->idCarpeta = $idCarpetaAux;
                    $historial->idEstatusCarpeta = 3;
                    $historial->observacion = $motivo;
                    $historial->numCarpeta = $numCarpetaAux;
                    $historial->fiscal = Auth::user()->nombreC;
                    $historial->fecha = Carbon::now();
                    $historial->save();
                   

                    //datos de la carpeta
                    $carpeta=Carpeta::where('id',$idCarpeta)->first();
    
                    //datos del delitos
                  //  $delitos=TipifDelito::where('idCarpeta',$idCarpeta)->get();
                    $delitos = DB::table('tipif_delito')
                        ->join('domicilio','domicilio.id','=','tipif_delito.idDomicilio')
                        ->select('domicilio.*', 'tipif_delito.*')
                        ->where('tipif_delito.idCarpeta','=',$idCarpeta)
                        ->get();
                                     
                 //   dump($delitos);
                    //datos de autoridades
    
                    $autoridades=DB::table('extra_autoridad')
                    ->join('variables_persona','variables_persona.id','=','extra_autoridad.idVariablesPersona')
                    ->join('persona','variables_persona.idPersona','=','persona.id')
                    ->join('domicilio as domicilio','domicilio.id','=','variables_persona.idDomicilio')
                    ->join('domicilio as domicilioTrabajo','domicilioTrabajo.id','=','variables_persona.idDomicilioTrabajo')
                    ->select('domicilio.*','domicilioTrabajo.id as DT_id', 'domicilioTrabajo.idMunicipio as DT_idMunicipio',
                    'domicilioTrabajo.idLocalidad as DT_idLocalidad','domicilioTrabajo.idColonia as DT_idColonia',
                    'domicilioTrabajo.calle as DT_calle','domicilioTrabajo.numExterno as DT_numExterno',
                    'domicilioTrabajo.numInterno as DT_numInterno','persona.*','variables_persona.*','extra_autoridad.*')
                    ->where('variables_persona.idCarpeta',$idCarpeta)
                    ->get();
                   // dump($autoridades);
    
                    //abogados
    
                    $abogados=DB::table('extra_abogado')
                    ->join('variables_persona','variables_persona.id','=','extra_abogado.idVariablesPersona')
                    ->join('persona','variables_persona.idPersona','=','persona.id')
                    ->join('domicilio as domicilio','domicilio.id','=','variables_persona.idDomicilio')
                    ->join('domicilio as domicilioTrabajo','domicilioTrabajo.id','=','variables_persona.idDomicilioTrabajo')
                    ->select('domicilio.*','domicilioTrabajo.id as DT_id', 'domicilioTrabajo.idMunicipio as DT_idMunicipio',
                    'domicilioTrabajo.idLocalidad as DT_idLocalidad','domicilioTrabajo.idColonia as DT_idColonia',
                    'domicilioTrabajo.calle as DT_calle','domicilioTrabajo.numExterno as DT_numExterno',
                    'domicilioTrabajo.numInterno as DT_numInterno','persona.*','variables_persona.*','extra_abogado.*')
                    ->where('variables_persona.idCarpeta',$idCarpeta)
                    ->get();
                  //  dd($abogados);
                    
                    $denunciados=DB::table('extra_denunciado')
                    ->join('dirnotificacion','dirnotificacion.id','=','extra_denunciado.idNotificacion')
                    ->join('domicilio as notificacion','dirnotificacion.idDomicilio','=','notificacion.id')
                    ->join('variables_persona','variables_persona.id','=','extra_denunciado.idVariablesPersona')
                    ->join('domicilio','variables_persona.idDomicilio','=','domicilio.id')
                    ->join('domicilio as trabajo','variables_persona.idDomicilioTrabajo','=','trabajo.id')
                    ->join('persona','variables_persona.idPersona','=','persona.id')
                    ->where('variables_persona.idCarpeta',$idCarpeta)
                    ->select(   
                                'persona.nombres as pernombres',
                                'persona.primerAp as perprimerAp',
                                'persona.segundoAp as persegundoAp',
                                'persona.fechaNacimiento as perfechaNacimiento',
                                'persona.rfc as perrfc',
                                'persona.curp as percurp',
                                'persona.sexo as persexo',
                                'persona.idNacionalidad as peridNacionalidad',
                                'persona.idEtnia as peridEtnia',
                                'persona.idLengua as peridLengua',
                                'persona.idMunicipioOrigen as peridMunicipioOrigen',
                                'persona.esEmpresa as peresEmpresa',        
                                'variables_persona.idPersona as variaidPersona',
                                'variables_persona.edad as variaedad',
                                'variables_persona.telefono as variatelefono',
                                'variables_persona.idOcupacion as variaidOcupacion',
                                'variables_persona.idEstadoCivil as variaidEstadoCivil',
                                'variables_persona.idEscolaridad as variaidEscolaridad',
                                'variables_persona.idReligion as variaidReligion',
                                'variables_persona.idDomicilio as variaidDomicilio',
                                'variables_persona.docIdentificacion as variadocIdentificacion',
                                'variables_persona.numDocIdentificacion as varianumDocIdentificacion',
                                'variables_persona.lugarTrabajo as varialugarTrabajo',
                                'variables_persona.idDomicilioTrabajo as variaidDomicilioTrabajo',
                                'variables_persona.telefonoTrabajo as variatelefonoTrabajo',
                                'variables_persona.representanteLegal as variarepresentanteLegal',
                                'extra_denunciado.id as denunciadoid',
                                'extra_denunciado.idPuesto as denunciadoidPuesto',
                                'extra_denunciado.alias as denunciadoalias',
                                'extra_denunciado.senasPartic as denunciadosenasPartic',
                                'extra_denunciado.ingreso as denunciadoingreso',
                                'extra_denunciado.periodoIngreso as denunciadoperiodoIngreso',
                                'extra_denunciado.residenciaAnterior as denunciadoresidenciaAnterior',
                                'extra_denunciado.idAbogado as denunciadoidAbogado',
                                'extra_denunciado.personasBajoSuGuarda as denunciadopersonasBajoSuGuarda',
                                'extra_denunciado.perseguidoPenalmente as denunciadoperseguidoPenalmente',
                                'extra_denunciado.vestimenta as denunciadovestimenta',
                                'extra_denunciado.narracion as denunciadonarracion',
                                'dirnotificacion.idDomicilio as notifiidDomicilio',
                                'dirnotificacion.correo as notificorreo',
                                'dirnotificacion.telefono as notifitelefono',
                    
                                'domicilio.id as domicilioid',
                                'domicilio.idMunicipio as domicilioMunicipio',
                                'domicilio.idLocalidad as domicilioLocalidad',
                                'domicilio.idColonia as domicilioColonia',
                                'domicilio.calle as domicilioCalle',
                                'domicilio.numExterno as domicilioNumExterno',
                                'domicilio.numInterno as domicilioNumInterno',
                
                                'trabajo.id as domicilioTrabajoid',
                                'trabajo.idMunicipio as TrabajoMunicipio',
                                'trabajo.idLocalidad as TrabajoLocalidad',
                                'trabajo.idColonia as TrabajoColonia',
                                'trabajo.calle as TrabajoCalle',
                                'trabajo.numExterno as TrabajoNumExterno',
                                'trabajo.numInterno as TrabajoNumInterno',
                
                                'notificacion.id as domicilioNotifiId',
                                'notificacion.idMunicipio as notifiMunicipio',
                                'notificacion.idLocalidad as notifiLocalidad',
                                'notificacion.idColonia as notifiColonia',
                                'notificacion.calle as notifiCalle',
                                'notificacion.numExterno as notifiNumExterno',
                                'notificacion.numInterno as notifiNumInterno')
                    ->get();
                    //dd($denunciados);
    
                    $denunciantes=DB::table('extra_denunciante')
                    ->join('dirnotificacion','dirnotificacion.id','=','extra_denunciante.idNotificacion')
                    ->join('domicilio as notificacion','dirnotificacion.idDomicilio','=','notificacion.id')
                    ->join('variables_persona','variables_persona.id','=','extra_denunciante.idVariablesPersona')
                    ->join('domicilio','variables_persona.idDomicilio','=','domicilio.id')
                    ->join('domicilio as trabajo','variables_persona.idDomicilioTrabajo','=','trabajo.id')
                    ->join('persona','variables_persona.idPersona','=','persona.id')
                    ->where('variables_persona.idCarpeta',$idCarpeta)
                    ->select(   
                                'persona.nombres as pernombres',
                                'persona.primerAp as perprimerAp',
                                'persona.segundoAp as persegundoAp',
                                'persona.fechaNacimiento as perfechaNacimiento',
                                'persona.rfc as perrfc',
                                'persona.curp as percurp',
                                'persona.sexo as persexo',
                                'persona.idNacionalidad as peridNacionalidad',
                                'persona.idEtnia as peridEtnia',
                                'persona.idLengua as peridLengua',
                                'persona.idMunicipioOrigen as peridMunicipioOrigen',
                                'persona.esEmpresa as peresEmpresa',
                                
                                'variables_persona.idPersona as variaidPersona',
                                'variables_persona.edad as variaedad',
                                'variables_persona.telefono as variatelefono',
                                // 'variables_persona.motivoEstancia as variamotivoEstancia',
                                'variables_persona.idOcupacion as variaidOcupacion',
                                'variables_persona.idEstadoCivil as variaidEstadoCivil',
                                'variables_persona.idEscolaridad as variaidEscolaridad',
                                'variables_persona.idReligion as variaidReligion',
                                'variables_persona.idDomicilio as variaidDomicilio',
                                'variables_persona.docIdentificacion as variadocIdentificacion',
                                'variables_persona.numDocIdentificacion as varianumDocIdentificacion',
                                'variables_persona.lugarTrabajo as varialugarTrabajo',
                                'variables_persona.idDomicilioTrabajo as variaidDomicilioTrabajo',
                                'variables_persona.telefonoTrabajo as variatelefonoTrabajo',
                                'variables_persona.representanteLegal as variarepresentanteLegal',
                                'extra_denunciante.id as denuncianteid',
                                'extra_denunciante.idNotificacion as denuncianteidNotificacion',
                                'extra_denunciante.idAbogado as denuncianteidAbogado',
                                'extra_denunciante.reguardarIdentidad as denunciantereguardarIdentidad',
                                'extra_denunciante.victima as denunciantevictima',
                                'extra_denunciante.narracion as denunciantenarracion',
                                'dirnotificacion.idDomicilio as notifiidDomicilio',
                                'dirnotificacion.correo as notificorreo',
                                'dirnotificacion.telefono as notifitelefono',
                                
                                'domicilio.id as domicilioid',
                                'domicilio.idMunicipio as domicilioMunicipio',
                                'domicilio.idLocalidad as domicilioLocalidad',
                                'domicilio.idColonia as domicilioColonia',
                                'domicilio.calle as domicilioCalle',
                                'domicilio.numExterno as domicilioNumExterno',
                                'domicilio.numInterno as domicilioNumInterno',
                
                                'trabajo.id as domicilioTrabajoid',
                                'trabajo.idMunicipio as TrabajoMunicipio',
                                'trabajo.idLocalidad as TrabajoLocalidad',
                                'trabajo.idColonia as TrabajoColonia',
                                'trabajo.calle as TrabajoCalle',
                                'trabajo.numExterno as TrabajoNumExterno',
                                'trabajo.numInterno as TrabajoNumInterno',
                
                                'notificacion.id as domicilioNotifiId',
                                'notificacion.idMunicipio as notifiMunicipio',
                                'notificacion.idLocalidad as notifiLocalidad',
                                'notificacion.idColonia as notifiColonia',
                                'notificacion.calle as notifiCalle',
                                'notificacion.numExterno as notifiNumExterno',
                                'notificacion.numInterno as notifiNumInterno')
                    ->get();
                    //dd($abogados);
    
                    $acusaciones=Acusacion::where('idCarpeta',$idCarpeta)->get();
                    //dd($acusaciones);
                    DB::beginTransaction();
                    try{
                    
                        //dd($carpeta);
                        if ($carpeta) {
                            $concarpeta= new ConCarpeta;
                            $concarpeta->idUnidad = 11;
                            $concarpeta->fechaInicio = $carpeta->fechaInicio;
                            $concarpeta->conDetenido = false;
                            $concarpeta->esRelevante = $carpeta->esRelevante;
                            $concarpeta->idEstadoCarpeta = $carpeta->idEstadoCarpeta;
                            $concarpeta->horaIntervencion = $carpeta->horaIntervencion;
                            $concarpeta->npd = false;
                            $concarpeta->fechaIph = $carpeta->fechaIph;
                            $concarpeta->numIph = 'SIN INFORMACION';
                            $concarpeta->narracionIph = 'SIN INFORMACION';
                            $concarpeta->descripcionHechos = $carpeta->descripcionHechos;
                            $concarpeta->nombreFiscalUat = Auth::user()->nombreC;
                            $concarpeta->numCarpetaUat = $carpeta->numCarpeta;
                            $concarpeta->asignada = 0;
                            $concarpeta->observacionesEstatus = $carpeta->observacionesEstatus;
                            $concarpeta->save();
                            $idCarpetaTurnada=$concarpeta->id;
                            //dd($concarpeta);
                        }
                    
                        
                    
                        // dd($delitos);
    
                        if (count($delitos)>0) { 
                            $arraydelitos=array();
                            foreach ($delitos as $delito) {

                                $conDomicilio = new ConDomicilio;
                                $conDomicilio->idMunicipio = $delito->idMunicipio;
                                $conDomicilio->idLocalidad = $delito->idLocalidad;
                                $conDomicilio->idColonia = $delito->idColonia;
                                $conDomicilio->calle = $delito->calle;
                                $conDomicilio->numExterno = $delito->numExterno;
                                $conDomicilio->numInterno = $delito->numInterno;
                                $conDomicilio->save();
    

                                $condelito = new ConTipifDelito;
                                $condelito->idCarpeta = $idCarpetaTurnada;
                                $condelito->idDelito = $delito->idDelito;
                                $condelito->idAgrupacion1 = $delito->idAgrupacion1;
                                $condelito->idAgrupacion2 = $delito->idAgrupacion2;
                                $condelito->conViolencia = $delito->conViolencia;
                                $condelito->idArma = 1;
                                $condelito->consumacion = 'SIN INFORMACION';
                                $condelito->idPosibleCausa = 1;
                                $condelito->idModalidad = 1;
                                $condelito->formaComision = $delito->formaComision;
                                $condelito->fecha = $delito->fecha;
                                $condelito->hora = $delito->hora;
                                $condelito->idZona = $delito->idZona;
                                $condelito->idLugar = $delito->idLugar;
                                $condelito->idDomicilio = $conDomicilio->id;
                                $condelito->entreCalle = $delito->entreCalle;
                                $condelito->yCalle = $delito->yCalle;
                                $condelito->calleTrasera = $delito->calleTrasera;
                                $condelito->puntoReferencia = $delito->puntoReferencia;
                                $condelito->save();
                                array_push($arraydelitos,array('iduat'=>$delito->id,'idnuevo'=>$condelito->id));
                                // dd($arraydelitos);
                            }
                        }
    
    
    
                        if (count($autoridades)>0) {
                            foreach ($autoridades as $autoridad) {
                                $conpersona = new ConPersona;
                                $conpersona->nombres = $autoridad->nombres;
                                $conpersona->primerAp = $autoridad->primerAp;
                                $conpersona->segundoAp = $autoridad->segundoAp;
                                $conpersona->fechaNacimiento = $autoridad->fechaNacimiento;
                                $conpersona->rfc = $autoridad->rfc;
                                $conpersona->curp = $autoridad->curp;
                                $conpersona->sexo = $autoridad->sexo;
                                $conpersona->idNacionalidad = $autoridad->idNacionalidad;
                                $conpersona->idEtnia = $autoridad->idEtnia;
                                $conpersona->idLengua = $autoridad->idLengua;
                                $conpersona->idMunicipioOrigen = $autoridad->idMunicipioOrigen;
                                $conpersona->esEmpresa = $autoridad->esEmpresa;
                                $conpersona->save();
                                $idpersonaauto=$conpersona->id;

                                
                                $conDomicilio = new ConDomicilio;
                                $conDomicilio->idMunicipio = $autoridad->idMunicipio;
                                $conDomicilio->idLocalidad = $autoridad->idLocalidad;
                                $conDomicilio->idColonia = $autoridad->idColonia;
                                $conDomicilio->calle = $autoridad->calle;
                                $conDomicilio->numExterno = $autoridad->numExterno;
                                $conDomicilio->numInterno = $autoridad->numInterno;
                                $conDomicilio->save();

                                $conDomicilioT = new ConDomicilio;
                                $conDomicilioT->idMunicipio = $autoridad->DT_idMunicipio;
                                $conDomicilioT->idLocalidad = $autoridad->DT_idLocalidad;
                                $conDomicilioT->idColonia = $autoridad->DT_idColonia;
                                $conDomicilioT->calle = $autoridad->DT_calle;
                                $conDomicilioT->numExterno = $autoridad->DT_numExterno;
                                $conDomicilioT->numInterno = $autoridad->DT_numInterno;
                                $conDomicilioT->save();                               
    
    
                                $convariables = new ConVariablesPersona;
                                $convariables->idCarpeta = $autoridad->idCarpeta;
                                $convariables->idPersona = $conpersona->id;
                                $convariables->edad = $autoridad->edad;
                                $convariables->telefono = $autoridad->telefono;
                                $convariables->motivoEstancia = 'NO APLICA';
                                $convariables->idOcupacion = $autoridad->idOcupacion;
                                $convariables->idEstadoCivil = $autoridad->idEstadoCivil;
                                $convariables->idEscolaridad = $autoridad->idEscolaridad;
                                $convariables->idReligion = $autoridad->idReligion;
                                $convariables->idDomicilio = $conDomiclio->id;
                                $convariables->docIdentificacion = $autoridad->docIdentificacion;
                                $convariables->numDocIdentificacion = $autoridad->numDocIdentificacion;
                                $convariables->lugarTrabajo = $autoridad->lugarTrabajo;
                                $convariables->idDomicilioTrabajo = $conDomiclioT->id;
                                $convariables->telefonoTrabajo = $autoridad->telefonoTrabajo;
                                $convariables->representanteLegal = $autoridad->representanteLegal;
                                $convariables->save();
                                $idvariablesauto=$convariables->id;
                                
                                $conautoridad = new ConExtraAutoridad;
                                $conautoridad->idVariablesPersona = $convariables->id;
                                $conautoridad->antiguedad = $autoridad->antiguedad;
                                $conautoridad->rango = $autoridad->rango;
                                $conautoridad->horarioLaboral = $autoridad->horarioLaboral;
                                //$conautoridad->narracion = $autoridad->autonarracion;
                                $conautoridad->save();
                                $idextraauto=$conautoridad->id;
                                //dd($conautoridad);
                                
                                $narracion=DB::connection('uipj')->table('narracion')->insert([
                                    'idInvolucrado'=>$idextraauto,
                                    'idCarpeta'=>$idCarpetaTurnada,
                                    'tipoInvolucrado'=>3,
                                    'narracion'=>$autoridad->narracion
                                ]);
                                //$narracion->save();
                                //dd($narracion->id);
    
                            }
                        }
    
                        //datos de abogados
                        
    
                        
                        if (count($abogados)>0) {
                            $arrayabogados=array();
                            foreach ($abogados as $abogado) {

                                $conpersona = new ConPersona;
                                $conpersona->nombres = $abogado->nombres;
                                $conpersona->primerAp = $abogado->primerAp;
                                $conpersona->segundoAp = $abogado->segundoAp;
                                $conpersona->fechaNacimiento = $abogado->fechaNacimiento;
                                $conpersona->rfc = $abogado->rfc;
                                $conpersona->curp = $abogado->curp;
                                $conpersona->sexo = $abogado->sexo;
                                $conpersona->idNacionalidad = $abogado->idNacionalidad;
                                $conpersona->idEtnia = $abogado->idEtnia;
                                $conpersona->idLengua = $abogado->idLengua;
                                $conpersona->idMunicipioOrigen = $abogado->idMunicipioOrigen;
                                $conpersona->esEmpresa = $abogado->esEmpresa;
                                $conpersona->save();
                                $idpersonaauto=$conpersona->id;

                                
                                $conDomicilio = new ConDomicilio;
                                $conDomicilio->idMunicipio = $abogado->idMunicipio;
                                $conDomicilio->idLocalidad = $abogado->idLocalidad;
                                $conDomicilio->idColonia = $abogado->idColonia;
                                $conDomicilio->calle = $abogado->calle;
                                $conDomicilio->numExterno = $abogado->numExterno;
                                $conDomicilio->numInterno = $abogado->numInterno;
                                $conDomicilio->save();

                                $conDomicilioT = new ConDomicilio;
                                $conDomicilioT->idMunicipio = $abogado->DT_idMunicipio;
                                $conDomicilioT->idLocalidad = $abogado->DT_idLocalidad;
                                $conDomicilioT->idColonia = $abogado->DT_idColonia;
                                $conDomicilioT->calle = $abogado->DT_calle;
                                $conDomicilioT->numExterno = $abogado->DT_numExterno;
                                $conDomicilioT->numInterno = $abogado->DT_numInterno;
                                $conDomicilioT->save();                               
    
    
                                $convariables = new ConVariablesPersona;
                                $convariables->idCarpeta = $abogado->idCarpeta;
                                $convariables->idPersona = $conpersona->id;
                                $convariables->edad = $abogado->edad;
                                $convariables->telefono = $autoridad->telefono;
                                $convariables->motivoEstancia = 'NO APLICA';
                                $convariables->idOcupacion = $abogado->idOcupacion;
                                $convariables->idEstadoCivil = $abogado->idEstadoCivil;
                                $convariables->idEscolaridad = $abogado->idEscolaridad;
                                $convariables->idReligion = $abogado->idReligion;
                                $convariables->idDomicilio = $conDomiclio->id;
                                $convariables->docIdentificacion = $abogado->docIdentificacion;
                                $convariables->numDocIdentificacion = $abogado->numDocIdentificacion;
                                $convariables->lugarTrabajo = $abogado->lugarTrabajo;
                                $convariables->idDomicilioTrabajo = $conDomiclioT->id;
                                $convariables->telefonoTrabajo = $abogado->telefonoTrabajo;
                                $convariables->representanteLegal = $abogado->representanteLegal;
                                $convariables->save();
                                $idvariablesauto=$convariables->id;
                                
                                $conabogado = new ConExtraAbogado;
                                $conabogado->idVariablesPersona = $convariables->id;
                                $conabogado->cedulaProf = $abogado->cedulaProf;
                                $conabogado->sector = $abogado->sector;
                                $conabogado->correo = $abogado->correo;
                                $conabogado->tipo = $abogado->tipo;


                                $conabogado->save();
                                $idextraabogado=$conabogado->id;
                             
                                array_push($arrayabogados,array('iduat'=>$abogado->id,'idnuevo'=>$conabogado->id));
                                
    
                            }
                        }
                        
                        /****DATOS DEL DENUNCIADO******/
    
    
                        if (count($denunciados)>0) {
                            $arraydenunciado=array();
                            foreach ($denunciados as $denunciado) {
                                $conpersona = new ConPersona;
                                $conpersona->nombres = $denunciado->pernombres;
                                $conpersona->primerAp = $denunciado->perprimerAp;
                                $conpersona->segundoAp = $denunciado->persegundoAp;
                                $conpersona->fechaNacimiento = $denunciado->perfechaNacimiento;
                                $conpersona->rfc = $denunciado->perrfc;
                                $conpersona->curp = $denunciado->percurp;
                                $conpersona->sexo = $denunciado->persexo;
                                $conpersona->idNacionalidad = $denunciado->peridNacionalidad;
                                $conpersona->idEtnia = $denunciado->peridEtnia;
                                $conpersona->idLengua = $denunciado->peridLengua;
                                $conpersona->idMunicipioOrigen = $denunciado->peridMunicipioOrigen;
                                $conpersona->esEmpresa = $denunciado->peresEmpresa;
                                $conpersona->save();
                                $idpersonadenunciado=$conpersona->id;
                    
                                $conDomicilio = new ConDomicilio;
                                $conDomicilio->idMunicipio = $denunciado->domicilioMunicipio;
                                $conDomicilio->idLocalidad = $denunciado->domicilioLocalidad;
                                $conDomicilio->idColonia = $denunciado->domicilioColonia;
                                $conDomicilio->calle = $denunciado->domicilioCalle;
                                $conDomicilio->numExterno = $denunciado->domicilioNumExterno;
                                $conDomicilio->numInterno = $denunciado->domicilioNumInterno;
                                $conDomicilio->save();

                                $conDomicilioT = new ConDomicilio;
                                $conDomicilioT->idMunicipio = $denunciado->TrabajoMunicipio;
                                $conDomicilioT->idLocalidad = $denunciado->TrabajoLocalidad;
                                $conDomicilioT->idColonia = $denunciado->TrabajoColonia;
                                $conDomicilioT->calle = $denunciado->TrabajoCalle;
                                $conDomicilioT->numExterno = $denunciado->TrabajoNumExterno;
                                $conDomicilioT->numInterno = $denunciado->TrabajoNumInterno;
                                $conDomicilioT->save();                               
    
                                $conDomicilioN = new ConDomicilio;
                                $conDomicilioN->idMunicipio = $denunciado->notifiMunicipio;
                                $conDomicilioN->idLocalidad = $denunciado->notifiLocalidad;
                                $conDomicilioN->idColonia = $denunciado->notifiColonia;
                                $conDomicilioN->calle = $denunciado->notifiCalle;
                                $conDomicilioN->numExterno = $denunciado->notifiNumExterno;
                                $conDomicilioN->numInterno = $denunciado->notifiNumInterno;
                                $conDomicilioN->save();                               

                                $convariables = new ConVariablesPersona;
                                $convariables->idCarpeta = $idCarpetaTurnada;
                                $convariables->idPersona = $idpersonadenunciado;
                                $convariables->edad = $denunciado->variaedad;
                                $convariables->telefono = $denunciado->variatelefono;
                                $convariables->motivoEstancia = 'SIN INFORMACION';
                                $convariables->idOcupacion = $denunciado->variaidOcupacion;
                                $convariables->idEstadoCivil = $denunciado->variaidEstadoCivil;
                                $convariables->idEscolaridad = $denunciado->variaidEscolaridad;
                                $convariables->idReligion = $denunciado->variaidReligion;
                                $convariables->idDomicilio = $conDomicilio->id;
                                $convariables->docIdentificacion = $denunciado->variadocIdentificacion;
                                $convariables->numDocIdentificacion = $denunciado->varianumDocIdentificacion;
                                $convariables->lugarTrabajo = $denunciado->varialugarTrabajo;
                                $convariables->idDomicilioTrabajo = $conDomicilioT->id;
                                $convariables->telefonoTrabajo = $denunciado->variatelefonoTrabajo;
                                $convariables->representanteLegal = $denunciado->variarepresentanteLegal;
                                $convariables->save();
                                $idvariablesabo=$convariables->id;
                                
                                $conNotifi = new ConNotificacion;
                                $conNotifi->idDomicilio = $conDomicilioN->id;
                                $conNotifi->correo = $denunciado->notificorreo;
                                $conNotifi->telefono = $denunciado->notifitelefono;
                                // $conNotifi->fax = $denunciado->notififax;
                                $conNotifi->save();
                                $idnotificon=$conNotifi->id;
    
                                $condenunciado = new ConExtraDenunciado;
                                $condenunciado->idVariablesPersona = $idvariablesabo;
                                $condenunciado->idNotificacion = $idnotificon;
                                $condenunciado->idPuesto = $denunciado->denunciadoidPuesto;
                                $condenunciado->alias = $denunciado->denunciadoalias;
                                $condenunciado->senasPartic = $denunciado->denunciadosenasPartic;
                                $condenunciado->ingreso = $denunciado->denunciadoingreso;
                                $condenunciado->periodoIngreso = $denunciado->denunciadoperiodoIngreso;
                                $condenunciado->residenciaAnterior = $denunciado->denunciadoresidenciaAnterior;
                                if (is_null($denunciado->denunciadoidAbogado)) {
                                    $condenunciado->idAbogado=null;
                                } else {
                                    for($cont=0; $cont<count($arrayabogados); $cont++){
                                        if($arrayabogados[$cont]['iduat'] == $denunciado->denunciadoidAbogado){
                                            $condenunciado->idAbogado = $arrayabogados[$cont]['idnuevo'];
                                            break;
                                        }
                                    }
                                }
                                
                                $condenunciado->personasBajoSuGuarda = $denunciado->denunciadopersonasBajoSuGuarda;
                                $condenunciado->perseguidoPenalmente = $denunciado->denunciadoperseguidoPenalmente;
                                $condenunciado->vestimenta = $denunciado->denunciadovestimenta;
                                $condenunciado->save();
                                $idextra=$condenunciado->id;
                                //dd($condenunciado);
                                $narracion=DB::connection('uipj')->table('narracion')->insert([
                                    'idInvolucrado'=>$idextra,
                                    'idCarpeta'=>$idCarpetaTurnada,
                                    'tipoInvolucrado'=>2,
                                    'narracion'=>$denunciado->denunciadonarracion
                                ]);
                                //$narracion->save();
                                //dd($narracion->id);
                                array_push($arraydenunciado,array('iduat'=>$denunciado->denunciadoid,'idnuevo'=>$condenunciado->id));
                                
                                //dd($arraydenunciado);
    
                            }
                        }
                        
                        /****DATOS DEL DENUNCIANTE******/
    
                        
                        if (count($denunciantes)>0) {
                            $arraydenunciante=array();
                            foreach ($denunciantes as $denunciante) {
                                $conpersona = new ConPersona;
                                $conpersona->nombres = $denunciante->pernombres;
                                $conpersona->primerAp = $denunciante->perprimerAp;
                                $conpersona->segundoAp = $denunciante->persegundoAp;
                                $conpersona->fechaNacimiento = $denunciante->perfechaNacimiento;
                                $conpersona->rfc = $denunciante->perrfc;
                                $conpersona->curp = $denunciante->percurp;
                                $conpersona->sexo = $denunciante->persexo;
                                $conpersona->idNacionalidad = $denunciante->peridNacionalidad;
                                $conpersona->idEtnia = $denunciante->peridEtnia;
                                $conpersona->idLengua = $denunciante->peridLengua;
                                $conpersona->idMunicipioOrigen = $denunciante->peridMunicipioOrigen;
                                $conpersona->esEmpresa = $denunciante->peresEmpresa;
                                $conpersona->save();
                                $idpersonadenuncianate=$conpersona->id;
                                
                                $conDomicilio = new ConDomicilio;
                                $conDomicilio->idMunicipio = $denunciado->domicilioMunicipio;
                                $conDomicilio->idLocalidad = $denunciado->domicilioLocalidad;
                                $conDomicilio->idColonia = $denunciado->domicilioColonia;
                                $conDomicilio->calle = $denunciado->domicilioCalle;
                                $conDomicilio->numExterno = $denunciado->domicilioNumExterno;
                                $conDomicilio->numInterno = $denunciado->domicilioNumInterno;
                                $conDomicilio->save();

                                $conDomicilioT = new ConDomicilio;
                                $conDomicilioT->idMunicipio = $denunciado->TrabajoMunicipio;
                                $conDomicilioT->idLocalidad = $denunciado->TrabajoLocalidad;
                                $conDomicilioT->idColonia = $denunciado->TrabajoColonia;
                                $conDomicilioT->calle = $denunciado->TrabajoCalle;
                                $conDomicilioT->numExterno = $denunciado->TrabajoNumExterno;
                                $conDomicilioT->numInterno = $denunciado->TrabajoNumInterno;
                                $conDomicilioT->save();                               
    
                                $conDomicilioN = new ConDomicilio;
                                $conDomicilioN->idMunicipio = $denunciado->notifiMunicipio;
                                $conDomicilioN->idLocalidad = $denunciado->notifiLocalidad;
                                $conDomicilioN->idColonia = $denunciado->notifiColonia;
                                $conDomicilioN->calle = $denunciado->notifiCalle;
                                $conDomicilioN->numExterno = $denunciado->notifiNumExterno;
                                $conDomicilioN->numInterno = $denunciado->notifiNumInterno;
                                $conDomicilioN->save();                               
                                
                                $convariables = new ConVariablesPersona;
                                $convariables->idCarpeta = $idCarpetaTurnada;
                                $convariables->idPersona = $idpersonadenuncianate;
                                $convariables->edad = $denunciante->variaedad;
                                $convariables->telefono = $denunciante->variatelefono;
                                $convariables->motivoEstancia ='SIN INFORMACION';
                                $convariables->idOcupacion = $denunciante->variaidOcupacion;
                                $convariables->idEstadoCivil = $denunciante->variaidEstadoCivil;
                                $convariables->idEscolaridad = $denunciante->variaidEscolaridad;
                                $convariables->idReligion = $denunciante->variaidReligion;
                                $convariables->idDomicilio = $conDomicilio->id;
                                $convariables->docIdentificacion = $denunciante->variadocIdentificacion;
                                $convariables->numDocIdentificacion = $denunciante->varianumDocIdentificacion;
                                $convariables->lugarTrabajo = $denunciante->varialugarTrabajo;
                                $convariables->idDomicilioTrabajo = $conDomicilioT->id;
                                $convariables->telefonoTrabajo = $denunciante->variatelefonoTrabajo;
                                $convariables->representanteLegal = $denunciante->variarepresentanteLegal;
                                $convariables->save();
                                $idvariablesabo=$convariables->id;
                                
                                $conNotifi = new ConNotificacion;
                                $conNotifi->idDomicilio = $conDomicilioN->id;
                                $conNotifi->correo = $denunciante->notificorreo;
                                $conNotifi->telefono = $denunciante->notifitelefono;
                                // $conNotifi->fax = $denunciante->notififax;
                                $conNotifi->save();
                                $idnotificon=$conNotifi->id;
    
                                $condenunciante = new ConExtraDenunciante;
                                $condenunciante->idVariablesPersona = $idvariablesabo;
                                $condenunciante->idNotificacion = $idnotificon;
                                if (is_null($denunciado->denunciadoidAbogado)) {
                                    $condenunciante->idAbogado=null;
                                } else {
                                    for($cont=0; $cont<count($arrayabogados); $cont++){
                                        if($arrayabogados[$cont]['iduat'] == $denunciante->denuncianteidAbogado){
                                            $condenunciante->idAbogado = $arrayabogados[$cont]['idnuevo'];
                                            break;
                                        }
                                    }
                                }
                                $condenunciante->identidadResguarda = $denunciante->denunciantereguardarIdentidad;
                                $condenunciante->esVictima = $denunciante->denunciantevictima;
                                $condenunciante->save();
                                $idextra=$condenunciante->id;
                                //dd($condenunciante);
    
                                $narracion=DB::connection('uipj')->table('narracion')->insert([
                                    'idInvolucrado'=>$idextra,
                                    'idCarpeta'=>$idCarpetaTurnada,
                                    'tipoInvolucrado'=>1,
                                    'narracion'=>$denunciante->denunciantenarracion
                                ]);
                                array_push($arraydenunciante,array('iduat'=>$denunciante->denuncianteid,'idnuevo'=>$condenunciante->id));
                                // dd($arraydenunciante);
                            }
    
                        }
                        
                        
    
                        foreach ($acusaciones as $acusacion) {
                            $conacusacion= new ConAcusacion;
                            $conacusacion->idCarpeta=$idCarpetaTurnada;
                            for($cont=0; $cont<count($arraydelitos); $cont++){
                                if($arraydelitos[$cont]['iduat'] == $acusacion->idTipifDelito){
                                    $conacusacion->idTipifDelito = $arraydelitos[$cont]['idnuevo'];
                                    break;
                                }
                            }
                            for($cont=0; $cont<count($arraydenunciado); $cont++){
                                if($arraydenunciado[$cont]['iduat'] == $acusacion->idDenunciado){
                                    $conacusacion->idDenunciado = $arraydenunciado[$cont]['idnuevo'];
                                    break;
                                }
                            }
                            for($cont=0; $cont<count($arraydenunciante); $cont++){
                                if($arraydenunciante[$cont]['iduat'] == $acusacion->idDenunciante){
                                    $conacusacion->idDenunciante = $arraydenunciante[$cont]['idnuevo'];
                                    break;
                                }
                            }
                            $conacusacion->save();
    
                        
                        }
                        
                        DB::commit();
                        session()->forget('terminada');
                        session()->forget('numCarpeta');
                        session()->forget('carpeta');
                        Alert::success('La carpeta con número '.$carpeta->numCarpeta.' ha sido turnada con éxito','Hecho')->persistent('Aceptar');
                        return redirect(route('indexcarpetas'));
                    }catch (\PDOException $e){
                        DB::rollBack();
                        Alert::error('Se presentó un problema al guardar los datos, intente de nuevo', 'Error');
                        return back()->withInput();
                    }
                    
                    break;
                
                case '4':
                    $id = Carpeta::find($idCarpeta); //seleccinar toda la fila del primer id con  el valor de idCarpeta 
                    $id->idEstadoCarpeta = $request->EstadoCarpeta;  //cambiar el campo idEstadpCarpeta por el valor $nombre
                    $id->observacionesEstatus = $request->narracion;  
                    $id->idTipoDeterminacion = $request->selectArchivo;  
                    $id->save();   // para guardar el registro
                    
                    $idCarpetaAux=$idCarpeta;
                    $motivo=$id->observacionesEstatus;
                    $numCarpetaAux=$id->numCarpeta;
                    
                    $historial= new HistorialCarpeta;
                    $historial->idCarpeta = $idCarpetaAux;
                    $historial->idEstatusCarpeta = 4;
                    $historial->observacion = $motivo;
                    $historial->numCarpeta = $numCarpetaAux;
                    $historial->idTipoDeterminacion = 5;
                    $historial->fiscal = Auth::user()->nombreC;
                    $historial->fecha = Carbon::now();
                    $historial->save();
                   
                    break;
                case '5':
                    $id = Carpeta::find($idCarpeta); //seleccinar toda la fila del primer id con  el valor de idCarpeta 
                    //$id->idEstadoCarpeta = $request->EstadoCarpeta;  //cambiar el campo idEstadpCarpeta por el valor $nombre
                    $id->observacionesEstatus = $request->narracion;  
                    $id->idFiscal = $request->selectFiscal;  
                    $id->save(); 

                    $idCarpetaAux=$idCarpeta;
                    $motivo=$id->observacionesEstatus;
                    $numCarpetaAux=$id->numCarpeta;

                    $historial= new HistorialCarpeta;
                    $historial->idCarpeta = $idCarpetaAux;
                    $historial->idEstatusCarpeta = 5;
                    $historial->observacion = $motivo;
                    $historial->numCarpeta = $numCarpetaAux;
                    $historial->idTipoDeterminacion = 5;
                    $historial->fiscal = Auth::user()->nombreC;
                    $historial->fecha = Carbon::now();
                    $historial->save();
                break;
                
                default:
                    break;
            }


                // DB::commit();
                session()->forget('terminada');
                session()->forget('numCarpeta');
                session()->forget('carpeta');
                Alert::success('Registro modificado con éxito','Hecho');
                
                return redirect(route('indexcarpetas'));
                //return back();

        // }catch (\PDOException $e){
        //     DB::rollBack();
        //     Alert::error('Se presentó un problema al guardar su los datos, intente de nuevo', 'Error');
        //     return back()->withInput();
        // }
    
  
   

       }


}



