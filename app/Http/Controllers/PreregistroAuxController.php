<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Mail;
//use App\Http\Controllers\sendMail;
use App\Mail\EnviarCorreo as sendMail;
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
use Illuminate\Support\Facades\Session;
class PreregistroAuxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $preregistros = Preregistro::where('statusCola', null)
        ->where('conViolencia', 0)
        ->orderBy('id','desc')
        ->paginate(10);
        $municipios = CatMunicipio::where('idEstado',30)
        ->where('nombre', '!=', 'SIN INFORMACION')
        ->orderBy('nombre','asc')
        ->get();
        return view('servicios.recepcion.preregistros')->with('registros',$preregistros)->with('municipios', $municipios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estados=CatEstado::orderBy('nombre', 'ASC')
        ->pluck('nombre','id');
        $preregistro = Preregistro::find($id);
        $idDireccionPregistro =$preregistro->idDireccion;//id direccion
        $direccionTB=DB::table('domicilio') //id's de domicilios (municipio,localidad)
        ->where('domicilio.id','=',$idDireccionPregistro)
        ->get();

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

        //nombre del colonia
        $Colonia=DB::table('cat_colonia')
        ->where('cat_colonia.id','=',$direccionTB[0]->idColonia)
        ->get();
        $nombreColonia=$Colonia[0]->nombre;
        $nombreCP=$Colonia[0]->codigoPostal;
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
        ->pluck('codigoPostal','codigopostal');
        //dd($idCodigoPostalSelect);                     
        $persona= $preregistro->esEmpresa;//persona fisica o empresa
        if($persona==1){
            return view('servicios.recepcion.forms.editconrecepcion-empresa', compact('idEstadoSelect', 'idMunicipioSelect' ,'idLocalidadSelect', 'idColoniaSelect', 'catMunicipios', 'catLocalidades', 'catColonias', 'estados', 'preregistro','direccionTB', 'idCodigoPostalSelect', 'catCodigoPostal','nombreEstado','nombreMunicipio','nombreLocalidad', 'nombreColonia','nombreCP' ));
        }
        else{
            return view('servicios.recepcion.forms.editconrecepcion-persona', compact('idEstadoSelect', 'idMunicipioSelect' ,'idLocalidadSelect', 'idColoniaSelect', 'catMunicipios', 'catLocalidades', 'catColonias', 'estados', 'preregistro','direccionTB', 'idCodigoPostalSelect', 'catCodigoPostal','nombreEstado','nombreMunicipio','nombreLocalidad', 'nombreColonia','nombreCP' ));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
                $preregistro->rfc = $request->rfc2;
            }
            $preregistro->curp = $request->curp;
            if (!is_null($request->sexo)){
                $preregistro->sexo = $request->sexo;
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
            
            $preregistro =Preregistro::find($idDireccion);
            $preregistro->esEmpresa = 1;    
            $preregistro->nombre = $request->nombres;
            $preregistro->idDireccion = $idD1;
            $preregistro->rfc = $request->rfc;
            $preregistro->representanteLegal = $request->repLegal;
            $preregistro->telefono = $request->telefono;
            $preregistro->conViolencia = $request->conViolencia;
            $preregistro->narracion = $request->narracion;
            $preregistro->save();
            $id = $preregistro->id;   
        }
        Alert::success('Registro modificado con exito','Hecho');
        return redirect('predenuncias/'.$id.'/edit');
    }





    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function showbyfolio(Request $request){
        if($request->input("folio")){
            $folio = $request->input("folio");
            $request->session()->flash('folio', $folio);
        }
        else{
            $folio = $request->session()->get('folio');
            $request->session()->flash('folio', $folio);

        }
        $preregistros = Preregistro::where('conViolencia', 0)
        ->where('folio', $folio)
        // ->orWhere('nombre', 'like', '%' . $folio . '%')
        // ->orWhere('primerAp', 'like', '%' . $folio . '%')
        // ->orWhere('segundoAp', 'like', '%' . $folio . '%')
        ->orWhere(DB::raw("CONCAT(nombre,' ',primerAp,' ',segundoAp)"), 'LIKE', '%' . $folio . '%')
        ->orWhere('representanteLegal', 'like', '%' . $folio . '%')
        ->orderBy('id','desc')
        ->paginate(10);
        //->toSql();
        $municipios = CatMunicipio::where('idEstado',30)
        ->where('nombre', '!=', 'SIN INFORMACION')
        ->orderBy('nombre','asc')
        ->get();
        //dd($preregistros);
        return view('servicios.recepcion.preregistros')->with('registros',$preregistros)->with('municipios', $municipios);
    }

    public function encola()
    {
        $preregistros = Preregistro::where('statusCola', 0)
        ->where('conViolencia', 0)
        ->orderBy('horaLlegada','asc')
        ->paginate(10);
        return view('servicios.recepcion.cola-preregistro')->with('registros',$preregistros);
    }

    public function urgentes()
    {
        $preregistros = Preregistro::where('statusCola', 1)
        ->where('conViolencia', 0)
        ->orderBy('horaLlegada','asc')
        ->paginate(10);
        return view('servicios.recepcion.cola-preregistro')->with('registros',$preregistros);
    }

    public function showbymunicipio($id){
        //dd($id);
        $preregistros = DB::table('preregistros')
        ->join('domicilio', 'preregistros.idDireccion', '=', 'domicilio.id')
        ->where('domicilio.idMunicipio',$id)
        ->where('statusCola', null)
        ->where('conViolencia', 0)
        ->orderBy('id','desc')
        ->select('preregistros.id', 'preregistros.folio', 'preregistros.esEmpresa', 'preregistros.nombre', 'preregistros.primerAp', 'preregistros.segundoAp', 'preregistros.representanteLegal', 'preregistros.docIdentificacion')
        ->paginate(10);

         $municipios = CatMunicipio::where('idEstado',30)
        ->where('nombre', '!=', 'SIN INFORMACION')
        ->orderBy('nombre','asc')
        ->get();
        return view('servicios.recepcion.preregistros')->with('registros',$preregistros)->with('municipios', $municipios)->with('idMunicipioSelect',$id);
    }

 
    public function atender($id){
        $estado = Preregistro::find($id);
        $estado->statusCola = 23;
        $estado->save();
        return redirect("turno/$estado->id");
    }

    public function turno($id){
        // $preregistros = Preregistro::where('statusCola', 2)
        // ->where('conViolencia', 0)
        // ->orderBy('horaLlegada','asc')
        // ->get();
        // $preregistros = $preregistros[0];
        // $tipopersona=$preregistros->esEmpresa;
        $estados=CatEstado::orderBy('nombre', 'ASC')
        ->pluck('nombre','id');
        $preregistro = Preregistro::find($id);
        $tipopersona=$preregistro->esEmpresa;
        $idDireccionPregistro =$preregistro->idDireccion;//id direccion
        $idpreregistro =$preregistro->id;
        $direccionTB=DB::table('domicilio')
        ->where('domicilio.id','=',$idDireccionPregistro)
        ->get();
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
 
        //nombre del colonia
        $Colonia=DB::table('cat_colonia')
        ->where('cat_colonia.id','=',$direccionTB[0]->idColonia)
        ->get();
        $nombreColonia=$Colonia[0]->nombre;
        $nombreCP=$Colonia[0]->codigoPostal;
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
        ->pluck('codigoPostal','codigopostal');

        $caso = new Carpeta();
        $caso->numCarpeta = "UAT/D"."1"."/"."X"."/"."XX"."/".Carbon::now()->year;
        $caso->fechaInicio = Carbon::now();
        $caso->estadoCarpeta = "INICIO";
        $caso->horaIntervencion = Carbon::now();
        $caso->fechaDeterminacion = Carbon::now();
        $caso->save();
        $idCarpeta = $caso->id;
        
        $denunciantes = CarpetaController::getDenunciantes($idCarpeta);
        $denunciados = CarpetaController::getDenunciados($idCarpeta);
        $escolaridades = CatEscolaridad::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
        $estados = CatEstado::select('id', 'nombre')->orderBy('nombre', 'ASC')->pluck('nombre', 'id');
        $estadoscivil = CatEstadoCivil::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
        $etnias = CatEtnia::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
        $lenguas = CatLengua::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
        $nacionalidades = CatNacionalidad::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
        $ocupaciones = CatOcupacion::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
        $religiones = CatReligion::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
        Alert::success('Turno Tomado', 'Hecho')->persistent("Aceptar");
        return view('forms.denunciante-turno')->with('idCarpeta', $idCarpeta)
        ->with('escolaridades', $escolaridades)
        ->with('estados', $estados)
        ->with('estadoscivil', $estadoscivil)
        ->with('etnias', $etnias)
        ->with('lenguas', $lenguas)
        ->with('nacionalidades', $nacionalidades)
        ->with('ocupaciones', $ocupaciones)
        ->with('religiones', $religiones)
        ->with('idEstadoSelect', $idEstadoSelect)
        ->with('idMunicipioSelect', $idMunicipioSelect)
        ->with('idLocalidadSelect', $idLocalidadSelect)
        ->with('idColoniaSelect', $idColoniaSelect)
        ->with('catMunicipios', $catMunicipios)
        ->with('catLocalidades', $catLocalidades)
        ->with('catColonias',  $catColonias)
        ->with('estados',   $estados)
        ->with('preregistro',  $preregistro)
        ->with('direccionTB',  $direccionTB)
        ->with('idCodigoPostalSelect',  $direccionTB)
        ->with('catCodigoPostal',  $catCodigoPostal)
        ->with( 'nombreEstado',  $nombreEstado)
        ->with('nombreMunicipio',  $nombreMunicipio)
        ->with( 'nombreLocalidad',  $nombreLocalidad)
        ->with( 'nombreColonia',   $nombreColonia)
        ->with( 'nombreCP',  $nombreCP)
        ->with(  'tipopersona',  $tipopersona)
        ->with('idpreregistro',  $idpreregistro)
        ->with('denunciantes', $denunciantes)
        ->with('denunciados', $denunciados);
    }

    public function Traerturno(){
        $cola = Preregistro::where('statusCola', 0)
        ->where('conViolencia', 0)
        ->orderBy('horaLlegada','asc')->first();
        $urgente = Preregistro::where('statusCola', 1)
        ->where('conViolencia', 0)
        ->orderBy('horaLlegada','asc')->first();
        if(!$urgente&&!$cola){
            Alert::warning('No hay Elemento en Cola', 'Hecho')->persistent("Aceptar");
            return back();
        }
        else{
            if(session('enturno')==null){
                if($urgente){
                    $estado = Preregistro::find($urgente->id);
                    $estado->statusCola = 21;
                    $estado->save();
                    session(['enturno' => 'urgente']);
                    return redirect("turno/$urgente->id");
                }
                else{
                    $estado = Preregistro::find($cola->id);
                    $estado->statusCola = 20;
                    $estado->save();
                    session(['enturno' => 'cola']);
                    return redirect("turno/$cola->id");
                }
            }
            else{
                $anterior = session('enturno');
                if($anterior=='urgente'&&$cola){
                    $estado = Preregistro::find($cola->id);
                    $estado->statusCola = 20;
                    $estado->save();
                    session(['enturno' => 'cola']);
                    return redirect("turno/$cola->id");
                }
                else if($anterior=='urgente'&&$urgente){
                    $estado = Preregistro::find($urgente->id);
                    $estado->statusCola = 21;
                    $estado->save();
                    session(['enturno' => 'cola']);
                    return redirect("turno/$urgente->id");
                }
                else if($anterior=='cola'&&$urgente){
                    $estado = Preregistro::find($urgente->id);
                    $estado->statusCola = 21;
                    $estado->save();
                    session(['enturno' => 'cola']);
                    return redirect("turno/$urgente->id");
                }
                else if($anterior=='cola'&&$cola){
                    $estado = Preregistro::find($cola->id);
                    $estado->statusCola = 20;
                    $estado->save();
                    session(['enturno' => 'cola']);
                    return redirect("turno/$cola->id");
                }
            }
        }
    }

    public function devolverturno($id){  
        $turno = Preregistro::find($id);
        $status = $turno->statusCola;
        if ($status==23) {
            $turno->statusCola = null;
        }else{
            $turno->statusCola = ($status==21)?1:0;
        }
        $turno->save();
        $idCarpeta=session('carpeta');

        //dd($idCarpeta);
        
        //$carpeta = Carpeta::find($idCarpeta);
        Carpeta::destroy($idCarpeta);
        //dd($carpeta);
        //$carpeta->delete();
        
        //$carpeta->delete();
        
        session()->forget('carpeta');
         //dd($idCarpeta);
        //dd(session('carpeta'));
        
        Alert::info('Los datos del caso que inicio han sido borrados y el turno fue devuelto a la cola ', 'Turno devuelto')->persistent("Aceptar");
        return redirect('registros');
       }


    public function boton(){
        return view('servicios.email.indexboton');
    }

    
    public function enviar(){
        $correo = 'championsjvd95@hotmail.com';
        Mail::to($correo)->send(new sendMail());
        Alert::success('correo enviado', 'Salir')->persistent("Aceptar");
        return redirect('correo');
    }

}
