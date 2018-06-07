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
use App\Models\CatDelito;
use App\Models\CatEstadoCivil;
use App\Models\ExtraDenunciante;
use App\Models\ExtraDenunciado;
use App\Models\Persona;
use App\Models\CatMarca;
use App\Models\CatSubmarca;
use App\Models\CatClaseVehiculo;
use App\Models\VariablesPersona;
use App\Models\ExtraAbogado;
use App\Models\Domicilio;
use App\Models\BitacoraNavCaso;
use App\Models\formatos\PerMensaje;
use App\Models\formatos\Psicologo;
use App\Models\formatos\Lesione;
use App\Models\formatos\PerVehiculo;


class PericialesController extends Controller
{
 
    public function pericialesindex()
    {   
        $idCarpeta=session('carpeta');
        $carpetaNueva = Carpeta::where('id', $idCarpeta)->get();
        if(count($carpetaNueva)>0){ 
            $abogados = CarpetaController::getAbogados($idCarpeta);
            $estados = CatEstado::select('id', 'nombre')->orderBy('nombre', 'ASC')->pluck('nombre', 'id');
            $estadoscivil = CatEstadoCivil::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
            $marca =  CatMarca::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
            $submarca =  CatSubmarca::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
            $tipo =  CatClaseVehiculo::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
            // dd($estados);
            $delits = CatDelito::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
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
            
            return view('forms.periciales')->with('idCarpeta', $idCarpeta)
                ->with('abogados', $abogados)
                ->with('estados', $estados)
                ->with('delits', $delits)
                ->with('victimas', $victimas)
                ->with('marca', $marca)
                ->with('submarca', $submarca)
                ->with('tipo', $tipo)
                ->with('estadoscivil', $estadoscivil);
        }else{
            return redirect()->route('home');
        }
    }
 

    public function agregar(Request $request)
    {   
        $NombreComp = explode("-",  $request->victima);
        DB::beginTransaction();
        try{
            $idCarpeta = session('carpeta');
            $PerMensaje = new PerMensaje;
            $PerMensaje->idCarpeta = 1;
            $PerMensaje->nombre = $NombreComp[0];
            $PerMensaje->primerAp =$NombreComp[1];
            $PerMensaje->segundoAp = $NombreComp[2];
            $PerMensaje->marca = $request->marcat;
            $PerMensaje->imei = $request->imeit;
            $PerMensaje->compania = $request->compat;
            $PerMensaje->telefono = $request->numerot;
            $PerMensaje->telefono_destino = $request->numero2t;
            $PerMensaje->narracion = $request->narraciont;
            $PerMensaje->fecha = $request->fechamen;
            if($PerMensaje->save()){
                Alert::success('Registro guardado con éxito', 'Hecho');
                // $bdbitacora = BitacoraNavCaso::where('idCaso',session('carpeta'))->first();
                // $bdbitacora->medidas = $bdbitacora->medidas+1;
                // $bdbitacora->save();
            }
            else{
                Alert::error('Se presentó un problema al guardar el registro', 'Error');
            }
            DB::commit();

            // return redirect("periciales");
            return view('documentos.per-mensajes')

      
            ->with('id',  $PerMensaje->id );
            // ->with('folio',  $PerMensaje->id )
            // ->with('folio2',  $PerMensaje->idCarpeta)
            // ->with('narracion',  $PerMensaje->narracion )
            // ->with('marca',  $PerMensaje->marca )
            // ->with('imei',  $PerMensaje->imei )
            // ->with('compania',  $PerMensaje->compania)
            // ->with('numero',  $PerMensaje->telefono )
            // ->with('numero2',  $PerMensaje->telefono_destino )
            // ->with('nombre',  $PerMensaje->nombre )
            // ->with('primerAp',  $PerMensaje->primerAp )
            // ->with('segundoAp',  $PerMensaje->segundoAp )
            // ->with('fecha',  $PerMensaje->fecha )
            // ->with('fiscal',  "XXXXXXXXXXX" );
    

        }catch (\PDOException $e){
            DB::rollBack();
            Alert::error('Se presentó un problema al guardar el registro, intente de nuevo', 'Error');
            return back()->withInput();
        }
    }


