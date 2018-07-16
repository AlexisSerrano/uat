<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Alert;
use Carbon\Carbon;
use App\Models\Carpeta;
use App\User;
use App\Models\Unidad;
use App\Models\CatTipoDeterminacion;
use App\Models\BitacoraNavCaso;
use App\Models\HistorialCarpeta;

class CarpetaController extends Controller
{
    public function __construct(){
        Carbon::setLocale('es');
    }

    public function crearCaso(){
        $caso=session('carpeta');
        //dd($caso);
        if (is_null($caso)){  
            
            $unidad=DB::table('unidad')->where('id',Auth::user()->idUnidad)->first();
            $unidad=$unidad->abreviacion;


            $caso = new Carpeta();
            $caso->idFiscal = Auth::user()->id;
            $caso->idUnidad = Auth::user()->idUnidad;
            $caso->fechaInicio = Carbon::now();
            $caso->horaIntervencion = Carbon::now();
            $caso->fiscalAtendio = Auth::user()->nombreC;
            $caso->save();
            
            
            session(['carpeta' => $caso->id]);
            /* inicio generacion numCarpeta consecutivo */
            
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
            
            
            
            $numCarpeta=Carpeta::find($caso->id);
            $numCarpeta->numCarpeta = $NuevoNumCarpeta;            
            $numCarpeta->save();
            /* fin generacion numCarpeta consecutivo */
            
            session(['numCarpeta' => $numCarpeta->numCarpeta]);
            
            $usuario=User::find(Auth::user()->id);
            $usuario->idCarpeta=session('carpeta');
            $usuario->save();

            $bdbitacora = new BitacoraNavCaso;
            $bdbitacora->idCaso = $caso->id;
            $bdbitacora->save();
            //dd($idCarpeta);
            Alert::success('Caso iniciado con éxito', 'Hecho');
            return redirect()->route('new.denunciante');
        } else {
            Alert::warning('Tiene un caso en curso debe terminarlo o cancelarlo para iniciar uno nuevo', 'Advertencia');
            return redirect()->back()->withInput();
        }
    }


    public static function getCarpeta($id)
    {
        //dd(Auth::user());
        //if(Auth::user() == User::where('id', Auth::user()->id)){
        if (Auth::user() instanceof User) {
            $carpetaNueva = Carpeta::where('id', $id)->where('idFiscal', Auth::user()->id)->get();
        } else {
            $carpetaNueva = Carpeta::where('id', $id)->where('idFiscal', Auth::user()->id)->get();
        }
        return $carpetaNueva;
    }

    public function salirCaso(){
        $idCarpeta = session('carpeta');
        $terminada = session('terminada');
        $comprobar= Carpeta::where('id',$idCarpeta)->get();
        if(is_null($idCarpeta)||is_null($terminada)){
            Alert::info('No tiene ningún  caso abierto.');
            return redirect(url('carpetas'));    
        }else{
            session()->forget('terminada');
            session()->forget('numCarpeta');
            session()->forget('carpeta');
            // Alert::info('No tiene ningún  caso abierto.');
            return redirect(route('indexcarpetas'));
        }
        session()->forget('terminada');
        session()->forget('numCarpeta');
        session()->forget('carpeta');
        return redirect(route('indexcarpetas'));
    }

    public function cancelarCaso(){
        $idCarpeta = session('carpeta');
        $comprobar= Carpeta::where('id',$idCarpeta)->get();
        if(is_null($idCarpeta)){
            Alert::info('No tiene ningún caso en proceso.', 'Advertiencia');
            return redirect(route('indexcarpetas'));    
        }
        
        $usuario=User::find(Auth::user()->id);
        $usuario->idCarpeta=null;
        $usuario->save();
        
        if (count($comprobar)==0) {
            $usuario=User::find(Auth::user()->id);
            $usuario->idCarpeta=null;
            $usuario->save();
            
            session()->forget('numCarpeta');
            session()->forget('carpeta');
            Alert::info('No tiene ningún  caso en proceso.', 'Advertiencia');
            return redirect(url('carpetas'));
        }
        
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
        
        session()->forget('numCarpeta');
        session()->forget('carpeta');
        Alert::info('El caso ha sido cancelado con éxito.', 'Hecho');
        return redirect(url('carpetasReserva'));
    }

