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
            
            //nueva consulta    
            $denunciantes=DB::table('componentes.apariciones as apariciones')
                ->leftJoin('componentes.variables_persona_fisica as variables_fisica', 'variables_fisica.id', '=', 'apariciones.idVarPersona')
                ->leftJoin('componentes.extra_denunciante_fisico as extra_fisica', 'extra_fisica.idVariablesPersona', '=', 'variables_fisica.id')
                ->leftJoin('componentes.persona_fisica as persona_fisica', 'variables_fisica.idPersona', '=', 'persona_fisica.id')
                ->leftJoin('componentes.cat_etnia as etnia', 'persona_fisica.idEtnia', '=', 'etnia.id')
                ->leftJoin('componentes.sexos as sexo', 'persona_fisica.sexo', '=', 'sexo.id')
                ->leftJoin('componentes.cat_nacionalidad as nacionalidad', 'persona_fisica.idNacionalidad', '=', 'nacionalidad.id')
                ->leftJoin('componentes.cat_lengua as lengua', 'persona_fisica.idLengua', '=', 'lengua.id')
                ->leftJoin('componentes.cat_municipio as municipioOrigen', 'persona_fisica.idMunicipioOrigen', '=', 'municipioOrigen.id')
                ->leftJoin('componentes.cat_estado as estadoOrigen', 'municipioOrigen.idEstado', '=', 'estadoOrigen.id')
                ->leftJoin('componentes.cat_ocupacion as ocupacion', 'variables_fisica.idOcupacion', '=', 'ocupacion.id')
                ->leftJoin('componentes.cat_estado_civil as estado_civil', 'variables_fisica.idEstadoCivil', '=', 'estado_civil.id')
                ->leftJoin('componentes.cat_escolaridad as escolaridad', 'variables_fisica.idEscolaridad', '=', 'escolaridad.id')
                ->leftJoin('componentes.cat_religion as religion', 'variables_fisica.idReligion', '=', 'religion.id')
                ->leftJoin('componentes.cat_identificacion as identificacion_fisica', 'variables_fisica.docIdentificacion', '=', 'identificacion_fisica.id')
                
                ->leftJoin('componentes.domicilio as domicilio_fisica', 'variables_fisica.idDomicilio', '=', 'domicilio_fisica.id')
                ->leftJoin('componentes.cat_municipio as municipio_df','municipio_df.id','=','domicilio_fisica.idMunicipio')
                ->leftJoin('componentes.cat_estado as estado_df','estado_df.id','=','municipio_df.idEstado')
                ->leftJoin('componentes.cat_localidad as localidad_df','localidad_df.id','=','domicilio_fisica.idLocalidad')
                ->leftJoin('componentes.cat_colonia as colonia_df','colonia_df.id','=','domicilio_fisica.idColonia')
                
                ->leftJoin('componentes.trabajo as trabajo', 'variables_fisica.idTrabajo', '=', 'trabajo.id')
                ->leftJoin('componentes.domicilio as domicilio_trabajo', 'trabajo.idDomicilio', '=', 'domicilio_trabajo.id')                
                ->leftJoin('componentes.cat_municipio as municipio_trabajo','municipio_trabajo.id','=','domicilio_trabajo.idMunicipio')
                ->leftJoin('componentes.cat_estado as estado_trabajo','estado_trabajo.id','=','municipio_trabajo.idEstado')
                ->leftJoin('componentes.cat_localidad as localidad_trabajo','localidad_trabajo.id','=','domicilio_trabajo.idLocalidad')
                ->leftJoin('componentes.cat_colonia as colonia_trabajo','colonia_trabajo.id','=','domicilio_trabajo.idColonia')
                
                ->leftJoin('componentes.notificacion as notificacion_fisica', 'variables_fisica.idNotificacion', '=', 'notificacion_fisica.id')
                ->leftJoin('componentes.domicilio as domicilio_nf', 'notificacion_fisica.idDomicilio', '=', 'domicilio_nf.id')                
                ->leftJoin('componentes.cat_municipio as municipio_nf','municipio_nf.id','=','domicilio_nf.idMunicipio')
                ->leftJoin('componentes.cat_estado as estado_nf','estado_nf.id','=','municipio_nf.idEstado')
                ->leftJoin('componentes.cat_localidad as localidad_nf','localidad_nf.id','=','domicilio_nf.idLocalidad')
                ->leftJoin('componentes.cat_colonia as colonia_nf','colonia_nf.id','=','domicilio_nf.idColonia')
                
                //persona moral
                ->leftJoin('componentes.variables_persona_moral as variables_moral', 'variables_moral.id', '=', 'apariciones.idVarPersona')
                ->leftJoin('componentes.persona_moral as persona_moral', 'persona_moral.id', '=', 'variables_moral.idPersona')
                ->leftJoin('componentes.extra_denunciante_moral as extra_moral', 'extra_moral.idVariablesPersona', '=', 'variables_moral.id')
                ->leftJoin('componentes.cat_identificacion as identificacion_moral', 'variables_moral.docIdentificacion', '=', 'identificacion_moral.id')
                
                ->leftJoin('componentes.domicilio as domicilio_moral', 'variables_moral.idDomicilio', '=', 'domicilio_moral.id')
                ->leftJoin('componentes.cat_municipio as municipio_dm','municipio_dm.id','=','domicilio_moral.idMunicipio')
                ->leftJoin('componentes.cat_estado as estado_dm','estado_dm.id','=','municipio_dm.idEstado')
                ->leftJoin('componentes.cat_localidad as localidad_dm','localidad_dm.id','=','domicilio_moral.idLocalidad')
                ->leftJoin('componentes.cat_colonia as colonia_dm','colonia_dm.id','=','domicilio_moral.idColonia')
                
                ->leftJoin('componentes.notificacion as notificacion_moral', 'variables_moral.idNotificacion', '=', 'notificacion_moral.id')
                ->leftJoin('componentes.domicilio as domicilio_nm', 'notificacion_moral.idDomicilio', '=', 'domicilio_nm.id')                
                ->leftJoin('componentes.cat_municipio as municipio_nm','municipio_nm.id','=','domicilio_nm.idMunicipio')
                ->leftJoin('componentes.cat_estado as estado_nm','estado_nm.id','=','municipio_nm.idEstado')
                ->leftJoin('componentes.cat_localidad as localidad_nm','localidad_nm.id','=','domicilio_nm.idLocalidad')
                ->leftJoin('componentes.cat_colonia as colonia_nm','colonia_nm.id','=','domicilio_nm.idColonia')
                ->where('apariciones.idCarpeta',$idCarpeta)
                ->select(       
                    DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN persona_fisica.nombres ELSE persona_moral.nombre END) AS pernombres'),//'persona.nombres as pernombres',
                    DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN persona_fisica.primerAp ELSE variables_moral.primerApRep END) AS perprimerAp'),//'persona.primerAp as perprimerAp',
                    DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN persona_fisica.segundoAp ELSE variables_moral.segundoApRep END) AS persegundoAp'),//'persona.segundoAp ass persegundoAp',
                    DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN persona_fisica.fechaNacimiento ELSE persona_moral.fechaCreacion END) AS perfechaNacimiento'),//'persona.fechaNacimiento as perfechaNacimiento',
                    DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN persona_fisica.rfc ELSE persona_moral.rfc END) AS perrfc'),//'persona.rfc as perrfc',
                    DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN persona_fisica.curp ELSE "NO APLICA" END) AS percurp'),//'persona.curp as percurp',
                    DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN sexo.nombre ELSE "NO APLICA" END) AS persexo'),//'persona.sexo as persexo',
                    DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN etnia.nombre ELSE "NO APLICA" END) AS peridEtnia'),//'cat_etnia.nombre as peridEtnia',
                    DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN lengua.nombre ELSE "NO APLICA" END) AS peridLengua'),//'cat_lengua.nombre as peridLengua',
                    DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN nacionalidad.nombre ELSE "NO APLICA" END) AS peridNacionalidad'),//'cat_nacionalidad.nombre as peridNacionalidad',
                    DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN municipioOrigen.nombre ELSE "NO APLICA" END) AS peridMunicipioOrigen'),//'cat_municipio_origen.nombre as peridMunicipioOrigen',
                    DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN estadoOrigen.nombre ELSE "NO APLICA" END) AS peridEstadoOrigen'),//'cat_estado_origen.nombre as peridEstadoOrigen',
                    DB::raw('apariciones.esEmpresa AS peresEmpresa'),//'persona.esEmpresa as peresEmpresa',
                    
                    DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN variables_fisica.id ELSE variables_moral.id END) AS variaid'),//'variables_persona.id as variaid',
                    DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN variables_fisica.idPersona ELSE variables_moral.idPersona END) AS variaidPersona'),//'variables_persona.idPersona as variaidPersona',
                    DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN variables_fisica.edad ELSE "NO APLICA" END) AS variaedad'),//'variables_persona.edad as variaedad',
                    DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN variables_fisica.telefono ELSE variables_moral.telefono END) AS variatelefono'),//'variables_persona.telefono as variatelefono',
                    
                    DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN ocupacion.nombre ELSE "NO APLICA" END) AS variaidOcupacion'),//'cat_ocupacion.nombre as variaidOcupacion',
                    DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN estado_civil.nombre ELSE "NO APLICA" END) AS variaidEstadoCivil'),//'cat_estado_civil.nombre as variaidEstadoCivil',
                    DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN escolaridad.nombre ELSE "NO APLICA" END) AS variaidEscolaridad'),//'cat_escolaridad.nombre as variaidEscolaridad',
                    DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN religion.nombre ELSE "NO APLICA" END) AS variaidReligion'),//'cat_religion.nombre as variaidReligion',
                    
                    DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN variables_fisica.idDomicilio ELSE variables_moral.idDomicilio END) AS variaidDomicilio'),//'variables_persona.idDomicilio as variaidDomicilio',
                    DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN identificacion_fisica.documento ELSE identificacion_moral.documento END) AS variadocIdentificacion'),//'variables_persona.docIdentificacion as variadocIdentificacion',
                    DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN variables_fisica.numDocIdentificacion ELSE variables_moral.numDocIdentificacion END) AS varianumDocIdentificacion'),//'variables_persona.numDocIdentificacion as varianumDocIdentificacion',
                    DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN trabajo.lugar ELSE "NO APLICA" END) AS varialugarTrabajo'),//'variables_persona.lugarTrabajo as varialugarTrabajo',
                    DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN trabajo.idDomicilio ELSE "NO APLICA" END) AS variaidDomicilioTrabajo'),//'variables_persona.idDomicilioTrabajo as variaidDomicilioTrabajo',
                    DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN trabajo.telefono ELSE "NO APLICA" END) AS variatelefonoTrabajo'),//'variables_persona.telefonoTrabajo as variatelefonoTrabajo',
                    DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN "NO APLICA" ELSE variables_moral.nombreRep END) AS variarepresentanteLegal'),//'variables_persona.representanteLegal as variarepresentanteLegal',
                    DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN extra_fisica.id ELSE extra_moral.id END) AS denuncianteid'),//'extra_denunciante.id as denuncianteid',
                    DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN variables_fisica.idNotificacion ELSE variables_moral.idNotificacion END) AS denuncianteidNotificacion'),//'extra_denunciante.idNotificacion as denuncianteidNotificacion',
                    DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN extra_fisica.idAbogado ELSE extra_moral.idAbogado END) AS denuncianteidAbogado'),//'extra_denunciante.idAbogado as denuncianteidAbogado',
                    DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN extra_fisica.resguardarIdentidad ELSE extra_moral.resguardarIdentidad END) AS denunciantereguardarIdentidad'),//'extra_denunciante.reguardarIdentidad as denunciantereguardarIdentidad',
                    DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN extra_fisica.victima ELSE extra_moral.victima END) AS denunciantevictima'),//'extra_denunciante.victima as denunciantevictima',
                    DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN "PENDIENTE POR HACER" ELSE "PENDIENTE POR HACER" END) AS denunciantenarracion'),//'extra_denunciante.narracion as denunciantenarracion',
                    DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN notificacion_fisica.idDomicilio ELSE notificacion_moral.idDomicilio END) AS notifiidDomicilio'),//'dirnotificacion.idDomicilio as notifiidDomicilio',
                    DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN notificacion_fisica.correo ELSE notificacion_moral.correo END) AS notificorreo'),//'dirnotificacion.correo as notificorreo',
                    DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN notificacion_fisica.telefono ELSE notificacion_moral.telefono END) AS notifitelefono'),//'dirnotificacion.telefono as notifitelefono',
    
                    DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN domicilio_fisica.id ELSE domicilio_moral.id END) AS domicilioid'),//'domicilio.id as domicilioid',
                    DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN municipio_df.nombre ELSE municipio_dm.nombre END) AS domicilioMunicipio'),//'cat_municipio.nombre as domicilioMunicipio',
                    DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN estado_df.nombre ELSE estado_dm.nombre END) AS domicilioEstado'),//'cat_estado.nombre as domicilioEstado',
                    DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN localidad_df.nombre ELSE localidad_dm.nombre END) AS domicilioLocalidad'),//'cat_localidad.nombre as domicilioLocalidad',
                    DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN colonia_df.nombre ELSE colonia_dm.nombre END) AS domicilioColonia'),//'cat_colonia.nombre as domicilioColonia',
                    DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN colonia_df.codigoPostal ELSE colonia_dm.codigoPostal END) AS domicilioCp'),//'cat_colonia.codigoPostal as domicilioCp',
                    DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN domicilio_fisica.calle ELSE domicilio_moral.calle END) AS domicilioCalle'),//'domicilio.calle as domicilioCalle',
                    DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN domicilio_fisica.numExterno ELSE domicilio_moral.numExterno END) AS domicilioNumExterno'),//'domicilio.numExterno as domicilioNumExterno',
                    DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN domicilio_fisica.numInterno ELSE domicilio_moral.numInterno END) AS domicilioNumInterno'),//'domicilio.numInterno as domicilioNumInterno',
    
                    DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN domicilio_trabajo.id ELSE "NO APLICA" END) AS domicilioTrabajoid'),//'trabajo.id as domicilioTrabajoid',
                    DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN municipio_trabajo.nombre ELSE "NO APLICA" END) AS TrabajoMunicipio'),//'cat_municipio_trabajo.nombre as TrabajoMunicipio',
                    DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN estado_trabajo.nombre ELSE "NO APLICA" END) AS TrabajoEstado'),//'cat_estado_trabajo.nombre as TrabajoEstado',
                    DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN localidad_trabajo.nombre ELSE "NO APLICA" END) AS TrabajoLocalidad'),//'cat_localidad_trabajo.nombre as TrabajoLocalidad',
                    DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN colonia_trabajo.nombre ELSE "NO APLICA" END) AS TrabajoColonia'),//'cat_colonia_trabajo.nombre as TrabajoColonia',
                    DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN colonia_trabajo.codigoPostal ELSE "NO APLICA" END) AS TrabajoCp'),//'cat_colonia_trabajo.codigoPostal as TrabajoCp',
                    DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN domicilio_trabajo.calle ELSE "NO APLICA" END) AS TrabajoCalle'),//'trabajo.calle as TrabajoCalle',
                    DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN domicilio_trabajo.numExterno ELSE "NO APLICA" END) AS TrabajoNumExterno'),//'trabajo.numExterno as TrabajoNumExterno',
                    DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN domicilio_trabajo.numInterno ELSE "NO APLICA" END) AS TrabajoNumInterno'),//'trabajo.numInterno as TrabajoNumInterno',
    
                    DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN domicilio_nf.id ELSE domicilio_nm.id END) AS domicilioNotifiId'),//'notificacion.id as domicilioNotifiId',
                    DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN municipio_nf.nombre ELSE municipio_nm.nombre END) AS notifiMunicipio'),//'cat_municipio_notificacion.nombre as notifiMunicipio',
                    DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN estado_nf.nombre ELSE estado_nm.nombre END) AS notifiEstado'),//'cat_estado_notificacion.nombre as notifiEstado',
                    DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN localidad_nf.nombre ELSE localidad_nm.nombre END) AS notifiLocalidad'),//'cat_localidad_notificacion.nombre as notifiLocalidad',
                    DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN colonia_nf.nombre ELSE colonia_nm.nombre END) AS notifiColonia'),//'cat_colonia_notificacion.nombre as notifiColonia',
                    DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN colonia_nf.codigoPostal ELSE colonia_nm.codigoPostal END) AS notifiCp'),//'cat_colonia_notificacion.codigoPostal as notifiCp',
                    DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN domicilio_nf.calle ELSE domicilio_nm.calle END) AS notifiCalle'),//'notificacion.calle as notifiCalle',
                    DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN domicilio_nf.numExterno ELSE domicilio_nm.numExterno END) AS notifiNumExterno'),//'notificacion.numExterno as notifiNumExterno',
                    DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN domicilio_nf.numInterno ELSE domicilio_nm.numInterno END) AS notifiNumInterno')//'notificacion.numInterno as notifiNumInterno'
                    )
                ->where('apariciones.tipoInvolucrado','denunciante')
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