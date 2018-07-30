<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Alert;
use Carbon\Carbon;
use App\Http\Requests\StoreAbogado;
use App\Models\Carpeta;
use App\Models\ExtraDenunciante;
use App\Models\ExtraDenunciado;
use App\Models\Persona;
use App\Models\VariablesPersona;
use App\Models\ExtraAbogado;
use App\Models\Domicilio;
use App\Models\BitacoraNavCaso;

class AbogadoController extends Controller
{
    public function showForm()
    {   
        $idCarpeta=session('carpeta');
        $carpetaNueva = Carpeta::where('id', $idCarpeta)->get();
        if(count($carpetaNueva)>0){ 
            $abogados = CarpetaController::getAbogados($carpetaNueva[0]['numCarpeta']);
            // dd($estados);
            return view('forms.abogado')->with('idCarpeta', $idCarpeta)
                ->with('abogados', $abogados);
        }else{
            return redirect()->route('home');
        }
    }

    public function edit($id){
        return view('forms.editsPersonas')
        ->with('idVarPersona', $id)
        ->with('tipo', 'abogado')
        ->with('title','Editar abogado');
    }

    public function delete($id){
        try{
            DB::beginTransaction();
            $bdbitacora = BitacoraNavCaso::where('idCaso',session('carpeta'))->first();
            $carpeta = DB::table('componentes.apariciones')
            ->where('id', $id)
            ->select('idCarpeta')->first();
 
            $abogado = DB::table('componentes.apariciones')
            ->where('id', $id)
            ->update(['activo' => 0, 'carpeta' => '']);
                
            $involucrados = DB::table('componentes.apariciones')
            ->where('idCarpeta', $carpeta->idCarpeta)
            ->where('tipoInvolucrado', 'DENUNCIADO')
            ->orWhere('tipoInvolucrado', 'CONOCIDO')
            ->orWhere('tipoInvolucrado', 'QRR')
            ->orWhere('tipoInvolucrado', 'DENUNCIANTE')
            ->select('idVarPersona','esEmpresa','tipoInvolucrado')
            ->get();
   
            foreach ($involucrados as $inv) {
                if ($inv->esEmpresa == 0) {
                    if ($inv->tipoInvolucrado == "DENUNCIANTE") {
                        DB::table('componentes.extra_denunciante_fisico')
                        ->where('idVariablesPersona', $inv->idVarPersona)
                        ->update(['idAbogado' => null]);
                    }else{
                        DB::table('componentes.extra_denunciado_fisico')
                        ->where('idVariablesPersona', $inv->idVarPersona)
                        ->update(['idAbogado' => null]);
                    }
                }else{
                    if ($inv->tipoInvolucrado == "DENUNCIANTE") {
                        DB::table('componentes.extra_denunciante_moral')                        
                        ->where('idVariablesPersona', $inv->idVarPersona)
                        ->update(['idAbogado' => null]);
                    }else{
                        DB::table('componentes.extra_denunciado_moral')
                        ->where('idVariablesPersona', $inv->idVarPersona)
                        ->update(['idAbogado' => null]);
                    }
                }
            }    
         
            $bdbitacora->abogado = $bdbitacora->abogado-1;
            $bdbitacora->save();
            DB::commit();
            Alert::success('Registro eliminado con éxito', 'Hecho');
            return back();
        }catch (\PDOException $e){
            DB::rollBack();
            Alert::error('Se presentó un problema al eliminar sus datos, intente de nuevo', 'Error');
            return back()->withInput();
        }
    }


    public function showForm2()
    {
        $idCarpeta=session('carpeta');
        $carpetaNueva = Carpeta::where('id', $idCarpeta)->get();
        if(count($carpetaNueva)>0){ 
            $defensas = CarpetaController::getDefensas(session('carpeta'));
            $abogados = DB::table('componentes.persona_fisica as per')
                ->join('componentes.variables_persona_fisica as varper', 'varper.idPersona', 'per.id')
                ->join('componentes.apariciones as apa', 'apa.idVarPersona', 'varper.id')
                ->join('componentes.extra_abogado as exa', 'exa.idVariablesPersona', 'varper.id')
                ->select('apa.id as idAparicion','nombres','primerAp','segundoAp','tipo')
                ->where('apa.tipoInvolucrado','abogado')
                ->where('apa.carpeta', session('numCarpeta'))
                ->orderBy('per.nombres', 'ASC')
                ->get();
                
            return view('forms.defensa')->with('idCarpeta', $idCarpeta)
                ->with('defensas', $defensas)
                ->with('abogados', $abogados);
        }else{
            return redirect()->route('home');
        }
    }

