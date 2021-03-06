<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Preregistro;
use App\Models\CatMunicipio;
use App\Models\Domicilio;
use Alert;
use App\Models\CatLocalidad;
use App\Models\CatColonia;
use App\Models\CatEstado;
use App\Models\Razon;
use Carbon\Carbon;
use App\Models\Carpeta;
use App\Models\CatEscolaridad;
use App\Models\CatEstadoCivil;
use App\Models\CatEtnia;
use App\Models\CatLengua;
use App\Models\CatNacionalidad;
use App\Models\CatOcupacion;
use App\Models\CatReligion;
use App\Models\CatIdentificacion;

class RegistrosCasoController extends Controller
{
    

    
    public function lista(){
        // $registros = Preregistro::where('statusCola', null)
        // 
        // ->orderBy('id','desc')
        // ->paginate(10);
        $registros = DB::table('preregistros')
        ->join('razones','razones.id','=','preregistros.idRazon')
        ->leftJoin('cat_identificacion','cat_identificacion.id','=','preregistros.docIdentificacion')        
        ->where('statusCola', null)
        // ->where('tipoActa', null)
        // ->where('razones.nombre','!=' ,'SOLICITUD DE CONSTANCIA DE EXTRAVIO')
        ->orderBy('id','desc')
        ->select('preregistros.id as id','idDireccion','idRazon','esEmpresa','preregistros.nombre as nombre',
        'primerAp','segundoAp','rfc','fechaNac','edad','sexo','curp','telefono',
        'cat_identificacion.documento as docIdentificacion','numDocIdentificacion','conViolencia','narracion','folio','representanteLegal',
        'statusCancelacion','statusOrigen','statusCola','horaLlegada','unidad','zona','razones.nombre as razon')
        ->paginate(10);
        // dd($registros);
        $municipios = CatMunicipio::where('idEstado',30)
        ->where('nombre', '!=', 'SIN INFORMACION')
        ->orderBy('nombre','asc')
        ->get();
        // return view('orientador.denunciante.fields-denunciante.filtroBusqueda')
        return view('servicios.recepcion.fiscalSinRecepcion')->with('registros',$registros)->with('municipios', $municipios);
        
       }

       public function listafiltro(Request $request){
        // $registros = Preregistro::where('statusCola', null)
        // 
        // ->orderBy('id','desc')
        // ->paginate(10);
        $folio=$request->folio;
        $registros = DB::table('preregistros')
        ->join('razones','razones.id','=','preregistros.idRazon')
        ->leftJoin('cat_identificacion','cat_identificacion.id','=','preregistros.docIdentificacion')        
        ->where('statusCola', null)
        ->orderBy('horaLlegada','asc')
        ->where(function($query) use ($folio){
            $query
            ->orWhere(DB::raw("CONCAT(preregistros.nombre,' ',primerAp,' ',segundoAp)"), 'LIKE', '%' . $folio . '%')
            ->orWhere('representanteLegal', 'like', '%' . $folio . '%')
            ->orWhere('razones.nombre', 'like', '%' . $folio . '%')
            ->orWhere('folio', 'like', '%' . $folio . '%');
        })
        ->select('preregistros.id as id','idDireccion','idRazon','esEmpresa','preregistros.nombre as nombre',
        'primerAp','segundoAp','rfc','fechaNac','edad','sexo','curp','telefono',
        'cat_identificacion.documento as docIdentificacion','numDocIdentificacion','conViolencia','narracion','folio','representanteLegal',
        'statusCancelacion','statusOrigen','statusCola','horaLlegada','unidad','zona','razones.nombre as razon')
        ->paginate(10);
        // dd($registros);
        $municipios = CatMunicipio::where('idEstado',30)
        ->where('nombre', '!=', 'SIN INFORMACION')
        ->orderBy('nombre','asc')
        ->get();
        // return view('orientador.denunciante.fields-denunciante.filtroBusqueda')
        return view('servicios.recepcion.fiscalSinRecepcion')->with('registros',$registros)->with('municipios', $municipios);
        
       }


