<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Models\Acusaciones;
use App\Models\TipifDelito;
use App\Models\CatMunicipio;
use App\Models\CatLocalidad;
use App\Models\CatColonia;
use App\Models\CatEstado;
use App\Models\Domicilio;
use App\Models\CatLugar;
use App\Models\CatZona;
use App\Models\Carpeta;
use App\Models\CatDelito;
use App\Http\Requests\StoreDelito;
use Yajra\DataTables\Datatables;

class libroGobController extends Controller
{
    
     
        public function index()
        {
            return view('tables.carpetasEnGral');
        }

       public function getCarpetas()
       {
        $carpetas = DB::table('carpeta')
       ->select('carpeta.id','carpeta.fechaInicio','carpeta.horaIntervencion','carpeta.numCarpeta','carpeta.estadoCarpeta' )
           
           ->get();
        
       
       // dd(  $acusaciones);
       return Datatables::of($carpetas)->make(true);
       //return view('tables.carpetasEnGral')->with('acusaciones',$acusaciones);

    }

    public function buscar()
       {
        $acusaciones = DB::table('carpeta')

        ->select('carpeta.id','carpeta.fechaInicio','carpeta.horaIntervencion','carpeta.numCarpeta','carpeta.estadoCarpeta' )
      
        
      // ->where('carpeta',$id)
      // ->orwhere()
       ->get();
        // dd(  $acusaciones);
        return view('tables.carpetasEnGral')->with('acusaciones',$acusaciones);

       }

    public function terminadas(){
       // $carpetaNueva = Carpeta::where('id', $idCarpeta)->get();
      //  $idCarpeta=session('carpeta');
       // $idCarpeta='7';
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
        ->select('carpeta.id','carpeta.fechaInicio',DB::raw("CONCAT(persona.nombres,' ',persona.primerAp,' ',persona.segundoAp) as denunciante"),'per.nombres as nombres2', 'per.primerAp as primerAp2', 'per.segundoAp as segundoAp2','carpeta.numCarpeta' ,'cat_delito.nombre as delito','tipif_delito.formaComision','carpeta.estadoCarpeta')
       
       // ->where('acusacion.idCarpeta', '=', $idCarpeta)
       // ->orWhere(DB::raw("CONCAT(persona.nombres,' ',persona.primerAp,' ',persona.segundoAp)"), 'LIKE', '%' . $idCarpeta . '%')
        //->orWhere('persona.nombres2',' ','persona.primerAp2',' ','persona.segundoAp2'), 'LIKE', '%' . $idCarpeta . '%')
       // ->orWhere('delito', 'like', '%' . $idCarpeta . '%')
        ->get();
        return view('forms.libro-gobierno')->with('carpterminadas',$carpterminadas);

    }
}
