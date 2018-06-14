<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Carpeta;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Persona;
use App\Models\Unidad;
use App\Models\CatMarca;
use App\Models\CatSubmarca;
use App\Models\CatColor;
use App\Models\CatTipoUso;
use App\Models\OficioDistrito;
use Alert;
use Carbon\Carbon;
use Jenssegers\Date\Date;

use App\Models\VariablesPersona;

class ImpresionesController extends Controller


{

    public function oficioCavd(){

        $idCarpeta=session('carpeta');
        $carpeta=DB::table('carpeta')
        ->join('unidad','carpeta.idUnidad','=','unidad.id')
        ->where('carpeta.id',$idCarpeta)->first();

        $unidad = Unidad::select('id', 'descripcion')
        ->where('abreviacion','!=','')
        ->orderBy('descripcion', 'ASC')
        ->pluck('descripcion', 'id');

        $victimas[''] = 'Seleccione una víctima/ofendido';
        $victimas2 = DB::table('variables_persona')
        ->join('persona', 'variables_persona.idPersona', '=', 'persona.id')
        ->join('extra_denunciante', 'variables_persona.id', '=', 'extra_denunciante.idVariablesPersona')
        ->where('variables_persona.idCarpeta',$idCarpeta)
        ->select('persona.nombres','persona.primerAp','persona.segundoAp', 'persona.id')
        ->get();

        foreach($victimas2 as $victima){
            $victimas[$victima->nombres.'-'.$victima->primerAp.'-'.$victima->segundoAp] = $victima->nombres.' '.$victima->primerAp.' '.$victima->segundoAp;
        }

        //
       // dd($victimas2);

        return view('documentos.oficio-cavd')
        ->with('carpeta',$carpeta)
        ->with('victimas',$victimas2);

    }

    public function storeoficioTransporte(){
        $idCarpeta=session('carpeta');
        $carpeta=DB::table('carpeta')
        ->join('unidad','carpeta.idUnidad','=','unidad.id')
        ->where('carpeta.id',$idCarpeta)->first();


        $numCarpera=$carpeta->numCarpeta;

        $vehiculo=DB::Table('vehiculo')
        ->join('tipif_delito as delito','vehiculo.idTipifDelito','=','delito.id')
        ->join('carpeta','delito.idCarpeta','=','carpeta.id')
        ->where('carpeta.id',$idCarpeta)
        ->select('vehiculo.id','vehiculo.idTipifDelito','vehiculo.placas','vehiculo.idSubmarca','vehiculo.modelo',
        'vehiculo.nrpv','vehiculo.idColor','vehiculo.numSerie','vehiculo.numMotor','vehiculo.idTipoUso')
        ->first();

       
        $color=CatColor::select('id','nombre')->where('id',$vehiculo->idColor)->first();
        $marca=CatMarca::select('id','nombre')->where('id',$vehiculo->idColor)->first();
        $submarca=CatSubmarca::select('id','nombre')->where('id',$vehiculo->idSubmarca)->first();
        $uso=CatTipoUso::select('id','nombre')->where('id',$vehiculo->idTipoUso)->first();

        $localidadAtiende= DB::table('users')
            ->join('unidad','unidad.id','=','users.idUnidad')
            ->join('zona','zona.id','=','unidad.idZona')
            ->where('users.id',Auth::user()->id)
            ->select('zona.descripcion')
            ->first();
        $fechaactual = date::now();
        $fechahum = $fechaactual->format('l j').' de '.$fechaactual->format('F').' del año '.$fechaactual->format('Y');
        $fiscalAtiende1='paola';
       
        
        $data = array('id' => $vehiculo->id,
        'numCarpeta'=>$carpeta->numCarpeta,
        'fiscalAtiende'=>$fiscalAtiende1,
        'marca'=>$marca->nombre,
        'submarca'=>$submarca->nombre,
        'color'=>$color->nombre,
        'numSerie'=>$vehiculo->numSerie,
        'modelo'=>$vehiculo->modelo,
        'entidad'=>$localidadAtiende->descripcion,
        'fecha'=>$fechahum,
        'placas'=>$vehiculo->placas);
        
        //dd($data);
       
       return response()->json($data);
    }

    public function transporteEdo(){
return view('documentos.fTransporte');
    }



    public function tablaOficios(){
        $idCarpeta=session('carpeta');
        $carpeta=DB::table('carpeta')
        ->join('unidad','carpeta.idUnidad','=','unidad.id')
        ->where('carpeta.id',$idCarpeta)->first();
       // dd($carpeta);
             return view('tables.documentos')->with('carpeta',$carpeta);
     }

