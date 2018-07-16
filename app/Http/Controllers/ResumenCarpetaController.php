<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carpeta;
use DB;
use Carbon\Carbon;

use App\Models\Persona;
use Illuminate\Support\Facades\Auth;

use App\Models\VariablesPersona;
class ResumenCarpetaController extends Controller

{
    public function showForm($id){   
        session(['carpeta' => $id]);
        $numcarpeta=Carpeta::where('id',$id)->first();
        $estado=$numcarpeta->idEstadoCarpeta;
        $numcarpeta=$numcarpeta->numCarpeta;
        // dd($numcarpeta);
        // dd($numcarpeta);
        if (is_null($estado)) {
            session(['numCarpeta' => $numcarpeta]);
            return redirect(route('new.denunciante'));
        } else {
            session(['terminada' => $numcarpeta]);
            return redirect(route('carpeta.detalle'));
        }
        
    }

    public function showFormReserva($id){   
        $unidad=DB::table('unidad')->where('id',Auth::user()->idUnidad)->first();
        $unidad=$unidad->abreviacion;

        $NuevoNumCarpeta = $unidad."/1/".Carbon::now()->year."-".Auth::user()->numFiscal;
        $buscarConsecutivo = Carpeta::where('numCarpeta',$NuevoNumCarpeta)->get();
        while ($buscarConsecutivo->isNotEmpty()) {
            $buscarConsecutivo=$buscarConsecutivo[0];
            $partesNumero=explode("/", $buscarConsecutivo->numCarpeta);
            // dd($buscarConsecutivo);
            $consecutivo=$partesNumero[2] + 1;
            $NuevoNumCarpeta = $partesNumero[0].'/'.$partesNumero[1].'/'.$consecutivo.'/'.$partesNumero[3];                
            $buscarConsecutivo = Carpeta::where('numCarpeta',$NuevoNumCarpeta)->get();
        }
        
        $numcarpeta=Carpeta::find($id);
        $numcarpeta->numCarpeta=$NuevoNumCarpeta;
        $numcarpeta->save();
        $idCarpeta=$numcarpeta->id;
        $estado=$numcarpeta->idEstadoCarpeta;
        $numcarpeta=$numcarpeta->numCarpeta;
        
        session(['carpeta' => $idCarpeta]);
        
        // dd($numcarpeta);
        // dd($numcarpeta);
        if (is_null($estado)) {
            session(['numCarpeta' => $numcarpeta]);
            return redirect(route('new.denunciante'));
        } else {
            session(['terminada' => $numcarpeta]);
            return redirect(route('carpeta.detalle'));
        }
        
    }

    public function showResumen(){
        $idCarpeta=session('carpeta');
        $carpeta=DB::table('carpeta')
        ->join('unidad','carpeta.idUnidad','=','unidad.id')
        ->where('carpeta.id',$idCarpeta)->first();
        // dd($carpeta);
        return view('fields.resumen-carpeta.resumen-carpeta')->with('carpeta',$carpeta);
    }
    
    public function detalleHistorial(){
        $idCarpeta=session('carpeta');
        $carpetas=DB::table('historial_carpeta')
        ->join('cat_estatus_casos','historial_carpeta.idEstatusCarpeta','=','cat_estatus_casos.id')
        ->join('carpeta','carpeta.id','=','historial_carpeta.idCarpeta')
        ->join('cat_tipo_determinacion','cat_tipo_determinacion.id','=','historial_carpeta.idTipoDeterminacion')
        ->join('unidad','carpeta.idUnidad','=','unidad.id')
        ->where('carpeta.id',$idCarpeta)
        ->select('historial_carpeta.fecha as fecha',
            'historial_carpeta.fiscal as fiscal',
            'historial_carpeta.numCarpeta as numCarpeta',
            'historial_carpeta.observacion as observacion',
            'cat_estatus_casos.nombreEstatus as estatus',
            'cat_tipo_determinacion.nombre as determinacion',
            'unidad.descripcion as unidad')
        ->paginate(10);
        // ->first();
        // dd($carpetas);
        return view('fields.resumen-carpeta.historialCarpeta')->with('carpetas',$carpetas);
    }

