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
use App\Models\formatos\PerMensaje;
use App\Models\formatos\Psicologo;
use App\Models\formatos\Lesione;
use App\Models\formatos\Vehiculo;


class pericialesController extends Controller
{
 
    public function pericialesindex()
    {   
        $idCarpeta=session('carpeta');
        $carpetaNueva = Carpeta::where('id', $idCarpeta)->get();
        if(count($carpetaNueva)>0){ 
            $abogados = CarpetaController::getAbogados($idCarpeta);
            $estados = CatEstado::select('id', 'nombre')->orderBy('nombre', 'ASC')->pluck('nombre', 'id');
            $estadoscivil = CatEstadoCivil::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
            // dd($estados);
            return view('forms.periciales')->with('idCarpeta', $idCarpeta)
                ->with('abogados', $abogados)
                ->with('estados', $estados)
                ->with('estadoscivil', $estadoscivil);
        }else{
            return redirect()->route('home');
        }
    }
 

    public function agregar(Request $request)
    {   
        DB::beginTransaction();
        try{
            $idCarpeta = session('carpeta');
            $PerMensaje = new PerMensaje;
            $PerMensaje->idCarpeta = 1;
            $PerMensaje->nombre = $request->nombret;
            $PerMensaje->primerAp = $request->primerAp;
            $PerMensaje->segundoAp = $request->segundoAp;
            $PerMensaje->marca = $request->marcat;
            $PerMensaje->imei = $request->imeit;
            $PerMensaje->compania = $request->compat;
            $PerMensaje->telefono = $request->numerot;
            $PerMensaje->telefono_destino = $request->numero2t;
            $PerMensaje->narracion = $request->narraciont;
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
            return view('documentos.extraccion_mensajes')
      
            ->with('folio',  $PerMensaje->nombre )
            ->with('folio2',  $PerMensaje->idCarpeta)
            ->with('narracion',  $PerMensaje->narracion )
            ->with('marca',  $PerMensaje->marca )
            ->with('imei',  $PerMensaje->imei )
            ->with('compania',  $PerMensaje->compania)
            ->with('numero',  $PerMensaje->telefono )
            ->with('numero2',  $PerMensaje->telefono_destino )
            ->with('nombre',  $PerMensaje->nombre )
            ->with('primerAp',  $PerMensaje->primerAp )
            ->with('segundoAp',  $PerMensaje->segundoAp )
            ->with('fiscal',  "XXXXXXXXXXX" );
    

        }catch (\PDOException $e){
            DB::rollBack();
            Alert::error('Se presentó un problema al guardar el registro, intente de nuevo', 'Error');
            return back()->withInput();
        }
    }


        public function psico(Request $request) {   

            DB::beginTransaction();
            try{
                $idCarpeta = session('carpeta');
                $Psicologo = new Psicologo;
                $Psicologo->idCarpeta = 1;
                $Psicologo->nombre = $request->nombrep;
                $Psicologo->primerAp = $request->primerAp;
                $Psicologo->segundoAp = $request->segundoAp;
                $Psicologo->numero = $request->numerop;
                $Psicologo->fecha = $request->fecha_nac;
               
                if($Psicologo->save()){
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
                return view('documentos.periciales_psicologo')
          
                ->with('fecha',  $Psicologo->fecha  )
                ->with('folio',   $Psicologo->idCarpeta)
                ->with('numero',   $Psicologo->numero )
                ->with('nombre',  $Psicologo->nombre )
                ->with('primerAp',  $Psicologo->primerAp )
                ->with('segundoAp',  $Psicologo->segundoAp )
                ->with('fiscal',  "XXXXXXXXXXX" );
        
    
            }catch (\PDOException $e){
                DB::rollBack();
                Alert::error('Se presentó un problema al guardar el registro, intente de nuevo', 'Error');
                return back()->withInput();
            }
        }
    
        public function vehi(Request $request) {   

            // DB::beginTransaction();
            // try{
                $idCarpeta = session('carpeta');
                $vehiculo = new Vehiculo;
                $vehiculo->idCarpeta =  $idCarpeta;
                $vehiculo->marca = $request->marcav;
                $vehiculo->linea = $request->lineav;
                $vehiculo->modelo = $request->modelov;
                $vehiculo->color = $request->colorv;
                $vehiculo->numero_serie = $request->numeroseriev;
                $vehiculo->lugar_fabricacion = $request->lugarFabv;
                $vehiculo->placas = $request->placav;
                $vehiculo->nombre = $request->nombret;
                $vehiculo->primerAp = $request->primerAp;
                $vehiculo->segundoAp = $request->segundoAp;
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
               

                $catalogos = DB::table('vehiculos')
                ->where('vehiculos.id', $vehiculo->id)
                ->join('cat_municipio','cat_municipio.id','=','vehiculos.idMunicipio')
                ->join('cat_localidad','cat_localidad.id','=','vehiculos.idLocalidad')
                ->join('cat_colonia','cat_colonia.id','=','vehiculos.idColonia')
                ->join('cat_estado','cat_estado.id','=','vehiculos.idEstado')
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

            DB::beginTransaction();
            try{
                $idCarpeta = session('carpeta');
                $lesiones = new Lesione;
                $lesiones->idCarpeta = 1;
                $lesiones->nombre = $request->nombre2;
                $lesiones->primerAp = $request->primerAp;
                $lesiones->segundoAp = $request->segundoAp;
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
    

    
    }