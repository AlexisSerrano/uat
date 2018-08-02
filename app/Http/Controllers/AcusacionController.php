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
//use App\Models\VariablesPersona;


use App\Models\componentes\VariablesPersona;
use App\Models\componentes\PersonaModel;
use App\Models\componentes\Domicilio;
use App\Models\componentes\Trabajo;
use App\Models\componentes\PersonaMoralModel;
use App\Models\componentes\VariablesPersonaMoral;


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
            // ->leftJoin('componentes.extra_denunciante_fisico as extras_fisica', 'variables_fisica.id', '=', 'extras_fisica.idVariablesPersona')
            // ->leftJoin('componentes.extra_denunciante_moral as extras_moral', 'variables_moral.id', '=', 'extras_moral.idVariablesPersona')
            ->leftJoin('componentes.persona_fisica as persona_fisica', 'persona_fisica.id', '=', 'variables_fisica.idPersona')
            ->leftJoin('componentes.persona_moral as persona_moral', 'persona_moral.id', '=', 'variables_moral.idPersona')
            ->select(
                'apariciones.id as id',
                //DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN extras_fisica.idVariablesPersona ELSE extras_moral.idVariablesPersona END) AS idVariablesPersona'),//'extra_denunciado.idVariablesPersona',
                // DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN extras_fisica.id ELSE extras_moral.id END) AS id'),//'extra_denunciado.id',
                DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN persona_fisica.nombres ELSE persona_moral.nombre END) AS nombres'),//'persona.nombres', 
                DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN persona_fisica.primerAp ELSE "" END) AS primerAp'),//'persona.primerAp', 
                DB::raw('(CASE WHEN apariciones.esEmpresa = 0 THEN persona_fisica.segundoAp ELSE "" END) AS segundoAp')//'persona.segundoAp', 
                // 'apariciones.esEmpresa AS esEmpresa',//'persona.esEmpresa', 
            )->groupBy('apariciones.id')
            ->where('apariciones.idCarpeta', '=', $idCarpeta)
            ->where('apariciones.sistema', '=', 'uat')
            ->where('apariciones.activo', '=', 1)
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
            )
            ->groupBy('apariciones.id')
            ->where('apariciones.idCarpeta', '=', $idCarpeta)
            ->where('apariciones.sistema', '=', 'uat')
            ->where('apariciones.activo', '=', 1)
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

        $id=session('carpeta');
        $carpeta=DB::table('carpeta')
        ->join('unidad','carpeta.idUnidad','=','unidad.id')
        ->where('carpeta.id',$id)->first();


        $numCarpeta=$carpeta->numCarpeta;
        
        $apariciones= aparicionesModel::where('idCarpeta',$id)
            ->where('sistema','uat')
            ->where('tipoInvolucrado','denunciante')
            ->select('id','idVarPersona','idCarpeta','esEmpresa')
            ->first();
            $idVPersona=$apariciones->idVarPersona;
            if ($apariciones->esEmpresa==0) {
                $variablesP=VariablesPersona::where('id',$idVPersona)
                ->first();
                $datosPersona=PersonaModel::where('id',$variablesP->idPersona)
                ->first();
                $denunciante=$datosPersona->nombres.' '.$datosPersona->primerAp.' '.$datosPersona->segundoAp;
            }
            else{
                $variablesP=VariablesPersonaMoral::where('id',$idVPersona)
                ->first();
                $idPersona=$variablesP->idPersona;
                $datosPersona=PersonaMoralModel::where('id',$idPersona)
                ->select('nombre')
                ->first();
        
                $denunciante=$datosPersona->nombre;
            }

            $apariciones2= aparicionesModel::where('idCarpeta',$id)
            ->where('sistema','uat')
            ->where('tipoInvolucrado','denunciado')
            ->select('id','idVarPersona','idCarpeta','esEmpresa')
            ->first();
            $idVPersona2=$apariciones2->idVarPersona;

            if($apariciones2->esEmpresa==0) {

                $variablesDenunciado=VariablesPersona::where('id',$idVPersona2)
                ->first();
                $denuncianteFisica=PersonaModel::where('id',$variablesDenunciado->idPersona)
                ->first();
                $denunciados=$denuncianteFisica->nombres.' '.$denuncianteFisica->primerAp.' '.$denuncianteFisica->segundoAp;
            }
            else{
                $variablesDenunciado=VariablesPersonaMoral::where('id',$idVPersona2)
                ->first();
                $denuncianteMoral=PersonaMoralModel::where('id',$variablesDenunciado->idPersona)
                ->select('nombre')
                ->first();
                $denunciados=$denuncianteMoral->nombre;

            }
            
            $TipifDelito=DB::table('tipif_delito')
            ->join('cat_delito','cat_delito.id','=','tipif_delito.idDelito')
            ->where('tipif_delito.idCarpeta',$id)
            ->select('cat_delito.nombre as delito')
            ->first();

            // if ( $datos->agr1 == 'SIN AGRUPACION') {
            // $datos->agr1 = " ";
            // }
            // if ( $datos->agr2 == 'SIN AGRUPACION') {
            // $datos->agr2 = " ";
            // }
    
            $localidadAcuerdo='XALAPA';
            $entidadAcuerdo='VERACRUZ';
            $fiscalAcuerdo=strtoupper(Auth::user()->nombreC);
            // $fechaAcuerdo='OCHO DÍAS DEL MES DE JUNIO DEL AÑO DOS MIL DIECIOCHO';
            $fechaAcuerdo=strtoupper(Date::now()->format('j \\d\\i\\a\\s \\d\\e F \\d\\e Y'));
           

            $puesto=Auth::user()->puesto;
           
            $puesto = strtr(strtoupper($puesto),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ");
           
            
            $datos= array('id'=> $id,
            'carpeta'=>$numCarpeta,
            'nombreDenunciante'=>strtr(strtoupper($denunciante),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ"),
            'nombreDenunciado'=>strtr(strtoupper($denunciados),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ"),
            'delito'=>$TipifDelito->delito,
            // 'delito'=>$datos->delito.' '.$datos->agr1.' '.$datos->agr2,
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
