<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carpeta;
use DB;
use App\Models\Persona;
use App\Models\VariablesPersona;
class ResumenCarpetaController extends Controller

{
    public function showResumen(){
        $idCarpeta=session('carpeta');
        $carpeta=DB::table('carpeta')
        ->join('unidad','carpeta.idUnidad','=','unidad.id')
        ->where('carpeta.id',$idCarpeta)->first();
        // dd($carpeta);
        return view('fields.resumen-carpeta.resumen-carpeta')->with('carpeta',$carpeta);
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
        $carpeta=DB::table('carpeta')
        ->join('unidad','carpeta.idUnidad','=','unidad.id')
        ->where('carpeta.id',$idCarpeta)->first();
        // dd($carpeta);
        
        return view('fields.resumen-carpeta.resumen-denunciado')->with('carpeta',$carpeta);
    }

    public function detalleAutoridad(){
        $idCarpeta=session('carpeta');
        $carpeta=DB::table('carpeta')
        ->join('unidad','carpeta.idUnidad','=','unidad.id')
        ->where('carpeta.id',$idCarpeta)->first();
        // dd($carpeta);
        
        return view('fields.resumen-carpeta.resumen-autoridad')->with('carpeta',$carpeta);
    }
    
    public function detalleObservaciones(){
        $idCarpeta=session('carpeta');
        $carpeta=DB::table('carpeta')
        ->join('unidad','carpeta.idUnidad','=','unidad.id')
        ->where('carpeta.id',$idCarpeta)->first();
        // dd($carpeta);
        
        return view('fields.resumen-carpeta.resumen-observaciones')->with('carpeta',$carpeta);
    }
    public function detalleDefensa(){
        $idCarpeta=session('carpeta');
        $carpeta=DB::table('carpeta')
        ->join('unidad','carpeta.idUnidad','=','unidad.id')
        ->where('carpeta.id',$idCarpeta)->first();
        // dd($carpeta);
        
        return view('fields.resumen-carpeta.resumen-defensa')->with('carpeta',$carpeta);
    
    }
    public function detalleAbogado(){
        $idCarpeta=session('carpeta');
        $carpeta=DB::table('carpeta')
        ->join('unidad','carpeta.idUnidad','=','unidad.id')
        ->where('carpeta.id',$idCarpeta)->first();
        // dd($carpeta);
        
        return view('fields.resumen-carpeta.resumen-abogado')->with('carpeta',$carpeta);
    }
    public function detalleDelito(){
        $idCarpeta=session('carpeta');
        $carpeta=DB::table('carpeta')
        ->join('unidad','carpeta.idUnidad','=','unidad.id')
        ->where('carpeta.id',$idCarpeta)->first();
        // dd($carpeta);
        
        return view('fields.resumen-carpeta.resumen-delitos')->with('carpeta',$carpeta);
    }
    public function detalleAcusaciones(){
        $idCarpeta=session('carpeta');
        $carpeta=DB::table('carpeta')
        ->join('unidad','carpeta.idUnidad','=','unidad.id')
        ->where('carpeta.id',$idCarpeta)->first();
        // dd($carpeta);
        
        return view('fields.resumen-carpeta.resumen-acusaciones')->with('carpeta',$carpeta);
    }
}