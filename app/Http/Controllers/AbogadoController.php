<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Alert;
use Carbon\Carbon;
use App\Http\Requests\StoreAbogado;
use App\Models\Carpeta;
use App\Models\CatEstado;
use App\Models\CatEstadoCivil;
use App\Models\ExtraDenunciante;
use App\Models\CatMunicipio;
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
            $estados = CatEstado::select('id', 'nombre')->orderBy('nombre', 'ASC')->pluck('nombre', 'id');
            $estadoscivil = CatEstadoCivil::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
            $municipios=CatMunicipio::where('idEstado',30)->orderBy('nombre', 'ASC')->pluck('nombre','id');
            // dd($estados);
            return view('forms.abogado')->with('idCarpeta', $idCarpeta)
                ->with('abogados', $abogados)
                ->with('estados', $estados)
                ->with('municipios', $municipios)
                ->with('estadoscivil', $estadoscivil);
        }else{
            return redirect()->route('home');
        }
    }

    public function storeAbogado(StoreAbogado $request)
    {
        $idCarpeta=session('carpeta');
        DB::beginTransaction();
        try{
            //dd($request->all());
            $persona = new Persona();
            $persona->nombres = $request->nombres;
            $persona->primerAp = $request->primerAp;
            $persona->segundoAp = $request->segundoAp;
            $persona->fechaNacimiento = $request->fechaNacimiento;
            $persona->rfc = $request->rfc . $request->homo;
            $persona->sexo = $request->sexo;
            $persona->idNacionalidad = 1;
            $persona->idMunicipioOrigen = $request->idMunicipioOrigen;
            
            $persona->save();
            $idPersona = $persona->id;
        
            $domicilio2 = new Domicilio();
            $domicilio2->idMunicipio = $request->idMunicipio2;
            $domicilio2->idLocalidad = $request->idLocalidad2;
            $domicilio2->idColonia = $request->idColonia2;
            $domicilio2->calle = $request->calle2;
            if ($request->numExterno==null) {
                $domicilio2->numExterno = 'S/N';
            } else{
                $domicilio2->numExterno = $request->numExterno2;
            }
            if ($request->numInterno2==null) {
                $domicilio2->numInterno = 'S/N';
            } else {
                $domicilio2->numInterno = $request->numInterno2;
            }
            $domicilio2->save();
            $idD2 = $domicilio2->id;

            $VariablesPersona = new VariablesPersona();
            $VariablesPersona->idCarpeta = $idCarpeta;
            $VariablesPersona->idPersona = $idPersona;
            $VariablesPersona->telefono = $request->telefono;
            $VariablesPersona->idEstadoCivil = $request->idEstadoCivil;
            $VariablesPersona->lugarTrabajo = $request->lugarTrabajo;
            $VariablesPersona->idDomicilioTrabajo = $idD2;
            $VariablesPersona->telefonoTrabajo = $request->telefonoTrabajo;
            $fecha = Carbon::parse($request->fechaNacimiento);
            $VariablesPersona->edad = Carbon::createFromDate($fecha->year, $fecha->month, $fecha->day)->age;
            // $VariablesPersona->motivoEstancia = "NO APLICA";
            $VariablesPersona->idOcupacion = 2469;
            $VariablesPersona->idEscolaridad = 8;
            $VariablesPersona->docIdentificacion = "NO APLICA";
            $VariablesPersona->numDocIdentificacion = "NO APLICA";
            $VariablesPersona->representanteLegal = "NO APLICA";
            $VariablesPersona->save();
            $idVariablesPersona = $VariablesPersona->id;

            $ExtraAbogado = new ExtraAbogado();
            $ExtraAbogado->idVariablesPersona = $idVariablesPersona;
            $ExtraAbogado->cedulaProf = $request->cedulaProf;
            $ExtraAbogado->sector = $request->sector;
            if(is_null($request->correo)){
                $ExtraAbogado->correo = 'sin@informacion.com';
            }else{
                $ExtraAbogado->correo = $request->correo;
            }
            $ExtraAbogado->tipo = $request->tipo;
            $ExtraAbogado->save();
            $idAbogado = $ExtraAbogado->id;
            $bdbitacora = BitacoraNavCaso::where('idCaso',$idCarpeta)->first();
            $bdbitacora->abogado = $bdbitacora->abogado+1;
            $bdbitacora->save();
            DB::commit();
            Alert::success('Abogado registrado con éxito', 'Hecho');
            return redirect()->route('new.abogado');
        }catch (\PDOException $e){
            DB::rollBack();
            Alert::error('Se presentó un problema al guardar sus datos, intente de nuevo', 'Error');
            return back()->withInput();
        }
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

    public function deleteDefensa($id){
        try{
            DB::beginTransaction();
            $idCarpeta=session('carpeta');
            $autoridades = DB::table('componentes.apariciones')->where('id', $id)->update(['activo' => 0, 'carpeta' => '']);
            $bdbitacora = BitacoraNavCaso::where('idCaso',$idCarpeta)->first();
            $bdbitacora->autoridad = $bdbitacora->autoridad-1;
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
