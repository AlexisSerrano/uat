<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\CatMunicipio;
use App\Models\CatLocalidad;
use App\Models\CatColonia;
use App\User;

class RegisterController extends Controller
{
   
    /*-----Métodos para obetener catálogos-----*/
    public function getMunicipios(Request $request, $id){
        if($request->ajax()){
            $municipios = CatMunicipio::municipios($id);
            return response()->json($municipios);
        }
    }

    public function getLocalidades(Request $request, $id){
        if($request->ajax()){
            $localidades = CatLocalidad::localidades($id);
            return response()->json($localidades);
        }
    }

    public function getColonias2(Request $request, $id){
        if($request->ajax()){
            $colonias = CatColonia::colonias2($id);
            return response()->json($colonias);
        }
    }

    public function getCodigos(Request $request, $id){
        if($request->ajax()){
            $codigos = CatColonia::codigos($id);
            return response()->json($codigos);
        }
    }

    public function getCodigos2(Request $request, $id){
        if($request->ajax()){
            $codigos = CatColonia::codigos2($id);
            return response()->json($codigos);
        }
    }

    public function getColonias(Request $request, $cp){
        if($request->ajax()){
            $colonias = CatColonia::colonias($cp);
            return response()->json($colonias);
        }
    }

    public function getListas(Request $request,$id){
        if($request->ajax()){
            $localidades = CatLocalidad::localidades($id);
            $colonias = CatColonia::colonias2($id);
            $codigos = CatColonia::codigos($id);
            $lista = array($localidades,$colonias,$codigos);
            return response()->json($lista);
        }
    }

    
    public function errorlogin()
    {
        return view('servicios.errores.errorlogin');
    }
    
    public function cambioRol(Request $request){
     /*   if (Auth::user()->grupo=='orientador') {
            $user=User::find(Auth::user()->id);
            $user->grupo='recepcion';
            $user->save();
            return redirect(route('predenuncias.index'));    

        }
        if (Auth::user()->grupo=='recepcion') {
            $user=User::find(Auth::user()->id);
            $user->grupo='orientador';
            $user->save();
            return redirect(route('indexcarpetas'));
        }       

        if(Auth::user()->grupo!='recepcion'&&Auth::user()->grupo!='orientador'){
            return redirect('home');
        }*/
                 
            $rol_usuario =    DB::table('model_has_roles')->where('model_id', Auth::user()->id)->get()->first();
            $rol_usuario->role_id = $request->idRol;
            $rol_usuario->save();

            $rol = DB::table('roles')->where('id',$rol_usuario->role_id)->get()->first();
            
            $user = DB::table('users')->where('id',Auth::user()->id)->get()->first();
            $user->grupo = $rol->name;
            $user->save();

            return view('home');
    }
    
}