    public function terminar(Request $request){
        if ($request->session()->has('carpeta')) {
            $id=session('carpeta');
            $carpterminadas = DB::table('acusacion')
            ->join('extra_denunciante', 'extra_denunciante.id', '=', 'acusacion.idDenunciante')
            ->join('variables_persona', 'variables_persona.id', '=', 'extra_denunciante.idVariablesPersona')
            ->join('persona', 'persona.id', '=', 'variables_persona.idPersona')
            ->join('extra_denunciado', 'extra_denunciado.id', '=', 'acusacion.idDenunciado')
            ->join('variables_persona as var', 'var.id', '=', 'extra_denunciado.idVariablesPersona')
            ->join('persona as per', 'per.id', '=', 'var.idPersona')
            ->join('tipif_delito', 'tipif_delito.id', '=', 'acusacion.idTipifDelito')
            ->join('cat_delito', 'cat_delito.id', '=', 'tipif_delito.idDelito')
            ->join('carpeta', 'carpeta.id', '=', 'acusacion.idCarpeta')
            ->select('carpeta.id')
            ->where('carpeta.id',$id)
            ->first();

            $unidad=DB::table('unidad')->where('id',Auth::user()->idUnidad)->first();
            $unidad=$unidad->abreviacion;

            if($carpterminadas){
                $carpeta = Carpeta::find($id);
                $carpeta->fiscalAtendio = Auth::user()->nombreC;
                $carpeta->idEstadoCarpeta = 1;
                $carpeta->save();

                $idCarpetaAux=$carpeta->id;
                $motivo=$carpeta->descripcionHechos;
                $numCarpetaAux=$carpeta->numCarpeta;
                
                $historial= new HistorialCarpeta;
                $historial->idCarpeta = $idCarpetaAux;
                $historial->idEstatusCarpeta = 1;
                $historial->observacion = $motivo;
                $historial->numCarpeta = $numCarpetaAux;
                $historial->fiscal = Auth::user()->nombreC;
                $historial->fecha = Carbon::now();
                $historial->save();
                
                $bdbitacora = BitacoraNavCaso::where('idCaso',$id)->first();
                $bdbitacora->terminada = 1;
                $bdbitacora->save();

                $usuario=User::find(Auth::user()->id);
                $usuario->idCarpeta=null;
                $usuario->save();

                $request->session()->forget('carpeta');
                $request->session()->forget('numCarpeta');
                if (session('preregistro')!=null) {
                    $request->session()->forget('preregistro');
                    $request->session()->forget('foliopreregistro');
                }
                Alert::success('Carpeta iniciada con éxito se le ha asignado el número de carpeta: '.$carpeta->numCarpeta, 'Hecho')->persistent('Aceptar');
                return redirect('carpetas');
            }
            else{
                Alert::warning('No cuenta con los requisitos mínimos (denunciante, denunciado, delito, acusación) para terminar la carpeta', 'Advertencia')->persistent('Aceptar');
                return redirect()->back()->withInput();
            }
        }
    }

    public function indexCarpetasReserva(){
        //dd(Auth::user()->id);
        $carpetas = DB::table('carpeta')
        ->join('variables_persona','variables_persona.idCarpeta','=','carpeta.id')
        ->leftJoin('extra_autoridad','extra_autoridad.idVariablesPersona','=','variables_persona.id')
        ->leftJoin('extra_denunciante','extra_denunciante.idVariablesPersona','=','variables_persona.id')
        //->join('extra_denunciado','extra_denunciado.idVariablesPersona','!=','variables_persona.id')
        //->join('extra_abogado','extra_abogado.idVariablesPersona','=','variables_persona.id')
        ->join('persona','persona.id','=','variables_persona.idPersona')
        ->select('carpeta.id as id',
        'carpeta.fechaInicio',
        DB::raw("CONCAT(`persona`.`nombres`,' ',CASE WHEN `persona`.`primerAp` IS NULL  THEN '' ELSE `persona`.`primerAp` END,' ',CASE WHEN `persona`.`segundoAp` IS NULL  THEN '' ELSE `persona`.`segundoAp` END) as nombre"),
        'carpeta.horaIntervencion',
        'carpeta.fiscalAtendio' )
        ->where('idFiscal',Auth::user()->id)
        ->whereNull('idEstadoCarpeta')
        // ->whereNull('extra_autoridad.idVariablesPersona')
        ->paginate('10');
         //dd($carpetas);
        return view('tables.carpetasReserva')->with('carpetas',$carpetas);
        
        //    dd(session());
        
    }