        public function psico(Request $request) {   
            
        $NombreComp2 = explode("-",  $request->victima8);
            DB::beginTransaction();
            try{
                $idCarpeta = session('carpeta');
                $Psicologo = new Psicologo;
                $Psicologo->idCarpeta = 1;
                $Psicologo->nombre = $NombreComp2[0];
                $Psicologo->primerAp = $NombreComp2[1];
                $Psicologo->segundoAp = $NombreComp2[2];
                $Psicologo->numero = $request->numerop;
                $Psicologo->fecha = $request->fecha_nac;
                $Psicologo->delito = $request->idDelito;
                $Psicologo->save();
              
                
                // dd($Psicologo);
                if($Psicologo->save()){
                    Alert::success('Registro guardado con éxito', 'Hecho');
                    // $bdbitacora = BitacoraNavCaso::where('idCaso',session('carpeta'))->first();
                    // $bdbitacora->medidas = $bdbitacora->medidas+1;
                    // $bdbitacora->save();
                }
                  
            //     
                else{
                    Alert::error('Se presentó un problema al guardar el registro', 'Error');
                }
                DB::commit();
                $delito = DB::table('cat_delito')
                ->join('per_psicologos','per_psicologos.delito','=', 'cat_delito.id')
                ->select('cat_delito.nombre as nombre')
                ->where('cat_delito.id', $Psicologo->delito)
                ->first();
                // return redirect("home");
                // return view('documentos.periciales_psicologo')
                
                // ->with('delito',  $delito->nombre  )
                // ->with('fecha',  $Psicologo->fecha  )
                // ->with('folio',   $Psicologo->idCarpeta)
                // ->with('numero',   $Psicologo->numero )
                // ->with('nombre',  $Psicologo->nombre )
                // ->with('primerAp',  $Psicologo->primerAp )
                // ->with('segundoAp',  $Psicologo->segundoAp )
                // ->with('fiscal',  "XXXXXXXXXXX" );
                return view('documentos.per-psicologo')

      
                ->with('id',  $Psicologo->id );
    
            }catch (\PDOException $e){
                DB::rollBack();
                Alert::error('Se presentó un problema al guardar el registro, intente de nuevo', 'Error');
                return back()->withInput();
            }
        }
    
        public function vehi(Request $request) {   
            $NombreComp3 = explode("-",  $request->victima3);
            // DB::beginTransaction();
            // try{
                $idCarpeta = session('carpeta');
                $vehiculo = new PerVehiculo;
                $vehiculo->idCarpeta =  $idCarpeta;
                $vehiculo->idMarca = $request->idMarca;
                $vehiculo->idSubmarca = $request->idSubmarca;
                $vehiculo->idClase = $request->idClaseVehiculo;
                $vehiculo->linea = $request->lineav;
                $vehiculo->modelo = $request->modelov;
                $vehiculo->color = $request->colorv;
                $vehiculo->numero_serie = $request->numeroseriev;
                $vehiculo->lugar_fabricacion = $request->lugarFabv;
                $vehiculo->placas = $request->placav;
                $vehiculo->nombre = $NombreComp3[0];
                $vehiculo->primerAp = $NombreComp3[1];
                $vehiculo->segundoAp =  $NombreComp3[2];
                $vehiculo->numero = $request->celularv;
                $vehiculo->calle = $request->calle2;
                $vehiculo->num_ext = $request->numExterno2;
                $vehiculo->num_int = $request->numInterno2;
                $vehiculo->idEstado = $request->idEstado2;
                $vehiculo->idMunicipio = $request->idMunicipio2;
                $vehiculo->idLocalidad = $request->idLocalidad2;
                $vehiculo->idColonia = $request->idColonia2;
                $vehiculo->cp = $request->cp2;
                $vehiculo->fecha = $request->fecha_nac;
                $vehiculo->save();
                if($vehiculo->save()){
                    Alert::success('Registro guardado con éxito', 'Hecho');
                    // $bdbitacora = BitacoraNavCaso::where('idCaso',session('carpeta'))->first();
                    // $bdbitacora->medidas = $bdbitacora->medidas+1;
                    // $bdbitacora->save();
                }
               

                $catalogos = DB::table('per_vehiculos')
                ->where('per_vehiculos.id', $vehiculo->id)
                ->join('cat_municipio','cat_municipio.id','=','per_vehiculos.idMunicipio')
                ->join('cat_localidad','cat_localidad.id','=','per_vehiculos.idLocalidad')
                ->join('cat_colonia','cat_colonia.id','=','per_vehiculos.idColonia')
                ->join('cat_estado','cat_estado.id','=','per_vehiculos.idEstado')
                ->select( 'cat_municipio.nombre as nombreMunicipio',
                'cat_localidad.nombre as nombreLocalidad',
                'cat_colonia.nombre as nombreColonia',
                'cat_estado.nombre as nombreEstado',
                'cat_colonia.codigoPostal')
                ->first();
                // else{
                //     Alert::error('Se presentó un problema al guardar el registro', 'Error');
                // }
                // DB::commit();
    // dd( $catalogos);
                // return redirect("home");
                 return view('documentos.periciales_vehiculo')
          
                 ->with('folio',  $vehiculo->id  )
                 ->with('folio2',  $vehiculo->idCarpeta  )
                 ->with('marca',  $vehiculo->marca  )
                 ->with('linea',  $vehiculo->linea  )
                 ->with('modelo',  $vehiculo->modelo  )
                 ->with('color',  $vehiculo->color  )
                 ->with('serie',  $vehiculo->numero_serie  )
                 ->with('motor',  $vehiculo->motor  )
                 ->with('placas',  $vehiculo->placas  )
                 ->with('estado',  $vehiculo->entidad  )
               
                 ->with('nombre',  $vehiculo->nombre )
                 ->with('primerAp',  $vehiculo->primerAp )
                 ->with('segundoAp',  $vehiculo->segundoAp ) 


                 ->with('cel',  $vehiculo->numero  )             
                 ->with('calle',  $vehiculo->calle  )
                 ->with('numero',  $vehiculo->num_ext  )
                 ->with('idEstado', $catalogos->nombreEstado)
                 ->with('idMunicipio', $catalogos->nombreMunicipio)
                 ->with('idLocalidad', $catalogos->nombreLocalidad)
                 ->with('idColonia', $catalogos->nombreColonia)
                 ->with('cp', $request->cp2)

                // ->with('folio',   $Psicologo->idCarpeta)
               
                // ->with('nombre',  $Psicologo->nombre )
                 ->with('fiscal',  "XXXXXXXXXXX" );
        
    
            // }catch (\PDOException $e){
            //     DB::rollBack();
            //     Alert::error('Se presentó un problema al guardar el registro, intente de nuevo', 'Error');
            //     return back()->withInput();
            // }
         }

    