       public function editRegistros($id)
       {
        $tiposDeConstancia= array(0=>'PASAPORTE',1=>'CREDENCIAL DE TRABAJO/GAFFETE',2=>'TARJETA DE CREDITO/DEBITO',3=>'TELEFONO CELULAR',4=>'EQUIPO DE TRABAJO(CELULARES,RADIOS,ETC)',5=>
        'PERMISO DE TRANSITO PARA EMPLACAMIENTO DE TAXIS',6=>'FACTURA DE VEHICULO/MOTOCICLETA',7=>'TARJETA DE CIRCULACION',8=>'PLACAS DE CIRCULACION',9=>
        'LICENCIA DE CONDUCIR ESTATAL',10=>'LICENCIA DE CONDUCIR FEDERAL',11=>'DOCUMENTO/BIEN EXTRAVIADO O ROBADO',12=>'CERTIFICADO DE ALUMBRAMIENTO');

            $estados=CatEstado::orderBy('nombre', 'ASC')
            ->pluck('nombre','id');
            $preregistro = Preregistro::find($id);
            $idDireccionPregistro =$preregistro->idDireccion;//id direccion
            $direccionTB=DB::table('domicilio') //id's de domicilios (municipio,localidad)
            ->where('domicilio.id','=',$idDireccionPregistro)
            ->get();
   
            $razones=Razon::orderBy('nombre', 'ASC')
            ->pluck('nombre','id');
           
            $razon=Razon::select('nombre')->where('id',$preregistro->idRazon)->get();
            $razon=$razon[0]->nombre;

            $municipio=DB::table('cat_municipio')//nombre municipio
            ->where('cat_municipio.id','=',$direccionTB[0]->idMunicipio)
            ->get();
            $coloniaRow=DB::table('cat_colonia')//nombre municipio
            ->where('cat_colonia.id','=',$direccionTB[0]->idColonia)
            ->get();
            $idMunicipioSelect = $municipio[0]->id;
            $idEstadoSelect = $municipio[0]->idEstado; 
            $idLocalidadSelect = $direccionTB[0]->idLocalidad;
            $idColoniaSelect = $direccionTB[0]->idColonia;
            $idCodigoPostalSelect = $coloniaRow[0]->codigoPostal;
                
            /* inicio pruebas */
            //nombre del estado
            $nombreEstado=DB::table('cat_estado')
            ->where('cat_estado.id','=',$municipio[0]->idEstado)
            ->get();
            $nombreEstado=$nombreEstado[0]->nombre;
            
            //nombre del municipio
            $nombreMunicipio=DB::table('cat_municipio')
            ->where('cat_municipio.id','=',$municipio[0]->id)
            ->get();
            $nombreMunicipio=$nombreMunicipio[0]->nombre;

            //nombre del localidad
            $nombreLocalidad=DB::table('cat_localidad')
            ->where('cat_localidad.id','=',$direccionTB[0]->idLocalidad)
            ->get();
            $nombreLocalidad=$nombreLocalidad[0]->nombre;


            $tipoActa = $preregistro->tipoActa;
            if($tipoActa){
                if(array_search($tipoActa, $tiposDeConstancia)){
                    $tipoActa=$preregistro->tipoActa;
                }else{//Si el tipo de constancia de extravio es OTROS DOCUMENTOS
                    $tipoActa='OTROS DOCUMENTOS'; 
                }
            }

            //nombre del colonia
            $Colonia=DB::table('cat_colonia')
            ->where('cat_colonia.id','=',$direccionTB[0]->idColonia)
            ->get();
            $nombreColonia=$Colonia[0]->nombre;
            $nombreCP=$Colonia[0]->codigoPostal;



            $MunicipioOrigen = DB::table('cat_municipio')        
            ->select('idEstado','idMunicipio','nombre')
            ->where('id','=', $preregistro->idMunicipioOrigen)->first();
            

            $catMunicipiosOrigen=DB::table('cat_municipio')
        ->where('cat_municipio.idEstado','=',$MunicipioOrigen->idEstado)
        ->orderBy('nombre','asc')
        ->pluck('nombre','id');

            $estadoOrigen = DB::table('cat_estado')        
            ->select('nombre')
            ->where('id','=', $MunicipioOrigen->idEstado)->first();


            /* FIN DE PRUEBAS PARA NOMBRES DE DIRECCIONES */
            $catMunicipios=DB::table('cat_municipio')
            ->where('cat_municipio.idEstado','=',$idEstadoSelect)
            ->orderBy('nombre','asc')
            ->pluck('nombre','id');
            $catLocalidades=DB::table('cat_localidad')
            ->where('cat_localidad.idMunicipio','=',$municipio[0]->id)
            ->orderBy('nombre','asc')
            ->pluck('nombre','id');
            $catColonias=DB::table('cat_colonia')
            ->where('cat_colonia.codigoPostal','=',$coloniaRow[0]->codigoPostal)
            ->orderBy('nombre','asc')
            ->pluck('nombre','id');
            $catCodigoPostal=DB::table('cat_colonia')
            ->where('cat_colonia.idMunicipio','=',$idMunicipioSelect)
            ->where('cat_colonia.codigoPostal','!=',0)
            ->orderBy('codigoPostal','asc')
            ->groupBy('codigoPostal')
            ->pluck('codigoPostal','codigoPostal');
            $identificaciones = CatIdentificacion::orderBy('id', 'ASC')
            ->pluck('documento', 'id');
            $docIdent = CatIdentificacion::select('documento')
            ->where('cat_identificacion.id','=',$preregistro->docIdentificacion)
            ->orderBy('id', 'ASC')
            ->get();

            if(count($docIdent)>0){
                $docIdent=$docIdent[0]->documento;
            }
            //dd($idCodigoPostalSelect);                     
            $persona= $preregistro->esEmpresa;//persona fisica o empresa
            if($persona==1){
                return view('servicios.recepcion.forms.editsinrecepcion-empresa', compact('idEstadoSelect', 'idMunicipioSelect' ,'idLocalidadSelect', 'idColoniaSelect', 'catMunicipios', 'catLocalidades', 'catColonias', 'estados', 'preregistro','direccionTB', 'idCodigoPostalSelect', 'catCodigoPostal','nombreEstado','nombreMunicipio','nombreLocalidad', 'nombreColonia','nombreCP','razones','razon','identificaciones','docIdent','tipoActa' ));
            }
            else{
                return view('servicios.recepcion.forms.editsinrecepcion-persona', compact('catMunicipiosOrigen','estadoOrigen','MunicipioOrigen','idEstadoSelect', 'idMunicipioSelect' ,'idLocalidadSelect', 'idColoniaSelect', 'catMunicipios', 'catLocalidades', 'catColonias', 'estados', 'preregistro','direccionTB', 'idCodigoPostalSelect', 'catCodigoPostal','nombreEstado','nombreMunicipio','nombreLocalidad', 'nombreColonia','nombreCP','razones','razon','identificaciones','docIdent','tipoActa','tiposDeConstancia'));
            }
        }


       
    public function updateregistros(Request $request, $id)
    {
        //dd($request);
        $idDireccion=Preregistro::select('idDireccion')->where('id','=',$id)->get();
        $idDireccion=$idDireccion[0]->idDireccion;
        //dd($idDireccion);
        
        if ($request->esEmpresa==0){
            $domicilio = Domicilio::find($idDireccion);
            if (!is_null($request->idMunicipio)){
                $domicilio->idMunicipio = $request->idMunicipio;
            }
            if (!is_null($request->idLocalidad)){
                $domicilio->idLocalidad = $request->idLocalidad;
            }
            if (!is_null($request->idColonia)){
                $domicilio->idColonia = $request->idColonia;
            }
            if (!is_null($request->calle)){
                $domicilio->calle = $request->calle;
            }
            if (!is_null($request->numExterno)){
                $domicilio->numExterno = $request->numExterno;
            }
            if (!is_null($request->numInterno)){
                $domicilio->numInterno = $request->numInterno;
            }
            $domicilio->save();
            $idD1 = $domicilio->id;
            
            $preregistro = Preregistro::find($id);
            $preregistro->nombre = $request->nombres;
            $preregistro->primerAp = $request->primerAp;
            $preregistro->segundoAp = $request->segundoAp;
            $preregistro->telefono = $request->telefono;
            $preregistro->narracion = $request->narracion;
            $preregistro->idDireccion = $idD1;
            $preregistro->fechaNac = $request->fechaNacimiento;
            $preregistro->edad = $request->edad;
            if (!is_null($request->rfc2)){
                $preregistro->rfc = $request->rfc2.$request->homo2;
            }
            $preregistro->curp = $request->curp;
            if (!is_null($request->sexo)){
                $preregistro->sexo = $request->sexo;
            }


            $preregistro->idRazon = $request->idRazon;            

            if ($request->idRazon==4){
                $preregistro->tipoActa = (!is_null($request->otro))?$request->otro:$request->tipoActa1;
            }elseif($request->idRazon==2){
                $preregistro->tipoActa = null;
            }

            $preregistro->docIdentificacion = $request->docIdentificacion;
            $preregistro->numDocIdentificacion = $request->numDocIdentificacion;
            
            $preregistro->save();
            $id = $preregistro->id;
            
        }elseif($request->esEmpresa==1){
            $domicilio = Domicilio::find($idDireccion);
            if (!is_null($request->idMunicipio)){
                $domicilio->idMunicipio = $request->idMunicipio;
            }
            if (!is_null($request->idLocalidad)){
                $domicilio->idLocalidad = $request->idLocalidad;
            }
            if (!is_null($request->idColonia)){
                $domicilio->idColonia = $request->idColonia;
            }
            if (!is_null($request->calle)){
                $domicilio->calle = $request->calle;
            }
            if (!is_null($request->numExterno)){
                $domicilio->numExterno = $request->numExterno;
            }
            if (!is_null($request->numInterno)){
                $domicilio->numInterno = $request->numInterno;
            }
            
            $domicilio->save();
            $idD1 = $domicilio->id;
            
            $preregistro =Preregistro::find($id);
            $preregistro->esEmpresa = 1;    
            $preregistro->nombre = $request->nombres2;
            $preregistro->idDireccion = $idD1;
            $preregistro->rfc = $request->rfc2.$request->homo2;
            $preregistro->representanteLegal = $request->repLegal;
            $preregistro->primerAp = $request->primerAp;
            $preregistro->segundoAp = $request->segundoAp;
            $preregistro->telefono = $request->telefono;
            $preregistro->conViolencia = $request->conViolencia;
            $preregistro->narracion = $request->narracion;
            $preregistro->fechaNac = $request->fechaAltaEmpresa;
            

            $preregistro->docIdentificacion = $request->docIdentificacion;
            $preregistro->numDocIdentificacion = $request->numDocIdentificacion;

            $preregistro->idRazon = $request->idRazon;            

            if ($request->idRazon==4){
                $preregistro->tipoActa = (!is_null($request->otro))?$request->otro:$request->tipoActa1;
            }elseif($request->idRazon==2){
                $preregistro->tipoActa = null;
            }

            $preregistro->save();
            $id = $preregistro->id;   
        }
        Alert::success('Registro modificado con éxito','Hecho');
        return redirect('registros/'.$id.'/edit');
    }