    public function storeDefensa(Request $request)
    {
        $idCarpeta=session('carpeta');
        $idAbogado = $request->idAbogado;
        $idInvolucrado = $request->idInvolucrado;

        $abogado = DB::table('componentes.apariciones as apa')
        ->join('componentes.extra_abogado as exa', 'exa.idVariablesPersona', 'apa.idVarPersona')
        ->select('exa.id','exa.tipo')
        ->where('apa.id',$idAbogado)
        ->first();

        $aparicion = DB::table('componentes.apariciones as apa')
        ->select('apa.idVarPersona','apa.esEmpresa')
        ->where('apa.id',$idInvolucrado)
        ->first();

        if(normaliza($abogado->tipo)=='abogado defensor'){
            if($aparicion->esEmpresa==0){
                DB::table('componentes.extra_denunciado_fisico')->where('idVariablesPersona', $aparicion->idVarPersona)->update(['idAbogado' => $abogado->id]);
            }elseif($aparicion->esEmpresa==1){
                DB::table('componentes.extra_denunciado_moral')->where('idVariablesPersona', $aparicion->idVarPersona)->update(['idAbogado' => $abogado->id]);
            }
        }elseif(normaliza($abogado->tipo)=='asesor juridico'){
            if($aparicion->esEmpresa==0){
                DB::table('componentes.extra_denunciante_fisico')->where('idVariablesPersona', $aparicion->idVarPersona)->update(['idAbogado' => $abogado->id]);
            }elseif($aparicion->esEmpresa==1){
                DB::table('componentes.extra_denunciante_moral')->where('idVariablesPersona', $aparicion->idVarPersona)->update(['idAbogado' => $abogado->id]);
            }
        }
        $bdbitacora = BitacoraNavCaso::where('idCaso',$idCarpeta)->first();
        $bdbitacora->defensa = $bdbitacora->defensa+1;
        $bdbitacora->save();

        Alert::success('Defensa asignada con éxito', 'Hecho');
        return redirect()->route('new.defensa');
    }
    
