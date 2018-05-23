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

class CarpetaController extends Controller
{
    public function __construct(){
        Carbon::setLocale('es');
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
            session()->forget('carpeta');
            // Alert::info('No tiene ningún  caso abierto.');
            return redirect(url('carpetas'));
        }
        
        session()->forget('carpeta');
        return redirect(url('carpetas'));
    }

    public function cancelarCaso(){
        $idCarpeta = session('carpeta');
        $comprobar= Carpeta::where('id',$idCarpeta)->get();
        if(is_null($idCarpeta)){
            Alert::info('No tiene ningún caso en proceso.', 'Advertiencia');
            return redirect(url('carpetas'));    
        }
        
        $usuario=User::find(Auth::user()->id);
        $usuario->idCarpeta=null;
        $usuario->save();
        
        if (count($comprobar)==0) {
            $usuario=User::find(Auth::user()->id);
            $usuario->idCarpeta=null;
            $usuario->save();
            

            session()->forget('carpeta');
            Alert::info('No tiene ningún  caso en proceso.', 'Advertiencia');
            return redirect(url('carpetas'));
        }
        // $carpeta = Carpeta::find($idCarpeta);
        // $carpeta->delete();
        
        session()->forget('carpeta');
        Alert::info('El caso ha sido cancelado con éxito.', 'Hecho');
        return redirect(url('carpetas'));
    }



     public function showForm()
    {
        $tiposdet = CatTipoDeterminacion::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
        $nombreUnidad = Unidad::select('nombre')->where('id', Auth::user()->idUnidad)->pluck('nombre');
        $nombreUnidad = $nombreUnidad[0];
        return view('forms.inicio')->with('nombreUnidad', $nombreUnidad)->with('tiposdet', $tiposdet);
    }


    public function index($id)
    {
        $carpetaNueva = Carpeta::where('id', $id)->where('idFiscal', Auth::user()->id)->get();
        if(count($carpetaNueva)>0){
            $denunciantes = CarpetaController::getDenunciantes($id);
            $denunciados = CarpetaController::getDenunciados($id);
            $autoridades = CarpetaController::getAutoridades($id);
            $abogados = CarpetaController::getAbogados($id);
            $defensas = CarpetaController::getDefensas($id);
            $familiares = CarpetaController::getFamiliares($id);
            $delitos = CarpetaController::getDelitos($id);
            $medidasP=CarpetaController::getMedidasP($id);
            $acusaciones = CarpetaController::getAcusaciones($id);
            $vehiculos = CarpetaController::getVehiculos($id);
            $delits = CarpetaController::hayDelitosVeh($id);
            //dd($vehiculos);
            return view('carpeta')->with('carpetaNueva', $carpetaNueva)
                ->with('denunciantes', $denunciantes)
                ->with('denunciados', $denunciados)
                ->with('autoridades', $autoridades)
                ->with('abogados', $abogados)
                ->with('defensas', $defensas)
                ->with('familiares', $familiares)
                ->with('delitos', $delitos)
                ->with('acusaciones', $acusaciones)
                ->with('vehiculos', $vehiculos)
                ->with('delits', $delits);
        }else{
            return redirect()->route('home');
        }
    }

    public function verDetalle($id){
        $carpetaNueva = Carpeta::where('id', $id)->where('idFiscal', Auth::user()->id)->get();
        if(count($carpetaNueva)>0){
            $denunciantes = CarpetaController::getDenunciantes($id);
            $denunciados = CarpetaController::getDenunciados($id);
            $autoridades = CarpetaController::getAutoridades($id);
            $abogados = CarpetaController::getAbogados($id);
            $defensas = CarpetaController::getDefensas($id);
            $familiares = CarpetaController::getFamiliares($id);
            $delitos = CarpetaController::getDelitos($id);
            $acusaciones = CarpetaController::getAcusaciones($id);
            $vehiculos = CarpetaController::getVehiculos($id);
            $delits = CarpetaController::hayDelitosVeh($id);
            //dd($vehiculos);
            return view('detalle')->with('carpetaNueva', $carpetaNueva)
                ->with('denunciantes', $denunciantes)
                ->with('denunciados', $denunciados)
                ->with('autoridades', $autoridades)
                ->with('abogados', $abogados)
                ->with('defensas', $defensas)
                ->with('familiares', $familiares)
                ->with('delitos', $delitos)
                ->with('acusaciones', $acusaciones)
                ->with('vehiculos', $vehiculos)
                ->with('delits', $delits);
        }else{
            return redirect()->route('home');
        }
    }

    public static function getDenunciantes($id){
        $denunciantes = DB::table('extra_denunciante')
            ->join('variables_persona', 'variables_persona.id', '=', 'extra_denunciante.idVariablesPersona')
            ->join('persona', 'persona.id', '=', 'variables_persona.idPersona')
            ->select('extra_denunciante.id','persona.nombres', 'persona.primerAp', 'persona.segundoAp', 'extra_denunciante.reguardarIdentidad', 'extra_denunciante.victima','persona.rfc', 'persona.esEmpresa', 'variables_persona.edad', 'persona.sexo', 'variables_persona.telefono')
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
            ->select('extra_denunciado.id','persona.nombres', 'persona.primerAp', 'persona.segundoAp', 'persona.rfc', 'persona.esEmpresa', 'variables_persona.edad', 'persona.sexo', 'variables_persona.telefono')
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
            ->select('extra_autoridad.id', 'persona.nombres', 'persona.primerAp', 'persona.segundoAp', 'extra_autoridad.antiguedad', 'extra_autoridad.rango', 'extra_autoridad.horarioLaboral', 'variables_persona.docIdentificacion', 'variables_persona.numDocIdentificacion')
            ->where('variables_persona.idCarpeta', '=', $id)
            ->get();
        return $autoridades;
    }

    public static function getFamiliares($id){
        $familiaresDenunciado = DB::table('familiar')
            ->join('cat_ocupacion', 'cat_ocupacion.id', '=', 'familiar.idOcupacion')
            ->join('persona', 'persona.id', '=', 'familiar.idPersona')
            ->join('variables_persona', 'variables_persona.idPersona', '=', 'persona.id')
            ->join('extra_denunciado', 'variables_persona.id', '=', 'extra_denunciado.idVariablesPersona')
            ->select('familiar.nombres as familiarNombre','familiar.primerAp as familiarPrimerAp', 'familiar.segundoAp as familiarSegundoAp', 'familiar.parentesco', 'cat_ocupacion.nombre as ocupacion' , 'persona.nombres', 'persona.primerAp', 'persona.segundoAp')
            ->where('variables_persona.idCarpeta', '=', $id);
        $familiares = DB::table('familiar')
            ->join('cat_ocupacion', 'cat_ocupacion.id', '=', 'familiar.idOcupacion')
            ->join('persona', 'persona.id', '=', 'familiar.idPersona')
            ->join('variables_persona', 'variables_persona.idPersona', '=', 'persona.id')
            ->join('extra_denunciante', 'variables_persona.id', '=', 'extra_denunciante.idVariablesPersona')
            ->select('familiar.nombres as familiarNombre','familiar.primerAp as familiarPrimerAp', 'familiar.segundoAp as familiarSegundoAp', 'familiar.parentesco', 'cat_ocupacion.nombre as ocupacion' , 'persona.nombres', 'persona.primerAp', 'persona.segundoAp')
            ->where('variables_persona.idCarpeta', '=', $id)
            ->union($familiaresDenunciado)
            ->get();
        return $familiares;
    }

    public static function getDelitos($id){
        $delitos = DB::table('tipif_delito')
            ->join('cat_delito', 'cat_delito.id', '=', 'tipif_delito.idDelito')
            ->select('tipif_delito.id', 'cat_delito.id as idDelito', 'cat_delito.nombre as delito', 'tipif_delito.formaComision as modalidad', 'tipif_delito.fecha', 'tipif_delito.hora')
            ->where('tipif_delito.idCarpeta', '=', $id)
            ->get();
        return $delitos;
    }

    public static function hayDelitosVeh($id){
        $delveh = DB::table('tipif_delito')
            ->join('cat_delito', 'cat_delito.id', '=', 'tipif_delito.idDelito')
            ->select('tipif_delito.id', 'cat_delito.id as idDelito', 'cat_delito.nombre as delito')
            ->where('tipif_delito.idCarpeta', '=', $id)
            ->whereIn('idDelito', [130, 131, 132, 133, 134, 135, 242, 243, 244, 245, 227])
            ->get();
        if(count($delveh)>0){
            return true;
        }else{
            return false;
        }
    }

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
            ->select('acusacion.id', 'persona.nombres', 'persona.primerAp', 'persona.segundoAp', 'cat_delito.nombre as delito', 'per.nombres as nombres2', 'per.primerAp as primerAp2', 'per.segundoAp as segundoAp2')
            ->where('acusacion.idCarpeta', '=', $id)
            ->get();
        return $acusaciones;
    }

    public static function getVehiculos($id){
       $vehiculos = DB::table('vehiculo')
            ->join('tipif_delito', 'tipif_delito.id', '=', 'vehiculo.idTipifDelito')
            ->join('cat_delito', 'cat_delito.id', '=', 'tipif_delito.idDelito')
            ->join('cat_submarca', 'cat_submarca.id', '=', 'vehiculo.idSubmarca')
            ->join('cat_marca', 'cat_marca.id', '=', 'cat_submarca.idMarca')
            ->join('cat_tipo_vehiculo', 'cat_tipo_vehiculo.id', '=', 'vehiculo.idTipoVehiculo')
            ->join('cat_color', 'cat_color.id', '=', 'vehiculo.idColor')
            ->select('vehiculo.id','cat_delito.nombre as delito', 'cat_marca.nombre as marca', 'vehiculo.modelo', 'vehiculo.placas', 'cat_tipo_vehiculo.nombre as tipovehiculo', 'cat_color.nombre as color')
            ->where('tipif_delito.idCarpeta', '=', $id)
            ->get();
        return $vehiculos;
    }

    public function crearCaso(){
        $caso=session('carpeta');
        //dd($caso);
        if (is_null($caso)){   
            $caso = new Carpeta();
            $caso->idFiscal = Auth::user()->id;
            $caso->idUnidad = Auth::user()->idUnidad;
            $caso->fechaInicio = Carbon::now();
            $caso->horaIntervencion = Carbon::now();
            $caso->fechaDeterminacion = Carbon::now();
            $caso->save();
            session(['carpeta' => $caso->id]);

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
            if($carpterminadas){
                $carpeta = Carpeta::find($id);
                $carpeta->numCarpeta = "UAT/D"."1"."/"."X"."/"."XX"."/".Carbon::now()->year;
                $carpeta->idEstadoCarpeta = 1;
                $carpeta->save();

                $bdbitacora = BitacoraNavCaso::where('idCaso',$id)->first();
                $bdbitacora->terminada = 1;
                $bdbitacora->save();

                $usuario=User::find(Auth::user()->id);
                $usuario->idCarpeta=null;
                $usuario->save();

                $request->session()->forget('carpeta');
                if (session('preregistro')!=null) {
                    $request->session()->forget('preregistro');
                }
                Alert::success('Carpeta iniciada con éxito se le ha asignado el numero de carpeta: '.$carpeta->numCarpeta, 'Hecho')->persistent('Aceptar');
                return redirect('carpetas');
            }
            else{
                Alert::warning('No cuenta con los requisitos mínimos (denunciante, denunciado, delito, acusación) para terminar la carpeta', 'Advertencia')->persistent('Aceptar');
                return redirect()->back()->withInput();
            }
        }
    }
    public function descripcionHechos(Request $request){
        if ($request->session()->has('carpeta')) {
            $id=session('carpeta');
            $carpeta = Carpeta::find($id);
            $carpeta->descripcionHechos = $request->descripcionHechos;
            $carpeta->save();
            Alert::success('Descripcion de hechos registrada', 'Hecho');
            return redirect();        
        }
    }
}
