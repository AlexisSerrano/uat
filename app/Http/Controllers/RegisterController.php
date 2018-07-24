<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\CatMunicipio;
use App\Models\CatLocalidad;
use App\Models\CatColonia;
use App\User;
use Alert;
use DB;

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

    public function getFiscales(Request $request, $id){
        // dd($request);
        if($request->ajax()){
            $fiscales = User::select('id', 'nombreC')
                ->where('idUnidad', '=', $id)
                ->where('id','!=',Auth::user()->id)
                ->where('gorientador','=',1)
                ->orderBy('nombreC', 'ASC')
                ->get();
            return response()->json($fiscales);
        }
    }

    
    public function errorlogin()
    {
        Auth::logout();
        return view('servicios.errores.errorlogin');
    }
    



    public function cambioRolRecepcion(Request $request){
        if(Auth::user()->grecepcion==1){
            $user = User::find(Auth::user()->id);
            $gGrupo = $user->grecepcion; 
            RegisterController::validarGrupo($gGrupo,4); 
            return redirect(route('predenuncias.index'));
        } else {
        }
    }

    public function cambioRolOrientador(Request $request){
        if(Auth::user()->gorientador==1){
            $user = User::find(Auth::user()->id);
            $gGrupo = $user->gorientador; 
            RegisterController::validarGrupo($gGrupo,3); 
            return redirect(route('indexcarpetas'));   
        } else {
        }
    }
    
    public function cambioRolFacilitador(Request $request){
        if(Auth::user()->gfacilitador==1){
            $user = User::find(Auth::user()->id);
            $gGrupo = $user->gfacilitador; 
            RegisterController::validarGrupo($gGrupo,2); 
            return redirect(route('home'));
        } else {
        }
    }
    
    public function cambioRolCoordinador(Request $request){
        if(Auth::user()->gcoordinador==1){
            $user = User::find(Auth::user()->id);
            $gGrupo = $user->gcoordinador; 
            RegisterController::validarGrupo($gGrupo,1); 
            return redirect(route('indexcarpetas'));   
        } else {
        }
    }

    public static function validarGrupo($gGrupo,$idRol)
    {
        $user = User::find(Auth::user()->id);
        $nombreRol = DB::table('roles')->where('id',$idRol)->select('name')->first();
    
        if($gGrupo==1){       
            $rol_usuario = DB::table('model_has_roles')->where('model_id', Auth::user()->id)->update(['role_id' => $idRol]);
            $user->grupo = $nombreRol->name;
            $user->save();
            $x=1;
            Alert::success('Cambio registrado con éxito', 'Hecho')->persistent("Aceptar");
        }else{
            Alert::error('No tienes permiso de cambiarte a éste rol, comunícate con el centro de información.', 'Error')->persistent("Aceptar");
            return redirect()->route('home');
            $x=0;
        } 
        return $x;
    }  

    // public function cambioRol(Request $request){
    //     //dump('entra');
    //     //   Alert::error('No tienes permiso de cambiarte a éste rol, comunícate con el centro de información.', 'Error');

    //     $nombreRol = DB::table('roles')->where('id',$request->idRol)->select('name')->first();
    //     $user = User::find(Auth::user()->id);
    //     //  dd($nombreRol->name)

    //     switch ($nombreRol->name) {
            
    //         case "recepcion":
    //             $gGrupo = $user->grecepcion; 
    //             RegisterController::validarGrupo($gGrupo,$request->idRol); 
    //             return redirect(route('predenuncias.index'));    
    //             break;
            
    //         case "orientador":
    //             $gGrupo = $user->gorientador; 
    //             RegisterController::validarGrupo($gGrupo,$request->idRol); 
    //             return redirect(route('indexcarpetas'));   
    //             break;
            
    //         case "facilitador":
    //             $gGrupo = $user->gfacilitador; 
    //             RegisterController::validarGrupo($gGrupo,$request->idRol); 
    //             return redirect()->route('home');
    //             break;
            
    //         case "coordinador":
    //             $gGrupo = $user->gcoordinador;
    //             RegisterController::validarGrupo($gGrupo,$request->idRol);
    //             return redirect(route('indexcarpetas'));   
    //             break;
                
    //     }

    // }


}