    public function detalleDenunciante(){
        $idCarpeta=session('carpeta');
        // dd($idCarpeta);
        if(is_null($idCarpeta)){
            return redirect(route('indexcarpetas'));
        }else{

            $carpeta=DB::table('carpeta')
            ->join('unidad','carpeta.idUnidad','=','unidad.id')
            ->where('carpeta.id',$idCarpeta)->first();
            
            $denunciantes=DB::table('extra_denunciante')
                ->join('dirnotificacion','dirnotificacion.id','=','extra_denunciante.idNotificacion')
                ->join('domicilio as notificacion','dirnotificacion.idDomicilio','=','notificacion.id')
                ->join('cat_municipio as cat_municipio_notificacion','cat_municipio_notificacion.id','=','notificacion.idMunicipio')
                ->join('cat_estado as cat_estado_notificacion','cat_estado_notificacion.id','=','cat_municipio_notificacion.idEstado')
                ->join('cat_localidad as cat_localidad_notificacion','cat_localidad_notificacion.id','=','notificacion.idLocalidad')
                ->join('cat_colonia as cat_colonia_notificacion','cat_colonia_notificacion.id','=','notificacion.idColonia')
                
                ->join('variables_persona','variables_persona.id','=','extra_denunciante.idVariablesPersona')
                ->join('cat_ocupacion','cat_ocupacion.id','=','variables_persona.idOcupacion')
                ->join('cat_estado_civil','cat_estado_civil.id','=','variables_persona.idEstadoCivil')
                ->join('cat_escolaridad','cat_escolaridad.id','=','variables_persona.idEscolaridad')
                ->join('cat_religion','cat_religion.id','=','variables_persona.idReligion')
                
                ->join('domicilio','variables_persona.idDomicilio','=','domicilio.id')
                ->join('cat_municipio','cat_municipio.id','=','domicilio.idMunicipio')
                ->join('cat_estado','cat_estado.id','=','cat_municipio.idEstado')
                ->join('cat_localidad','cat_localidad.id','=','domicilio.idLocalidad')
                ->join('cat_colonia','cat_colonia.id','=','domicilio.idColonia')
                
                ->join('domicilio as trabajo','variables_persona.idDomicilioTrabajo','=','trabajo.id')
                ->join('cat_municipio as cat_municipio_trabajo','cat_municipio_trabajo.id','=','trabajo.idMunicipio')
                ->join('cat_estado as cat_estado_trabajo','cat_estado_trabajo.id','=','cat_municipio_trabajo.idEstado')
                ->leftJoin('cat_localidad as cat_localidad_trabajo','cat_localidad_trabajo.id','=','trabajo.idLocalidad')
                ->leftJoin('cat_colonia as cat_colonia_trabajo','cat_colonia_trabajo.id','=','trabajo.idColonia')
                
                ->join('persona','variables_persona.idPersona','=','persona.id')
                ->join('cat_etnia','cat_etnia.id','=','persona.idEtnia')
                ->join('cat_lengua','cat_lengua.id','=','persona.idLengua')
                ->join('cat_nacionalidad','cat_nacionalidad.id','=','persona.idNacionalidad')
                ->join('cat_municipio as cat_municipio_origen','cat_municipio_origen.id','=','persona.idMunicipioOrigen')
                ->join('cat_estado as cat_estado_origen','cat_estado_origen.id','=','cat_municipio_origen.idEstado')
                ->where('variables_persona.idCarpeta',$idCarpeta)
                ->select(       
                    'persona.nombres as pernombres',
                    'persona.primerAp as perprimerAp',
                    'persona.segundoAp as persegundoAp',
                    'persona.fechaNacimiento as perfechaNacimiento',
                    'persona.rfc as perrfc',
                    'persona.curp as percurp',
                    'persona.sexo as persexo',
                    'cat_etnia.nombre as peridEtnia',
                    'cat_lengua.nombre as peridLengua',
                    'cat_nacionalidad.nombre as peridNacionalidad',
                    'cat_municipio_origen.nombre as peridMunicipioOrigen',
                    'cat_estado_origen.nombre as peridEstadoOrigen',
                    'persona.esEmpresa as peresEmpresa',
                    
                    'variables_persona.id as variaid',
                    'variables_persona.idPersona as variaidPersona',
                    'variables_persona.edad as variaedad',
                    'variables_persona.telefono as variatelefono',
                    // 'variables_persona.motivoEstancia as variamotivoEstancia',
                    'cat_ocupacion.nombre as variaidOcupacion',
                    'cat_estado_civil.nombre as variaidEstadoCivil',
                    'cat_escolaridad.nombre as variaidEscolaridad',
                    'cat_religion.nombre as variaidReligion',
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
                    'cat_municipio.nombre as domicilioMunicipio',
                    'cat_estado.nombre as domicilioEstado',
                    'cat_localidad.nombre as domicilioLocalidad',
                    'cat_colonia.nombre as domicilioColonia',
                    'cat_colonia.codigoPostal as domicilioCp',
                    'domicilio.calle as domicilioCalle',
                    'domicilio.numExterno as domicilioNumExterno',
                    'domicilio.numInterno as domicilioNumInterno',
    
                    'trabajo.id as domicilioTrabajoid',
                    'cat_municipio_trabajo.nombre as TrabajoMunicipio',
                    'cat_estado_trabajo.nombre as TrabajoEstado',
                    'cat_localidad_trabajo.nombre as TrabajoLocalidad',
                    'cat_colonia_trabajo.nombre as TrabajoColonia',
                    'cat_colonia_trabajo.codigoPostal as TrabajoCp',
                    'trabajo.calle as TrabajoCalle',
                    'trabajo.numExterno as TrabajoNumExterno',
                    'trabajo.numInterno as TrabajoNumInterno',
    
                    'notificacion.id as domicilioNotifiId',
                    'cat_municipio_notificacion.nombre as notifiMunicipio',
                    'cat_estado_notificacion.nombre as notifiEstado',
                    'cat_localidad_notificacion.nombre as notifiLocalidad',
                    'cat_colonia_notificacion.nombre as notifiColonia',
                    'cat_colonia_notificacion.codigoPostal as notifiCp',
                    'notificacion.calle as notifiCalle',
                    'notificacion.numExterno as notifiNumExterno',
                    'notificacion.numInterno as notifiNumInterno')
                ->get();
                
            // dd($denunciantes);
    
            return view('fields.resumen-carpeta.resumen-denunciante')
            ->with('denunciantes',$denunciantes)
            ->with('carpeta',$carpeta);
        }
    }
    
