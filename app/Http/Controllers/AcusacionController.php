<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Alert;
use App\Models\Carpeta;
use App\Models\Acusacion;
use App\Http\Requests\AcusacionRequest;


class AcusacionController extends Controller
{
    public function showForm()
    {
        $idCarpeta=session('carpeta');
        $carpetaNueva = Carpeta::where('id', $idCarpeta)->get();
        if(count($carpetaNueva)>0){ 
            $acusaciones = CarpetaController::getAcusaciones($idCarpeta);
            $medidasP= CarpetaController::getMedidasP($idCarpeta);
            $delitos = CarpetaController::getDelitos($idCarpeta);
            $denunciantes = DB::table('extra_denunciante')
                ->join('variables_persona', 'variables_persona.id', '=', 'extra_denunciante.idVariablesPersona')
                ->join('persona', 'persona.id', '=', 'variables_persona.idPersona')
                ->select('extra_denunciante.id','persona.nombres', 'persona.primerAp', 'persona.segundoAp')
                ->where('variables_persona.idCarpeta', '=', $idCarpeta)
                ->orderBy('persona.nombres', 'ASC')
                ->get();
            $denunciados = DB::table('extra_denunciado')
                ->join('variables_persona', 'variables_persona.id', '=', 'extra_denunciado.idVariablesPersona')
                ->join('persona', 'persona.id', '=', 'variables_persona.idPersona')
                ->select('extra_denunciado.id','persona.nombres', 'persona.primerAp', 'persona.segundoAp')
                ->where('variables_persona.idCarpeta', '=', $idCarpeta)
                ->orderBy('persona.nombres', 'ASC')
                ->get();
            $tipifdelitos = DB::table('tipif_delito')
                ->join('cat_delito', 'cat_delito.id', '=', 'tipif_delito.idDelito')
                ->select('tipif_delito.id','cat_delito.nombre')
                ->where('tipif_delito.idCarpeta', '=', $idCarpeta)
                ->orderBy('cat_delito.nombre', 'ASC')
                ->get();
            return view('forms.acusacion')->with('idCarpeta', $idCarpeta)
                ->with('medidasP', $medidasP)
                ->with('delitos', $delitos)
                ->with('acusaciones', $acusaciones)
                ->with('denunciantes', $denunciantes)
                ->with('denunciados', $denunciados)
                ->with('tipifdelitos', $tipifdelitos);
        }else{
            return redirect()->route('home');
        }
    }

    public function storeAcusacion(AcusacionRequest $request){
        //dd($request->all());
        $idCarpeta=session('carpeta');
        $acusacion = new Acusacion();
        $acusacion->idCarpeta = $idCarpeta;
        $acusacion->idDenunciante = $request->idDenunciante;
        $acusacion->idTipifDelito = $request->idTipifDelito;
        $acusacion->idDenunciado = $request->idDenunciado;
        $acusacion->save();
        /*
        Flash::success("Se ha registrado ".$user->name." de forma satisfactoria")->important();
        //Para mostrar modal
        //flash()->overlay('Se ha registrado '.$user->name.' de forma satisfactoria!', 'Hecho');
        */
        Alert::success('Acusación registrada con éxito', 'Hecho');
        //return redirect()->route('carpeta', $request->idCarpeta);
        return redirect()->route('new.acusacion');
    }
    
    public function delete($id){

        $Acusacion =  Acusacion::find($id);
        $Acusacion->delete();
        Alert::success('Registro eliminado con éxito', 'Hecho');
        return back();


    }

}
