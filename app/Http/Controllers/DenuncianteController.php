<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreDenunciante;
use DB;
use Alert;
use Carbon\Carbon;
use App\Models\Carpeta;
use App\Models\CatEscolaridad;
use App\Models\NarracionPersona;
use App\Models\CatEstado;
use App\Models\CatMunicipio;
use App\Models\CatEstadoCivil;
use App\Models\CatEtnia;
use App\Models\CatLengua;
use App\Models\CatNacionalidad;
use App\Models\CatOcupacion;
use App\Models\CatReligion;
use App\Models\Razon;
use App\Models\Domicilio;
use App\Models\DirNotificacion;
use App\Models\Persona;
use App\Models\VariablesPersona;
use App\Models\ExtraDenunciante;
use App\Models\BitacoraNavCaso;
use App\Models\Acusacion;

class DenuncianteController extends Controller
{

    public function showForm()
    {
        $idCarpeta=session('carpeta');
        $casoNuevo = Carpeta::where('id', $idCarpeta)->get();
        if(count($casoNuevo)>0){ 
            $denunciantes = CarpetaController::getDenunciantes(session('numCarpeta'));
            return view('forms.denunciante')->with('idCarpeta', $idCarpeta)
                ->with('denunciantes', $denunciantes);
        }
        else{
            return redirect(route('home'));
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
            
            $acusaciones = Acusacion::where('idCarpeta',session('carpeta'))->where('idDenunciante',$id)->count();
            /*$vpersonas = DB::table('extra_denunciante')
            ->join('variables_persona','variables_persona.id','=','extra_denunciante.idVariablesPersona')
            ->where('extra_denunciante.id', '=', $id)
            ->select('variables_persona.id as id')
            ->first();
            $ExtraDenunciante =  ExtraDenunciante::find($id);
            $ExtraDenunciante->delete();
            $vp= VariablesPersona::find($vpersonas->id);
            $vp->idCarpeta = null;
            $vp->save();
            */

            $denunciante = DB::table('componentes.apariciones')->where('id', $id)->update(['activo' => 0, 'carpeta' => '']);
            $bdbitacora = BitacoraNavCaso::where('idCaso',session('carpeta'))->first();
            $bdbitacora->denunciante = $bdbitacora->denunciante-1;
            $bdbitacora->defensa = $bdbitacora->defensa-1;
            $bdbitacora->acusaciones = $bdbitacora->acusaciones-$acusaciones;
            $bdbitacora->save();
            DB::commit();
            Alert::success('Registro eliminado con éxito', 'Hecho');
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
        $bdbitacora->denunciante = $bdbitacora->denunciante+1;
        $bdbitacora->save();
    }

}
