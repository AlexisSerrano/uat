<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NarracionPersona;
use App\Models\Carpeta;
use App\Models\ExtraDenunciante;
use App\Models\BitacoraNavCaso;
use App\Http\Requests\SolicitanteRequest;
use Illuminate\Support\Facades\Storage;
use Alert;
use DB;


class NarracionController extends Controller
{
    
    public function descripcionHechos(){
        $carpeta = session('carpeta');
        $narracion = Carpeta::select('descripcionHechos')->where('id',$carpeta)->first();
        $narracion =$narracion->descripcionHechos;
        return view("forms.hechos-orientador")
        ->with('narracion',$narracion);
    }
    public function storeDescripcionHechos(Request $request){
        $idCarpera = session('carpeta');
        DB::beginTransaction();
        try{
            $carpeta = Carpeta::find($idCarpera);
            $carpeta->descripcionHechos=$request->descripcionHechos;
            $carpeta->save();
            Alert::success('Descripción de hechos guardada con éxito', 'Hecho');
            $bitacora = true;
            if($bitacora){
                $bdbitacora = BitacoraNavCaso::where('idCaso',session('carpeta'))->first();
                $bdbitacora->hechos = 1;
                $bdbitacora->save();
            }
            DB::commit();
            return redirect(route('observaciones'));
        }catch (\PDOException $e){
            DB::rollBack();
            Alert::error('Se presentó un problema al guardar los datos, intente de nuevo', 'Error');
            return back()->withInput();
        }
    }
    public function index($id){
    
       
       // $narraciones2 = ExtraDenunciante::where('id',$id)->select('narracion')->first();
        $narraciones = NarracionPersona::where('idVariablesPersona',$id)->orderby('created_at','desc')->get();
        $ultimo = NarracionPersona::where('idVariablesPersona',$id)->where('tipo','0')->orderby('created_at','desc')->first();
   // dd($narraciones);
        return view("forms.narraciones")
        ->with("ultimo",$ultimo)
        ->with("id", $id)
        ->with('narraciones',$narraciones);
    }

    public function addNarracion(SolicitanteRequest $request,$id){
        
        DB::beginTransaction();
        try{
          
         

            
            $narracion = $request->narracion;
           // dd( $narracion);
            $narracionM = new NarracionPersona;
          
            $narracionM->idVariablesPersona = $id;
           // dd( $narracionM);
            $bitacora = false;
            if($request->file('file')){
                $path = $request->file('file')->store('narraciones');
                $narracionM->narracion = $path;
                
                $narracionM->tipo = 1;
              
                if($narracionM->save()){
                 
                    Alert::success('Narración creada con éxito', 'Hecho');
                    $bitacora = true;
                }
                else{
                    Alert::error('Se presentó un problema al crear su narración', 'Error');
                }
            }
            else if($narracion!=''){
                $narracionM->narracion = $narracion;
                $narracionM->tipo = 0;
                if($narracionM->save()){
                    Alert::success('Narración creada con éxito', 'Hecho');
                    $bitacora = true;
                }
                else{
                    Alert::error('Se presentó un problema al crear su narración', 'Error');
                }
            }
           // dd($narracionM);
            if($bitacora){
                $bdbitacora = BitacoraNavCaso::where('idCaso',session('carpeta'))->first();
                $bdbitacora->hechos = $bdbitacora->hechos+1;
                $bdbitacora->save();
            }
           //dd($narracionM);
            DB::commit();
            return redirect("narracion/".$request->id); 
        }catch (\PDOException $e){
            DB::rollBack();
            Alert::error('Se presentó un problema al guardar los datos, intente de nuevo', 'Error');
            return back()->withInput();
        }   
    }

    public function getNarracion(Request $request, $id){
        if($request->ajax()){
            $narracionM = NarracionPersona::find($id);
           // dd($narracionM);
            return response()->json(['narracion'=>$narracionM]);
        }
    } 

    public function mostrarDoc($id){
     
        $narracionM = NarracionPersona::find($id);
    
        return Storage::download($narracionM->narracion);

    }
}
