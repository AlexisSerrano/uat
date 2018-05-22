<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Alert;
use App\Http\Requests\StoreAutoridad;
use App\Models\Carpeta;
use App\Models\CatEscolaridad;
use App\Models\CatEstado;
use App\Models\CatEstadoCivil;
use App\Models\CatEtnia;
use App\Models\CatLengua;
use App\Models\CatNacionalidad;
use App\Models\CatMunicipio;
use App\Models\CatOcupacion;
use App\Models\CatPuesto;
use App\Models\CatReligion;
use App\Models\Persona;
use App\Models\CatIdentificacion;
use App\Models\Domicilio;
use App\Models\VariablesPersona;
use App\Models\ExtraAutoridad;
use App\Models\BitacoraNavCaso;
use Carbon\Carbon;

class AutoridadController extends Controller
{
    public function showForm()
    {
        $idCarpeta=session('carpeta');
        $carpetaNueva = Carpeta::where('id', $idCarpeta)->get();//->where('idFiscal', Auth::user()->id)->get();
        if(count($carpetaNueva)>0){ 
            $autoridades = CarpetaController::getAutoridades($idCarpeta);
            $escolaridades = CatEscolaridad::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
            $estados = CatEstado::select('id', 'nombre')->orderBy('nombre', 'ASC')->pluck('nombre', 'id');
            $estadoscivil = CatEstadoCivil::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
            $etnias = CatEtnia::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
            $lenguas = CatLengua::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
            $municipios=CatMunicipio::where('idEstado',30)->orderBy('nombre', 'ASC')->pluck('nombre','id');
            $nacionalidades = CatNacionalidad::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
            $ocupaciones=  DB::table('cat_ocupacion')->select('id','nombre')->where('id','>',2941)->pluck('nombre', 'id');
            $religiones = CatReligion::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
            $identificaciones = CatIdentificacion::orderBy('id', 'ASC')->pluck('documento', 'id');
            //dd($ocupaciones);
            return view('forms.autoridad')->with('idCarpeta', $idCarpeta)
                ->with('autoridades', $autoridades)
                ->with('escolaridades', $escolaridades)
                ->with('estados', $estados)
                ->with('municipios', $municipios)
                ->with('estadoscivil', $estadoscivil)
                ->with('etnias', $etnias)
                ->with('lenguas', $lenguas)
                ->with('nacionalidades', $nacionalidades)
                ->with('ocupaciones', $ocupaciones)
                ->with('religiones', $religiones)
                ->with('identificaciones',$identificaciones);
        }else{
            return redirect()->route('home');
        }
    }