    public function filtroCarpetaReserva(Request $request){
        $carpeta=$request->search;
        
        $carpetas = DB::table('carpeta')
        ->join('variables_persona','variables_persona.idCarpeta','=','carpeta.id')
        ->leftJoin('extra_autoridad','extra_autoridad.idVariablesPersona','=','variables_persona.id')
        ->leftJoin('extra_denunciante','extra_denunciante.idVariablesPersona','=','variables_persona.id')
        ->join('extra_denunciado','extra_denunciado.idVariablesPersona','!=','variables_persona.id')
        ->join('extra_abogado','extra_abogado.idVariablesPersona','!=','variables_persona.id')
        ->join('persona','persona.id','=','variables_persona.idPersona')
        ->select('carpeta.id as id',
        'carpeta.fechaInicio',
        DB::raw("CONCAT(`persona`.`nombres`,' ',CASE WHEN `persona`.`primerAp` IS NULL  THEN '' ELSE `persona`.`primerAp` END,' ',CASE WHEN `persona`.`segundoAp` IS NULL  THEN '' ELSE `persona`.`segundoAp` END) as nombre"),
        'carpeta.horaIntervencion',
        'carpeta.fiscalAtendio' )
        ->where('idFiscal',Auth::user()->id)
        ->where(function($query) use ($carpeta){
            $query
            ->orwhere('persona.nombres','like','%'.$carpeta.'%')
            ->orwhere('persona.primerAp','like','%'.$carpeta.'%')
            ->orwhere('persona.segundoAp','like','%'.$carpeta.'%')
            ->orwhere('carpeta.numCarpeta','like','%'.$carpeta.'%')
            ->orwhere('carpeta.horaIntervencion','like','%'.$carpeta.'%')
            ->orwhere('carpeta.fechaInicio','like','%'.$carpeta.'%')
            ->orwhere('carpeta.fiscalAtendio','like','%'.$carpeta.'%');
          })
        ->whereNull('idEstadoCarpeta')
        ->paginate('10');
        // dd( $carpetas);
        // return Datatables::of($carpetas)->make(true);
        return view('tables.carpetasReserva')->with('carpetas',$carpetas);


    }

    public static function getDenunciantes($id){
        $denunciantes = DB::table('extra_denunciante')
            ->join('variables_persona', 'variables_persona.id', '=', 'extra_denunciante.idVariablesPersona')
            ->join('persona', 'persona.id', '=', 'variables_persona.idPersona')
            ->select('extra_denunciante.idVariablesPersona','extra_denunciante.id','persona.nombres', 'persona.primerAp', 'persona.segundoAp', 'extra_denunciante.reguardarIdentidad', 'extra_denunciante.victima','persona.rfc', 'persona.esEmpresa', 'variables_persona.edad', 'persona.sexo', 'variables_persona.telefono')
            ->where('variables_persona.idCarpeta', '=', $id)
            ->get();
        return $denunciantes;
    }

    public static function getMedidasP($id){
        $medidasP = DB::table('providencias_precautorias')
        ->join('cat_providencia_precautoria', 'providencias_precautorias.idProvidencia', '=', 'cat_providencia_precautoria.id')
        ->join('ejecutor','providencias_precautorias.idEjecutor','=','ejecutor.id')
        ->join('persona','providencias_precautorias.idPersona','=','persona.id')
        ->where('providencias_precautorias.idCarpeta',$id)
        ->where('providencias_precautorias.deleted_at',null)
        ->select('providencias_precautorias.id as id','cat_providencia_precautoria.nombre as providencia', 'ejecutor.nombre as ejecutor', 'providencias_precautorias.fechaInicio as fechaInicio', 'providencias_precautorias.fechaFin as fechaFin', 'providencias_precautorias.observacion as observacion', DB::raw("CONCAT(`persona`.`nombres`,' ',CASE WHEN `persona`.`primerAp` IS NULL  THEN '' ELSE `persona`.`primerAp` END,' ',CASE WHEN `persona`.`segundoAp` IS NULL  THEN '' ELSE `persona`.`segundoAp` END) as nombre"))->get();
        
        
        return $medidasP;
    }

    public static function getDenunciados($id){
        $denunciados = DB::table('extra_denunciado')
            ->join('variables_persona', 'variables_persona.id', '=', 'extra_denunciado.idVariablesPersona')
            ->join('persona', 'persona.id', '=', 'variables_persona.idPersona')
            ->select('extra_denunciado.alias','extra_denunciado.idVariablesPersona','extra_denunciado.id','persona.nombres', 'persona.primerAp', 'persona.segundoAp', 'persona.rfc', 'persona.esEmpresa', 'variables_persona.edad', 'persona.sexo', 'variables_persona.telefono')
            ->where('variables_persona.idCarpeta', '=', $id)
            ->get();
        return $denunciados;
    }

