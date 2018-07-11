<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->grupo=='orientador'||Auth::user()->grupo=='coordinador') {

            return redirect(route('indexcarpetas'));
        }
        if (Auth::user()->grupo=='recepcion') {
            return redirect(route('predenuncias.index'));    
        }
    }
    
    
}
