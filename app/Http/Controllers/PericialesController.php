<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Alert;
use Jenssegers\Date\Date;
use Carbon\Carbon;
use App\Http\Requests\StoreAbogado;
use App\Models\Carpeta;
use App\Models\CatEstado;
use App\Models\CatDelito;
use App\Models\CatEstadoCivil;
use App\Models\ExtraDenunciante;
use App\Models\ExtraDenunciado;
use App\Models\Persona;
use App\Models\CatMarca;
use App\Models\CatSubmarca;
use App\Models\CatClaseVehiculo;
use App\Models\VariablesPersona;
use App\Models\ExtraAbogado;
use App\Models\Domicilio;
use App\Models\BitacoraNavCaso;
use App\Models\formatos\PerMensaje;
use App\Models\formatos\Psicologo;
use App\Models\formatos\Lesione;
use App\Models\formatos\PerVehiculo;


class PericialesController extends Controller{
 
    public function pericialesindex(){   
        $idCarpeta=session('carpeta');
        $carpetaNueva = Carpeta::where('id', $idCarpeta)->get();
        if(count($carpetaNueva)>0){ 
            $abogados = CarpetaController::getAbogados($idCarpeta);
            $estados = CatEstado::select('id', 'nombre')->orderBy('nombre', 'ASC')->pluck('nombre', 'id');
            $estadoscivil = CatEstadoCivil::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
            $marca =  CatMarca::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
            $submarca =  CatSubmarca::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
            $tipo =  CatClaseVehiculo::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
            $delits=DB::table('tipif_delito')
            ->join('carpeta as caso','tipif_delito.idCarpeta','=','caso.id')
            ->join('cat_delito','cat_delito.id','=','tipif_delito.idDelito')
            ->where('caso.id',$idCarpeta)
            ->select('cat_delito.id', 'cat_delito.nombre')
            ->orderBy('nombre', 'ASC')
            ->pluck('nombre', 'id');            
            
            $victimas[''] = 'Seleccione una víctima/ofendido';
            $victimas2 = DB::table('variables_persona')
            ->join('persona', 'variables_persona.idPersona', '=', 'persona.id')
            ->join('extra_denunciante', 'variables_persona.id', '=', 'extra_denunciante.idVariablesPersona')
            ->where('variables_persona.idCarpeta',$idCarpeta)
            ->select('persona.nombres','persona.primerAp','persona.segundoAp', 'persona.id')
            ->get();

            foreach($victimas2 as $victima){
                $victimas[$victima->nombres.'-'.$victima->primerAp.'-'.$victima->segundoAp] = $victima->nombres.' '.$victima->primerAp.' '.$victima->segundoAp;
            }

           // $idCarpeta=1;
       
            $psicoSolicitud=DB::table('per_psicologos')
            ->where('per_psicologos.idCarpeta',$idCarpeta)
            ->select('per_psicologos.created_at as fecha','per_psicologos.nombre','per_psicologos.primerAp','per_psicologos.segundoAp')
            ->get();
            $solicitudV=DB::table('per_vehiculos')
            ->join('cat_marca as marca','marca.id','=','per_vehiculos.idMarca')
            ->where('per_vehiculos.idCarpeta',$idCarpeta)
            ->select('per_vehiculos.created_at as fecha','marca.nombre as marca','per_vehiculos.modelo',
            'per_vehiculos.placas','per_vehiculos.nombre','per_vehiculos.primerAp',
            'per_vehiculos.segundoAp','per_vehiculos.color')
            ->get();
            $soliLesiones=db::table('per_lesiones')
            ->where('per_lesiones.idCarpeta',$idCarpeta)
            ->select('per_lesiones.created_at as fecha','per_lesiones.nombre','per_lesiones.primerAp',
            'per_lesiones.segundoAp')
            ->get();
            $soliMensaje=db::table('per_mensajes')
            ->where('per_mensajes.idCarpeta',$idCarpeta)
            ->select('per_mensajes.created_at as fecha','per_mensajes.nombre','per_mensajes.primerAp','per_mensajes.segundoAp')
            ->get();
    
           //dd($solicitudV);
            //dd($idCarpeta);
            // return view('forms.periciales')
           // return view('forms.periciales')
            
            
            return view('forms.periciales')->with('idCarpeta', $idCarpeta)
                ->with('abogados', $abogados)
                ->with('estados', $estados)
                ->with('delits', $delits)
                ->with('victimas', $victimas)
                ->with('marca', $marca)
                ->with('submarca', $submarca)
                ->with('tipo', $tipo)
                ->with('estadoscivil', $estadoscivil)
                ->with('psicoSolicitud',$psicoSolicitud)
                ->with('solicitudV',$solicitudV)
                ->with('soliMensaje',$soliMensaje)
                ->with('soliLesiones',$soliLesiones);
        }else{
            return redirect()->route('home');
        }
    }
 