    public function detalleDenunciado(){
        $idCarpeta=session('carpeta');
        // dd($idCarpeta);
        if(is_null($idCarpeta)){
            return redirect(route('indexcarpetas'));
        }else{

            $carpeta=DB::table('carpeta')
            ->join('unidad','carpeta.idUnidad','=','unidad.id')
            ->where('carpeta.id',$idCarpeta)->first();
            
            $denunciados=DB::table('extra_denunciado')
                ->leftJoin('dirnotificacion','dirnotificacion.id','=','extra_denunciado.idNotificacion')
                ->leftJoin('domicilio as notificacion','dirnotificacion.idDomicilio','=','notificacion.id')
                ->leftJoin('cat_municipio as cat_municipio_notificacion','cat_municipio_notificacion.id','=','notificacion.idMunicipio')
                ->leftJoin('cat_estado as cat_estado_notificacion','cat_estado_notificacion.id','=','cat_municipio_notificacion.idEstado')
                ->leftJoin('cat_localidad as cat_localidad_notificacion','cat_localidad_notificacion.id','=','notificacion.idLocalidad')
                ->leftJoin('cat_colonia as cat_colonia_notificacion','cat_colonia_notificacion.id','=','notificacion.idColonia')
                
                ->leftJoin('variables_persona','variables_persona.id','=','extra_denunciado.idVariablesPersona')
                ->leftJoin('cat_ocupacion','cat_ocupacion.id','=','variables_persona.idOcupacion')
                ->leftJoin('cat_estado_civil','cat_estado_civil.id','=','variables_persona.idEstadoCivil')
                ->leftJoin('cat_escolaridad','cat_escolaridad.id','=','variables_persona.idEscolaridad')
                ->leftJoin('cat_religion','cat_religion.id','=','variables_persona.idReligion')
                
                ->leftJoin('domicilio','variables_persona.idDomicilio','=','domicilio.id')
                ->leftJoin('cat_municipio','cat_municipio.id','=','domicilio.idMunicipio')
                ->leftJoin('cat_estado','cat_estado.id','=','cat_municipio.idEstado')
                ->leftJoin('cat_localidad','cat_localidad.id','=','domicilio.idLocalidad')
                ->leftJoin('cat_colonia','cat_colonia.id','=','domicilio.idColonia')
                
                ->leftJoin('domicilio as trabajo','variables_persona.idDomicilioTrabajo','=','trabajo.id')
                ->leftJoin('cat_municipio as cat_municipio_trabajo','cat_municipio_trabajo.id','=','trabajo.idMunicipio')
                ->leftJoin('cat_estado as cat_estado_trabajo','cat_estado_trabajo.id','=','cat_municipio_trabajo.idEstado')
                ->leftJoin('cat_localidad as cat_localidad_trabajo','cat_localidad_trabajo.id','=','trabajo.idLocalidad')
                ->leftJoin('cat_colonia as cat_colonia_trabajo','cat_colonia_trabajo.id','=','trabajo.idColonia')
                
                ->leftJoin('persona','variables_persona.idPersona','=','persona.id')
                ->leftJoin('cat_etnia','cat_etnia.id','=','persona.idEtnia')
                ->leftJoin('cat_lengua','cat_lengua.id','=','persona.idLengua')
                ->leftJoin('cat_nacionalidad','cat_nacionalidad.id','=','persona.idNacionalidad')
                ->leftJoin('cat_municipio as cat_municipio_origen','cat_municipio_origen.id','=','persona.idMunicipioOrigen')
                ->leftJoin('cat_estado as cat_estado_origen','cat_estado_origen.id','=','cat_municipio_origen.idEstado')
                ->where('variables_persona.idCarpeta',$idCarpeta)
                ->select(       
                    'persona.nombres as pernombres',
                    'persona.primerAp as perprimerAp',
                    'persona.segundoAp as persegundoAp',
                    'persona.fechaNacimiento as perfechaNacimiento',
                    'persona.rfc as perrfc',
                    'persona.curp as percurp',
                    'persona.sexo as persexo',
                    'cat_etnia.nombre as peridEtnia',
                    'cat_lengua.nombre as peridLengua',
                    'cat_nacionalidad.nombre as peridNacionalidad',
                    'cat_municipio_origen.nombre as peridMunicipioOrigen',
                    'cat_estado_origen.nombre as peridEstadoOrigen',
                    'persona.esEmpresa as peresEmpresa',
                    
                    'variables_persona.id as variaid',
                    'variables_persona.idPersona as variaidPersona',
                    'variables_persona.edad as variaedad',
                    'variables_persona.telefono as variatelefono',
                    'cat_ocupacion.nombre as variaidOcupacion',
                    'cat_estado_civil.nombre as variaidEstadoCivil',
                    'cat_escolaridad.nombre as variaidEscolaridad',
                    'cat_religion.nombre as variaidReligion',
                    'variables_persona.idDomicilio as variaidDomicilio',
                    'variables_persona.docIdentificacion as variadocIdentificacion',
                    'variables_persona.numDocIdentificacion as varianumDocIdentificacion',
                    'variables_persona.lugarTrabajo as varialugarTrabajo',
                    'variables_persona.idDomicilioTrabajo as variaidDomicilioTrabajo',
                    'variables_persona.telefonoTrabajo as variatelefonoTrabajo',
                    'variables_persona.representanteLegal as variarepresentanteLegal',
                    
                    'extra_denunciado.id as denunciadoid',
                    'extra_denunciado.idNotificacion as denunciadoidNotificacion',
                    'extra_denunciado.alias as denunciadoalias',
                    'extra_denunciado.senasPartic as denunciadosenasPartic',
                    'extra_denunciado.ingreso as denunciadoingreso',
                    'extra_denunciado.periodoIngreso as denunciadoperiodoIngreso',
                    'extra_denunciado.residenciaAnterior as denunciadoresidenciaAnterior',
                    'extra_denunciado.idAbogado as denunciadoidAbogado',
                    'extra_denunciado.vestimenta as denunciadovestimenta',
                    'extra_denunciado.narracion as denunciadonarracion',

                    'dirnotificacion.idDomicilio as notifiidDomicilio',
                    'dirnotificacion.correo as notificorreo',
                    'dirnotificacion.telefono as notifitelefono',
    
                    'domicilio.id as domicilioid',
                    'cat_municipio.nombre as domicilioMunicipio',
                    'cat_estado.nombre as domicilioEstado',
                    'cat_localidad.nombre as domicilioLocalidad',
                    'cat_colonia.nombre as domicilioColonia',
                    'cat_colonia.codigoPostal as domicilioCp',
                    'domicilio.calle as domicilioCalle',
                    'domicilio.numExterno as domicilioNumExterno',
                    'domicilio.numInterno as domicilioNumInterno',
    
                    'trabajo.id as domicilioTrabajoid',
                    'cat_municipio_trabajo.nombre as TrabajoMunicipio',
                    'cat_estado_trabajo.nombre as TrabajoEstado',
                    'cat_localidad_trabajo.nombre as TrabajoLocalidad',
                    'cat_colonia_trabajo.nombre as TrabajoColonia',
                    'cat_colonia_trabajo.codigoPostal as TrabajoCp',
                    'trabajo.calle as TrabajoCalle',
                    'trabajo.numExterno as TrabajoNumExterno',
                    'trabajo.numInterno as TrabajoNumInterno',
    
                    'notificacion.id as domicilioNotifiId',
                    'cat_municipio_notificacion.nombre as notifiMunicipio',
                    'cat_estado_notificacion.nombre as notifiEstado',
                    'cat_localidad_notificacion.nombre as notifiLocalidad',
                    'cat_colonia_notificacion.nombre as notifiColonia',
                    'cat_colonia_notificacion.codigoPostal as notifiCp',
                    'notificacion.calle as notifiCalle',
                    'notificacion.numExterno as notifiNumExterno',
                    'notificacion.numInterno as notifiNumInterno')
                ->get();
                
            // dd($denunciados);
    
            return view('fields.resumen-carpeta.resumen-denunciado')
            ->with('denunciados',$denunciados)
            ->with('carpeta',$carpeta);
        }
    }