         public function lesiones(Request $request) {   
            $NombreComp4 = explode("-",  $request->victima77);
            DB::beginTransaction();
            try{
                $idCarpeta = session('carpeta');
                $lesiones = new Lesione;
                $lesiones->idCarpeta = 1;
                $lesiones->nombre = $NombreComp4[0];
                $lesiones->primerAp =$NombreComp4[1];
                $lesiones->segundoAp = $NombreComp4[2];
                $lesiones->fecha = $request->fecha_nac;
               
                if($lesiones->save()){
                    Alert::success('Registro guardado con éxito', 'Hecho');
                    // $bdbitacora = BitacoraNavCaso::where('idCaso',session('carpeta'))->first();
                    // $bdbitacora->medidas = $bdbitacora->medidas+1;
                    // $bdbitacora->save();
                }
                else{
                    Alert::error('Se presentó un problema al guardar el registro', 'Error');
                }
                DB::commit();
    
                // return redirect("home");
                return view('documentos.periciales_lesiones')
          
                ->with('fecha',  $lesiones->fecha  )
                ->with('folio',  $lesiones->idCarpeta)
              
                ->with('nombre', $lesiones->nombre )
                ->with('primerAp', $lesiones->primerAp )
                ->with('segundoAp', $lesiones->segundoAp )
                ->with('fiscal',  "XXXXXXXXXXX" );
        
    
            }catch (\PDOException $e){
                DB::rollBack();
                Alert::error('Se presentó un problema al guardar el registro, intente de nuevo', 'Error');
                return back()->withInput();
            }
        }
    
        public function getpericiales($id){

            $pericial = DB::table('per_mensajes')->where('per_mensajes.id', $id)
            ->select('per_mensajes.id','per_mensajes.idCarpeta','per_mensajes.nombre',
            'per_mensajes.primerAp','per_mensajes.segundoAp','per_mensajes.marca',
            'per_mensajes.imei','per_mensajes.compania','per_mensajes.telefono',
            'per_mensajes.telefono_destino','per_mensajes.narracion','per_mensajes.fecha')
            ->first();

            

            $data = array('id' => $id,
            'idCarpeta' => $pericial->idCarpeta,
            'nombre' => $pericial->nombre,
            'primerAp' => $pericial->primerAp,
            'segundoAp' => $pericial->segundoAp,
            'marca' => $pericial->marca,
            'imei' => $pericial->imei,
            'compania' => $pericial->compania,
            'telefono' => $pericial->telefono,
            'telefono_destino' => $pericial->telefono_destino,
            'narracion' => $pericial->narracion,
            'fecha' => $pericial->fecha,
        //   'fiscal' =>  $caso->fiscalAtendio = Auth::user()->nombreC;
        );
            
            return response()->json($data);
         }
    