    public function agregar(Request $request){
        //echo $request->narraciont;
        $NombreComp = explode("-",  $request->victima);
        DB::beginTransaction();
        try{
            $idCarpeta = session('carpeta');
            $PerMensaje = new PerMensaje;
            $PerMensaje->idCarpeta = $idCarpeta;
            $PerMensaje->nombre = $NombreComp[0];
            $PerMensaje->primerAp =$NombreComp[1];
            $PerMensaje->segundoAp = $NombreComp[2];
            $PerMensaje->marca = $request->marcat;
            $PerMensaje->imei = $request->imeit;
            $PerMensaje->compania = $request->compat;
            $PerMensaje->telefono = $request->numerot;
            $PerMensaje->telefono_destino = $request->numero2t;
            $PerMensaje->narracion = $request->narraciont;

            $PerMensaje->save();
            // if($PerMensaje->save()){
            //     Alert::success('Registro guardado con éxito', 'Hecho');
            // }
            // else{
            //     Alert::error('Se presentó un problema al guardar el registro', 'Error');
            // }
           DB::commit();
            //return redirect()->route('oficio.m', $PerMensaje->id);
            echo $PerMensaje->id;
        }catch (\PDOException $e){
            DB::rollBack();
            echo 0;
            // Alert::error('Se presentó un problema al guardar el registro, intente de nuevo', 'Error');
            // return back()->withInput();
        }
    }

    public function getOficioM($id){
    return view('documentos.per-mensajes')
    ->with('id',  $id );
    }
    
    public function getpericiales($id){
        $pericial = DB::table('per_mensajes')->where('per_mensajes.id', $id)
        ->select('per_mensajes.id','per_mensajes.idCarpeta','per_mensajes.nombre',
        'per_mensajes.primerAp','per_mensajes.segundoAp','per_mensajes.marca',
        'per_mensajes.imei','per_mensajes.compania','per_mensajes.telefono',
        'per_mensajes.telefono_destino','per_mensajes.narracion','per_mensajes.created_at as fecha')
        ->first();
        $data = array('id' => $id,
        'idCarpeta' => $pericial->idCarpeta,
        'nombre' => $pericial->nombre.' '.$pericial->primerAp.' '.$pericial->segundoAp,
        'marca' => $pericial->marca,
        'imei' => $pericial->imei,
        'compania' => $pericial->compania,
        'telefono' => $pericial->telefono,
        'telefono_destino' => $pericial->telefono_destino,
        'narracion' => $pericial->narracion,
        'fecha' => $pericial->fecha,
        );   
        return response()->json($data);
    }


    public function psico(Request $request) {        
        $NombreComp2 = explode("-",  $request->victima8);
        DB::beginTransaction();
        try{
            $idCarpeta = session('carpeta');
            $Psicologo = new Psicologo;
            $Psicologo->idCarpeta = session('carpeta');
            $Psicologo->nombre = $NombreComp2[0];
            $Psicologo->primerAp = $NombreComp2[1];
            $Psicologo->segundoAp = $NombreComp2[2];
            $Psicologo->numero = $request->numerop;
            $Psicologo->delito = $request->idDelito;
            if($Psicologo->save()){
                Alert::success('Registro guardado con éxito', 'Hecho');
            } 
            else{
                Alert::error('Se presentó un problema al guardar el registro', 'Error');
            }
            DB::commit();
            $delito = DB::table('cat_delito')
            ->join('per_psicologos','per_psicologos.delito','=', 'cat_delito.id')
            ->select('cat_delito.nombre as nombre')
            ->where('cat_delito.id', $Psicologo->delito)
            ->first();
            return redirect()->route('oficio.P', $Psicologo->id);
         
        }
        catch (\PDOException $e){
            DB::rollBack();
            Alert::error('Se presentó un problema al guardar el registro, intente de nuevo', 'Error');
            return back()->withInput();
        }
    }
    public function getOficioP($id){
    return view('documentos.per-psicologo')
    ->with('id',  $id );
    }