    public function detalleAutoridad(){
        $idCarpeta=session('carpeta');
        // dd($idCarpeta);
        if(is_null($idCarpeta)){
            return redirect(route('indexcarpetas'));
        }else{

            $carpeta=DB::table('carpeta')
            ->join('unidad','carpeta.idUnidad','=','unidad.id')
            ->where('carpeta.id',$idCarpeta)->first();
            
            $autoridades=DB::table('extra_autoridad')
                ->join('variables_persona','variables_persona.id','=','extra_autoridad.idVariablesPersona')
                ->join('cat_ocupacion','cat_ocupacion.id','=','variables_persona.idOcupacion')
                ->join('cat_estado_civil','cat_estado_civil.id','=','variables_persona.idEstadoCivil')
                ->join('cat_escolaridad','cat_escolaridad.id','=','variables_persona.idEscolaridad')
                ->join('cat_religion','cat_religion.id','=','variables_persona.idReligion')
                
                ->join('domicilio','variables_persona.idDomicilio','=','domicilio.id')
                ->join('cat_municipio','cat_municipio.id','=','domicilio.idMunicipio')
                ->join('cat_estado','cat_estado.id','=','cat_municipio.idEstado')
                ->join('cat_localidad','cat_localidad.id','=','domicilio.idLocalidad')
                ->join('cat_colonia','cat_colonia.id','=','domicilio.idColonia')
                
                ->join('domicilio as trabajo','variables_persona.idDomicilioTrabajo','=','trabajo.id')
                ->join('cat_municipio as cat_municipio_trabajo','cat_municipio_trabajo.id','=','trabajo.idMunicipio')
                ->join('cat_estado as cat_estado_trabajo','cat_estado_trabajo.id','=','cat_municipio_trabajo.idEstado')
                ->leftJoin('cat_localidad as cat_localidad_trabajo','cat_localidad_trabajo.id','=','trabajo.idLocalidad')
                ->leftJoin('cat_colonia as cat_colonia_trabajo','cat_colonia_trabajo.id','=','trabajo.idColonia')
                
                ->join('persona','variables_persona.idPersona','=','persona.id')
                ->join('cat_etnia','cat_etnia.id','=','persona.idEtnia')
                ->join('cat_lengua','cat_lengua.id','=','persona.idLengua')
                ->join('cat_nacionalidad','cat_nacionalidad.id','=','persona.idNacionalidad')
                ->join('cat_municipio as cat_municipio_origen','cat_municipio_origen.id','=','persona.idMunicipioOrigen')
                ->join('cat_estado as cat_estado_origen','cat_estado_origen.id','=','cat_municipio_origen.idEstado')
                ->where('variables_persona.idCarpeta',$idCarpeta)
                ->select(       
                    'persona.nombres as pernombres',
                    'persona.primerAp as perprimerAp',
                    'persona.segundoAp as persegundoAp',
                    'persona.fechaNacimiento as perfechaNacimiento',
                    'persona.rfc as perrfc',
                    'persona.curp as percurp',
                    'persona.sexo as persexo',
                    'cat_etnia.nombre as peridEtnia',
                    'cat_lengua.nombre as peridLengua',
                    'cat_nacionalidad.nombre as peridNacionalidad',
                    'cat_municipio_origen.nombre as peridMunicipioOrigen',
                    'cat_estado_origen.nombre as peridEstadoOrigen',
                    'persona.esEmpresa as peresEmpresa',
                    
                    'variables_persona.id as variaid',
                    'variables_persona.idPersona as variaidPersona',
                    'variables_persona.edad as variaedad',
                    'variables_persona.telefono as variatelefono',
                    // 'variables_persona.motivoEstancia as variamotivoEstancia',
                    'cat_ocupacion.nombre as variaidOcupacion',
                    'cat_estado_civil.nombre as variaidEstadoCivil',
                    'cat_escolaridad.nombre as variaidEscolaridad',
                    'cat_religion.nombre as variaidReligion',
                    'variables_persona.idDomicilio as variaidDomicilio',
                    'variables_persona.docIdentificacion as variadocIdentificacion',
                    'variables_persona.numDocIdentificacion as varianumDocIdentificacion',
                    'variables_persona.lugarTrabajo as varialugarTrabajo',
                    'variables_persona.idDomicilioTrabajo as variaidDomicilioTrabajo',
                    'variables_persona.telefonoTrabajo as variatelefonoTrabajo',
                    'variables_persona.representanteLegal as variarepresentanteLegal',
                    'extra_autoridad.id as autoridadid',
                    'extra_autoridad.antiguedad as autoridadantiguedad',
                    'extra_autoridad.rango as autoridadrango',
                    'extra_autoridad.horarioLaboral as autoridadhorarioLaboral',
                    
                    'domicilio.id as domicilioid',
                    'cat_municipio.nombre as domicilioMunicipio',
                    'cat_estado.nombre as domicilioEstado',
                    'cat_localidad.nombre as domicilioLocalidad',
                    'cat_colonia.nombre as domicilioColonia',
                    'cat_colonia.codigoPostal as domicilioCp',
                    'domicilio.calle as domicilioCalle',
                    'domicilio.numExterno as domicilioNumExterno',
                    'domicilio.numInterno as domicilioNumInterno',
    
                    'trabajo.id as domicilioTrabajoid',
                    'cat_municipio_trabajo.nombre as TrabajoMunicipio',
                    'cat_estado_trabajo.nombre as TrabajoEstado',
                    'cat_localidad_trabajo.nombre as TrabajoLocalidad',
                    'cat_colonia_trabajo.nombre as TrabajoColonia',
                    'cat_colonia_trabajo.codigoPostal as TrabajoCp',
                    'trabajo.calle as TrabajoCalle',
                    'trabajo.numExterno as TrabajoNumExterno',
                    'trabajo.numInterno as TrabajoNumInterno')
                ->get();
                
            // dd($denunciantes);
    
            return view('fields.resumen-carpeta.resumen-autoridad')
            ->with('autoridades',$autoridades)
            ->with('carpeta',$carpeta);
        }
    }
    
