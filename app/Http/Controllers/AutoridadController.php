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
use App\Models\NarracionPersona;
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
            $autoridades = CarpetaController::getAutoridades($carpetaNueva[0]['numCarpeta']);
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

    public function delete($id){
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
