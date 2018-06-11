<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActasHechos;
use Jenssegers\Date\Date;

class LibroOficioController extends Controller
{
    //


    public function IndexOfi()
    {   
 
        $actas = ActasHechos::orderBy('id','desc')->paginate('15');
        $year = Date::now()->format('Y');
         return view('forms.libOficios')
         -> with("actas", $actas)
         -> with("year", $year);


        
    }



}