    public function detalleVehiculo(){
        $idCarpeta=session('carpeta');
        $carpeta=DB::table('carpeta')
        ->join('unidad','carpeta.idUnidad','=','unidad.id')
        ->where('carpeta.id',$idCarpeta)->first();
        // dd($carpeta);

        $vehiculos=DB::table('vehiculo')
        ->join('tipif_delito','tipif_delito.id','=','vehiculo.idTipifDelito')
        ->join('cat_delito','tipif_delito.idDelito','=','cat_delito.id')
        ->join('cat_agrupacion1','tipif_delito.idAgrupacion1','=','cat_agrupacion1.id')
        ->join('cat_agrupacion2','tipif_delito.idAgrupacion2','=','cat_agrupacion2.id')
        ->join('cat_estado','vehiculo.idEstado','=','cat_estado.id')
        ->join('cat_aseguradoras','vehiculo.idAseguradora','=','cat_aseguradoras.id')
        ->join('cat_color','vehiculo.idColor','=','cat_color.id')
        ->join('cat_procedencia','vehiculo.idProcedencia','=','cat_procedencia.id')
        ->join('cat_submarcas','vehiculo.idSubmarca','=','cat_submarcas.id')
        ->join('cat_marca','cat_submarcas.idMarca','=','cat_marca.id')
        ->join('cat_tipo_uso','vehiculo.idTipoUso','=','cat_tipo_uso.id')
        ->join('cat_tipo_vehiculo','vehiculo.idTipoVehiculo','=','cat_tipo_vehiculo.id')
        ->where('tipif_delito.idCarpeta',$idCarpeta)
        ->select(
            'vehiculo.id as idVehiculo',
            'cat_delito.nombre as delito',
            DB::raw('(CASE WHEN cat_agrupacion1.nombre = "SIN AGRUPACION" THEN "" ElSE cat_agrupacion1.nombre END) AS agregacion1'),
            DB::raw('(CASE WHEN cat_agrupacion2.nombre = "SIN AGRUPACION" THEN "" ElSE cat_agrupacion2.nombre END) AS agregacion2'),
            'vehiculo.placas as placas',
            'vehiculo.modelo as modelo',
            'vehiculo.nrpv as nrpv',
            'vehiculo.permiso as permiso',
            'vehiculo.numSerie as numSerie',
            'vehiculo.numMotor as numMotor',
            'cat_estado.nombre as estado',
            'cat_aseguradoras.nombre as aseguradoras',
            'cat_color.nombre as color',
            'cat_procedencia.nombre as procedencia',
            'cat_submarcas.nombre as submarcas',
            'cat_marca.nombre as marca',
            'cat_tipo_uso.nombre as tipo_uso',
            'cat_tipo_vehiculo.nombre as tipo_vehiculo',
            'vehiculo.senasPartic as senasPartic'
            // 'vehiculo. as ',
            // 'vehiculo. as '
        )
        ->get();
        // ->first();
        // dd($vehiculos);
        
        return view('fields.resumen-carpeta.resumen-vehiculo')
        ->with('vehiculos',$vehiculos)
        ->with('carpeta',$carpeta);
    }
    