    public static function getAbogados($id){
        $abogados = DB::table('extra_abogado')
            ->join('variables_persona', 'variables_persona.id', '=', 'extra_abogado.idVariablesPersona')
            ->join('persona', 'persona.id', '=', 'variables_persona.idPersona')
            ->select('extra_abogado.id','persona.nombres', 'persona.primerAp', 'persona.segundoAp', 'extra_abogado.cedulaProf', 'extra_abogado.sector', 'extra_abogado.tipo')
            ->where('variables_persona.idCarpeta', '=', $id)
            ->get();
        return $abogados;
    }


    public static function getDefensas($id){
        $defensas1 = DB::table('extra_abogado')
            ->join('variables_persona', 'variables_persona.id', '=', 'extra_abogado.idVariablesPersona')
            ->join('persona', 'persona.id', '=', 'variables_persona.idPersona')            
            ->join('extra_denunciante', 'extra_denunciante.idAbogado', '=', 'extra_abogado.id')
            ->join('variables_persona as var', 'var.id', '=', 'extra_denunciante.idVariablesPersona')
            ->join('persona as per', 'per.id', '=', 'var.idPersona')  
            ->select('extra_abogado.id','persona.nombres', 'persona.primerAp', 'persona.segundoAp', 'per.nombres as nombres2', 'per.primerAp as primerAp2', 'per.segundoAp as segundoAp2')
            ->where('variables_persona.idCarpeta', '=', $id);
        $defensas = DB::table('extra_abogado')
            ->join('variables_persona', 'variables_persona.id', '=', 'extra_abogado.idVariablesPersona')
            ->join('persona', 'persona.id', '=', 'variables_persona.idPersona')            
            ->join('extra_denunciado', 'extra_denunciado.idAbogado', '=', 'extra_abogado.id')
            ->join('variables_persona as var', 'var.id', '=', 'extra_denunciado.idVariablesPersona')
            ->join('persona as per', 'per.id', '=', 'var.idPersona')  
            ->select('extra_abogado.id','persona.nombres', 'persona.primerAp', 'persona.segundoAp', 'per.nombres as nombres2', 'per.primerAp as primerAp2', 'per.segundoAp as segundoAp2')
            ->where('variables_persona.idCarpeta', '=', $id)
            ->union($defensas1)
            ->get();
        return $defensas;
    }

    public static function getAutoridades($id){
        $autoridades = DB::table('extra_autoridad')
            ->join('variables_persona', 'variables_persona.id', '=', 'extra_autoridad.idVariablesPersona')
            ->join('persona', 'persona.id', '=', 'variables_persona.idPersona')
            ->select('extra_autoridad.idVariablesPersona','extra_autoridad.id', 'persona.nombres', 'persona.primerAp', 'persona.segundoAp', 'extra_autoridad.antiguedad', 'extra_autoridad.rango', 'extra_autoridad.horarioLaboral', 'variables_persona.docIdentificacion', 'variables_persona.numDocIdentificacion')
            ->where('variables_persona.idCarpeta', '=', $id)
            ->get();
        return $autoridades;
    }


    public static function getDelitos($id){
        $delitos = DB::table('tipif_delito')
            ->join('cat_delito', 'cat_delito.id', '=', 'tipif_delito.idDelito')
            ->join('cat_agrupacion1', 'cat_agrupacion1.id', '=', 'tipif_delito.idAgrupacion1')
            ->join('cat_agrupacion2', 'cat_agrupacion2.id', '=', 'tipif_delito.idAgrupacion2')
            ->select(
                'tipif_delito.id', 
                'cat_delito.id as idDelito', 
                'cat_delito.nombre as delito',
                DB::raw('(CASE WHEN cat_agrupacion1.nombre = "SIN AGRUPACION" THEN "" ElSE cat_agrupacion1.nombre END) AS desagregacion1'),
                DB::raw('(CASE WHEN cat_agrupacion2.nombre = "SIN AGRUPACION" THEN "" ElSE cat_agrupacion2.nombre END) AS desagregacion2'),
                'tipif_delito.formaComision as modalidad', 
                'tipif_delito.fecha', 
                'tipif_delito.hora')
            ->where('tipif_delito.idCarpeta', '=', $id)
            ->get();
        return $delitos;
    }

    // public static function hayDelitosVeh($id){
    //     $delveh = DB::table('tipif_delito')
    //         ->join('cat_delito', 'cat_delito.id', '=', 'tipif_delito.idDelito')
    //         ->select('tipif_delito.id', 'cat_delito.id as idDelito', 'cat_delito.nombre as delito')
    //         ->where('tipif_delito.idCarpeta', '=', $id)
    //         ->whereIn('idDelito', [130, 131, 132, 133, 134, 135, 242, 243, 244, 245, 227])
    //         ->get();
    //     if(count($delveh)>0){
    //         return true;
    //     }else{
    //         return false;
    //     }
    // }

