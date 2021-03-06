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
                $consecutivo=$partesNumero[3] + 1;
                $NuevoNumCarpeta = $unidad.'/'.$consecutivo.'/'.$partesNumero[4];    
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
            ->join('componentes.apariciones as aparicionesDenunciante', 'aparicionesDenunciante.id', '=', 'acusacion.idDenunciante')
            ->leftJoin('componentes.variables_persona_fisica as variables_fisicaDenunciante', 'variables_fisicaDenunciante.id', '=', 'aparicionesDenunciante.idVarPersona')
            ->leftJoin('componentes.variables_persona_moral as variables_moral-denunciante', 'variables_moral-denunciante.id', '=', 'aparicionesDenunciante.idVarPersona')
            ->leftJoin('componentes.extra_denunciante_fisico as extra_denunciante_fisico', 'variables_fisicaDenunciante.id', '=', 'extra_denunciante_fisico.idVariablesPersona')
            ->leftJoin('componentes.extra_denunciante_moral as extra_denunciante_moral', 'variables_moral-denunciante.id', '=', 'extra_denunciante_moral.idVariablesPersona')
            ->leftJoin('componentes.persona_fisica as persona_fisica_denunciante', 'persona_fisica_denunciante.id', '=', 'variables_fisicaDenunciante.idPersona')
            ->leftJoin('componentes.sexos as sexo_denunciante', 'sexo_denunciante.id', '=', 'persona_fisica_denunciante.sexo')
            ->leftJoin('componentes.persona_moral as persona_moral_denunciante', 'persona_moral_denunciante.id', '=', 'variables_moral-denunciante.idPersona')
            
            ->join('componentes.apariciones as aparicionesDenunciado', 'aparicionesDenunciado.id', '=', 'acusacion.idDenunciado')
            ->leftJoin('componentes.variables_persona_fisica as variables_fisica_denunciado', 'variables_fisica_denunciado.id', '=', 'aparicionesDenunciante.idVarPersona')
            ->leftJoin('componentes.variables_persona_moral as variables_moral_denunciado', 'variables_moral_denunciado.id', '=', 'aparicionesDenunciado.idVarPersona')
            ->leftJoin('componentes.extra_denunciado_fisico as extras_fisica_denunciado', 'variables_fisica_denunciado.id', '=', 'extras_fisica_denunciado.idVariablesPersona')
            ->leftJoin('componentes.extra_denunciado_moral as extras_moral_denunciado', 'variables_moral_denunciado.id', '=', 'extras_moral_denunciado.idVariablesPersona')
            ->leftJoin('componentes.persona_fisica as persona_fisica_denunciado', 'persona_fisica_denunciado.id', '=', 'variables_fisica_denunciado.idPersona')
            ->leftJoin('componentes.sexos as sexo_denuncuado', 'sexo_denuncuado.id', '=', 'persona_fisica_denunciado.sexo')
            ->leftJoin('componentes.persona_moral as persona_moral_denunciado', 'persona_moral_denunciado.id', '=', 'variables_moral_denunciado.idPersona')

            // ->join('variables_persona', 'variables_persona.id', '=', 'extra_denunciante.idVariablesPersona')
            // ->join('persona', 'persona.id', '=', 'variables_persona.idPersona')
            // ->join('extra_denunciado', 'extra_denunciado.id', '=', 'acusacion.idDenunciado')
            // ->join('variables_persona as var', 'var.id', '=', 'extra_denunciado.idVariablesPersona')
            // ->join('persona as per', 'per.id', '=', 'var.idPersona')
            ->join('tipif_delito', 'tipif_delito.id', '=', 'acusacion.idTipifDelito')
            ->join('cat_delito', 'cat_delito.id', '=', 'tipif_delito.idDelito')
            ->join('carpeta', 'carpeta.id', '=', 'acusacion.idCarpeta')
            ->select('carpeta.id')
            ->where('carpeta.id',$id)
            ->where('aparicionesDenunciante.idCarpeta',$id)
            ->where('aparicionesDenunciado.idCarpeta',$id)
            ->get();

            $unidad=DB::table('unidad')->where('id',Auth::user()->idUnidad)->first();
            $unidad=$unidad->abreviacion;

            if($carpterminadas->isNotEmpty()){
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
        // ->join('variables_persona','variables_persona.idCarpeta','=','carpeta.id')
        // ->leftJoin('extra_autoridad','extra_autoridad.idVariablesPersona','=','variables_persona.id')
        // ->leftJoin('extra_denunciante','extra_denunciante.idVariablesPersona','=','variables_persona.id')
        // ->join('extra_denunciado','extra_denunciado.idVariablesPersona','!=','variables_persona.id')
        // ->join('extra_abogado','extra_abogado.idVariablesPersona','=','variables_persona.id')
        // ->join('persona','persona.id','=','variables_persona.idPersona')
        ->select('carpeta.id as id',
        'carpeta.fechaInicio',
        // DB::raw("CONCAT(`persona`.`nombres`,' ',CASE WHEN `persona`.`primerAp` IS NULL  THEN '' ELSE `persona`.`primerAp` END,' ',CASE WHEN `persona`.`segundoAp` IS NULL  THEN '' ELSE `persona`.`segundoAp` END) as nombre"),
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
        $denunciantes = DB::table('componentes.apariciones as apariciones')->distinct()
            ->leftJoin('componentes.variables_persona_fisica as variables_fisica', 'variables_fisica.id', '=', 'apariciones.idVarPersona')
            ->leftJoin('componentes.variables_persona_moral as variables_moral', 'variables_moral.id', '=', 'apariciones.idVarPersona')
            ->leftJoin('componentes.extra_denunciante_fisico as extras_fisica', 'variables_fisica.id', '=', 'extras_fisica.idVariablesPersona')
            ->leftJoin('componentes.extra_denunciante_moral as extras_moral', 'variables_moral.id', '=', 'extras_moral.idVariablesPersona')
            ->leftJoin('componentes.persona_fisica as persona_fisica', 'persona_fisica.id', '=', 'variables_fisica.idPersona')
            ->leftJoin('componentes.sexos as sexo', 'sexo.id', '=', 'persona_fisica.sexo')
            ->leftJoin('componentes.persona_moral as persona_moral', 'persona_moral.id', '=', 'variables_moral.idPersona')
            ->select('apariciones.id as idApariciones',
            DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN extras_fisica.id ELSE extras_moral.id END) AS idExtra'),//'extra_denunciante.id', 
            DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN persona_fisica.nombres ELSE persona_moral.nombre END) AS nombres'),//'persona.nombres', 
            DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN persona_fisica.primerAp ELSE "" END) AS primerAp'),//'persona.primerAp', 
            DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN persona_fisica.segundoAp ELSE "" END) AS segundoAp'),//'persona.segundoAp', 
            DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN extras_fisica.resguardarIdentidad ELSE extras_moral.resguardarIdentidad END) AS reguardarIdentidad'),//'extra_denunciante.reguardarIdentidad', 
            DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN extras_fisica.alias ELSE "NO APLICA" END) AS alias'),//'extra_denunciante.alias',
            DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN extras_fisica.victima ELSE extras_moral.victima END) AS victima'),//'extra_denunciante.victima',
            DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN persona_fisica.rfc ELSE persona_moral.rfc END) AS rfc'),//'persona.rfc', 
            'apariciones.esEmpresa AS esEmpresa',//'persona.esEmpresa', 
            'apariciones.idVarPersona AS idVarPersona',
            DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN variables_fisica.edad ELSE "NO APLICA" END) AS edad'),//'variables_persona.edad', 
            DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN sexo.nombre ELSE "NO APLICA" END) AS sexo'),//'persona.sexo', 
            DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN variables_fisica.telefono ELSE variables_fisica.telefono END) AS telefono'))//'variables_persona.telefono')
            ->where('apariciones.activo', 1)
            ->where('apariciones.idCarpeta', '=', $id)
            ->where('apariciones.tipoInvolucrado', '=', 'denunciante')
            ->where('apariciones.sistema', '=', 'uat')
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
        $denunciados = DB::table('componentes.apariciones as apariciones')
        ->leftJoin('componentes.variables_persona_fisica as variables_fisica', 'variables_fisica.id', '=', 'apariciones.idVarPersona')
        ->leftJoin('componentes.variables_persona_moral as variables_moral', 'variables_moral.id', '=', 'apariciones.idVarPersona')
        ->leftJoin('componentes.extra_denunciado_fisico as extras_fisica', 'variables_fisica.id', '=', 'extras_fisica.idVariablesPersona')
        ->leftJoin('componentes.extra_denunciado_moral as extras_moral', 'variables_moral.id', '=', 'extras_moral.idVariablesPersona')
        ->leftJoin('componentes.persona_fisica as persona_fisica', 'persona_fisica.id', '=', 'variables_fisica.idPersona')
        ->leftJoin('componentes.sexos as sexo', 'sexo.id', '=', 'persona_fisica.sexo')
        ->leftJoin('componentes.persona_moral as persona_moral', 'persona_moral.id', '=', 'variables_moral.idPersona')
        ->select(
             'apariciones.id AS idAparicion',//'extra_denunciado.alias',
            DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN extras_fisica.alias ELSE "NO APLICA" END) AS alias'),//'extra_denunciado.alias',
            DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN extras_fisica.idVariablesPersona ELSE extras_moral.idVariablesPersona END) AS idVariablesPersona'),//'extra_denunciado.idVariablesPersona',
            DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN extras_fisica.id ELSE extras_moral.id END) AS id'),//'extra_denunciado.id',
            DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN persona_fisica.nombres ELSE persona_moral.nombre END) AS nombres'),//'persona.nombres', 
            DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN persona_fisica.primerAp ELSE "" END) AS primerAp'),//'persona.primerAp', 
            DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN persona_fisica.segundoAp ELSE "" END) AS segundoAp'),//'persona.segundoAp', 
            DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN ifnull(persona_fisica.rfc,"SIN INFORMACION") ELSE persona_moral.rfc END) AS rfc'),//'persona.rfc',
            'apariciones.esEmpresa AS esEmpresa',//'persona.esEmpresa', 
            DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN variables_fisica.edad ELSE "NO APLICA" END) AS edad'),//'variables_persona.edad', 
            DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN ifnull(sexo.nombre,"SIN INFORMACION") ELSE "NO APLICA" END) AS sexo'),//'persona.sexo', 
            DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN ifnull(variables_fisica.telefono,"SIN INFORMACION") ELSE ifnull(variables_fisica.telefono,"SIN INFORMACION") END) AS telefono')//'variables_persona.telefono')
            )->distinct()
        ->where('apariciones.idCarpeta', '=', $id)
        ->where(function($query){
            $query
            ->orWhere('apariciones.tipoInvolucrado', '=', 'denunciado')
            ->orWhere('apariciones.tipoInvolucrado', '=', 'conocido');
        })
            ->where('apariciones.sistema', '=', 'uat')
            ->where('apariciones.activo', 1)
        ->get();
        //dump($denunciados);
        return $denunciados;
    }

    public static function getAbogados($id){
        $abogados = DB::table('componentes.persona_fisica as per')
            ->Join('componentes.variables_persona_fisica as var', 'var.idPersona','per.id')
            ->Join('componentes.apariciones as apar', 'apar.idVarPersona', 'var.id')
            ->Join('componentes.extra_abogado as abo', 'abo.idVariablesPersona', 'apar.idVarPersona')
            ->select('apar.id as idApariciones','var.id as idVarPersona','nombres', 'primerAp', 'segundoAp','cedulaProf','sector','abo.tipo')
            ->where('apar.activo', 1)
            ->where('apar.tipoInvolucrado', 'abogado')
            ->where('apar.sistema', 'uat')
            ->where('apar.idCarpeta', $id)
            ->get();
        return $abogados;

    }

    public static function getDefensas($id){
        $involucrados = DB::table('componentes.apariciones as apa')
            ->select('apa.id as idAparicion', 'apa.idVarPersona', 'apa.tipoInvolucrado', 'apa.esEmpresa')
            ->where('apa.idCarpeta', $id)
            ->where('apa.activo', 1)
            //->where('apa.tipoInvolucrado', 'denunciante')
            //->orWhere('apa.tipoInvolucrado', 'denunciado')
            ->get();

            //dd($involucrados);

            $tefis='';
            $temor='';
            $dofis='';
            $domor='';

        foreach ($involucrados as $inv) {
            if(strtolower($inv->tipoInvolucrado)=='denunciante'){
                if($inv->esEmpresa==1){
                    if(empty($temor))
                        $temor=$inv->idVarPersona;
                    else
                        $temor=$temor.','.$inv->idVarPersona;
                }else{
                    if(empty($tefis))
                        $tefis=$inv->idVarPersona;
                    else
                        $tefis=$tefis.','.$inv->idVarPersona;
                }
            }elseif(strtolower($inv->tipoInvolucrado)=='denunciado'){
                if($inv->esEmpresa==1){
                    if(empty($domor))
                        $domor=$inv->idVarPersona;
                    else
                        $domor=$domor.','.$inv->idVarPersona;
                }else{
                    if(empty($dofis))
                        $dofis=$inv->idVarPersona;
                    else
                        $dofis=$dofis.','.$inv->idVarPersona;
                }
            }
        }
            

            $contefis="select apa.id as idAparicion,CONCAT(perabo.nombres, ' ',perabo.primerAp,' ',perabo.segundoAp) as nombre_abogado, 
            CONCAT(per.nombres, ' ',per.primerAp,' ',per.segundoAp) as nombre_involucrado 
            from componentes.persona_fisica as per
            inner join componentes.variables_persona_fisica as varper on varper.idPersona=per.id 
            inner join componentes.extra_denunciante_fisico as exa on exa.idVariablesPersona=varper.id 
            inner join componentes.extra_abogado as abo on abo.id=exa.idAbogado 
            inner join componentes.variables_persona_fisica as varabo on varabo.idPersona=abo.idVariablesPersona 
            inner join componentes.persona_fisica as perabo on perabo.id=varabo.idPersona 
            inner join componentes.apariciones as apa on apa.idVarPersona=varper.id
            where 
            apa.activo=1 and apa.idCarpeta=".$id." and varper.id in (";
            $contemor="select apa.id as idAparicion,CONCAT(perabo.nombres, ' ',perabo.primerAp,' ',perabo.segundoAp) as nombre_abogado,
            per.nombre as nombre_involucrado 
            from componentes.persona_moral as per 
            inner join componentes.variables_persona_moral as varper on varper.idPersona=per.id 
            inner join componentes.extra_denunciante_moral as exa on exa.idVariablesPersona=varper.id 
            inner join componentes.extra_abogado as abo on abo.id=exa.idAbogado 
            inner join componentes.variables_persona_fisica as varabo on varabo.idPersona=abo.idVariablesPersona 
            inner join componentes.persona_fisica as perabo on perabo.id=varabo.idPersona 
            inner join componentes.apariciones as apa on apa.idVarPersona=varper.id
            where 
            apa.activo=1 and apa.idCarpeta=".$id." and varper.id in (";
            $condofis="select apa.id as idAparicion,CONCAT(perabo.nombres, ' ',perabo.primerAp,' ',perabo.segundoAp) as nombre_abogado,
            CONCAT(per.nombres, ' ',per.primerAp,' ',per.segundoAp) as nombre_involucrado 
            from componentes.persona_fisica as per 
            inner join componentes.variables_persona_fisica as varper on varper.idPersona=per.id 
            inner join componentes.extra_denunciado_fisico as exa on exa.idVariablesPersona=varper.id 
            inner join componentes.extra_abogado as abo on abo.id=exa.idAbogado 
            inner join componentes.variables_persona_fisica as varabo on varabo.idPersona=abo.idVariablesPersona 
            inner join componentes.persona_fisica as perabo on perabo.id=varabo.idPersona 
            inner join componentes.apariciones as apa on apa.idVarPersona=varper.id
            where 
            apa.activo=1 and apa.idCarpeta=".$id." and varper.id in (";
            $condomor="select apa.id as idAparicion,CONCAT(perabo.nombres, ' ',perabo.primerAp,' ',perabo.segundoAp) as nombre_abogado,
            per.nombre as nombre_involucrado 
            from componentes.persona_moral as per 
            inner join componentes.variables_persona_moral as varper on varper.idPersona=per.id 
            inner join componentes.extra_denunciado_moral as exa on exa.idVariablesPersona=varper.id 
            inner join componentes.extra_abogado as abo on abo.id=exa.idAbogado 
            inner join componentes.variables_persona_fisica as varabo on varabo.idPersona=abo.idVariablesPersona 
            inner join componentes.persona_fisica as perabo on perabo.id=varabo.idPersona 
            inner join componentes.apariciones as apa on apa.idVarPersona=varper.id
            where 
            apa.activo=1 and apa.idCarpeta=".$id." and varper.id in (";

            

            if(!empty($tefis)) $query=$contefis.$tefis.")";
            if(!empty($temor))
                if(empty($query)) $query=$contemor.$temor.")";
                else $query=$query." UNION ALL ".$contemor.$temor.")";
            if(!empty($domor))
                if(empty($query)) $query=$condomor.$domor.")";
                else $query=$query." UNION ALL ".$condomor.$domor.")";
            if(!empty($dofis))
                if(empty($query)) $query=$condofis.$dofis.")";
                else $query=$query." UNION ALL ".$condofis.$dofis.")";
        

        //dd($query);
        $defensas = DB::select($query);
        //dump($defensas);
         return $defensas;
        
    }

    public static function getAutoridades($id){
        /*$autoridades = DB::table('extra_autoridad')
            ->join('variables_persona', 'variables_persona.id', '=', 'extra_autoridad.idVariablesPersona')
            ->join('persona', 'persona.id', '=', 'variables_persona.idPersona')
            ->select('extra_autoridad.idVariablesPersona','extra_autoridad.id', 'persona.nombres', 'persona.primerAp', 'persona.segundoAp', 'extra_autoridad.antiguedad', 'extra_autoridad.rango', 'extra_autoridad.horarioLaboral', 'variables_persona.docIdentificacion', 'variables_persona.numDocIdentificacion')
            ->where('variables_persona.idCarpeta', '=', $id)
            ->get();
        */
        $autoridades = DB::table('componentes.persona_fisica as per')
            ->Join('componentes.variables_persona_fisica as var', 'var.idPersona','per.id')
            ->Join('componentes.apariciones as apar', 'apar.idVarPersona', 'var.id')
            ->Join('componentes.extra_autoridad as aut', 'aut.idVariablesPersona', 'apar.idVarPersona')
            ->Join('componentes.cat_identificacion as ide', 'ide.id', 'var.docIdentificacion')
            ->select('apar.id as idApariciones','var.id as idVarPersona','nombres', 'primerAp', 'segundoAp','antiguedad', 'rango','horarioLaboral','ide.documento as docIdentificacion','numDocIdentificacion')
            ->where('apar.tipoInvolucrado', 'AUTORIDAD')
            ->where('apar.activo', 1)
            ->where('apar.carpeta', $id)
            ->where('apar.sistema', 'uat')
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
        ->leftjoin('componentes.apariciones as aparicionesDenunciante', 'aparicionesDenunciante.id', '=', 'acusacion.idDenunciante')
        ->leftJoin('componentes.variables_persona_fisica as variables_fisicaDenunciante', 'variables_fisicaDenunciante.id', '=', 'aparicionesDenunciante.idVarPersona')
        ->leftJoin('componentes.variables_persona_moral as variables_moral-denunciante', 'variables_moral-denunciante.id', '=', 'aparicionesDenunciante.idVarPersona')
        ->leftJoin('componentes.extra_denunciante_fisico as extra_denunciante_fisico', 'variables_fisicaDenunciante.id', '=', 'extra_denunciante_fisico.idVariablesPersona')
        ->leftJoin('componentes.extra_denunciante_moral as extra_denunciante_moral', 'variables_moral-denunciante.id', '=', 'extra_denunciante_moral.idVariablesPersona')
        ->leftJoin('componentes.persona_fisica as persona_fisica_denunciante', 'persona_fisica_denunciante.id', '=', 'variables_fisicaDenunciante.idPersona')
        ->leftJoin('componentes.sexos as sexo_denunciante', 'sexo_denunciante.id', '=', 'persona_fisica_denunciante.sexo')
        ->leftJoin('componentes.persona_moral as persona_moral_denunciante', 'persona_moral_denunciante.id', '=', 'variables_moral-denunciante.idPersona')
        
        ->leftjoin('componentes.apariciones as aparicionesDenunciado', 'aparicionesDenunciado.id', '=', 'acusacion.idDenunciado')
        ->leftJoin('componentes.variables_persona_fisica as variables_fisica_denunciado', 'variables_fisica_denunciado.id', '=', 'aparicionesDenunciado.idVarPersona')
        ->leftJoin('componentes.variables_persona_moral as variables_moral_denunciado', 'variables_moral_denunciado.id', '=', 'aparicionesDenunciado.idVarPersona')
        ->leftJoin('componentes.extra_denunciado_fisico as extras_fisica_denunciado', 'variables_fisica_denunciado.id', '=', 'extras_fisica_denunciado.idVariablesPersona')
        ->leftJoin('componentes.extra_denunciado_moral as extras_moral_denunciado', 'variables_moral_denunciado.id', '=', 'extras_moral_denunciado.idVariablesPersona')
        ->leftJoin('componentes.persona_fisica as persona_fisica_denunciado', 'persona_fisica_denunciado.id', '=', 'variables_fisica_denunciado.idPersona')
        ->leftJoin('componentes.sexos as sexo_denuncuado', 'sexo_denuncuado.id', '=', 'persona_fisica_denunciado.sexo')
        ->leftJoin('componentes.persona_moral as persona_moral_denunciado', 'persona_moral_denunciado.id', '=', 'variables_moral_denunciado.idPersona')

        ->join('tipif_delito', 'tipif_delito.id', '=', 'acusacion.idTipifDelito')
        ->join('cat_delito', 'cat_delito.id', '=', 'tipif_delito.idDelito')
        ->join('cat_agrupacion1', 'cat_agrupacion1.id', '=', 'tipif_delito.idAgrupacion1')
        ->join('cat_agrupacion2', 'cat_agrupacion2.id', '=', 'tipif_delito.idAgrupacion2')
        ->select(
            'acusacion.id', 
            DB::raw('(CASE WHEN aparicionesDenunciante.esEmpresa = 0 THEN persona_fisica_denunciante.nombres ELSE persona_moral_denunciante.nombre END) AS nombres'),//'persona.nombres', 
            DB::raw('(CASE WHEN aparicionesDenunciante.esEmpresa = 0 THEN persona_fisica_denunciante.primerAp ELSE "" END) AS primerAp'),//'persona.primerAp', 
            DB::raw('(CASE WHEN aparicionesDenunciante.esEmpresa = 0 THEN persona_fisica_denunciante.segundoAp ELSE "" END) AS segundoAp'),//'persona.segundoAp', 
            'cat_delito.nombre as delito', 
            'cat_agrupacion1.nombre as desagregacion1', 
            'cat_agrupacion2.nombre as desagregacion2', 
            DB::raw('(CASE WHEN aparicionesDenunciado.esEmpresa = 0 THEN persona_fisica_denunciado.nombres ELSE persona_moral_denunciado.nombre END) AS nombres2'),//'per.nombres as nombres2', 
            DB::raw('(CASE WHEN aparicionesDenunciado.esEmpresa = 0 THEN persona_fisica_denunciado.primerAp ELSE "" END) AS primerAp2'),//'per.primerAp as primerAp2', 
            DB::raw('(CASE WHEN aparicionesDenunciado.esEmpresa = 0 THEN persona_fisica_denunciado.segundoAp ELSE "" END) AS segundoAp2'),//'per.segundoAp as segundoAp2'
            DB::raw('(CASE WHEN aparicionesDenunciado.esEmpresa = 0 THEN(CASE WHEN extras_fisica_denunciado.alias = "SIN INFORMACION" THEN "" ELSE extras_fisica_denunciado.alias END)ELSE "" END) AS alias')
            // DB::raw('(CASE WHEN aparicionesDenunciado.esEmpresa = 0 THEN ifnull(extras_denunciado_fisica.alias,"") ELSE "" END) AS alias')//'per.segundoAp as segundoAp2'
            )    
        ->where('aparicionesDenunciante.idCarpeta',$id)
        ->where('aparicionesDenunciante.sistema','uat')
        ->where('aparicionesDenunciante.tipoInvolucrado','denunciante')
        ->where('aparicionesDenunciante.activo',1)
        ->where('aparicionesDenunciado.idCarpeta',$id)
        ->where('aparicionesDenunciado.sistema','uat')
        ->where('aparicionesDenunciado.tipoInvolucrado','denunciado')->orwhere('aparicionesDenunciado.tipoInvolucrado','conocido')
        ->where('aparicionesDenunciado.activo',1)
        ->get();
         //dump($acusaciones);
        
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