       public function buscarmunicipio($id){
        $registros = DB::table('preregistros')->where('tipoActa', null)
        ->leftJoin('cat_identificacion','cat_identificacion.id','=','preregistros.docIdentificacion') 
        ->join('razones','razones.id','=','preregistros.idRazon')
        ->join('domicilio', 'preregistros.idDireccion', '=', 'domicilio.id')
        ->where('statusCola', null)
        ->where('idMunicipio',$id)
        ->orderBy('id','desc')
        ->select('preregistros.id as id','idDireccion','idRazon','esEmpresa','preregistros.nombre as nombre',
        'primerAp','segundoAp','rfc','fechaNac','edad','sexo','curp','telefono',
        'cat_identificacion.documento as docIdentificacion','numDocIdentificacion','conViolencia','narracion','folio','representanteLegal',
        'statusCancelacion','statusOrigen','statusCola','horaLlegada','unidad','zona','razones.nombre as razon')
        ->paginate(10);

         $municipios = CatMunicipio::where('idEstado',30)
        ->where('nombre', '!=', 'SIN INFORMACION')
        ->orderBy('nombre','asc')
        ->get();
        return view('servicios.recepcion.fiscalSinRecepcion')->with('registros',$registros)->with('municipios', $municipios)->with('idMunicipioSelect',$id);
    }


