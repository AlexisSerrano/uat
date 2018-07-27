<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Alert;
use Jenssegers\Date\Date;
use App\Models\Carpeta;
use App\Models\Acusacion;
use App\Http\Requests\AcusacionRequest;
use App\Models\BitacoraNavCaso;
use App\Models\componentes\aparicionesModel;


class AcusacionController extends Controller
{
    public function showForm()
    {
        $idCarpeta=session('carpeta');
        $carpetaNueva = Carpeta::where('id', $idCarpeta)->get();
       
        if(count($carpetaNueva)>0){ 
            $acusaciones = CarpetaController::getAcusaciones($idCarpeta);
            $denunciantes = DB::table('componentes.apariciones as apariciones')
            ->leftJoin('componentes.variables_persona_fisica as variables_fisica', 'variables_fisica.id', '=', 'apariciones.idVarPersona')
            ->leftJoin('componentes.variables_persona_moral as variables_moral', 'variables_moral.id', '=', 'apariciones.idVarPersona')
            ->leftJoin('componentes.extra_denunciante_fisico as extras_fisica', 'variables_fisica.id', '=', 'extras_fisica.idVariablesPersona')
            ->leftJoin('componentes.extra_denunciante_moral as extras_moral', 'variables_moral.id', '=', 'extras_moral.idVariablesPersona')
            ->leftJoin('componentes.persona_fisica as persona_fisica', 'persona_fisica.id', '=', 'variables_fisica.idPersona')
            ->leftJoin('componentes.persona_moral as persona_moral', 'persona_moral.id', '=', 'variables_moral.idPersona')
            ->select(
                'apariciones.id as id',
                //DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN extras_fisica.idVariablesPersona ELSE extras_moral.idVariablesPersona END) AS idVariablesPersona'),//'extra_denunciado.idVariablesPersona',
                DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN extras_fisica.id ELSE extras_moral.id END) AS id'),//'extra_denunciado.id',
                DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN persona_fisica.nombres ELSE persona_moral.nombre END) AS nombres'),//'persona.nombres', 
                DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN persona_fisica.primerAp ELSE "" END) AS primerAp'),//'persona.primerAp', 
                DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN persona_fisica.segundoAp ELSE "" END) AS segundoAp')//'persona.segundoAp', 
                // 'apariciones.esEmpresa AS esEmpresa',//'persona.esEmpresa', 
            )->distinct()
            ->where('apariciones.carpeta', '=', $carpetaNueva[0]->numCarpeta)
            ->Where('apariciones.tipoInvolucrado', '=', 'denunciante')
            ->get();
            // dump($denunciantes);
            // return $denunciados;
            //dd($denunciados);

            $denunciados = DB::table('componentes.apariciones as apariciones')
            ->leftJoin('componentes.variables_persona_fisica as variables_fisica', 'variables_fisica.id', '=', 'apariciones.idVarPersona')
            ->leftJoin('componentes.variables_persona_moral as variables_moral', 'variables_moral.id', '=', 'apariciones.idVarPersona')
            ->leftJoin('componentes.extra_denunciado_fisico as extras_fisica', 'variables_fisica.id', '=', 'extras_fisica.idVariablesPersona')
            ->leftJoin('componentes.extra_denunciado_moral as extras_moral', 'variables_moral.id', '=', 'extras_moral.idVariablesPersona')
            ->leftJoin('componentes.persona_fisica as persona_fisica', 'persona_fisica.id', '=', 'variables_fisica.idPersona')
            ->leftJoin('componentes.persona_moral as persona_moral', 'persona_moral.id', '=', 'variables_moral.idPersona')
            ->select(
                'apariciones.id as id',
                DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN extras_fisica.alias ELSE "NO APLICA" END) AS alias'),//'extra_denunciado.alias',
                DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN persona_fisica.nombres ELSE persona_moral.nombre END) AS nombres'),//'persona.nombres', 
                DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN persona_fisica.primerAp ELSE "" END) AS primerAp'),//'persona.primerAp', 
                DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN persona_fisica.segundoAp ELSE "" END) AS segundoAp')//'persona.segundoAp', 
            )->distinct()
            ->where('apariciones.carpeta', '=', $carpetaNueva[0]->numCarpeta)
            ->where(function($query){
                $query
                ->orWhere('apariciones.tipoInvolucrado', '=', 'denunciado')
                ->orWhere('apariciones.tipoInvolucrado', '=', 'conocido');
            })
            ->get();

            // dump($denunciados);
            
            
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
          //  dd($acusacion);
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

    }

    public function acuerdoInicio($id){

        $datos=DB::table('acusacion')
        ->where('acusacion.id','=',$id)
        ->join('extra_denunciante', 'extra_denunciante.id', '=', 'acusacion.idDenunciante')
        ->join('variables_persona','variables_persona.id','=','extra_denunciante.idVariablesPersona')
        ->join('persona','persona.id','=','variables_persona.idPersona')
        
        ->join('extra_denunciado', 'extra_denunciado.id', '=', 'acusacion.idDenunciado')
        ->join('variables_persona as variables_denunciado','variables_denunciado.id','=','extra_denunciado.idVariablesPersona')
        ->join('persona as persona_denunciado','persona_denunciado.id','=','variables_denunciado.idPersona')

        ->join('tipif_delito','tipif_delito.id','=','acusacion.idTipifDelito')
        ->join('cat_delito','cat_delito.id','=','tipif_delito.idDelito')
        ->join('cat_agrupacion1','cat_agrupacion1.id','=','tipif_delito.idAgrupacion1')
        ->join('cat_agrupacion2','cat_agrupacion2.id','=','tipif_delito.idAgrupacion2')

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
            'tipif_delito.idDelito',
            'cat_agrupacion1.nombre as agr1',
            'cat_agrupacion2.nombre as agr2',
            'cat_delito.nombre as delito' )
            ->FIRST();
            
            $cont = 0;

            if ( $datos->agr1 == 'SIN AGRUPACION') {
            $datos->agr1 = " ";
            }
            if ( $datos->agr2 == 'SIN AGRUPACION') {
            $datos->agr2 = " ";
            }
    
            $localidadAcuerdo='XALAPA';
            $entidadAcuerdo='VERACRUZ';
            $fiscalAcuerdo=strtoupper(Auth::user()->nombreC);
            // $fechaAcuerdo='OCHO DÍAS DEL MES DE JUNIO DEL AÑO DOS MIL DIECIOCHO';
            $fechaAcuerdo=strtoupper(Date::now()->format('j \\d\\i\\a\\s \\d\\e F \\d\\e Y'));
            $carpeta=DB::table('carpeta')
            ->join('unidad','carpeta.idUnidad','=','unidad.id')
            ->select('carpeta.numCarpeta')
            ->where('carpeta.id',$id)
            ->first();

            $puesto=Auth::user()->puesto;
           
            $puesto = strtr(strtoupper($puesto),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ");
           
            
            $datos= array('id'=> $id,
            'nombreDenunciante'=>$datos->nombreDenunciante.' '.$datos->primerApDenunciante.' '.$datos->segundoApDenunciante,
            'nombreDenunciado'=>$datos->nombreDenunciado.' '.$datos->primerApDenunciado.' '.$datos->segundoApDenunciado,
            'delito'=>$datos->delito.' '.$datos->agr1.' '.$datos->agr2,
            // 'agrupacion1'=>$datos->agr1,
            // 'agrupacion2'=>$datos->agr2,
            'localidad'=> $localidadAcuerdo,
            'entidad'=> $entidadAcuerdo,
            'fiscal'=> $fiscalAcuerdo,
            'puestoFiscal'=>$puesto,
            'fecha'=> $fechaAcuerdo,
            'carpeta'=> $carpeta->numCarpeta
            
        );
        // dd($datos1);
        return response()->json($datos);
    
    }



    public function acuerdoDocumento($id){ 
        return view('documentos.acuerdo-inicio')->with('id',$id);
    }

}
