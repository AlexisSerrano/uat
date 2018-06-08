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

    public function acuerdoInicio($id){

    //     $id=session('carpeta');
    //     $carpeta = Carpeta::find($id);
        $datos=DB::table('acusacion')
        ->where('acusacion.id','=',$id)
    //   ->join('extra_de', 'acusacion.idDenunciante', '=', 'extra_denunciado.id' )
        ->join('extra_denunciante', 'extra_denunciante.id', '=', 'acusacion.idDenunciante')
        ->join('variables_persona','variables_persona.id','=','extra_denunciante.idVariablesPersona')
        ->join('persona','persona.id','=','variables_persona.idPersona')
        
        ->join('extra_denunciado', 'extra_denunciado.id', '=', 'acusacion.idDenunciado')
        ->join('variables_persona as variables_denunciado','variables_denunciado.id','=','extra_denunciado.idVariablesPersona')
        ->join('persona as persona_denunciado','persona_denunciado.id','=','variables_denunciado.idPersona')

        ->join('tipif_delito as delitos','delitos.id','=','acusacion.idTipifDelito')
        ->join('cat_delito as catDelito','catDelito.id','=','delitos.idDelito')

        ->select(
            'extra_denunciante.idVariablesPersona',
            'variables_persona.idPersona',
            'persona.nombres as nombreDenunciante',
            'persona.primerAp as primerApDenunciante',
            'persona.segundoAp as segundoApDenunciante',
            'persona_denunciado.nombres as nombreDenunciado',
            'persona_denunciado.primerAp as primerApDenunciado',
            'persona_denunciado.segundoAp as segundoApDenunciado',
            'extra_denunciado.idVariablesPersona as extraDenunciado',
            'delitos.idDelito',
            'catDelito.nombre as delito' )
            ->FIRST();
    //    dd($datos);

        $localidadAcuerdo='XALAPA';
        $entidadAcuerdo='VERACRUZ';
        $fiscalAcuerdo='JULIO';
        $fechaAcuerdo='OCHO DÍAS DEL MES DE JUNIO DEL AÑO DOS MIL DIECIOCHO';
        $carpeta='UAT/D-XI/005/2018-6';


       $datos1= array('id'=> $id,
       'nombreDenunciante'=>$datos->nombreDenunciante,
       'primerApDenunciante'=>$datos->primerApDenunciante,
       'segundoApDenunciante'=>$datos->segundoApDenunciante,
       'nombreDenunciado'=>$datos->nombreDenunciado,
       'primerApDenunciado'=>$datos->primerApDenunciado,
       'segundoApDenunciado'=>$datos->segundoApDenunciado,
       'delito'=>$datos->delito,
       'localidad'=> $localidadAcuerdo,
       'entidad'=> $entidadAcuerdo,
       'fiscal'=> $fiscalAcuerdo,
       'fecha'=> $fechaAcuerdo,
       'carpeta'=> $carpeta

    );
    return response()->json($datos1);
    // ->with('id', $datos->id);
}



public function acuerdoDocumento($id){ 
    
    
     return view('documentos.acuerdo-inicio')->with('id',$id);
    }

}
