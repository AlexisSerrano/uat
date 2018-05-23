<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    
     
       
    public function showForm($id){   
        session(['carpeta' => $id]);
        $numcarpeta=Carpeta::where('id',$id)->first();
        $numcarpeta=$numcarpeta->numCarpeta;
        // dd($numcarpeta);
        session(['terminada' => $numcarpeta]);
        return redirect(route('new.denunciante'));
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
        $comprobar=Auth::user()->idCarpeta;
        if($comprobar==null){
            $carpetas = DB::table('carpeta')
            ->join('cat_estatus_casos','carpeta.idEstadoCarpeta','=','cat_estatus_casos.id')
            ->select('carpeta.id as id','carpeta.fechaInicio','carpeta.horaIntervencion','carpeta.numCarpeta','cat_estatus_casos.nombreEstatus as idEstadoCarpeta' )
            ->where('idFiscal',Auth::user()->id)
          // ->orwhere()
            ->paginate('15');
            // dd($carpetas);
            return view('tables.carpetasEnGral')->with('carpetas',$carpetas);
        }else{
            session(['carpeta' => $comprobar]);
            Alert::info('Al cerrar sesión dejaste un caso abierto');
            return redirect(route('new.denunciante'));
        }
        //    dd(session());

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
        ->paginate(10);
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