    public function buscarfolio(Request $request){
        if($request->input("folio")){
            $folio = $request->input("folio");
            $request->session()->flash('folio', $folio);
        }
        else{
            $folio = $request->session()->get('folio');
            $request->session()->flash('folio', $folio);

        }

        $registros = DB::table('preregistros')->where('folio', $folio)->where('tipoActa', null)
        ->leftJoin('cat_identificacion','cat_identificacion.id','=','preregistros.docIdentificacion') 
        ->join('razones','razones.id','=','preregistros.idRazon')
        ->orWhere(DB::raw("CONCAT(preregistros.nombre,' ',primerAp,' ',segundoAp)"), 'LIKE', '%' . $folio . '%')
        ->orWhere('representanteLegal', 'like', '%' . $folio . '%')
        ->orderBy('id','desc')
        ->select('preregistros.id as id','idDireccion','idRazon','esEmpresa','preregistros.nombre as nombre',
        'primerAp','segundoAp','rfc','fechaNac','edad','sexo','curp','telefono',
        'cat_identificacion.documento as docIdentificacion','numDocIdentificacion','conViolencia','narracion','folio','representanteLegal',
        'statusCancelacion','statusOrigen','statusCola','horaLlegada','unidad','zona','razones.nombre as razon')
        ->paginate(10);
        



        // $preregistros = Preregistro::where('conViolencia', 0)
        // ->where('folio', $folio)
        // // ->orWhere('nombre', 'like', '%' . $folio . '%')
        // // ->orWhere('primerAp', 'like', '%' . $folio . '%')
        // // ->orWhere('segundoAp', 'like', '%' . $folio . '%')
        // ->orWhere(DB::raw("CONCAT(nombre,' ',primerAp,' ',segundoAp)"), 'LIKE', '%' . $folio . '%')
        // ->orWhere('representanteLegal', 'like', '%' . $folio . '%')
        // ->orderBy('id','desc')
        // ->paginate(10);
        // //->toSql();
        $municipios = CatMunicipio::where('idEstado',30)
        ->where('nombre', '!=', 'SIN INFORMACION')
        ->orderBy('nombre','asc')
        ->get();
        
        return view('servicios.recepcion.fiscalSinRecepcion')->with('registros',$registros)->with('municipios', $municipios);
    }
}
