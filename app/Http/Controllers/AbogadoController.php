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
                ->select('apa.idAparicion','nombres','primerAp','segundoAp','tipo')
                ->where('apa.tipoInvolucrado','abogado')
                ->where('variables_persona.idCarpeta', '=', $idCarpeta)
                ->orderBy('persona.nombres', 'ASC')
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
        $tipo = $request->tipo;
        $idInvolucrado = $request->idInvolucrado;
        $xd = DB::table('extra_denunciante')->select('id')->where('idVariablesPersona', $idInvolucrado)->get();
        if(count($xd)>0){
            DB::table('extra_denunciante')->where('idVariablesPersona', $idInvolucrado)->update(['idAbogado' => $idAbogado]);
            $bdbitacora = BitacoraNavCaso::where('idCaso',$idCarpeta)->first();
            $bdbitacora->defensa = $bdbitacora->defensa+1;
            $bdbitacora->save();
        }else{
            DB::table('extra_denunciado')->where('idVariablesPersona', $idInvolucrado)->update(['idAbogado' => $idAbogado]);
            $bdbitacora = BitacoraNavCaso::where('idCaso',$idCarpeta)->first();
            $bdbitacora->defensa = $bdbitacora->defensa+1;
            $bdbitacora->save();
        }
        Alert::success('Defensa asignada con éxito', 'Hecho');
        return redirect()->route('new.defensa');
    }
    
    public function getInvolucrados(Request $request, $idAbogado){
        $idCarpeta=session('carpeta');
        if(!is_null($request)&&!is_null($idAbogado)){
            $tipoAbog = DB::table('extra_abogado')
            ->select('tipo')
            ->where('id', '=', $idAbogado)
            ->get();
            $tipo = $tipoAbog[0]->tipo;
            $tipo = normaliza($tipo);
            // dd($tipo);
            if($tipo == "asesor juridico"){
                $involucrados = DB::table('extra_denunciante')
                    ->join('variables_persona', 'variables_persona.id', '=', 'extra_denunciante.idVariablesPersona')
                    ->join('persona', 'persona.id', '=', 'variables_persona.idPersona')
                    ->select('variables_persona.id',DB::raw('CONCAT(persona.nombres, " ", ifnull(persona.primerAp,"")," ", ifnull(persona.segundoAp,"")) AS nombres'))
                    ->where('variables_persona.idCarpeta', '=', $idCarpeta)
                    ->whereNull('extra_denunciante.idAbogado')
                    ->orderBy('persona.nombres', 'ASC')
                    ->get();
            }elseif($tipo == "abogado defensor"){
                $involucrados = DB::table('extra_denunciado')
                    ->join('variables_persona', 'variables_persona.id', '=', 'extra_denunciado.idVariablesPersona')
                    ->join('persona', 'persona.id', '=', 'variables_persona.idPersona')
                    ->select('variables_persona.id',DB::raw('CONCAT(persona.nombres, " ", ifnull(persona.primerAp,"")," ", ifnull(persona.segundoAp,"")) AS nombres'))
                    ->where('variables_persona.idCarpeta', '=', $idCarpeta)
                    ->whereNull('extra_denunciado.idAbogado')
                    ->orderBy('persona.nombres', 'ASC')
                    ->get();
            }
            return response()->json($involucrados);
        }
    }

}