    public function detalleDefensa(){

        $idCarpeta=session('carpeta');
        
        $carpeta=DB::table('carpeta')
        ->join('unidad','carpeta.idUnidad','=','unidad.id')
        ->where('carpeta.id',$idCarpeta)->first();

        $defensas = CarpetaController::getDefensas($idCarpeta);
        
        return view('fields.resumen-carpeta.resumen-defensa')
        ->with('defensas', $defensas)
        ->with('carpeta',$carpeta);
    
    }
    
    public function detalleAbogado(){
        $idCarpeta=session('carpeta');
        $carpeta=DB::table('carpeta')
        ->join('unidad','carpeta.idUnidad','=','unidad.id')
        ->where('carpeta.id',$idCarpeta)->first();
        // dd($carpeta);
        
        $abogados=DB::table('extra_abogado')
        ->join('variables_persona','variables_persona.id','=','extra_abogado.idVariablesPersona')
                ->join('cat_ocupacion','cat_ocupacion.id','=','variables_persona.idOcupacion')
                ->join('cat_estado_civil','cat_estado_civil.id','=','variables_persona.idEstadoCivil')
                ->join('cat_escolaridad','cat_escolaridad.id','=','variables_persona.idEscolaridad')
                ->join('cat_religion','cat_religion.id','=','variables_persona.idReligion')
                
                ->join('domicilio','variables_persona.idDomicilio','=','domicilio.id')
                ->join('cat_municipio','cat_municipio.id','=','domicilio.idMunicipio')
                ->join('cat_estado','cat_estado.id','=','cat_municipio.idEstado')
                ->join('cat_localidad','cat_localidad.id','=','domicilio.idLocalidad')
                ->join('cat_colonia','cat_colonia.id','=','domicilio.idColonia')
                
                ->join('domicilio as trabajo','variables_persona.idDomicilioTrabajo','=','trabajo.id')
                ->join('cat_municipio as cat_municipio_trabajo','cat_municipio_trabajo.id','=','trabajo.idMunicipio')
                ->join('cat_estado as cat_estado_trabajo','cat_estado_trabajo.id','=','cat_municipio_trabajo.idEstado')
                ->leftJoin('cat_localidad as cat_localidad_trabajo','cat_localidad_trabajo.id','=','trabajo.idLocalidad')
                ->leftJoin('cat_colonia as cat_colonia_trabajo','cat_colonia_trabajo.id','=','trabajo.idColonia')
                
                ->join('persona','variables_persona.idPersona','=','persona.id')
                ->join('cat_etnia','cat_etnia.id','=','persona.idEtnia')
                ->join('cat_lengua','cat_lengua.id','=','persona.idLengua')
                ->join('cat_nacionalidad','cat_nacionalidad.id','=','persona.idNacionalidad')
                ->join('cat_municipio as cat_municipio_origen','cat_municipio_origen.id','=','persona.idMunicipioOrigen')
                ->join('cat_estado as cat_estado_origen','cat_estado_origen.id','=','cat_municipio_origen.idEstado')
                ->where('variables_persona.idCarpeta',$idCarpeta)
                ->select(       
                    'persona.nombres as pernombres',
                    'persona.primerAp as perprimerAp',
                    'persona.segundoAp as persegundoAp',
                    'persona.fechaNacimiento as perfechaNacimiento',
                    'persona.rfc as perrfc',
                    'persona.curp as percurp',
                    'persona.sexo as persexo',
                    'cat_etnia.nombre as peridEtnia',
                    'cat_lengua.nombre as peridLengua',
                    'cat_nacionalidad.nombre as peridNacionalidad',
                    'cat_municipio_origen.nombre as peridMunicipioOrigen',
                    'cat_estado_origen.nombre as peridEstadoOrigen',
                    'persona.esEmpresa as peresEmpresa',
                    
                    'variables_persona.id as variaid',
                    'variables_persona.idPersona as variaidPersona',
                    'variables_persona.edad as variaedad',
                    'variables_persona.telefono as variatelefono',
                    // 'variables_persona.motivoEstancia as variamotivoEstancia',
                    'cat_ocupacion.nombre as variaidOcupacion',
                    'cat_estado_civil.nombre as variaidEstadoCivil',
                    'cat_escolaridad.nombre as variaidEscolaridad',
                    'cat_religion.nombre as variaidReligion',
                    'variables_persona.idDomicilio as variaidDomicilio',
                    'variables_persona.docIdentificacion as variadocIdentificacion',
                    'variables_persona.numDocIdentificacion as varianumDocIdentificacion',
                    'variables_persona.lugarTrabajo as varialugarTrabajo',
                    'variables_persona.idDomicilioTrabajo as variaidDomicilioTrabajo',
                    'variables_persona.telefonoTrabajo as variatelefonoTrabajo',
                    'variables_persona.representanteLegal as variarepresentanteLegal',
                    'extra_abogado.id as abogadoid',
                    'extra_abogado.cedulaProf as abogadocedulaProf',
                    'extra_abogado.sector as abogadosector',
                    'extra_abogado.tipo as abogadotipo',
                    'extra_abogado.correo as abogadocorreo',
                    
                    'domicilio.id as domicilioid',
                    'cat_municipio.nombre as domicilioMunicipio',
                    'cat_estado.nombre as domicilioEstado',
                    'cat_localidad.nombre as domicilioLocalidad',
                    'cat_colonia.nombre as domicilioColonia',
                    'cat_colonia.codigoPostal as domicilioCp',
                    'domicilio.calle as domicilioCalle',
                    'domicilio.numExterno as domicilioNumExterno',
                    'domicilio.numInterno as domicilioNumInterno',
    
                    'trabajo.id as domicilioTrabajoid',
                    'cat_municipio_trabajo.nombre as TrabajoMunicipio',
                    'cat_estado_trabajo.nombre as TrabajoEstado',
                    'cat_localidad_trabajo.nombre as TrabajoLocalidad',
                    'cat_colonia_trabajo.nombre as TrabajoColonia',
                    'cat_colonia_trabajo.codigoPostal as TrabajoCp',
                    'trabajo.calle as TrabajoCalle',
                    'trabajo.numExterno as TrabajoNumExterno',
                    'trabajo.numInterno as TrabajoNumInterno')
        ->get();
        // dd($abogados);
        return view('fields.resumen-carpeta.resumen-abogado')
        ->with('abogados',$abogados)
        ->with('carpeta',$carpeta);
    }
    
