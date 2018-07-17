<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Carpeta;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Persona;
use App\Models\Cavd;
use App\Models\CatCavd;
use App\Models\Unidad;
use App\Models\CatMarca;
use App\Models\CatSubmarca;
use App\Models\CatColor;
use App\Models\CatTipoUso;
use App\Models\OficioDistrito;
use Alert;
use Carbon\Carbon;
use Jenssegers\Date\Date;

//use App\Models\VariablesPersona;

use App\Models\componentes\aparicionesModel;
use App\Models\componentes\VariablesPersona;
use App\Models\componentes\PersonaModel;
use App\Models\componentes\Domicilio;
use App\Models\componentes\Trabajo;
use App\Models\componentes\PersonaMoralModel;
use App\Models\componentes\VariablesPersonaMoral;

class ImpresionesController extends Controller
{

    public function notActuaciones($id){
       return view('documentos.not-actuacion')->with('id',$id);
    }

    public function impresionActuaciones($id){
        
        $idCarpeta=session('carpeta');
        $carpeta=DB::table('carpeta')
        ->join('unidad','carpeta.idUnidad','=','unidad.id')
        ->select('carpeta.fechaInicio','carpeta.numCarpeta')
        ->where('carpeta.id',$idCarpeta)
        ->first();

        $fiscalAtiende=DB::table('users')
        ->join('unidad','unidad.id','=','users.id')
        ->join('unidad as unid','unid.id','=','users.idUnidad')
        // ->join('unidad as uni','uni.idZona','=','zona.id')
        ->where('users.id', Auth::user()->id)
        ->select('users.nombreC','users.puesto','users.numFiscal','unid.descripcion','users.numFiscalLetras as letra')
        ->first();

        $victimas2 = DB::table('extra_denunciante')
        ->join('variables_persona', 'variables_persona.id', '=', 'extra_denunciante.idVariablesPersona')
        ->join('persona', 'persona.id', '=', 'variables_persona.idPersona')
        ->select('extra_denunciante.id','persona.nombres', 'persona.primerAp', 'persona.segundoAp','variables_persona.telefono','extra_denunciante.narracion')
        ->where('variables_persona.idCarpeta', '=', $idCarpeta)
        ->orderBy('persona.nombres', 'ASC')
        ->first();

        
        $puesto=$fiscalAtiende->puesto;
        $puesto = strtr(strtoupper($puesto),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ");

        // $numCarpeta=$carpeta->numCarpeta;
        //$fiscalAtendio=$carpeta->fiscalAtendio;


        //dd($carpeta);
        $fechaactual = date::now();
        $fechahum = $fechaactual->format('l j').' de '.$fechaactual->format('F').' del año '.$fechaactual->format('Y');
        $data = array('id' => $idCarpeta,
        'numCarpeta'=>$carpeta->numCarpeta,
        'fiscal'=>$fiscalAtiende->nombreC,
        'puesto'=>$puesto,
        'notificado'=> $victimas2->nombres.' '. $victimas2->primerAp.' '. $victimas2->segundoAp,
        // 'zona'=> $fiscalAtiende->zona,
        'fecha'=>$fechahum
        );
        
        //dd($data);
       
       return response()->json($data);
    }
    

    

    public function showOficio(){
        $idCarpeta=session('carpeta');
        // $idCarpeta= 1;
        $catalogo = CatCavd::orderBy('unidad', 'ASC')->pluck('unidad','id');
       
        $victimas2 = DB::table('extra_denunciante')
        ->join('variables_persona', 'variables_persona.id', '=', 'extra_denunciante.idVariablesPersona')
        ->join('persona', 'persona.id', '=', 'variables_persona.idPersona')
        ->select('persona.id','persona.nombres', 'persona.primerAp', 'persona.segundoAp')
        ->where('variables_persona.idCarpeta', '=', $idCarpeta)
        ->orderBy('persona.nombres', 'ASC')
        ->get();
        
        // dd($victimas2,$catalogo);

        return view('fields.oficio-cavd')
        // ->with('carpeta',$carpeta)
        ->with( 'victimas2', $victimas2)
        ->with( 'catalogo', $catalogo);
    }

    public function storeOficio(Request $request){
        $idCarpeta=session('carpeta');
        $Cavd = new Cavd();
        $Cavd->idCavd = $request->idCavd;
        $Cavd->idVariablesPersona = $request->idDenunciante;
        $Cavd->idCarpeta = $idCarpeta;
        $Cavd->save();
    
        if( $Cavd->save()){
            Alert::success('Registro guardado con éxito', 'Hecho');
            //     $bdbitacora = BitacoraNavCaso::where('idCaso',session('carpeta'))->first();
            // $bdbitacora->medidas = $bdbitacora->medidas+1;
            // $bdbitacora->save();
        }else{
            Alert::error('Se presentó un problema al guardar el registro', 'Error');
        }
        // DB::commit();
        // $data = DB::table('cavd')
        // ->join('cat_cavd','cat_cavd.id','=','cavd.idCavd')
        // ->select('cat_cavd.unidad')
        // ->first();
        // $victimas2 = DB::table('extra_denunciante')
        // ->join('variables_persona', 'variables_persona.id', '=', 'extra_denunciante.idVariablesPersona')
        // ->join('persona', 'persona.id', '=', 'variables_persona.idPersona')
        // ->select('extra_denunciante.id','persona.nombres', 'persona.primerAp', 'persona.segundoAp')
        // ->where('variables_persona.idCarpeta', '=', $idCarpeta)
        // ->orderBy('persona.nombres', 'ASC')
        // ->first();
        // dd( $request);
        return redirect()->route('oficio.cavd',$Cavd->id);
       
    }
   

    public function oficioCavd($id){
        return view('documentos.oficio-cavd')->with('id',  $id );
    }

    public function getCavd($id){
        $idCarpeta=session('carpeta');
        $carpeta=DB::table('carpeta')
        ->join('unidad','carpeta.idUnidad','=','unidad.id')
        ->select('carpeta.numCarpeta')
        ->where('carpeta.id',$idCarpeta)->first();

        $numCarpeta=$carpeta->numCarpeta;

        $datos=DB::Table('cavd')
        ->join('cat_cavd','cat_cavd.id','=','cavd.idCavd')
        ->join('variables_persona','variables_persona.id','=','cavd.idVariablesPersona')
        ->join('persona','persona.id','=','variables_persona.idPersona')
        ->select('cavd.id','cavd.idCavd','cavd.idVariablesPersona','cavd.idCarpeta','cat_cavd.nombreDirector','persona.nombres')
        ->where('cavd.id',$idCarpeta)
        ->first();


        $denunciantes = DB::table('extra_denunciante')
        ->join('variables_persona', 'variables_persona.id', '=', 'extra_denunciante.idVariablesPersona')
        ->join('persona', 'persona.id', '=', 'variables_persona.idPersona')
        ->select('extra_denunciante.id','persona.nombres', 'persona.primerAp', 'persona.segundoAp','variables_persona.telefono','extra_denunciante.narracion')
        ->where('variables_persona.idCarpeta', '=', $idCarpeta)
        ->first();

        // $cadenaDenunciantes='';
        // foreach($denunciantes as $denunciante){
        //     $cadenaDenunciantes .= $denunciante->nombres.' '. $denunciante->primerAp.' '. $denunciante->segundoAp.', ';
        // }
        // $telefonos='';
        // foreach($denunciantes as $denunciante){
        //     $telefonos .= $denunciante->telefono.', ';
        // }

        $fiscalAtiende=DB::table('users')
        ->join('unidad','unidad.id','=','users.id')
        ->join('unidad as unid','unid.id','=','users.idUnidad')
        ->where('users.id', Auth::user()->id)
        ->select('users.nombreC','users.puesto','users.numFiscal','unid.descripcion')
        ->first();

         
        $arr = explode(" ",$fiscalAtiende->descripcion);
        $aux=9;
        $localidad="";
        while(count($arr)-1 >= $aux){
            $localidad=$localidad." ".$arr[$aux];
            $aux=$aux+1;
        }


        $fechaactual = date::now();
        $fechahum = $fechaactual->format('l j').' de '.$fechaactual->format('F').' del año '.$fechaactual->format('Y');
        $fechahum= strtr(strtoupper($fechahum),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ");
        $data = array('id' => $idCarpeta,
        'idCavd' =>  $datos->idCavd,
        'idVariablesPersona' =>  $datos->idVariablesPersona,
        'numCarpeta' =>$carpeta->numCarpeta,
        'denunciante' => $denunciantes ->nombres.' '. $denunciantes ->primerAp.' '. $denunciantes ->segundoAp,
        'fecha' =>  $fechahum,
        'telefono' => $denunciantes->telefono,
        'fiscalAtiende' => $fiscalAtiende->nombreC,
        'puestoFiscal' => $fiscalAtiende->puesto,
        'localidad' => $localidad,
        'nombreDirector' =>$datos->nombreDirector
        );
        
        //dd($data);
       
        return response()->json($data);
    }
    // Oficio para direccion gral transporte estado

    public function storeoficioTransporte($id){
        $id=session('carpeta');
        $carpeta=DB::table('carpeta')
        ->join('unidad','carpeta.idUnidad','=','unidad.id')
        ->where('carpeta.id',$id)->first();


        $numCarpeta=$carpeta->numCarpeta;

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
        
        $arr = explode(" ",$fiscalAtiende->descripcion);
        $aux=9;
        $localidad="";
        // dd(count($arr)-1);
        while(count($arr)-1 >= $aux){
            $localidad=$localidad." ".$arr[$aux];
            $aux=$aux+1;
        }
        
        $oficio="PENDIENTE";
        $puesto=$fiscalAtiende->puesto;
        $puesto = strtr(strtoupper($puesto),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ");
       
        $fechaactual = new Date( $vehiculo->fecha);
        $fechahum = $fechaactual->format('l j').' de '.$fechaactual->format('F').' del año '.$fechaactual->format('Y');
        $fechahum= strtr(strtoupper($fechahum),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ");
        $data = array('id' => $id,
        'numCarpeta'=>$numCarpeta,
        'fiscalAtendio'=>$fiscalAtiende->nombreC,
        'puestoFiscal'=>$puesto,
        'marca'=>$vehiculo->marca,
        'submarca'=>$vehiculo->submarca,
        'color'=>$vehiculo->color,
        'zona'=>$localidad,
        'numSerie'=>$vehiculo->numSerie,
        'modelo'=>$vehiculo->modelo,
        'oficio'=>$oficio,
        // 'entidad'=>$localidadAtiende->descripcion,
        'fecha'=>$fechahum,
        'placas'=>$vehiculo->placas);
        
        // }
       return response()->json($data);
      
    }

    public function transporteEdo($id){
        return view('documentos.fTransporte')->with('id',$id);
    }



    public function tablaOficios($id){
        $idCarpeta=session('carpeta');
        $carpeta=DB::table('carpeta')
        ->join('unidad','carpeta.idUnidad','=','unidad.id')
        ->where('carpeta.id',$id)->first();
        // dd($carpeta);
        return view('tables.documentos')->with('carpeta',$carpeta);
    }

    //  PARA OFICIO FISCAL DE DISTRITO

    public function oficioDistrito(){
        $idCarpeta=session('carpeta');
        $carpeta=DB::table('carpeta')
        ->join('unidad','carpeta.idUnidad','=','unidad.id')
        ->where('carpeta.id',$idCarpeta)->first();

        $unidad = Unidad::select('id', 'descripcion')
        ->where('abreviacion','!=','')
        ->orderBy('descripcion', 'ASC')
        ->pluck('descripcion', 'id');

        $denunciados['']='Seleccione a la persona denunciada';
        $denunciado2= DB::table('variables_persona')
        ->join('persona', 'variables_persona.idPersona', '=', 'persona.id')
        ->join('extra_denunciado', 'variables_persona.id', '=', 'extra_denunciado.idVariablesPersona')
        ->where('variables_persona.idCarpeta',$idCarpeta)
        ->select('persona.nombres','persona.primerAp','persona.segundoAp', 'persona.id')
        ->get();

        foreach($denunciado2 as $denunciado){
            $denunciados[$denunciado->nombres.'-'.$denunciado->primerAp.'-'.$denunciado->segundoAp] = $denunciado->nombres.' '.$denunciado->primerAp.' '.$denunciado->segundoAp;
        }

        
        $delitos=DB::table('tipif_delito')
        ->join('carpeta as caso','tipif_delito.idCarpeta','=','caso.id')
        ->join('cat_delito','cat_delito.id','=','tipif_delito.idDelito')
        ->where('caso.id',$idCarpeta)
        ->select('cat_delito.id', 'cat_delito.nombre')
        ->orderBy('nombre', 'ASC')
        ->pluck('nombre', 'id');
            
       // dd($delitos);

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

           
        
        return view('fields.oficioDistrito')
        ->with('carpeta',$carpeta)
        ->with('unidad',$unidad)
        ->with('denunciado',$denunciados)
        ->with('victimas', $victimas)
        ->with('delitos',$delitos);
    }

    public function getFiscal(Request $request, $id){
        if($request){
            // dd('asdasd');
            $fiscales = DB::table('users')
            ->where('idUnidad','=',$id)
            ->select( 'id','nombreC as nombre')
            ->get();

            // $fiscal = DB::table('oficio_distritos')->where('oficio_distritos.id', $id)
            // ->select('oficio_distritos.entidad','oficio_distritos.localidad','oficio_distritos','oficio_distritos.fecha',
            // 'oficio_distritos.denunciante','oficio_distritos.delito','oficio_distritos.denunciado','oficio_distritos',
            // 'oficio_distritos.fiscalCordinador','oficio_distritos.fiscalDistrito','oficio_distritos.unidad','oficio_distritos.carpeta',
            // 'oficio_distritos.fiscalAtendio')
        // ->first();
            return response()->json($fiscales);
        }
    }

    public function getDatos($id){
        $datosAcuerdo = DB::table('oficio_distritos')->where('oficio_distritos.id', $id)
        ->join('cat_delito','cat_delito.id','=','oficio_distritos.delito')
        ->join('users','users.id','=','oficio_distritos.id')
        ->select('oficio_distritos.id','oficio_distritos.localidad',
        'oficio_distritos.denunciante','oficio_distritos.denunciado','oficio_distritos.fecha',
        'oficio_distritos.fiscalCordinador','oficio_distritos.fiscalDistrito','oficio_distritos.unidad','oficio_distritos.carpeta',
        'oficio_distritos.fiscalAtendio','cat_delito.nombre as delito','users.puesto')
        ->first();
        // dd( $datosAcuerdo);
        // dd(Auth::user()->nombreC);
        // $fiscal = Auth::user()->nombreC;
        $fechaactual = new Date( $datosAcuerdo->fecha);
        $fechahum = $fechaactual->format('l j').' de '.$fechaactual->format('F').' del año '.$fechaactual->format('Y');
        $data = array('id' => $id,
            'localidad' => $datosAcuerdo->localidad,
            'fecha' => $fechahum,
            'denunciante' => $datosAcuerdo->denunciante,
            'delito' => $datosAcuerdo->delito,
            'denunciado' => $datosAcuerdo->denunciado,
            'fiscalCordinador' => $datosAcuerdo->fiscalCordinador,
            'fiscalDistrito' => $datosAcuerdo->fiscalDistrito,
            'unidad' => $datosAcuerdo->unidad,
            'carpeta' => $datosAcuerdo->carpeta,
            'fiscalAtendio' => $datosAcuerdo->fiscalAtendio,
            'puesto' => $datosAcuerdo->puesto
        );
        //dd(Auth::user()->nombreC);
        return response()->json($data);
    }
    
    public function storeDistrito(Request $request){
        $idCarpeta=session('carpeta');
        $localidadAtiende= DB::table('users')
        ->join('unidad','unidad.id','=','users.idUnidad')
        ->join('zona','zona.id','=','unidad.idZona')
        ->where('users.id',Auth::user()->id)
        ->select('zona.descripcion')
        ->first();

        $localidadAtiende=$localidadAtiende->descripcion;   
        $acta = new OficioDistrito;
        // $acta->hora = Date::now()->format('H:i:s');
        $acta->localidad =  $localidadAtiende;
        $acta->fecha = Date::now()->format('Y-m-d');
        $acta->carpeta =  $idCarpeta;
        $acta->denunciante = $request->victima3;
        $acta->delito = $request->delito;
        $acta->denunciado = $request->denunciado1;
        $acta->fiscalCordinador = $request->fiscalC;
        $acta->fiscalDistrito = $request->fiscalDistrito;
        $acta->unidad = $request->unidadOficios;
        // $acta->carpeta = $request->carpeta;
        $acta->fiscalAtendio = Auth::user()->nombreC;
        // dd($acta);
        $acta->save();

        return redirect()->route('oficio.funcion', $acta->carpeta);
    }

    public function docDistrito($id){
        return view('documentos/acuerdo_fiscal')->with('id',$id);
    }

    public function policiaMinisterial($id){
        return view('documentos.policia-ministerial')->with('id',$id);
    }

    public function getMinisterial($id){

        $idCarpeta=session('carpeta');
        $carpeta=DB::table('carpeta')
        ->join('unidad','carpeta.idUnidad','=','unidad.id')
        ->select('carpeta.fechaInicio','carpeta.numCarpeta')
        ->where('carpeta.id',$idCarpeta)
        ->first();

        $navCaso=DB::table('bitacora_navcaso')
        ->where('idCaso',session('carpeta'))
        ->first();

        if ($navCaso->denunciante>1) {
            $complemento1="los ciudadanos";
        }
        else{
            $complemento1="el ciudadano";
        }

        

        $denunciantes = DB::table('extra_denunciante')
        ->join('variables_persona', 'variables_persona.id', '=', 'extra_denunciante.idVariablesPersona')
        ->join('persona', 'persona.id', '=', 'variables_persona.idPersona')
        ->select('extra_denunciante.id','persona.nombres', 'persona.primerAp', 'persona.segundoAp','variables_persona.telefono','extra_denunciante.narracion')
        ->where('variables_persona.idCarpeta', '=', $idCarpeta)
        ->get();

        $cadenaDenunciantes='';
        foreach($denunciantes as $denunciante){
            $cadenaDenunciantes .= $denunciante->nombres.' '. $denunciante->primerAp.' '. $denunciante->segundoAp.', ';
        }
        // $nombre= $denunciantes->nombres.' '. $denunciantes->primerAp.' '. $denunciantes->segundoAp;

        $fiscalAtiende=DB::table('users')
        ->join('unidad','unidad.id','=','users.id')
        ->join('unidad as unid','unid.id','=','users.idUnidad')
        ->where('users.id', Auth::user()->id)
        ->select('users.nombreC','users.puesto','users.numFiscal','unid.descripcion')
        ->first();

            $idCarpeta1='UIPJ/D17/VER1/22/1/2018';
            $apariciones= aparicionesModel::where('idCarpeta',$idCarpeta1)
            ->where('sistema','uat')
            ->where('tipoInvolucrado','denunciante')
            ->select('id','idVarPersona','idCarpeta','esEmpresa')
            ->first();
            
            $idVPersona=$apariciones->idVarPersona;
        // si es persona fisica
            if ($apariciones->esEmpresa==0) {
                
            $variablesP=VariablesPersona::where('id',$idVPersona)
            ->first();
            $datosPersona=PersonaModel::where('id',$variablesP->idPersona)
            ->first();
            $telefono=$variablesP->telefono;
            
            $denunciantes=$datosPersona->nombres.' '.$datosPersona->primerAp.' '.$datosPersona->segundoAp;
            }
            else 
// si es persona moral
{
        $variablesP=VariablesPersonaMoral::where('id',$idVPersona)
        ->first();
        $idPersona=$variablesP->idPersona;
        $datosPersona=PersonaMoralModel::where('id',$idPersona)
        ->select('nombre')
        ->first();
        $telefono=$variablesP->telefono;
        $denunciantes=$datosPersona->nombre;

    }
    //cambiar la variable por id->veriable de componente
    $idVariableP=1;
        $narracion=DB::table('narraciones_persona')
        ->where('idVariablesPersona',$idVariableP)
        ->select('narracion')
        ->first();

            // $denunciantes = DB::table('extra_denunciante')
            // ->join('variables_persona', 'variables_persona.id', '=', 'extra_denunciante.idVariablesPersona')
            // ->join('persona', 'persona.id', '=', 'variables_persona.idPersona')
            // ->select('extra_denunciante.id','persona.nombres', 'persona.primerAp', 'persona.segundoAp','variables_persona.telefono','extra_denunciante.narracion')
            // ->where('variables_persona.idCarpeta', '=', $idCarpeta)
            // ->get();

            // $cadenaDenunciantes='';
            // foreach($denunciantes as $denunciante){
            //     $cadenaDenunciantes .= $denunciante->nombres.' '. $denunciante->primerAp.' '. $denunciante->segundoAp.', ';
            // }
            // $nombre= $denunciantes->nombres.' '. $denunciantes->primerAp.' '. $denunciantes->segundoAp;

            $fiscalAtiende=DB::table('users')
            ->join('unidad','unidad.id','=','users.id')
            ->join('unidad as unid','unid.id','=','users.idUnidad')
            ->where('users.id', Auth::user()->id)
            ->select('users.nombreC','users.puesto','users.numFiscal','unid.descripcion')
            ->first();

            $TipifDelito=DB::table('tipif_delito')
            ->join('cat_delito','cat_delito.id','=','tipif_delito.idDelito')
            ->join('domicilio','domicilio.id','=','tipif_delito.idDomicilio')
            ->join('cat_municipio','cat_municipio.id','=','domicilio.idMunicipio')
            ->join('cat_localidad','cat_localidad.id','=','domicilio.idLocalidad')
            ->join('cat_colonia','cat_colonia.id','=','domicilio.idColonia')
            ->join('cat_estado','cat_municipio.idEstado','=','cat_estado.id')
            ->where('tipif_delito.idCarpeta',$idCarpeta)
            ->select('cat_delito.nombre','domicilio.calle','domicilio.numExterno','domicilio.numInterno','cat_estado.nombre as estado',
                      'cat_municipio.nombre as municipio','cat_localidad.nombre as localidad','cat_colonia.nombre as colonia','cat_colonia.codigoPostal')
            ->first();

            $puesto=$fiscalAtiende->puesto;
            $puesto = strtr(strtoupper($puesto),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ");

            $fechaactual = new Date($carpeta->fechaInicio);
            $fechahum = $fechaactual->format('l j').' de '.$fechaactual->format('F').' del año '.$fechaactual->format('Y');
            $fechahum=strtr(strtoupper($fechahum),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ");
            $datos=array('id'=> $idCarpeta,
            'numeroCarpeta'=> $carpeta->numCarpeta,
            'denunciante'=> $denunciantes,
            'fecha'=>$fechahum,
            'puesto'=>strtr(strtoupper($puesto),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ"),
            'delito'=>$TipifDelito->nombre,
            'calle'=>$TipifDelito->calle,
            'numExterno'=>$TipifDelito->numExterno,
            'numInterno'=>$TipifDelito->numInterno,
            'municipio'=>$TipifDelito->municipio,
            'localidad'=>$TipifDelito->localidad,
            'colonia'=>$TipifDelito->colonia,
            'CP'=>$TipifDelito->codigoPostal,
            'estado'=>$TipifDelito->estado,
            'numeroF'=> $fiscalAtiende->numFiscal,
            'descripcion'=> $fiscalAtiende->descripcion,
            'telefono'=> $telefono,
            'narracion'=>strtr(strtoupper($narracion->narracion),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ"), 
            'img' => asset('img/logo.png'),
            'complemento1'=>$complemento1,
            'nombreC'=>strtr(strtoupper($fiscalAtiende->nombreC),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ"));
        
    

        return response()->json($datos);


    }

    public function archivoTemporal($id){
        //dd('werwerwer');
        //$idCarpeta=session('carpeta');
        $carpeta=DB::table('carpeta')
        ->join('unidad','carpeta.idUnidad','=','unidad.id')
        ->select('carpeta.fechaInicio','carpeta.numCarpeta')
        ->where('carpeta.id',$id)
        ->first();

        $fiscalAtiende=DB::table('users')
        ->join('unidad','unidad.id','=','users.id')
        ->join('unidad as unid','unid.id','=','users.idUnidad')
        ->where('users.id', Auth::user()->id)
        ->select('users.nombreC','users.puesto','users.numFiscal','unid.descripcion as unidad','users.numFiscalLetras as letra')
        ->first();

        $denunciantes = DB::table('extra_denunciante')
        ->join('variables_persona', 'variables_persona.id', '=', 'extra_denunciante.idVariablesPersona')
        ->join('persona', 'persona.id', '=', 'variables_persona.idPersona')
        ->select('extra_denunciante.id','persona.nombres', 'persona.primerAp', 'persona.segundoAp','variables_persona.telefono','extra_denunciante.narracion')
        ->where('variables_persona.idCarpeta', '=', $id)
        ->get();

        $cadenaDenunciantes='';
        foreach($denunciantes as $denunciante){
            $cadenaDenunciantes .= $denunciante->nombres.' '. $denunciante->primerAp.' '. $denunciante->segundoAp.' ';
        }
        
        
        
        $nombreC=$fiscalAtiende->nombreC;
        $nombreC = strtr(strtoupper($nombreC),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ");
        
        $puestoF =$fiscalAtiende->puesto;
        $puestoF=strtr(strtoupper($puestoF),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ");
        
        $datos=array('id'=> $id,
        'numeroCarpeta'=> $carpeta->numCarpeta,
        'numeroF'=> $fiscalAtiende->numFiscal,
        'puesto'=> $puestoF,
        'unidad'=> $fiscalAtiende->unidad,
        'nombreC'=>$nombreC,
        'notificado'=>$cadenaDenunciantes);
        
        //dd($datos);
        //'puesto'=>$puesto,
        return response()->json($datos);
    }
    
    public function archivoTemporalImp($id){
        
        return view('documentos.archivoTemporal')
        ->with('id',$id);
    }

    public function primeraInvitacion(){

        $idCarpeta=session('carpeta');
        // $carpeta=DB::table('carpeta')
        // ->join('unidad','carpeta.idUnidad','=','unidad.id')
        // ->select('carpeta.fechaInicio','carpeta.numCarpeta')
        // ->where('carpeta.id',$idCarpeta)
        // ->first();

        $denunciantes = DB::table('variables_persona')
        ->join('persona', 'variables_persona.idPersona', '=', 'persona.id')
        ->join('extra_denunciado', 'variables_persona.id', '=', 'extra_denunciado.idVariablesPersona')
        ->where('variables_persona.idCarpeta',$idCarpeta)
        ->select('persona.nombres','persona.primerAp','persona.segundoAp', 'persona.id')
        ->get();

        return view('forms.primeraInvitacion')->with('denunciantes',$denunciantes);
    }

    public function mostrarOficio(){
        return view('documentos.invitaciones'); 
    }

    public function getInvitacion($id){
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
    }

    // ACUERDO DE INICIO

    public function oficioInicio($id){
        $idCarpeta=session('carpeta');
        $carpeta=DB::table('carpeta')
        ->join('unidad','carpeta.idUnidad','=','unidad.id')
        ->select('carpeta.fechaInicio','carpeta.numCarpeta')
        ->where('carpeta.id',$idCarpeta)
        ->first();

        $fiscalAtiende=DB::table('users')
        ->join('unidad','unidad.id','=','users.id')
        ->join('unidad as unid','unid.id','=','users.idUnidad')
        ->join('zona as localidad','localidad.id','=','unid.idZona')
        ->where('users.id', Auth::user()->id)
        ->select('users.nombreC','users.puesto','users.numFiscal','unid.descripcion','users.numFiscalLetras as letra', 'localidad.descripcion as ciudad')
        ->first();

           }

// ACUERDO DE INICIO

           public function oficioInicio($id){
            $idCarpeta=session('carpeta');
            $carpeta=DB::table('carpeta')
            ->join('unidad','carpeta.idUnidad','=','unidad.id')
            ->select('carpeta.fechaInicio','carpeta.numCarpeta')
            ->where('carpeta.id',$idCarpeta)
            ->first();

            $fiscalAtiende=DB::table('users')
            ->join('unidad','unidad.id','=','users.id')
            ->join('unidad as unid','unid.id','=','users.idUnidad')
            ->join('zona as localidad','localidad.id','=','unid.idZona')
            ->where('users.id', Auth::user()->id)
            ->select('users.nombreC','users.puesto','users.numFiscal','unid.descripcion','users.numFiscalLetras as letra', 'localidad.descripcion as ciudad')
            ->first();

             
            $arr = explode(" ",$fiscalAtiende->descripcion);
            $aux=9;
            $localidad="";
            while(count($arr)-1 >= $aux){
                $localidad=$localidad." ".$arr[$aux];
                $aux=$aux+1;
            }
           // dd($localidad);
           $navCaso=DB::table('bitacora_navcaso')
           ->where('idCaso',session('carpeta'))
           ->first();

           if ($navCaso->denunciante>1) {
               $complemento1="de los ciudadanos";
           }
           else{
               $complemento1="del ciudadano";
           }
           $idCarpeta1='UIPJ/D17/VER1/22/1/2018';
            $apariciones= aparicionesModel::where('idCarpeta',$idCarpeta1)
            ->where('sistema','uat')
            ->where('tipoInvolucrado','denunciante')
            ->select('id','idVarPersona','idCarpeta','esEmpresa')
            ->first();
            $idVPersona=$apariciones->idVarPersona;
            if ($apariciones->esEmpresa==0) {
                $variablesP=VariablesPersona::where('id',$idVPersona)
                ->first();
                $datosPersona=PersonaModel::where('id',$variablesP->idPersona)
                ->first();
                $denunciante=$datosPersona->nombres.' '.$datosPersona->primerAp.' '.$datosPersona->segundoAp;
            }
            else{
                $variablesP=VariablesPersonaMoral::where('id',$idVPersona)
                ->first();
                $idPersona=$variablesP->idPersona;
                $datosPersona=PersonaMoralModel::where('id',$idPersona)
                ->select('nombre')
                ->first();
        
                $denunciante=$datosPersona->nombre;
            }


            // $denunciantes = DB::table('variables_persona')
            // ->join('persona', 'variables_persona.idPersona', '=', 'persona.id')
            // ->join('extra_denunciante', 'variables_persona.id', '=', 'extra_denunciante.idVariablesPersona')
            // ->where('variables_persona.idCarpeta',$idCarpeta)
            // ->select('persona.nombres','persona.primerAp','persona.segundoAp', 'persona.id')
            // ->get();
            // $cadenaDenunciantes='';
            // foreach($denunciantes as $denunciante){
            //     $cadenaDenunciantes .= $denunciante->nombres.' '. $denunciante->primerAp.' '. $denunciante->segundoAp.' ';
            // }
            $TipifDelito=DB::table('tipif_delito')
            ->join('cat_delito','cat_delito.id','=','tipif_delito.idDelito')
            ->where('tipif_delito.idCarpeta',$idCarpeta)
            ->select('cat_delito.nombre')
            ->first();
            // $denunciado2= DB::table('variables_persona')
            // ->join('persona', 'variables_persona.idPersona', '=', 'persona.id')
            // ->join('extra_denunciado', 'variables_persona.id', '=', 'extra_denunciado.idVariablesPersona')
            // ->where('variables_persona.idCarpeta',$idCarpeta)
            // ->select('persona.nombres','persona.primerAp','persona.segundoAp', 'persona.id')
            // ->get();
            // $denunciados='';
            // foreach($denunciado2 as $denunciado){
            //     $denunciados .= $denunciado->nombres.
            $idCarpeta2='UIPJ/D42/VER0/19/8/2018';
            $apariciones2= aparicionesModel::where('idCarpeta',$idCarpeta2)
            ->where('sistema','uat')
            ->where('tipoInvolucrado','denunciado')
            ->select('id','idVarPersona','idCarpeta','esEmpresa')
            ->first();
            $idVPersona2=$apariciones2->idVarPersona;

            if($apariciones2->esEmpresa==0) {

                $variablesDenunciado=VariablesPersona::where('id',$idVPersona2)
                ->first();
                $denuncianteFisica=PersonaModel::where('id',$variablesDenunciado->idPersona)
                ->first();
                $denunciados=$denuncianteFisica->nombres.' '.$denuncianteFisica->primerAp.' '.$denuncianteFisica->segundoAp;
            }
            else{
                $variablesDenunciado=VariablesPersonaMoral::where('id',$idVPersona2)
                ->first();
                $denuncianteMoral=PersonaMoralModel::where('id',$variablesDenunciado->idPersona)
                ->select('nombre')
                ->first();
                $denunciados=$denuncianteMoral->nombre;

            }

             $hora=Carbon::now()->format('H:i');
             $fechaactual = date::now();
             $fechahum = $fechaactual->format('l j').' de '.$fechaactual->format('F').' del año '.$fechaactual->format('Y');
           
            //$ciudad=$fiscalAtiende->ciudad;
            $dictamen='dictamen';
            
           
            $datos=array('id'=> $idCarpeta,
            'nombreC'=>strtr(strtoupper($fiscalAtiende->nombreC),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ"),
            'ciudad'=>$localidad,
            'puesto'=>strtr(strtoupper($fiscalAtiende->puesto),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ"),
            'denunciante'=>strtr(strtoupper($denunciante),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ"),
            'delitos'=>$TipifDelito->nombre,
            'dictamenP'=>$dictamen,
            'numCarpeta'=>$carpeta->numCarpeta,
            'denunciados'=>strtr(strtoupper($denunciados),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ"),
            'fecha'=>strtr(strtoupper($fechahum),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ"),
            'complemento1'=>$complemento1,
             'hora'=>$hora
                );
           
            //dd($datos);
            return response()->json($datos);
            
        $arr = explode(" ",$fiscalAtiende->descripcion);
        $aux=9;
        $localidad="";
        while(count($arr)-1 >= $aux){
            $localidad=$localidad." ".$arr[$aux];
            $aux=$aux+1;
        }
        // dd($localidad);
        $navCaso=DB::table('bitacora_navcaso')
        ->where('idCaso',session('carpeta'))
        ->first();

        if ($navCaso->denunciante>1) {
            $complemento1="de los ciudadanos";
        }
        else{
            $complemento1="del ciudadano";
        }


        $denunciantes = DB::table('variables_persona')
        ->join('persona', 'variables_persona.idPersona', '=', 'persona.id')
        ->join('extra_denunciante', 'variables_persona.id', '=', 'extra_denunciante.idVariablesPersona')
        ->where('variables_persona.idCarpeta',$idCarpeta)
        ->select('persona.nombres','persona.primerAp','persona.segundoAp', 'persona.id')
        ->get();
        $cadenaDenunciantes='';
        foreach($denunciantes as $denunciante){
            $cadenaDenunciantes .= $denunciante->nombres.' '. $denunciante->primerAp.' '. $denunciante->segundoAp.' ';
        }
    
        $TipifDelito=DB::table('tipif_delito')
        ->join('cat_delito','cat_delito.id','=','tipif_delito.idDelito')
        ->where('tipif_delito.idCarpeta',$idCarpeta)
        ->select('cat_delito.nombre')
        ->first();
    
        $denunciado2= DB::table('variables_persona')
        ->join('persona', 'variables_persona.idPersona', '=', 'persona.id')
        ->join('extra_denunciado', 'variables_persona.id', '=', 'extra_denunciado.idVariablesPersona')
        ->where('variables_persona.idCarpeta',$idCarpeta)
        ->select('persona.nombres','persona.primerAp','persona.segundoAp', 'persona.id')
        ->get();
    
        $denunciados='';
        foreach($denunciado2 as $denunciado){
            $denunciados .= $denunciado->nombres.' '.$denunciado->primerAp.' '.$denunciado->segundoAp.'';
        }
    
        $hora=Carbon::now()->format('H:i');
        $fechaactual = date::now();
        $fechahum = $fechaactual->format('l j').' de '.$fechaactual->format('F').' del año '.$fechaactual->format('Y');
    
        //$ciudad=$fiscalAtiende->ciudad;
        $dictamen='dictamen';
        
        
        $datos=array('id'=> $idCarpeta,
        'nombreC'=>$fiscalAtiende->nombreC,
        'ciudad'=>$localidad,
        'puesto'=>$fiscalAtiende->puesto,
        'denunciante'=>$cadenaDenunciantes,
        'delitos'=>$TipifDelito->nombre,
        'dictamenP'=>$dictamen,
        'numCarpeta'=>$carpeta->numCarpeta,
        'denunciados'=>$denunciados,
        'fecha'=>$fechahum,
        'complemento1'=>$complemento1,
            'hora'=>$hora
            );
        
        //dd($datos);
        return response()->json($datos);
        
    }
    
    public function impresionInicio($id){    
        return view('documentos.inicioActa')
        ->with('id',$id);
    }


    public function docRemision($id){
        return view('documentos.acuerdoRemision')
        ->with('id',$id);
    }

    public function getRemision($id){
        $idCarpeta=session('carpeta');
        
        $carpeta=DB::table('carpeta')
        ->join('unidad','carpeta.idUnidad','=','unidad.id')
        ->select('carpeta.fechaInicio','carpeta.numCarpeta')
        ->where('carpeta.id',$idCarpeta)
        ->first();

        $fiscalAtiende=DB::table('users')
        ->join('unidad','unidad.id','=','users.id')
        ->join('unidad as unid','unid.id','=','users.idUnidad')
        ->join('zona as localidad','localidad.id','=','unid.idZona')
        ->where('users.id', Auth::user()->id)
        ->select('users.nombreC','users.puesto','users.numFiscal','unid.descripcion','users.numFiscalLetras as letra', 'localidad.descripcion as ciudad')
        ->first();

        $denunciantes = DB::table('variables_persona')
        ->join('persona', 'variables_persona.idPersona', '=', 'persona.id')
        ->join('extra_denunciante', 'variables_persona.id', '=', 'extra_denunciante.idVariablesPersona')
        ->where('variables_persona.idCarpeta',$idCarpeta)
        ->select('persona.nombres','persona.primerAp','persona.segundoAp', 'persona.id')
        ->get();
        
        $cadenaDenunciantes='';
        
        foreach($denunciantes as $denunciante){
            $cadenaDenunciantes .= $denunciante->nombres.' '. $denunciante->primerAp.' '. $denunciante->segundoAp.', ';
        }
        
        $denunciado2= DB::table('variables_persona')
        ->join('persona', 'variables_persona.idPersona', '=', 'persona.id')
        ->join('extra_denunciado', 'variables_persona.id', '=', 'extra_denunciado.idVariablesPersona')
        ->where('variables_persona.idCarpeta',$idCarpeta)
        ->select( 'persona.id','persona.nombres','persona.primerAp','persona.segundoAp')
        ->get();
        
        $denunciados='';
        
        foreach($denunciado2 as $denunciado){
            $denunciados .= $denunciado->nombres.' '.$denunciado->primerAp.' '.$denunciado->segundoAp.',';
        }
        
        $TipifDelito=DB::table('tipif_delito')
        ->join('cat_delito','cat_delito.id','=','tipif_delito.idDelito')
        ->where('tipif_delito.idCarpeta',$idCarpeta)
        ->select('cat_delito.nombre as delito')
        ->first();

        $nombreC=$fiscalAtiende->nombreC;
        $nombreC = strtr(strtoupper($nombreC),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ");

        $hora=Carbon::now()->format('H:i');
        $fechaactual = date::now();
        $fechahum = $fechaactual->format('l j').' de '.$fechaactual->format('F').' del año '.$fechaactual->format('Y');

        $datos=array('id'=> $idCarpeta,
            'fiscalAtendio'=>$nombreC,
            'ciudad'=>$fiscalAtiende->ciudad,
            'puesto'=>$fiscalAtiende->puesto,
            'denunciante'=>$cadenaDenunciantes,
            'denunciado'=>$denunciados,
            'delito'=>$TipifDelito->delito,
            'numCarpeta'=>$carpeta->numCarpeta,
            'fecha'=>$fechahum,
            'hora'=>$hora
        );
        
        //dd($datos);
        return response()->json($datos);


    }
}


