<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
use App\Models\VariablesPersona;
use App\Models\ExtraDenunciado;
use App\Models\DirNotificacion;
use App\Models\Domicilio;
use App\Models\NarracionPersona;
use App\Http\Requests\StoreDenunciado;
use App\Models\BitacoraNavCaso;
use App\Models\Acusacion;
use Alert;
use DB;
use Carbon\Carbon;

class DenunciadoController extends Controller
{
    public function showForm()
    {
        $idCarpeta=session('carpeta');
        $carpetaNueva = Carpeta::where('id', $idCarpeta)->get();
        if(count($carpetaNueva)>0){ 
            $denunciados = CarpetaController::getDenunciados($idCarpeta); 
            return view('forms.denunciado')->with('idCarpeta', $idCarpeta)
                ->with('denunciados', $denunciados);
        }else{
            return redirect()->route('home');
        }
    }

    public function edit($id){
        return view('forms.editsPersonas')
        ->with('idVarPersona', $id)
        ->with('tipo', 'denunciante')
        ->with('title','Editar víctima u ofendido');
    }

    public function delete($id){
        DB::beginTransaction();
        try{
            $acusaciones = Acusacion::where('idCarpeta',session('carpeta'))->where('idDenunciado',$id)->count();
            /*
            $vpersonas = DB::table('extra_denunciado')
            ->join('variables_persona','variables_persona.id','=','extra_denunciado.idVariablesPersona')
            ->where('extra_denunciado.id', '=', $id)
            ->select('variables_persona.id as id')
            ->first();
            */

            //$ExtraDenunciado =  ExtraDenunciado::find($id);
            //$ExtraDenunciado->delete();

            $denunciado = DB::table('componentes.apariciones')->where('id', $id)->update(['activo' => 0, 'carpeta' => '']);
        
            /*
            $vp= VariablesPersona::find($vpersonas->id);
            $vp->idCarpeta = null;
            $vp->save();
            */
            //$acusaciones = Acusacion::where('idCarpeta',$idCarpeta)->where('idTipifDelito',$id)->count();

            $bdbitacora = BitacoraNavCaso::where('idCaso',session('carpeta'))->first();
            $bdbitacora->denunciado = $bdbitacora->denunciado-1;
            $bdbitacora->defensa = $bdbitacora->defensa-1;
            $bdbitacora->acusaciones = $bdbitacora->acusaciones-$acusaciones;
            $bdbitacora->save();
            DB::commit();
            Alert::success('Registrado eliminado con éxito', 'Hecho');
            return back();
        }
        catch (\PDOException $e){
            DB::rollBack();
            Alert::error('Se presentó un problema al guardar los datos, intente de nuevo', 'Error');
            return back()->withInput();
        }
    }

    public function addbitacora(){
        $bdbitacora = BitacoraNavCaso::where('idCaso',session('carpeta'))->first();
        $bdbitacora->denunciado = $bdbitacora->denunciado+1;
        $bdbitacora->save();
    }

}