    public static function getAcusaciones($id){
        $acusaciones = DB::table('acusacion')
            ->join('extra_denunciante', 'extra_denunciante.id', '=', 'acusacion.idDenunciante')
            ->join('variables_persona', 'variables_persona.id', '=', 'extra_denunciante.idVariablesPersona')
            ->join('persona', 'persona.id', '=', 'variables_persona.idPersona')
            ->join('extra_denunciado', 'extra_denunciado.id', '=', 'acusacion.idDenunciado')
            ->join('variables_persona as var', 'var.id', '=', 'extra_denunciado.idVariablesPersona')
            ->join('persona as per', 'per.id', '=', 'var.idPersona')
            ->join('tipif_delito', 'tipif_delito.id', '=', 'acusacion.idTipifDelito')
            ->join('cat_delito', 'cat_delito.id', '=', 'tipif_delito.idDelito')
            ->join('cat_agrupacion1', 'cat_agrupacion1.id', '=', 'tipif_delito.idAgrupacion1')
            ->join('cat_agrupacion2', 'cat_agrupacion2.id', '=', 'tipif_delito.idAgrupacion2')
            ->select('acusacion.id', 'persona.nombres', 'persona.primerAp', 'persona.segundoAp', 'cat_delito.nombre as delito', 'cat_agrupacion1.nombre as desagregacion1', 'cat_agrupacion2.nombre as desagregacion2', 'per.nombres as nombres2', 'per.primerAp as primerAp2', 'per.segundoAp as segundoAp2')
            ->where('acusacion.idCarpeta', '=', $id)
            ->get();
            $cont=0;
            foreach ($acusaciones as $delito => $nombre) {
                if ($acusaciones[$cont]->desagregacion1 == 'SIN AGRUPACION') {
                    $acusaciones[$cont]->desagregacion1 = "";
                }if ($acusaciones[$cont]->desagregacion2 == 'SIN AGRUPACION') {
                    $acusaciones[$cont]->desagregacion2 = "";
                }
                $cont = $cont + 1;
            }
        return $acusaciones;
    }


    public static function getVehiculos($id)
    {
        $vehiculos = DB::table('vehiculo')
            ->join('tipif_delito', 'tipif_delito.id', '=', 'vehiculo.idTipifDelito')
            ->join('cat_delito', 'cat_delito.id', '=', 'tipif_delito.idDelito')
            ->join('cat_agrupacion1', 'cat_agrupacion1.id', '=', 'tipif_delito.idAgrupacion1')
            ->join('cat_agrupacion2', 'cat_agrupacion2.id', '=', 'tipif_delito.idAgrupacion2')
            ->join('cat_submarcas', 'cat_submarcas.id', '=', 'vehiculo.idSubmarca')
            ->join('cat_marca', 'cat_marca.id', '=', 'cat_submarcas.idMarca')
            ->join('cat_tipo_vehiculo', 'cat_tipo_vehiculo.id', '=', 'vehiculo.idTipoVehiculo')
            ->join('cat_color', 'cat_color.id', '=', 'vehiculo.idColor')
            ->select('vehiculo.id', 
                'cat_delito.nombre as delito',
                DB::raw('(CASE WHEN cat_agrupacion1.nombre = "SIN AGRUPACION" THEN "" ElSE cat_agrupacion1.nombre END) AS desagregacion1'),
                DB::raw('(CASE WHEN cat_agrupacion2.nombre = "SIN AGRUPACION" THEN "" ElSE cat_agrupacion2.nombre END) AS desagregacion2'),
                'cat_marca.nombre as marca', 
                'vehiculo.modelo', 
                'vehiculo.placas', 
                'cat_tipo_vehiculo.nombre as tipovehiculo', 
                'cat_color.nombre as color')
            ->where('tipif_delito.idCarpeta', '=', $id)
            ->get();
        return $vehiculos;
    }

    
    // public function descripcionHechos(Request $request){
    //     if ($request->session()->has('carpeta')) {
    //         $id=session('carpeta');
    //         $carpeta = Carpeta::find($id);
    //         $carpeta->descripcionHechos = $request->descripcionHechos;
    //         $carpeta->save();
    //         Alert::success('Descripcion de hechos registrada', 'Hecho');
    //         return redirect();        
    //     }
    // }
}
