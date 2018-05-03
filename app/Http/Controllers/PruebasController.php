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


class PruebasController extends Controller
{
    public function create()
    {

        {

            $razones=Razon::orderBy('nombre', 'ASC')
            ->pluck('nombre','id');
            $estados=CatEstado::orderBy('nombre', 'ASC')
            ->pluck('nombre','id');
            $ocupaciones=CatOcupacion::orderBy('nombre', 'ASC')
            ->pluck('nombre', 'id');
            $estadocivil = CatEstadoCivil::orderBy('nombre', 'ASC')
            ->pluck('nombre', 'id');
            $escolaridades = CatEscolaridad::orderBy('id', 'ASC')
            ->pluck('nombre', 'id');
            $nacionalidades = CatNacionalidad::orderBy('nombre', 'ASC')
            ->pluck('nombre', 'id');
           
    
    
        //dd($delitos);
             
        return view('pruebas.pruebas-Web')
            ->with('ocupaciones',$ocupaciones)
            ->with('escolaridades',$escolaridades)
            ->with('estadocivil',$estadocivil)
            ->with('razones',$razones)
            ->with('nacionalidades', $nacionalidades)
            ->with('estados',$estados);
    }
    
        

    }

    public function hechos()
    {

     $casonuevo=1;

    dd($casonuevo);
         
        return view('orientador.modulo-orientador')->with('casonuevo',$casonuevo);
}

public function delitos()
    {

     $delitos='delito';
    
     $estados=CatEstado::orderBy('nombre', 'ASC')
        ->pluck('nombre','id');

    //dd($delitos);
         
        return view('orientador.delitos-orientador')
        ->with('delito',$delitos)
        
        ->with('estados',$estados);
}

public function denunciado()
    {

     $delitos='denunciado';
     $nacionalidades = CatNacionalidad::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
     $estados=CatEstado::orderBy('nombre', 'ASC')
        ->pluck('nombre','id');
    

    //dd($delitos);
         
        return view('orientador.denunciado.denunciado')
        ->with('delito',$delitos)
        ->with('nacionalidades', $nacionalidades)
        ->with('estados',$estados);
}

public function actas()
    {

        $razones=Razon::orderBy('nombre', 'ASC')
        ->pluck('nombre','id');
        $estados=CatEstado::orderBy('nombre', 'ASC')
        ->pluck('nombre','id');
        $ocupaciones=CatOcupacion::orderBy('nombre', 'ASC')
        ->pluck('nombre', 'id');
        $estadocivil = CatEstadoCivil::orderBy('nombre', 'ASC')
        ->pluck('nombre', 'id');
        $escolaridades = CatEscolaridad::orderBy('id', 'ASC')
        ->pluck('nombre', 'id');
        $nacionalidades = CatNacionalidad::orderBy('nombre', 'ASC')
        ->pluck('nombre', 'id');
       


    //dd($delitos);
         
        return view('forms.acta-hechos')
        ->with('ocupaciones',$ocupaciones)
        ->with('escolaridades',$escolaridades)
        ->with('estadocivil',$estadocivil)
        ->with('razones',$razones)
        ->with('nacionalidades', $nacionalidades)
        ->with('estados',$estados);
}

public function impresion(){
    return view('impresion');
}




}