     public function oficioDistrito(){
            $idCarpeta=session('carpeta');
            $carpeta=DB::table('carpeta')
            ->join('unidad','carpeta.idUnidad','=','unidad.id')
            ->where('carpeta.id',$idCarpeta)->first();

            $unidad = Unidad::select('id', 'descripcion')
            ->where('abreviacion','!=','')
            ->orderBy('descripcion', 'ASC')
            ->pluck('descripcion', 'id');

            $denunciados['']='Seleccione a la persona denunciada';
            $denunciado2= DB::table('variables_persona')
            ->join('persona', 'variables_persona.idPersona', '=', 'persona.id')
            ->join('extra_denunciado', 'variables_persona.id', '=', 'extra_denunciado.idVariablesPersona')
            ->where('variables_persona.idCarpeta',$idCarpeta)
            ->select('persona.nombres','persona.primerAp','persona.segundoAp', 'persona.id')
            ->get();

            foreach($denunciado2 as $denunciado){
                $denunciados[$denunciado->nombres.'-'.$denunciado->primerAp.'-'.$denunciado->segundoAp] = $denunciado->nombres.' '.$denunciado->primerAp.' '.$denunciado->segundoAp;
            }

            
            $delitos=DB::table('tipif_delito')
            ->join('carpeta as caso','tipif_delito.idCarpeta','=','caso.id')
            ->join('cat_delito','cat_delito.id','=','tipif_delito.idDelito')
            ->where('caso.id',$idCarpeta)
            ->select('cat_delito.id', 'cat_delito.nombre')
            ->orderBy('nombre', 'ASC')
            ->pluck('nombre', 'id');
            
       // dd($delitos);

            $victimas[''] = 'Seleccione una víctima/ofendido';
            $victimas2 = DB::table('variables_persona')
            ->join('persona', 'variables_persona.idPersona', '=', 'persona.id')
            ->join('extra_denunciante', 'variables_persona.id', '=', 'extra_denunciante.idVariablesPersona')
            ->where('variables_persona.idCarpeta',$idCarpeta)
            ->select('persona.nombres','persona.primerAp','persona.segundoAp', 'persona.id')
            ->get();

            foreach($victimas2 as $victima){
                $victimas[$victima->nombres.'-'.$victima->primerAp.'-'.$victima->segundoAp] = $victima->nombres.' '.$victima->primerAp.' '.$victima->segundoAp;
            }

           
            
            return view('fields.oficioDistrito')
            ->with('carpeta',$carpeta)
            ->with('unidad',$unidad)
            ->with('denunciado',$denunciados)
            ->with('victimas', $victimas)
            ->with('delitos',$delitos);
        }

        public function getFiscal(Request $request, $id){

            // if($request->ajax()){
                if($request){
                    // dd('asdasd');
                    $fiscales = DB::table('users')
                    ->where('idUnidad','=',$id)
                    ->select( 'id','nombreC as nombre')
                    ->get();

                // $fiscal = DB::table('oficio_distritos')->where('oficio_distritos.id', $id)
                // ->select('oficio_distritos.entidad','oficio_distritos.localidad','oficio_distritos','oficio_distritos.fecha',
                // 'oficio_distritos.denunciante','oficio_distritos.delito','oficio_distritos.denunciado','oficio_distritos',
                // 'oficio_distritos.fiscalCordinador','oficio_distritos.fiscalDistrito','oficio_distritos.unidad','oficio_distritos.carpeta',
                // 'oficio_distritos.fiscalAtendio')
                // ->first();


                return response()->json($fiscales);
            }
        }

        public function getDatos($id){


            
            $datosAcuerdo = DB::table('oficio_distritos')->where('oficio_distritos.id', $id)
            ->join('cat_delito','cat_delito.id','=','oficio_distritos.delito')
            ->join('users','users.id','=','oficio_distritos.id')
            ->select('oficio_distritos.id','oficio_distritos.localidad',
            'oficio_distritos.denunciante','oficio_distritos.denunciado','oficio_distritos.fecha',
            'oficio_distritos.fiscalCordinador','oficio_distritos.fiscalDistrito','oficio_distritos.unidad','oficio_distritos.carpeta',
            'oficio_distritos.fiscalAtendio','cat_delito.nombre as delito','users.puesto')
            ->first();
            // dd( $datosAcuerdo);
            // dd(Auth::user()->nombreC);
           // $fiscal = Auth::user()->nombreC;
           $fechaactual = new Date( $datosAcuerdo->fecha);
           $fechahum = $fechaactual->format('l j').' de '.$fechaactual->format('F').' del año '.$fechaactual->format('Y');
            $data = array('id' => $id,
            'localidad' => $datosAcuerdo->localidad,
            'fecha' => $fechahum,
            'denunciante' => $datosAcuerdo->denunciante,
            'delito' => $datosAcuerdo->delito,
            'denunciado' => $datosAcuerdo->denunciado,
            'fiscalCordinador' => $datosAcuerdo->fiscalCordinador,
            'fiscalDistrito' => $datosAcuerdo->fiscalDistrito,
            'unidad' => $datosAcuerdo->unidad,
            'carpeta' => $datosAcuerdo->carpeta,
           'fiscalAtendio' => $datosAcuerdo->fiscalAtendio,
           'puesto' => $datosAcuerdo->puesto,
           'img' => asset('img/logo.png')
        //   'fiscal' =>  $caso->fiscalAtendio = Auth::user()->nombreC;
            );
            //dd(Auth::user()->nombreC);
            return response()->json($data);



        }
        
        public function storeDistrito(Request $request){
           
            $idCarpeta=session('carpeta');

            $localidadAtiende= DB::table('users')
            ->join('unidad','unidad.id','=','users.idUnidad')
            ->join('zona','zona.id','=','unidad.idZona')
            ->where('users.id',Auth::user()->id)
            ->select('zona.descripcion')
            ->first();

            $localidadAtiende=$localidadAtiende->descripcion;   
            $acta = new OficioDistrito;
            // $acta->hora = Date::now()->format('H:i:s');
            $acta->localidad =  $localidadAtiende;
            $acta->fecha = Date::now()->format('Y-m-d');
            $acta->carpeta =  $idCarpeta;
            $acta->denunciante = $request->victima3;
            $acta->delito = $request->delito;
            $acta->denunciado = $request->denunciado1;
            $acta->fiscalCordinador = $request->fiscalC;
            $acta->fiscalDistrito = $request->fiscalDistrito;
            $acta->unidad = $request->unidadOficios;
            // $acta->carpeta = $request->carpeta;
            $acta->fiscalAtendio = Auth::user()->nombreC;
            // dd($acta);
            $acta->save();

            return view('documentos/acuerdo_fiscal')->with('id',$acta->id)->with('localidadAtiende',$localidadAtiende);

           
        }

        public function policiaMinisterial(){
            return view('documentos.policia-ministerial');
        }
}