    public function getpsico($id){
        $psico = DB::table('per_psicologos')->where('per_psicologos.id', $id)
        ->join('cat_delito','cat_delito.id','=','per_psicologos.delito')
        ->select('per_psicologos.id','per_psicologos.idCarpeta','per_psicologos.nombre',
        'per_psicologos.primerAp','per_psicologos.segundoAp','per_psicologos.numero','per_psicologos.created_at as fecha','cat_delito.nombre as delito')
        ->first();
        $data = array('id' => $id,
        'idCarpeta' => $psico->idCarpeta,
        'nombre' => $psico->nombre.' '.$psico->primerAp.' '.$psico->segundoAp,
        'telefono' => $psico->numero,
        'fecharealizacion' => $psico->fecha,
        'delito' => $psico->delito);
        return response()->json($data);
    }

    
        public function vehi(Request $request) {   
            $NombreComp3 = explode("-",  $request->victima3);
             DB::beginTransaction();
             try{
                $idCarpeta = session('carpeta');
                $vehiculo = new PerVehiculo;
                $vehiculo->idCarpeta =  $idCarpeta;
                $vehiculo->idMarca = $request->idMarca;
                $vehiculo->idSubmarca = $request->idSubmarca;
                $vehiculo->idClase = $request->idClaseVehiculo;
                $vehiculo->linea = $request->lineav;
                $vehiculo->modelo = $request->modelov;
                $vehiculo->color = $request->colorv;
                $vehiculo->numero_serie = $request->numeroseriev;
                $vehiculo->lugar_fabricacion = $request->lugarFabv;
                $vehiculo->placas = $request->placav;
                $vehiculo->nombre = $NombreComp3[0];
                $vehiculo->primerAp = $NombreComp3[1];
                $vehiculo->segundoAp =  $NombreComp3[2];
                $vehiculo->numero = $request->celularv;
                $vehiculo->calle = $request->calle2;
                $vehiculo->num_ext = $request->numExterno2;
                $vehiculo->num_int = $request->numInterno2;
                $vehiculo->idEstado = $request->idEstado2;
                $vehiculo->idMunicipio = $request->idMunicipio2;
                $vehiculo->idLocalidad = $request->idLocalidad2;
                $vehiculo->idColonia = $request->idColonia2;
                $vehiculo->cp = $request->cp2;
                $vehiculo->fecha = $request->fecha_nac;
                $vehiculo->save();
                if($vehiculo->save()){
                    Alert::success('Registro guardado con éxito', 'Hecho');
                    // $bdbitacora = BitacoraNavCaso::where('idCaso',session('carpeta'))->first();
                    // $bdbitacora->medidas = $bdbitacora->medidas+1;
                    // $bdbitacora->save();
               
               

                $catalogos = DB::table('per_vehiculos')
                ->where('per_vehiculos.id', $vehiculo->id)
                ->join('cat_municipio','cat_municipio.id','=','per_vehiculos.idMunicipio')
                ->join('cat_localidad','cat_localidad.id','=','per_vehiculos.idLocalidad')
                ->join('cat_colonia','cat_colonia.id','=','per_vehiculos.idColonia')
                ->join('cat_estado','cat_estado.id','=','per_vehiculos.idEstado')
                ->select( 'cat_municipio.nombre as nombreMunicipio',
                'cat_localidad.nombre as nombreLocalidad',
                'cat_colonia.nombre as nombreColonia',
                'cat_estado.nombre as nombreEstado',
                'cat_colonia.codigoPostal')
                ->first(); }
            else{
                Alert::error('Se presentó un problema al guardar el registro', 'Error');
            }
            DB::commit();
            return redirect()->route('oficio.V', $vehiculo->id);

                  
        }catch (\PDOException $e){
            DB::rollBack();
            Alert::error('Se presentó un problema al guardar el registro, intente de nuevo', 'Error');
            return back()->withInput();
        }
         }

         public function getOficioV($id){
         return view('documentos.periciales_vehiculo')
         ->with('id',   $id ); 
         }

