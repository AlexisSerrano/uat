<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Alert;
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
            //dd($ocupaciones);
            return view('forms.autoridad')->with('idCarpeta', $idCarpeta)
                ->with('autoridades', $autoridades);
        }else{
            return redirect()->route('home');
        }
    }

    public function edit($id){
        return view('forms.editsPersonas')
        ->with('idVarPersona', $id)
        ->with('tipo', 'autoridad')
        ->with('tipodenunciado', '')
        ->with('empresa', '0')
        ->with('title','Editar autoridad');
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