    public function getInvolucrados(Request $request, $idAbogado){
        $carpeta=session('numCarpeta');
        $invFis=null;
        if(!is_null($request)&&!is_null($idAbogado)){
            $tipoAbog = DB::table('componentes.extra_abogado as exa')
            ->join('componentes.apariciones as apa', 'apa.idVarPersona', 'exa.idVariablesPersona')
            ->select('exa.tipo')
            ->where('apa.id', $idAbogado)
            ->first();
            $tipo = $tipoAbog->tipo;
            $tipo = normaliza($tipo);
            
            if($tipo == "asesor juridico"){
                $invFis= DB::table('componentes.persona_fisica as per')
                ->join('componentes.variables_persona_fisica as varper', 'varper.idPersona', 'per.id')
                ->join('componentes.extra_denunciante_fisico as exa', 'exa.idVariablesPersona', 'varper.id')
                ->join('componentes.apariciones as apa', 'apa.idVarPersona', 'varper.id')
                ->select('apa.id as idAparicion', 'per.nombres', 'per.primerAp','per.segundoAp')
                ->where('apa.esEmpresa', 0)
                ->Where('apa.tipoInvolucrado', 'denunciante')
                ->where('apa.carpeta', $carpeta)
                ->whereNull('exa.idAbogado')
                ->orderBy('per.nombres', 'ASC');  

                $involucrados= DB::table('componentes.persona_moral as per')
                ->join('componentes.variables_persona_moral as varper', 'varper.idPersona', 'per.id')
                ->join('componentes.extra_denunciante_moral as exa', 'exa.idVariablesPersona', 'varper.id')
                ->join('componentes.apariciones as apa', 'apa.idVarPersona', 'varper.id')
                ->select('apa.id as idAparicion', 'per.nombre as nombres', DB::raw('"" as primerAp'), DB::raw('"" as segundoAp'))
                ->where('apa.esEmpresa', 1)
                ->Where('apa.tipoInvolucrado', 'denunciante')
                ->where('apa.carpeta', $carpeta)
                ->whereNull('exa.idAbogado')
                ->orderBy('per.nombre', 'ASC')
                ->union($invFis)
                ->get();

            }elseif($tipo == "abogado defensor"){
                $invFis= DB::table('componentes.persona_fisica as per')
                ->join('componentes.variables_persona_fisica as varper', 'varper.idPersona', 'per.id')
                ->join('componentes.extra_denunciado_fisico as exa', 'exa.idVariablesPersona', 'varper.id')
                ->join('componentes.apariciones as apa', 'apa.idVarPersona', 'varper.id')
                ->select('apa.id as idAparicion', 'per.nombres', 'per.primerAp','per.segundoAp')
                ->where('apa.esEmpresa', 0)
                ->where('apa.tipoInvolucrado', 'denunciado')
                ->where('apa.carpeta', $carpeta)
                ->whereNull('exa.idAbogado')
                ->orderBy('per.nombres', 'ASC');
                

                $involucrados= DB::table('componentes.persona_moral as per')
                ->join('componentes.variables_persona_moral as varper', 'varper.idPersona', 'per.id')
                ->join('componentes.extra_denunciado_moral as exa', 'exa.idVariablesPersona', 'varper.id')
                ->join('componentes.apariciones as apa', 'apa.idVarPersona', 'varper.id')
                ->select('apa.id as idAparicion', 'per.nombre as nombres', DB::raw('"" as primerAp'), DB::raw('"" as segundoAp'))
                ->where('apa.esEmpresa', 1)
                ->where('apa.tipoInvolucrado', 'denunciado')
                ->where('apa.carpeta', $carpeta)
                ->whereNull('exa.idAbogado')
                ->orderBy('per.nombre', 'ASC')
                ->union($invFis)
                ->get();

            }

            return response()->json($involucrados);
        }
    }

    public function deleteDefensa(Request $request,$id){
        
        try{
            DB::beginTransaction();
            $defensa = DB::table('componentes.apariciones')->where('id', $id)->first();

            if($defensa->tipoInvolucrado=='denunciante'){
                if($defensa->esEmpresa==1)
                    $elim = DB::table('componentes.extra_denunciante_moral as exa')
                    ->where('exa.idVariablesPersona', $defensa->idVarPersona)
                    ->update(['exa.idAbogado' => null]);
                else
                    $elim = DB::table('componentes.extra_denunciante_fisico as exa')
                    ->where('exa.idVariablesPersona', $defensa->idVarPersona)
                    ->update(['exa.idAbogado' => null]);
            }else if($defensa->tipoInvolucrado=='denunciado'){
                if($defensa->esEmpresa==1){
                    $elim = DB::table('componentes.extra_denunciado_moral as exa')
                    ->where('exa.idVariablesPersona', $defensa->idVarPersona)
                    ->update(['exa.idAbogado' => null]);
                }else{
                    $elim = DB::table('componentes.extra_denunciado_fisico as exa')
                    ->where('exa.idVariablesPersona',$defensa->idVarPersona)
                    ->update(['exa.idAbogado' => null]);
                }
            }
          
            $bdbitacora = BitacoraNavCaso::where('idCaso',$defensa->idCarpeta)->first();
            $bdbitacora->autoridad = $bdbitacora->defensa-1;
            $bdbitacora->save();
            DB::commit();
            Alert::success('Registro eliminado con éxito', 'Hecho');
            return back();
        }catch (\PDOException $e){
            DB::rollBack();
            Alert::error('Se presentó un problema al eliminar sus datos, intente de nuevo', 'Error');
            return back()->withInput();
        }
    }

}
