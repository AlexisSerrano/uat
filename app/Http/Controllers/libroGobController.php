<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Alert;
use Carbon\Carbon;
use App\Models\Carpeta;
use App\Models\CatEscolaridad;
use App\Models\CatEstado;
use App\Models\CatEstadoCivil;
use App\Models\CatEtnia;
use App\Models\CatLengua;
use App\Models\CatNacionalidad;
use App\Models\CatOcupacion;
use App\Models\CatReligion;
use App\Models\Razon;
use App\Models\Domicilio;
use App\Models\DirNotificacion;
use App\Models\Persona;
use App\Models\VariablesPersona;
use App\Models\ExtraDenunciante;


class libroGobController extends Controller
{
    
     
       
    public function showForm($id)
    {
       
        session(['carpeta' => $id]);
        $idCarpeta=$id;
       // $idCarpeta=session('carpeta');
        //dd($idCarpeta);
        // if (is_null($idCarpeta)) {
        //     Alert::error('No puede acceder a este modulo sin un caso en especifico', 'Error');
        //     return redirect('registros');
        // }
        $casoNuevo = Carpeta::where('id', $idCarpeta)->get();
        //dd($idCarpeta);
        if(count($casoNuevo)>0){ 
            $denunciantes = CarpetaController::getDenunciantes($idCarpeta);
            $denunciados = CarpetaController::getDenunciados($idCarpeta);
            $acusaciones = CarpetaController::getAcusaciones($idCarpeta);
            $medidasP= CarpetaController::getMedidasP($idCarpeta);
            $delitos = CarpetaController::getDelitos($idCarpeta);
             $escolaridades = CatEscolaridad::orderBy('id', 'ASC')->pluck('nombre', 'id');
            $estados = CatEstado::select('id', 'nombre')->orderBy('nombre', 'ASC')->pluck('nombre', 'id');
             $estadoscivil = CatEstadoCivil::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
             $etnias = CatEtnia::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
             $lenguas = CatLengua::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
             $nacionalidades = CatNacionalidad::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
             $ocupaciones = CatOcupacion::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
             $religiones = CatReligion::orderBy('nombre', 'ASC')->pluck('nombre', 'id');

            return view('forms.denunciante')->with('idCarpeta', $idCarpeta)
                ->with('denunciantes', $denunciantes)
                ->with('denunciados', $denunciados)
                ->with('acusaciones', $acusaciones)
                ->with('medidasP', $medidasP)
                ->with('delitos', $delitos)
                 ->with('escolaridades', $escolaridades)
                ->with('estados', $estados)
                 ->with('estadoscivil', $estadoscivil)
                 ->with('etnias', $etnias)
                 ->with('lenguas', $lenguas)
                 ->with('nacionalidades', $nacionalidades)
                 ->with('ocupaciones', $ocupaciones)
                 ->with('religiones', $religiones);
         
        
    }
        
        // return view('orientador.modulo-orientador')->with('estados',$estados)->with('razones',$razones);
    }
        

       public function searchNumCarpeta(Request $request)
       {
        $carpeta=$request->search;


        $carpetas = DB::table('carpeta')
        ->join('cat_estatus_casos','carpeta.idEstadoCarpeta','=','cat_estatus_casos.id')
       ->select('carpeta.id','carpeta.fechaInicio','carpeta.horaIntervencion','carpeta.numCarpeta','cat_estatus_casos.nombreEstatus as idEstadoCarpeta' )
         
       // ->orwhere('idEstadoCarpeta','=',1)
          ->orwhere('numCarpeta','like','%'.$carpeta.'%')
         ->orwhere('horaIntervencion','like','%'.$carpeta.'%')
         ->orwhere('fechaInicio','like','%'.$carpeta.'%')
        ->paginate('15');
        
       

           
         
       
       // dd( $carpetas);
      // return Datatables::of($carpetas)->make(true);
       return view('tables.carpetasEnGral')->with('carpetas',$carpetas);

    }

    public function buscar()
       {
        $carpetas = DB::table('carpeta')
        ->join('cat_estatus_casos','carpeta.idEstadoCarpeta','=','cat_estatus_casos.id')
        ->select('carpeta.id as id','carpeta.fechaInicio','carpeta.horaIntervencion','carpeta.numCarpeta','cat_estatus_casos.nombreEstatus as idEstadoCarpeta' )
      // ->where('carpeta',$id)
      // ->orwhere()
      ->paginate('15');
        // dd($acusaciones);
        return view('tables.carpetasEnGral')->with('carpetas',$carpetas);

       }

       public function terminadas(){
      
        
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
        ->join('cat_estatus_casos','carpeta.idEstadoCarpeta','=','cat_estatus_casos.id')
        ->select('carpeta.id','carpeta.fechaInicio','persona.nombres', 'persona.primerAp', 'persona.segundoAp','per.nombres as nombres2', 'per.primerAp as primerAp2', 'per.segundoAp as segundoAp2','carpeta.numCarpeta' ,'cat_delito.nombre as delito','tipif_delito.formaComision','cat_estatus_casos.nombreEstatus as idEstadoCarpeta')
      
       ->get();
        //dd( $carpterminadas);
        return view('forms.libro-gobierno')->with('carpterminadas',$carpterminadas);
//dd($carpterminadas);
    }

    public function mostrarlibro(Request $request){
       // $carpetaNueva = Carpeta::where('id', $idCarpeta)->get();
      // $idCarpeta=session('carpeta');
       // $idCarpeta='7';
       $carpeta=$request->search;
      
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
        ->join('cat_estatus_casos','carpeta.idEstadoCarpeta','=','cat_estatus_casos.id')
        ->select('carpeta.id','carpeta.fechaInicio','persona.nombres','persona.primerAp','persona.segundoAp','per.nombres as nombres2', 'per.primerAp as primerAp2', 'per.segundoAp as segundoAp2','carpeta.numCarpeta' ,'cat_delito.nombre as delito','tipif_delito.formaComision','cat_estatus_casos.nombreEstatus as idEstadoCarpeta')
        ->orwhere('fechaInicio','like','%'.$carpeta.'%')
        ->orWhere(DB::raw("CONCAT(persona.nombres,' ',persona.primerAp,' ',persona.segundoAp)"), 'LIKE', '%'.$carpeta.'%')
       ->orWhere(DB::raw("CONCAT(per.nombres,' ',per.primerAp)"), 'LIKE', '%'.$carpeta.'%')
        ->orwhere('persona.nombres','like','%'.$carpeta.'%')
        ->orwhere('persona.nombres','=','QUIEN O QUIENES RESULTEN RESPONSABLES')
        ->orwhere('numCarpeta','like','%'.$carpeta.'%')
        ->orwhere('formaComision','like','%'.$carpeta.'%')
      ->orWhere('cat_delito.nombre', 'like', '%' . $carpeta . '%')
    
      ->paginate('15');
        //dd( $carpta);
       return view('forms.libro-gobierno')->with('carpterminadas',$carpterminadas);
//dd($carpterminadas);
   }
}
