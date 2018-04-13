<?php

namespace App\Http\Middleware;

use Closure;
use Alert;

class IdCaso
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
        //dd($request->path());
        $url = explode("/", $request->path());
        $urlvalida = $url[0];
        if(session('carpeta')==null){
            if($urlvalida=='agregar-denunciante'){
                Alert::error('No puede acceder a este modulo sin un caso en especifico', 'Error');
                return redirect('registros');
            }
            else{
                return $next($request);
            } 
        }
        else{
            if($urlvalida=="crear-caso"||$urlvalida=="Traerturno"||$urlvalida=="atender"){
                Alert::info('Tiene un caso en proceso', 'Info');
                return redirect('/agregar-denunciante');
            }
            else{
                return $next($request);
            }
        }
    }
}
