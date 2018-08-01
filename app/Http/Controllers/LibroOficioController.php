<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActasHechos;
use Jenssegers\Date\Date;
use DB;
use Auth;

class LibroOficioController extends Controller
{
    public function IndexOfi()
    {   

        
        
        $actas = DB::table('uat.actas_hechos as actas') 
        ->leftJoin('componentes.variables_persona_fisica as pf', 'actas.varPersona', '=', 'pf.id') 
        ->leftJoin('componentes.variables_persona_moral as pm', 'actas.varPersona', '=', 'pm.id') 
        ->leftJoin('componentes.persona_fisica as PER', 'pf.idPersona', '=', 'PER.id') 
        ->select('actas.folio', 'actas.id as idoficio', 'actas.fecha','actas.fiscal', 'actas.tipoActa' ,'actas.varPersona','actas.idUnidad',          
        DB::raw('(CASE WHEN actas.esEmpresa = 0 THEN  pf.id ELSE pm.id END) AS id'),
        DB::raw('(CASE WHEN actas.esEmpresa = 0 THEN  pf.idPersona ELSE pm.idPersona END) AS idPersona'),
        DB::raw('(CASE WHEN actas.esEmpresa = 0 THEN  PER.nombres ELSE pm.nombreRep END) AS Nombre'),
        DB::raw('(CASE WHEN actas.esEmpresa = 0 THEN  PER.primerAp ELSE pm.primerApRep END) AS PApellido'),
        DB::raw('(CASE WHEN actas.esEmpresa = 0 THEN  PER.segundoAp ELSE pm.segundoApRep END) AS SApellido'))
        ->where('actas.idUnidad', '=', Auth::user()->idUnidad )
        ->paginate(10);

    //    dd($actas);
        // actas circuiustaciada

        $circustaciada = DB::table('uat.acta_circunstanciada as actas') 
        ->leftJoin('componentes.variables_persona_fisica as pf', 'actas.varPersona', '=', 'pf.id') 
        // ->leftJoin('componentes.variables_persona_moral as pm', 'actas.varPersona', '=', 'pm.id') 
        ->leftJoin('componentes.persona_fisica as PER', 'pf.idPersona', '=', 'PER.id') 
        ->select('actas.folio', 'actas.id as idoficio', 'actas.fecha','actas.fiscal','actas.varPersona','actas.idUnidad', 
         'pf.id as id', 'pf.idPersona as idPersona', 'PER.nombres  AS Nombre', 'PER.primerAp AS PApellido' ,
           'PER.segundoAp AS SApellido')
        ->where('actas.idUnidad', '=', Auth::user()->idUnidad )
        ->paginate(10);



        // $actas = ActasHechos::orderBy('id','desc')->paginate('15');  ->where('db2.id', 5)
        $year = Date::now()->format('Y');
         return view('tables.libOficios')
        
         -> with("actas", $actas)
         -> with("circustaciada", $circustaciada)
         -> with("year", $year);  
    }


    public function filtroActas(Request $request){
        if($request->input("filtro")!=''){
            if($request->input("filtro")){
                $filtro = $request->input("filtro");
                $request->session()->flash('filtro', $filtro);
            }
            else{
                $filtro = $request->session()->get('filtro');
                $request->session()->flash('filtro', $filtro);
    
            }
            $year = Date::now()->format('Y');
            $actas = ActasHechos::
            where(DB::raw("CONCAT(nombre,' ',primer_ap,' ',segundo_ap)"), 'LIKE', '%' . $filtro . '%')
            ->orwhere('folio','like','%'.$filtro.'%')



            ->paginate('15');
            return view('tables.libOficios')
            -> with("actas", $actas)
            -> with("year", $year);  
        }

        else{
            return redirect('lista-ficios');
        }
    }
}