    public function detalleDelito(){
        $idCarpeta=session('carpeta');

        $carpeta=DB::table('carpeta')
        ->join('unidad','carpeta.idUnidad','=','unidad.id')
        ->where('carpeta.id',$idCarpeta)->first();
        // dd($carpeta);
        
        $delitos=DB::table('tipif_delito')
        ->join('domicilio','tipif_delito.idDomicilio','=','domicilio.id')
        ->leftJoin('cat_municipio','cat_municipio.id','=','domicilio.idMunicipio')
        ->leftJoin('cat_estado','cat_estado.id','=','cat_municipio.idEstado')
        ->leftJoin('cat_localidad','cat_localidad.id','=','domicilio.idLocalidad')
        ->leftJoin('cat_colonia','cat_colonia.id','=','domicilio.idColonia')
        ->join('cat_delito','tipif_delito.idDelito','=','cat_delito.id')
        ->join('cat_agrupacion1','tipif_delito.idAgrupacion1','=','cat_agrupacion1.id')
        ->join('cat_agrupacion2','tipif_delito.idAgrupacion2','=','cat_agrupacion2.id')
        ->join('cat_lugar','tipif_delito.idLugar','=','cat_lugar.id')
        ->join('cat_zona','tipif_delito.idZona','=','cat_zona.id')
        ->select(
            'tipif_delito.id as idDelito',
            'cat_delito.nombre as delito',
            DB::raw('(CASE WHEN cat_agrupacion1.nombre = "SIN AGRUPACION" THEN "" ElSE cat_agrupacion1.nombre END) AS agregacion1'),
            DB::raw('(CASE WHEN cat_agrupacion2.nombre = "SIN AGRUPACION" THEN "" ElSE cat_agrupacion2.nombre END) AS agregacion2'),
            'tipif_delito.formaComision as formaComision',
            'tipif_delito.fecha as fecha',
            'tipif_delito.hora as hora',
            DB::raw('(CASE WHEN tipif_delito.conViolencia = 1 THEN "SI" ElSE "NO" END) AS conViolencia'),
            'domicilio.id as idDomicilio',
            'cat_estado.nombre as estado',
            'cat_municipio.nombre as municipio',
            'cat_localidad.nombre as localidad',
            'cat_colonia.nombre as colonia',
            'cat_colonia.codigoPostal as codigoPostal',
            'domicilio.calle as calle',
            'domicilio.numExterno as numExterno',
            'domicilio.numInterno as numInterno',
            'tipif_delito.entreCalle',
            'tipif_delito.yCalle',
            'tipif_delito.calleTrasera',
            'cat_lugar.nombre as lugar',
            'cat_zona.nombre as zona',
            'tipif_delito.puntoReferencia as puntoReferencia'
        )
        ->where('idCarpeta',session('carpeta'))
        ->get();
        // ->first();

        // dd($delitos);

        return view('fields.resumen-carpeta.resumen-delitos')
        ->with('delitos',$delitos)
        ->with('carpeta',$carpeta);
    }

    public function detalleAcusaciones(){
        $idCarpeta=session('carpeta');
        $carpeta=DB::table('carpeta')
        ->join('unidad','carpeta.idUnidad','=','unidad.id')
        ->where('carpeta.id',$idCarpeta)->first();
        $acusaciones = CarpetaController::getAcusaciones($idCarpeta);
        // dd($carpeta);
        
        return view('fields.resumen-carpeta.resumen-acusaciones')->with('carpeta',$carpeta)->with('acusaciones',$acusaciones);
    }

}