    public function storeAutoridad(StoreAutoridad $request){
        $idCarpeta=session('carpeta');
        // dd($request->all());
        DB::beginTransaction();
        try{
            $comprobarPersona=Persona::where('curp',$request->curp)->get();
            if(count($comprobarPersona)>0){
                $comprobarPersona=$comprobarPersona[0];
                $idPersona = $comprobarPersona->id;
            }else{
                $persona = new Persona();
                $persona->nombres = $request->nombres;
                $persona->primerAp = $request->primerAp;
                $persona->segundoAp = $request->segundoAp;
                $persona->fechaNacimiento = $request->fechaNacimiento;
                $persona->rfc = $request->rfc . $request->homo;
                $persona->curp = $request->curp;
                if (!is_null($request->sexo)){
                    $persona->sexo = $request->sexo;
                }
                if (!is_null($request->idNacionalidad)){
                    $persona->idNacionalidad = $request->idNacionalidad;
                }
                if (!is_null($request->idEtnia)){
                    $persona->idEtnia = $request->idEtnia;
                }
                if (!is_null($request->idLengua)){
                    $persona->idLengua = $request->idLengua;
                }
                if (!is_null($request->idMunicipioOrigen)){
                    $persona->idMunicipioOrigen = $request->idMunicipioOrigen;
                }
                $persona->save();
                $idPersona = $persona->id;
            }

            // $persona = new Persona();
            // $persona->nombres = $request->nombres;
            // $persona->primerAp = $request->primerAp;
            // $persona->segundoAp = $request->segundoAp;
            // $persona->fechaNacimiento = $request->fechaNacimiento;
            // $persona->rfc = $request->rfc;
            // $persona->curp = $request->curp;
            // $persona->sexo = $request->sexo;
            // $persona->idNacionalidad = $request->idNacionalidad;
            // $persona->idEtnia = $request->idEtnia;
            // $persona->idLengua = $request->idLengua;
            // $persona->idMunicipioOrigen = $request->idMunicipioOrigen;
            // $persona->save();
            // $idPersona = $persona->id;

            $domicilio = new Domicilio();
            $domicilio->idMunicipio = $request->idMunicipio;
            $domicilio->idLocalidad = $request->idLocalidad;
            $domicilio->idColonia = $request->idColonia;
            $domicilio->calle = $request->calle;
            if ($request->numExterno==null) {
                $domicilio->numExterno = 'S/N';
            } else {
                $domicilio->numExterno = $request->numExterno;
            }
            if ($request->numInterno==null) {
                $domicilio->numInterno = 'S/N';
            } else {
                $domicilio->numInterno = $request->numInterno;
            }
            $domicilio->save();
            $idD1 = $domicilio->id;

            $domicilio2 = new Domicilio();
            $domicilio2->idMunicipio = $request->idMunicipio2;
            $domicilio2->idLocalidad = $request->idLocalidad2;
            $domicilio2->idColonia = $request->idColonia2;
            $domicilio2->calle = $request->calle2;
            if ($request->numExterno2==null) {
                $domicilio2->numExterno = 'S/N';
            } else {
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
            $fecha = Carbon::parse($request->fechaNacimiento);
            $VariablesPersona->edad = Carbon::createFromDate($fecha->year, $fecha->month, $fecha->day)->age;
            $VariablesPersona->telefono = $request->telefono;
            // $VariablesPersona->motivoEstancia = $request->motivoEstancia;
            $VariablesPersona->idOcupacion = $request->idOcupacion;
            $VariablesPersona->idEstadoCivil = $request->idEstadoCivil;
            $VariablesPersona->idEscolaridad = $request->idEscolaridad;
            $VariablesPersona->idReligion = $request->idReligion;
            $VariablesPersona->idDomicilio = $idD1;
            $VariablesPersona->docIdentificacion = $request->docIdentificacion;
            $VariablesPersona->numDocIdentificacion = $request->numDocIdentificacion;
            $VariablesPersona->lugarTrabajo = $request->lugarTrabajo;
            $VariablesPersona->idDomicilioTrabajo = $idD2;
            $VariablesPersona->telefonoTrabajo = $request->telefonoTrabajo;
            $VariablesPersona->representanteLegal = "NO APLICA";
            $VariablesPersona->save();
            $idVariablesPersona = $VariablesPersona->id;

            $ExtraAutoridad = new ExtraAutoridad();
            $ExtraAutoridad->idVariablesPersona = $idVariablesPersona;
            $ExtraAutoridad->antiguedad = $request->antiguedad;
            $ExtraAutoridad->rango = $request->rango;
            $ExtraAutoridad->horarioLaboral = $request->horarioLaboral;
            $ExtraAutoridad->narracion = $request->narracion;
            $ExtraAutoridad->save();
            /*
            Flash::success("Se ha registrado ".$user->name." de forma satisfactoria")->important();
            //Para mostrar modal
            //flash()->overlay('Se ha registrado '.$user->name.' de forma satisfactoria!', 'Hecho');
            */
            Alert::success('Autoridad registrada con éxito', 'Hecho');
            $bdbitacora = BitacoraNavCaso::where('idCaso',$idCarpeta)->first();
            $bdbitacora->autoridad = $bdbitacora->autoridad+1;
            $bdbitacora->save();
            DB::commit();
            //return redirect()->route('carpeta', $request->idCarpeta);
            return redirect()->route('new.autoridad');
        }catch (\PDOException $e){
            DB::rollBack();
            Alert::error('Se presentó un problema al guardar su los datos, intente de nuevo', 'Error');
            return back()->withInput();
        }
    }


    public function delete($id){
        $idCarpeta=session('carpeta');

        $ExtraAutoridad =  ExtraAutoridad::find($id);
        $ExtraAutoridad->delete();
        $bdbitacora = BitacoraNavCaso::where('idCaso',$idCarpeta)->first();
        $bdbitacora->autoridad = $bdbitacora->autoridad-1;
        $bdbitacora->save();
        Alert::success('Registro eliminado con éxito', 'Hecho');
        return back();


    }
    
}
