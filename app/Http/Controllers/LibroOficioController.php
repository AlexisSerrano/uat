<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActasHechos;
use Jenssegers\Date\Date;
use DB;

class LibroOficioController extends Controller
{
    //


    public function IndexOfi()
    {    
        $actas = ActasHechos::orderBy('id','desc')->paginate('15');
        $year = Date::now()->format('Y');
         return view('tables.libOficios')
         -> with("actas", $actas)
         -> with("year", $year);  
    }


    // public function filtroActas(Request $request){
    //     if($request->input("filtro")!=''){
    //         if($request->input("filtro")){
    //             $filtro = $request->input("filtro");
    //             $request->session()->flash('filtro', $filtro);
    //         }
    //         else{
    //             $filtro = $request->session()->get('filtro');
    //             $request->session()->flash('filtro', $filtro);
    
    //         }
    //         $year = Date::now()->format('Y');
    //         $actas = ActasHechos::
    //         where(DB::raw("CONCAT(nombre,' ',primer_ap,' ',segundo_ap)"), 'LIKE', '%' . $filtro . '%')
    //         ->orwhere('folio','like','%'.$filtro.'%')
    //         ->paginate('15');
    //         return view('tables.libOficios')
    //         -> with("actas", $actas)
    //         -> with("year", $year);  
    //     }

    //     else{
    //         return redirect('lista-oficios');
    //     }
    // }

}

