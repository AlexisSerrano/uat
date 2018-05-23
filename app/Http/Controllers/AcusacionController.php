<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Alert;
use App\Models\Carpeta;
use App\Models\Acusacion;
use App\Http\Requests\AcusacionRequest;
use App\Models\BitacoraNavCaso;


class AcusacionController extends Controller
{
    public function showForm()
    {
        $idCarpeta=session('carpeta');
        $carpetaNueva = Carpeta::where('id', $idCarpeta)->get();
        if(count($carpetaNueva)>0){ 
            $acusaciones = CarpetaController::getAcusaciones($idCarpeta);
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
                ->join('cat_agrupacion1', 'cat_agrupacion1.id', '=', 'tipif_delito.idAgrupacion1')
                ->join('cat_agrupacion2', 'cat_agrupacion2.id', '=', 'tipif_delito.idAgrupacion2')
                ->select('tipif_delito.id', 'cat_delito.nombre as delito', 'cat_agrupacion1.nombre as desagregacion1', 'cat_agrupacion2.nombre as desagregacion2')
                ->where('tipif_delito.idCarpeta', '=', $idCarpeta)
                ->orderBy('cat_delito.nombre', 'ASC')
                ->get();
            $cont = 0;
            foreach ($tipifdelitos as $delito => $nombre) {
                if ($tipifdelitos[$cont]->desagregacion1 == 'SIN AGRUPACION') {
                    $tipifdelitos[$cont]->desagregacion1 = " ";
                }if ($tipifdelitos[$cont]->desagregacion2 == 'SIN AGRUPACION') {
                    $tipifdelitos[$cont]->desagregacion2 = " ";
                }
                $cont = $cont + 1;
            }
            return view('forms.acusacion')->with('idCarpeta', $idCarpeta)
                ->with('acusaciones', $acusaciones)
                ->with('denunciantes', $denunciantes)
                ->with('denunciados', $denunciados)
                ->with('tipifdelitos', $tipifdelitos);
        }else{
            return redirect()->route('home');
        }
    }

    public function storeAcusacion(AcusacionRequest $request){
        $idCarpeta=session('carpeta');

        $comprobar=Acusacion::where('idDenunciante',$request->idDenunciante)
        ->where('idTipifDelito',$request->idTipifDelito)
        ->where('idDenunciado',$request->idDenunciado)->get();
        // dd($comprobar);
        if (count($comprobar)>0) {
            Alert::warning('La acusación ya existe', 'Advertencia');
            return redirect()->back()->withInput();
        } else {
            $acusacion = new Acusacion();
            $acusacion->idCarpeta = $idCarpeta;
            $acusacion->idDenunciante = $request->idDenunciante;
            $acusacion->idTipifDelito = $request->idTipifDelito;
            $acusacion->idDenunciado = $request->idDenunciado;
            $acusacion->save();
    
            $bdbitacora = BitacoraNavCaso::where('idCaso',session('carpeta'))->first();
                $bdbitacora->acusaciones = $bdbitacora->acusaciones+1;
                $bdbitacora->save();
            Alert::success('Acusación registrada con éxito', 'Hecho');
            return redirect()->route('new.acusacion');
        }
        
    }
    
    public function delete($id){

        $Acusacion =  Acusacion::find($id);
        $Acusacion->delete();
        $bdbitacora = BitacoraNavCaso::where('idCaso',session('carpeta'))->first();
            $bdbitacora->acusaciones = $bdbitacora->acusaciones-1;
            $bdbitacora->save();
        Alert::success('Registro eliminado con éxito', 'Hecho');
        return back();

//dd($id);
    }

}
