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
            $abogados = CarpetaController::getAbogados($idCarpeta);
            $estados = CatEstado::select('id', 'nombre')->orderBy('nombre', 'ASC')->pluck('nombre', 'id');
            $estadoscivil = CatEstadoCivil::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
            // dd($estados);
            return view('forms.abogado')->with('idCarpeta', $idCarpeta)
                ->with('abogados', $abogados)
                ->with('estados', $estados)
                ->with('estadoscivil', $estadoscivil);
        }else{
            return redirect()->route('home');
        }
    }

    public function storeAbogado(StoreAbogado $request)
    {
        //dd($request->all());
        $persona = new Persona();
        $persona->nombres = $request->nombres;
        $persona->primerAp = $request->primerAp;
        $persona->segundoAp = $request->segundoAp;
        $persona->fechaNacimiento = $request->fechaNacimiento;
        $persona->rfc = $request->rfc;
        $persona->sexo = $request->sexo;
        $persona->idNacionalidad = 1;
        $persona->idMunicipioOrigen = $request->idMunicipioOrigen;
        //$persona->curp = "SIN INFORMACION";
        $persona->save();
        $idPersona = $persona->id;

        $domicilio2 = new Domicilio();
        $domicilio2->idMunicipio = $request->idMunicipio2;
        $domicilio2->idLocalidad = $request->idLocalidad2;
        $domicilio2->idColonia = $request->idColonia2;
        $domicilio2->calle = $request->calle2;
        $domicilio2->numExterno = $request->numExterno2;
        $domicilio2->numInterno = $request->numInterno2;
        $domicilio2->save();
        $idD2 = $domicilio2->id;

        $VariablesPersona = new VariablesPersona();
        $VariablesPersona->idCarpeta = $request->idCarpeta;
        $VariablesPersona->idPersona = $idPersona;
        $VariablesPersona->telefono = $request->telefono;
        $VariablesPersona->idEstadoCivil = $request->idEstadoCivil;
        $VariablesPersona->lugarTrabajo = $request->lugarTrabajo;
        $VariablesPersona->idDomicilioTrabajo = $idD2;
        $VariablesPersona->telefonoTrabajo = $request->telefonoTrabajo;
        $fecha = Carbon::parse($request->fechaNacimiento);
        $VariablesPersona->edad = Carbon::createFromDate($fecha->year, $fecha->month, $fecha->day)->age;
        $VariablesPersona->motivoEstancia = "NO APLICA";
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
        $ExtraAbogado->correo = $request->correo;
        $ExtraAbogado->tipo = $request->tipo;
        $ExtraAbogado->save();
        $idAbogado = $ExtraAbogado->id;
        $bdbitacora = BitacoraNavCaso::where('idCaso',session('carpeta'))->first();
        $bdbitacora->abogado = $bdbitacora->abogado+1;
        $bdbitacora->save();
        Alert::success('Abogado registrado con éxito', 'Hecho');
        return redirect()->route('new.abogado', $request->idCarpeta);
    }

    public function showForm2()
    {
        
        $idCarpeta=session('carpeta');
        $carpetaNueva = Carpeta::where('id', $idCarpeta)->get();
        if(count($carpetaNueva)>0){ 
            $defensas = CarpetaController::getDefensas($idCarpeta);
            $abogados = DB::table('extra_abogado')
                ->join('variables_persona', 'variables_persona.id', '=', 'extra_abogado.idVariablesPersona')
                ->join('persona', 'persona.id', '=', 'variables_persona.idPersona')
                ->select('extra_abogado.id', 'persona.nombres', 'persona.primerAp', 'persona.segundoAp')
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
        $idAbogado = $request->idAbogado;
        $tipo = $request->tipo;
        $idInvolucrado = $request->idInvolucrado;
        $xd = DB::table('extra_denunciante')->select('id')->where('idVariablesPersona', $idInvolucrado)->get();
        if(count($xd)>0){
            DB::table('extra_denunciante')->where('idVariablesPersona', $idInvolucrado)->update(['idAbogado' => $idAbogado]);
            $bdbitacora = BitacoraNavCaso::where('idCaso',session('carpeta'))->first();
            $bdbitacora->defensa = $bdbitacora->defensa+1;
            $bdbitacora->save();
        }else{
            DB::table('extra_denunciado')->where('idVariablesPersona', $idInvolucrado)->update(['idAbogado' => $idAbogado]);
            $bdbitacora = BitacoraNavCaso::where('idCaso',session('carpeta'))->first();
            $bdbitacora->defensa = $bdbitacora->defensa+1;
            $bdbitacora->save();
        }
        Alert::success('Defensa asignada con éxito', 'Hecho');
        return redirect()->route('new.defensa', $request->idCarpeta);
    }
    
    public function getInvolucrados(Request $request, $idCarpeta, $idAbogado){
        if($request->ajax()){
            $tipoAbog = DB::table('extra_abogado')
                ->select('tipo')
                ->where('id', '=', $idAbogado)
                ->get();
            $tipo = $tipoAbog[0]->tipo;
            if($tipo == "ASESOR JURIDICO"){
                $involucrados = DB::table('extra_denunciante')
                    ->join('variables_persona', 'variables_persona.id', '=', 'extra_denunciante.idVariablesPersona')
                    ->join('persona', 'persona.id', '=', 'variables_persona.idPersona')
                    ->select('variables_persona.id',DB::raw('CONCAT(persona.nombres, " ", ifnull(persona.primerAp,"")," ", ifnull(persona.segundoAp,"")) AS nombres'))
                    ->where('variables_persona.idCarpeta', '=', $idCarpeta)
                    ->whereNull('extra_denunciante.idAbogado')
                    ->orderBy('persona.nombres', 'ASC')
                    ->get();
            }elseif($tipo == "ABOGADO DEFENSOR"){
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


    public function delete($id){
        $ExtraAbogado =  ExtraAbogado::find($id);
        $tipo=$ExtraAbogado->tipo;
        
        if ($tipo=="ASESOR JURIDICO") {
            
            $denunciantes = DB::table('extra_denunciante')
            ->where('idAbogado', '=', $id)
            ->get();
            // dd($denunciantes);
            foreach ($denunciantes as $denunciante) {
                $asesor= ExtraDenunciante::find($denunciante->id);
                $asesor->idAbogado = null;
                $asesor->save();
            }

        } else {
            $denunciados = DB::table('extra_denunciado')
            ->where('idAbogado', '=', $id)
            ->get();
            // dd($denunciantes);
            foreach ($denunciados as $denunciado) {
                $abogado= ExtraDenunciado::find($denunciado->id);
                $abogado->idAbogado = null;
                $abogado->save();
            }

        }
        





        $ExtraAbogado->delete();
        $bdbitacora = BitacoraNavCaso::where('idCaso',session('carpeta'))->first();
        $bdbitacora->abogado = $bdbitacora->abogado-1;

                
        $bdbitacora->save();


        Alert::success('Registro eliminado con éxito', 'Hecho');
        return back();
    }
}