         public function getpsico($id){
            $psico = DB::table('per_psicologos')->where('per_psicologos.id', $id)
            ->join('cat_delito','cat_delito.id','=','per_psicologos.delito')
            ->select('per_psicologos.id','per_psicologos.idCarpeta','per_psicologos.nombre',
            'per_psicologos.primerAp','per_psicologos.segundoAp','per_psicologos.numero','per_psicologos.fecha','cat_delito.nombre as delito')
            ->first();

            $data = array('id' => $id,
            'idCarpeta' => $psico->idCarpeta,
            'nombre' => $psico->nombre,
            'primerAp' => $psico->primerAp,
            'segundoAp' => $psico->segundoAp,
            'telefono' => $psico->numero,
            'fecharealizacion' => $psico->fecha,
            'delito' => $psico->delito,
    
        );
            
            return response()->json($data);
         }

         public function getVh($id){

           
            $vehiculo = DB::table('per_vehiculos')
            ->where('per_vehiculos.id', $id)
            ->join('cat_marca','cat_marca.id','=','per_vehiculos.idMarca')
            ->join('cat_submarcas','cat_submarcas.id','=','per_vehiculos.idSubmarca')
            ->join('cat_clase_vehiculo','cat_clase_vehiculo.id','=','per_vehiculos.idClase')
            ->join('cat_municipio','cat_municipio.id','=','per_vehiculos.idMunicipio')
            ->join('cat_localidad','cat_localidad.id','=','per_vehiculos.idLocalidad')
            ->join('cat_colonia','cat_colonia.id','=','per_vehiculos.idColonia')
            ->join('cat_estado','cat_estado.id','=','per_vehiculos.idEstado')
            ->select( 'cat_municipio.nombre as nombreMunicipio',
            'cat_localidad.nombre as nombreLocalidad',
            'cat_colonia.nombre as nombreColonia',
            'cat_estado.nombre as nombreEstado',
            'cat_colonia.codigoPostal',
            'per_vehiculos.id','per_vehiculos.idCarpeta','cat_marca.nombre as marca',
            'cat_submarcas.nombre as submarca','cat_clase_vehiculo.nombre as clase','per_vehiculos.linea',
            'per_vehiculos.modelo','per_vehiculos.color','per_vehiculos.numero_serie',
            'per_vehiculos.lugar_fabricacion','per_vehiculos.placas','per_vehiculos.nombre',
            'per_vehiculos.primerAp','per_vehiculos.segundoAp','per_vehiculos.numero',
            'per_vehiculos.calle','per_vehiculos.num_ext','per_vehiculos.num_int','per_vehiculos.fecha')
            ->first();

            $data = array('id' => $id,
            'idCarpeta' => $vehiculo->idCarpeta,
            'marca' => $vehiculo->marca,
            'submarca' => $vehiculo->submarca,
            'clase' => $vehiculo->clase,
            'linea' => $vehiculo->linea,
            'modelo' => $vehiculo->modelo,
            'color' => $vehiculo->color,
            'numero_serie' => $vehiculo->numero_serie,
            'lugar_fabricacion' => $vehiculo->lugar_fabricacion,
            'placas' => $vehiculo->placas,
            'nombre' => $vehiculo->nombre,
            'primerAp' => $vehiculo->primerAp,
            'segundoAp' => $vehiculo->segundoAp,
            'numero' => $vehiculo->numero,
            'num_ext' => $vehiculo->num_ext,
            'num_int' => $vehiculo->num_int,
            'Estado' => $vehiculo->nombreEstado,
            'Municipio' => $vehiculo->nombreMunicipio,
            'Localidad' => $vehiculo->nombreLocalidad,
            'Colonia' => $vehiculo->nombreColonia,
            'CP' => $vehiculo->codigoPostal,
            'fecha' => $vehiculo->fecha);
        
        
            return response()->json($data);

         }

         public function getlesion($id){
            $lesion = DB::table('per_lesiones')->where('per_lesiones.id', $id)
            ->select('per_lesiones.id','per_lesiones.idCarpeta','per_lesiones.nombre',
            'per_lesiones.primerAp','per_lesiones.segundoAp','per_lesiones.fecha')
            ->first();

            $data = array('id' => $id,
            'idCarpeta' =>  $lesion->idCarpeta,
            'nombre' =>  $lesion->nombre,
            'primerAp' => $lesion->primerAp,
            'segundoAp' =>  $lesion->segundoAp,
            'fecha realizacion' =>  $lesion->fecha,
          
    
        );
            
            return response()->json($data);

         }
    }