         public function getVh($id){
            $vehiculo = DB::table('per_vehiculos')
            ->where('per_vehiculos.id', $id)
            ->join('cat_marca','cat_marca.id','=','per_vehiculos.idMarca')
            ->join('cat_submarcas','cat_submarcas.id','=','per_vehiculos.idSubmarca')
            ->join('cat_clase_vehiculo','cat_clase_vehiculo.id','=','per_vehiculos.idClase')
            ->join('cat_municipio','cat_municipio.id','=','per_vehiculos.idMunicipio')
            ->join('cat_localidad','cat_localidad.id','=','per_vehiculos.idLocalidad')
            ->join('cat_colonia','cat_colonia.id','=','per_vehiculos.idColonia')
            ->join('cat_estado','cat_estado.id','=','per_vehiculos.idEstado')
            ->select( 'cat_municipio.nombre as nombreMunicipio',
            'cat_localidad.nombre as nombreLocalidad',
            'cat_colonia.nombre as nombreColonia',
            'cat_estado.nombre as nombreEstado',
            'cat_colonia.codigoPostal',
            'per_vehiculos.id','per_vehiculos.idCarpeta','cat_marca.nombre as marca',
            'cat_submarcas.nombre as submarca','cat_clase_vehiculo.nombre as clase','per_vehiculos.linea',
            'per_vehiculos.modelo','per_vehiculos.color','per_vehiculos.numero_serie',
            'per_vehiculos.lugar_fabricacion','per_vehiculos.placas','per_vehiculos.nombre',
            'per_vehiculos.primerAp','per_vehiculos.segundoAp','per_vehiculos.numero',
            'per_vehiculos.calle','per_vehiculos.num_ext','per_vehiculos.num_int','per_vehiculos.created_at as fecha')
            ->first();
            $data = array('id' => $id,
            'idCarpeta' => $vehiculo->idCarpeta,
            'marca' => $vehiculo->marca,
            'submarca' => $vehiculo->submarca,
            'clase' => $vehiculo->clase,
            'linea' => $vehiculo->linea,
            'modelo' => $vehiculo->modelo,
            'color' => $vehiculo->color,
            'numero_serie' => $vehiculo->numero_serie,
            'lugar_fabricacion' => $vehiculo->lugar_fabricacion,
            'placas' => $vehiculo->placas,
            'nombre' => $vehiculo->nombre.' '.$vehiculo->primerAp.' '.$vehiculo->segundoAp,
            'telefono' => $vehiculo->numero,
            'num_ext' => $vehiculo->num_ext,
            'num_int' => $vehiculo->num_int,
            'Estado' => $vehiculo->nombreEstado,
            'Municipio' => $vehiculo->nombreMunicipio,
            'Localidad' => $vehiculo->nombreLocalidad,
            'Colonia' => $vehiculo->nombreColonia,
            'CP' => $vehiculo->codigoPostal,
            'fecha' => $vehiculo->fecha);
            return response()->json($data);
        }

    public function lesiones(Request $request) {   
        $NombreComp4 = explode("-",  $request->victima77);
        DB::beginTransaction();
        try{
            $idCarpeta = session('carpeta');
            $lesiones = new Lesione;
            $lesiones->idCarpeta = session('carpeta');
            $lesiones->nombre = $NombreComp4[0];
            $lesiones->primerAp =$NombreComp4[1];
            $lesiones->segundoAp = $NombreComp4[2];        
            if($lesiones->save()){
                Alert::success('Registro guardado con éxito', 'Hecho');
              
            }
            else{
                Alert::error('Se presentó un problema al guardar el registro', 'Error');
            }
            DB::commit();
            return redirect()->route('oficio.L', $lesiones->id);
           
        }catch (\PDOException $e){
            DB::rollBack();
            Alert::error('Se presentó un problema al guardar el registro, intente de nuevo', 'Error');
            return back()->withInput();
        }
    }

    public function getOficioL($id){
        return view('documentos.per-lesiones')
            ->with('id',  $id );
        }
    
