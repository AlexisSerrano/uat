<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActasHechos;
use Jenssegers\Date\Date;
use DB;

class LibroOficioController extends Controller
{
    public function IndexOfi()
    {   

        
        
        $vfisica = DB::table('uat.actas_hechos as actas') 
        ->Join('componentes.variables_persona_fisica as pf', 'actas.varPersona', '=', 'pf.id') 
        ->Join('componentes.persona_fisica as PER', 'pf.idPersona', '=', 'PER.id') 
        ->select('actas.folio', 'actas.fiscal', 'actas.tipoActa' ,'actas.varPersona', 'pf.id' ,'pf.idPersona', 'PER.nombres', 'PER.primerAp', 'PER.segundoAp');
        
              
 
         
        $vmoral = DB::table('uat.actas_hechos as actas') 
        ->Join('componentes.variables_persona_moral as pf', 'actas.varPersona', '=', 'pf.id') 
        ->select('actas.folio', 'actas.fiscal', 'actas.tipoActa', 'actas.varPersona', 'pf.id' ,'pf.idPersona', 'pf.nombreRep', 'pf.primerApRep', 'pf.segundoApRep')   
        ->union($vfisica)
        
        ->get();

       
        dd($vmoral);



        // $actas = ActasHechos::orderBy('id','desc')->paginate('15');  ->where('db2.id', 5)
        $year = Date::now()->format('Y');
         return view('tables.libOficios')
         -> with("variable", $variable)
         -> with("actas", $actas)
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

