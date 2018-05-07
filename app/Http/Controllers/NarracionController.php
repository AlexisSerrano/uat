<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Narracion;
use App\Models\BitacoraNavCaso;
use App\Http\Requests\SolicitanteRequest;
use Illuminate\Support\Facades\Storage;
use Alert;


class NarracionController extends Controller
{
    public function index(){
        $carpeta = session('carpeta');
        $narraciones = Narracion::where('idCarpeta',$carpeta)->orderby('created_at','desc')->get();
        $ultimo = Narracion::where('idCarpeta',$carpeta)->where('tipo','0')->orderby('created_at','desc')->first();
        return view("forms.hechos-orientador")
        ->with("ultimo",$ultimo)
        ->with('narraciones',$narraciones);
    }

    public function addNarracion(SolicitanteRequest $request){
        
        DB::beginTransaction();
        try{
            $narracion = $request->narracion;
            $narracionM = new Narracion;
            $narracionM->idCarpeta = session('carpeta');
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
            if($bitacora){
                $bdbitacora = BitacoraNavCaso::where('idCaso',session('carpeta'))->first();
                $bdbitacora->hechos = $bdbitacora->hechos+1;
                $bdbitacora->save();
            }
            DB::commit();
            return redirect("narracion"); 
        }catch (\PDOException $e){
            DB::rollBack();
            Alert::error('Se presentó un problema al guardar los datos, intente de nuevo', 'Error');
            return back()->withInput();
        }   
    }

    public function getNarracion(Request $request, $id){
        if($request->ajax()){
            $narracion = Narracion::find($id);
            return response()->json(['narracion'=>$narracion]);
        }
    } 

    public function mostrarDoc($id){
        $narracionM = Narracion::find($id);
        return Storage::download("$narracionM->narracion");
    }
}