    public function getlesion($id){
        $lesion = DB::table('per_lesiones')->where('per_lesiones.id', $id)
        ->select('per_lesiones.id','per_lesiones.idCarpeta','per_lesiones.nombre',
        'per_lesiones.primerAp','per_lesiones.segundoAp','per_lesiones.created_at as fecha')
        ->first();
        $data = array('id' => $id,
        'idCarpeta' =>  $lesion->idCarpeta,
        'nombre' => $lesion->nombre.' '.$lesion->primerAp.' '.$lesion->segundoAp,
        'fecha' =>  $lesion->fecha,
        );
        return response()->json($data);
    }


    public function getOficioF($id){
        return view('documentos.oficioFinanzas')->with('id',$id); 
        }

        public function getVhFinanzas($id){


             $id=session('carpeta');
            $carpeta=DB::table('carpeta')
            ->join('unidad','carpeta.idUnidad','=','unidad.id')
            ->select('carpeta.fechaInicio','carpeta.numCarpeta')
            ->where('carpeta.id',$id)
            ->first();

            $fiscalAtiende=DB::table('users')
            ->join('unidad','unidad.id','=','users.id')
            ->join('unidad as unid','unid.id','=','users.idUnidad')
            ->where('users.id', Auth::user()->id)
            ->select('users.nombreC','users.puesto','users.numFiscal','unid.descripcion','users.numFiscalLetras as letra')
            ->first();

            $vehiculo = DB::table('per_vehiculos')
            ->where('per_vehiculos.id', $id)
            ->join('cat_marca','cat_marca.id','=','per_vehiculos.idMarca')
         //    ->join('cat_submarcas','cat_submarcas.id','=','per_vehiculos.idSubmarca')
         //    ->join('cat_clase_vehiculo','cat_clase_vehiculo.id','=','per_vehiculos.idClase')
         //    ->join('cat_municipio','cat_municipio.id','=','per_vehiculos.idMunicipio')
             ->join('cat_localidad','cat_localidad.id','=','per_vehiculos.idLocalidad')
         //    ->join('cat_colonia','cat_colonia.id','=','per_vehiculos.idColonia')
            ->join('cat_estado','cat_estado.id','=','per_vehiculos.idEstado')
            ->select( 
         //     'cat_municipio.nombre as nombreMunicipio',
             'cat_localidad.nombre as nombreLocalidad',
         //    'cat_colonia.nombre as nombreColonia',
            'cat_estado.nombre as nombreEstado','per_vehiculos.id',
            'per_vehiculos.placas','per_vehiculos.linea','cat_marca.nombre as marca')
         //    'cat_colonia.codigoPostal',
         //    'per_vehiculos.id','per_vehiculos.idCarpeta','cat_marca.nombre as marca',
         //    'cat_submarcas.nombre as submarca','cat_clase_vehiculo.nombre as clase','per_vehiculos.linea',
         //    'per_vehiculos.modelo','per_vehiculos.color','per_vehiculos.numero_serie',
         //    'per_vehiculos.lugar_fabricacion','per_vehiculos.placas','per_vehiculos.nombre',
         //    'per_vehiculos.primerAp','per_vehiculos.segundoAp','per_vehiculos.numero',
         //    'per_vehiculos.calle','per_vehiculos.num_ext','per_vehiculos.num_int','per_vehiculos.fecha')
            ->first();

            $puesto=$fiscalAtiende->puesto;
            $puesto = strtr(strtoupper($puesto),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ");

           $fechaactual = new Date($carpeta->fechaInicio);
           $fechahum = $fechaactual->format('l j').' de '.$fechaactual->format('F').' del año '.$fechaactual->format('Y');
           $data = array('id' =>$id,
           'numCarpeta' => $carpeta->numCarpeta,
           'marca' => $vehiculo->marca,
        //    'submarca' => $vehiculo->submarca,
        //    'clase' => $vehiculo->clase,
           'linea' => $vehiculo->linea,
           'numeroF'=> $fiscalAtiende->numFiscal,
        //    'modelo' => $vehiculo->modelo,
        //    'color' => $vehiculo->color,
        //    'numero_serie' => $vehiculo->numero_serie,
        //    'lugar_fabricacion' => $vehiculo->lugar_fabricacion,
           'placas' => $vehiculo->placas,
        //    'nombre' => $vehiculo->nombre.' '.$vehiculo->primerAp.' '.$vehiculo->segundoAp,
        //    'telefono' => $vehiculo->numero,
        //    'num_ext' => $vehiculo->num_ext,
        //    'num_int' => $vehiculo->num_int,
           'Estado' => $vehiculo->nombreEstado,
           'fiscalAtendio'=>$fiscalAtiende->nombreC,
           'puestoF'=>$puesto,
           'numF'=>$fiscalAtiende->numFiscal,
        //    'Municipio' => $vehiculo->nombreMunicipio,
            'Localidad' => $vehiculo->nombreLocalidad,
        //    'Colonia' => $vehiculo->nombreColonia,
        //    'CP' => $vehiculo->codigoPostal,
           'fecha' => $fechahum);
           return response()->json($data);
       }

    //    public function getMensajesP(){

    //    //$idCarpeta=session('carpeta');
    //    $idCarpeta=1;
       
    //     $mensajesSol=DB::table('per_psicologos')
    //     ->where('per_psicologos.idCarpeta',$idCarpeta)
    //     ->select('per_psicologos.fecha','per_psicologos.nombre','per_psicologos.primerAp','per_psicologos.segundoAp')
    //     ->get();


    //    //dd($mensajesSol);
    //     //dd('hola');
    //     return view('forms.periciales')
    //    // return view('forms.periciales')
    //     ->with('mensajesSol',$mensajesSol);
    //     } 
    public function reporteRobo($id){
        // $id=session('carpeta');
        $carpeta=DB::table('carpeta')
        ->join('unidad','carpeta.idUnidad','=','unidad.id')
        ->select('carpeta.fechaInicio','carpeta.numCarpeta')
        ->where('carpeta.id',$id)
        ->first();

        $oficio='numero pendiente';        
        $fiscalDirigido='MTRO.JOSÉ ALFREDO GOMEZ REYES';
        $puestofiscal="FISCAL REGIONAL ZONA CENTRO XALAPA";
        $vehiculo=DB::Table('vehiculo')
        ->join('tipif_delito','vehiculo.idTipifDelito','=','tipif_delito.id')
        ->join('cat_delito','cat_delito.id','=','tipif_delito.id')
        ->join('cat_submarcas','cat_submarcas.id','=','vehiculo.idSubmarca')
        ->join('cat_color','cat_color.id','=','vehiculo.idColor')
        ->join('cat_tipo_uso','cat_tipo_uso.id','=','vehiculo.idTipoUso')
        ->join('cat_marca','cat_marca.id','=','cat_submarcas.idMarca')
        ->where('tipif_delito.idCarpeta',$id)
        ->select('vehiculo.id','cat_marca.nombre as marca','vehiculo.created_at as fecha','cat_delito.nombre as delito','vehiculo.placas','cat_submarcas.nombre as submarca','vehiculo.modelo',
        'vehiculo.nrpv','cat_color.nombre as color','vehiculo.numSerie','vehiculo.numMotor','cat_tipo_uso.nombre as TipoUso')
        ->first();

        $fiscalAtiende=DB::table('users')
        ->join('unidad','unidad.id','=','users.id')
        ->join('unidad as unid','unid.id','=','users.idUnidad')
        ->join('zona','zona.id','=','users.idZona')
        ->where('users.id', Auth::user()->id)
        ->select('users.nombreC','users.puesto','users.numFiscal','unid.descripcion','zona.descripcion as zona')
        ->first();

        $fechaactual = date::now();
        $fechahum = $fechaactual->format('l j').' de '.$fechaactual->format('F').' del año '.$fechaactual->format('Y');


        $data = array('id' =>$id,
        'numCarpeta'=>$carpeta->numCarpeta,
        'oficio'=>$oficio,
        'fiscalDirigido'=>$fiscalDirigido,
        'puestoFiscal1'=>$puestofiscal,
        'marca'=>$vehiculo->marca,
        'submarca'=>$vehiculo->submarca,
        'modelo'=>$vehiculo->modelo,
        'placas'=>$vehiculo->placas,
        'color'=>$vehiculo->color,
        'serie'=>$vehiculo->numSerie,
        'nombreC'=>$fiscalAtiende->nombreC,
        'puesto'=>$fiscalAtiende->puesto,
        'fecha'=>$fechaactual);

       //dd($data);
       return response()->json($data);
       //return view('forms.reporteRobo');

    }

    public function impRobo($id){
        return view('documentos.oficioReporteAuto') ->with('id',$id);

    }
   

  
}