<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Requests\PreregistroRequest;
use App\Models\Preregistro;
use App\Models\Domicilio;
use App\Models\CatEstado;
use App\Models\Razon;
use App\Models\CatMunicipio;
use App\Models\CatColonia;
use App\Models\CatOcupacion;
use App\Models\CatEstadoCivil;
use App\Models\CatEscolaridad;
use App\Models\CatIdentificacion;
use Carbon\Carbon;
use App\Mail\Preregistro as sendMail;
use DB;
use Alert;
use Mail;
use App\Http\Requests\StorePreregistro;


class PreregistroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect('preregistro/create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //$cd= DB::table('cat_colonia')->groupBy('codigoPostal')->having('idMunicipio', '=', 5)->get();
        //dd($cd);

        $razones=Razon::orderBy('nombre', 'ASC')
        ->pluck('nombre','id');
        $estados=CatEstado::orderBy('nombre', 'ASC')
        ->pluck('nombre','id');
        $municipios=CatMunicipio::where('idEstado',30)->orderBy('nombre', 'ASC')
        ->pluck('nombre','id');
        $ocupaciones=CatOcupacion::orderBy('nombre', 'ASC')
        ->pluck('nombre', 'id');
        $estadocivil = CatEstadoCivil::orderBy('nombre', 'ASC')
        ->pluck('nombre', 'id');
        $escolaridades = CatEscolaridad::orderBy('id', 'ASC')
        ->pluck('nombre', 'id');
        $identificaciones = CatIdentificacion::orderBy('id', 'ASC')
        ->pluck('documento', 'id');

        return view('servicios.preregistro.create')
        ->with('estados',$estados)
        ->with('municipios',$municipios)
        ->with('ocupaciones',$ocupaciones)
        ->with('escolaridades',$escolaridades)
        ->with('estadocivil',$estadocivil)
        ->with('razones',$razones)
        ->with('identificaciones',$identificaciones);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response  StorePreregistro
     */
    public function store(StorePreregistro $request)
    {
       
        DB::beginTransaction();
        try{
        // dd($request);
            $comprobacionFolio=0;
            $folio=$comprobacionFolio;
            while ($comprobacionFolio == $folio) {
                $longitud=4;
                $key = '';
                $f1=date("d");
                $f2=date("m");
                $f3=date("y");
                
                $cadena = '1234567890';
                $max = strlen($cadena)-1;
                
                for($i=0;$i < $longitud;$i++) $key .=$cadena{mt_rand(0,$max)};
                $folio= substr($f1,0).$key.substr($f2,0).$key.substr($f3,0);
                
                $comprobacionFolio=Preregistro::where('folio','=',$folio);
                
                
            }
            //dd($folio);
            //dd($request);
            if ($request->esEmpresa==0){
                $edad= Carbon::parse($request->fechaNacimiento)->age;
                // dd($edad);
                $domicilio = new Domicilio();
                if (!is_null($request->idMunicipio2)){
                    $domicilio->idMunicipio = $request->idMunicipio2;
                }
                if (!is_null($request->idLocalidad2)){
                    $domicilio->idLocalidad = $request->idLocalidad2;
                }
                if (!is_null($request->idColonia2)){
                    $domicilio->idColonia = $request->idColonia2;
                }
                if (!is_null($request->calle2)){
                    $domicilio->calle = $request->calle2;
                }
                if (!is_null($request->numExterno2)){
                    $domicilio->numExterno = $request->numExterno2;
                }
                if (!is_null($request->numInterno2)){
                    $domicilio->numInterno = $request->numInterno2;
                }
                $domicilio->save();
                $idD1 = $domicilio->id;
                
                $preregistro = new Preregistro();
                $preregistro->nombre = $request->nombre2;
                $preregistro->primerAp = $request->primerAp;
                $preregistro->segundoAp = $request->segundoAp;
                $preregistro->telefono = $request->telefono2;
                $preregistro->narracion = $request->narracion;
                $preregistro->folio = $folio;
                $preregistro->statusCancelacion = 0;
                $preregistro->idDireccion = $idD1;
                $preregistro->idRazon = $request->idRazon2;
                $preregistro->fechaNac = $request->fechaNacimiento;
                $preregistro->edad = $edad;
                $preregistro->idMunicipioOrigen = $request->idMunicipioOrigen;
                $preregistro->idEstadoCivil = $request->estadoCivil;
                $preregistro->idEscolaridad = $request->escolaridad;
                $preregistro->idOcupacion = $request->ocupacion;
                if (!is_null($request->rfc2)){
                    $preregistro->rfc = $request->rfc2 . $request->homo2;
                }
                $preregistro->curp = $request->curp;
                if (!is_null($request->sexo)){
                    $preregistro->sexo = $request->sexo;
                }
                $preregistro->docIdentificacion = $request->docIdentificacion;
                $preregistro->numDocIdentificacion = $request->numDocIdentificacion;
                $preregistro->conViolencia = $request->Violencia;
                if (!is_null($request->tipoActa)){
                    $preregistro->tipoActa = (!is_null($request->otro))?$request->otro:$request->tipoActa;
                }
                
                $preregistro->save();
                $id = $preregistro->id;

                if (!is_null($request->correo2)) {
                    $correo2 = $request->correo2;
                    session(['idpreregistro' => $id]);
                    Mail::to($correo2)->send(new sendMail());
                    // Mail::to($correo)->send(new EnviarCorreo($id));
                    // Mail::to($correo)->send('FormatoRegistro/'.$id);

                }   
            }elseif($request->esEmpresa==1){
                $domicilio = new Domicilio();
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
                    $domicilio->calle = $request->calle1;
                }
                if (!is_null($request->numExterno1)){
                    $domicilio->numExterno = $request->numExterno1;
                }
                if (!is_null($request->numInterno1)){
                    $domicilio->numInterno = $request->numInterno1;
                }
                
                $domicilio->save();
                $idD1 = $domicilio->id;
                
                
                $preregistro = new Preregistro();
                $preregistro->nombre = $request->nombre1;
                $preregistro->idDireccion = $idD1;
                $preregistro->idRazon = $request->idRazon1;
                $preregistro->rfc = $request->rfc1 . $request->homo1;
                $preregistro->esEmpresa = 1;
                $preregistro->telefono = $request->telefono1;
                $preregistro->narracion = $request->narracion;
                $preregistro->folio = $folio;
                $preregistro->statusCancelacion = 0;
                $preregistro->representanteLegal = $request->repLegal;
                $preregistro->conViolencia = $request->Violencia;
                $preregistro->save();
                $id = $preregistro->id;
                
                
                
            }
            // return redirect('correo');
            // return view('Email.emailmodel');
            if (!is_null($request->correo)) {
                $correo = $request->correo;
                session(['idpreregistro' => $id]);
                Mail::to($correo)->send(new sendMail());
                // Mail::to($correo)->send(new EnviarCorreo($id));
                // Mail::to($correo)->send('FormatoRegistro/'.$id);
                    
            
            }
            DB::commit();
            // Alert::success('Registro modificado con exito','Hecho');
            
            return redirect('FormatoRegistro/'.$id);
        }catch (\PDOException $e){
            DB::rollBack();
            Alert::error('Se presentó un problema al guardar su los datos, intente de nuevo', 'Error');
            return back()->withInput();
        }
    
    }

//     public function enviar(){


        
//         $correo = 'ingvasquez@gmail.com';
//         Mail::to($correo)->send(new sendMail());
//         //Alert::success('correo enviado', 'Salir')->persistent("Aceptar");
//         return redirect('store');
//    }
   



    public function fiscal()
    {
        $razones=Razon::orderBy('nombre', 'ASC')
        ->pluck('nombre','id');
        $estados=CatEstado::orderBy('nombre', 'ASC')
        ->pluck('nombre','id');
        $municipios=CatMunicipio::where('idEstado',30)->orderBy('nombre', 'ASC')
        ->pluck('nombre','id');
        $ocupaciones=CatOcupacion::orderBy('nombre', 'ASC')
        ->pluck('nombre', 'id');
        $estadocivil = CatEstadoCivil::orderBy('nombre', 'ASC')
        ->pluck('nombre', 'id');
        $escolaridades = CatEscolaridad::orderBy('id', 'ASC')
        ->pluck('nombre', 'id');
        $identificaciones = CatIdentificacion::orderBy('id', 'ASC')
        ->pluck('documento', 'id');

        return view('servicios.preregistro.createFiscal')
        ->with('estados',$estados)
        ->with('municipios',$municipios)
        ->with('ocupaciones',$ocupaciones)
        ->with('escolaridades',$escolaridades)
        ->with('estadocivil',$estadocivil)
        ->with('razones',$razones)
        ->with('identificaciones',$identificaciones);
    }

    public function fiscalcreate(StorePreregistro $request)
    {
        DB::beginTransaction();
        try{
            $comprobacionFolio=0;
            $folio=$comprobacionFolio;
            while ($comprobacionFolio == $folio) {
                $longitud=4;
                $key = '';
                $f1=date("d");
                $f2=date("m");
                $f3=date("y");
                
                $cadena = '1234567890';
                $max = strlen($cadena)-1;
                
                for($i=0;$i < $longitud;$i++) $key .=$cadena{mt_rand(0,$max)};
                $folio= substr($f1,0).$key.substr($f2,0).$key.substr($f3,0);
                
                $comprobacionFolio=Preregistro::where('folio','=',$folio);
                
                
            }
            //dd($folio);
            //dd($request);
            if ($request->esEmpresa==0){
                $domicilio = new Domicilio();
                if (!is_null($request->idMunicipio2)){
                    $domicilio->idMunicipio = $request->idMunicipio2;
                }
                if (!is_null($request->idLocalidad2)){
                    $domicilio->idLocalidad = $request->idLocalidad2;
                }
                if (!is_null($request->idColonia2)){
                    $domicilio->idColonia = $request->idColonia2;
                }
                if (!is_null($request->calle2)){
                    $domicilio->calle = $request->calle2;
                }
                if (!is_null($request->numExterno2)){
                    $domicilio->numExterno = $request->numExterno2;
                }
                if (!is_null($request->numInterno2)){
                    $domicilio->numInterno = $request->numInterno2;
                }
                $domicilio->save();
                $idD1 = $domicilio->id;
                
                $edad= Carbon::parse($request->fechaNacimiento)->age;
                $preregistro = new Preregistro();
                $preregistro->nombre = $request->nombre2;
                $preregistro->primerAp = $request->primerAp;
                $preregistro->segundoAp = $request->segundoAp;
                $preregistro->telefono = $request->telefono2;
                $preregistro->narracion = $request->narracion;
                $preregistro->folio = $folio;
                $preregistro->statusCancelacion = 1;
                $preregistro->idDireccion = $idD1;
                $preregistro->idRazon = $request->idRazon2;
                $preregistro->fechaNac = $request->fechaNacimiento;
                $preregistro->edad = $edad;
                if (!is_null($request->rfc2)){
                    $preregistro->rfc = $request->rfc2 . $request->homo2;
                }
                $preregistro->curp = $request->curp;
                if (!is_null($request->sexo)){
                    $preregistro->sexo = $request->sexo;
                }
                $preregistro->docIdentificacion = $request->docIdentificacion;
                $preregistro->numDocIdentificacion = $request->numDocIdentificacion;
                $preregistro->conViolencia = $request->Violencia;
                
                $preregistro->save();
                $id = $preregistro->id;
                
                if (!is_null($request->correo2)) {
                    $correo2 = $request->correo2;
                    session(['idpreregistro' => $id]);
                    Mail::to($correo2)->send(new sendMail());
                    // Mail::to($correo)->send(new EnviarCorreo($id));
                    // Mail::to($correo)->send('FormatoRegistro/'.$id);

                }   
                
            }elseif($request->esEmpresa==1){
                $domicilio = new Domicilio();
                if (!is_null($request->idMunicipio1)){
                    $domicilio->idMunicipio = $request->idMunicipio1;
                }
                if (!is_null($request->idLocalidad1)){
                    $domicilio->idLocalidad = $request->idLocalidad1;
                }
                if (!is_null($request->idColonia1)){
                    $domicilio->idColonia = $request->idColonia1;
                }
                if (!is_null($request->calle1)){
                    $domicilio->calle = $request->calle1;
                }
                if (!is_null($request->numExterno1)){
                    $domicilio->numExterno = $request->numExterno1;
                }
                if (!is_null($request->numInterno1)){
                    $domicilio->numInterno = $request->numInterno1;
                }
                
                $domicilio->save();
                $idD1 = $domicilio->id;
                
                
                $preregistro = new Preregistro();
                $preregistro->nombre = $request->nombre1;
                $preregistro->idDireccion = $idD1;
                $preregistro->idRazon = $request->idRazon1;
                $preregistro->rfc = $request->rfc1 . $request->homo1;
                $preregistro->esEmpresa = 1;
                $preregistro->telefono = $request->telefono1;
                $preregistro->fechaNac = $request->fechaAltaEmpresa;
                $preregistro->narracion = $request->narracion;
                $preregistro->folio = $folio;
                $preregistro->statusCancelacion = 0;
                $preregistro->statusOrigen = 1;
                $preregistro->representanteLegal = $request->repLegal;
                $preregistro->conViolencia = $request->Violencia;
                $preregistro->save();
                $id = $preregistro->id;
                
                
                // return view('Email.emailmodel');
            if (!is_null($request->correo)) {
                $correo = $request->correo;
                session(['idpreregistro' => $id]);
                Mail::to($correo)->send(new sendMail());
                // Mail::to($correo)->send(new EnviarCorreo($id));
                // Mail::to($correo)->send('FormatoRegistro/'.$id);
                    
            }
            
            }
       
            DB::commit();
            return redirect('FormatoRegistro/'.$id);
        }catch (\PDOException $e){
            DB::rollBack();
            Alert::error('Se presentó un problema al guardar su los datos, intente de nuevo', 'Error');
            return back()->withInput();
        }
    
    }

    public function estado($id,$tipo)
    {
        //dd($id);
        $estado = Preregistro::find($id);
        $estado->statusCancelacion = 1;
        $estado->statusCola = $tipo;
        $estado->horaLlegada = now();
        $estado->save();
        Alert::success('Registro puesto en cola con éxito', 'Hecho');
        //return 'archivo cambiado con exito';
        if ($tipo==0) {
            return redirect('encola');
        }
        if ($tipo==1) {
            return redirect('urgentes');
        }
    }

    public function estadourgente(Request $request){
        $justificacion = $request->justificacion;
        $preregistro = $request->preregistro;
        $tipo = $request->tipo;
        $estado = Preregistro::find($preregistro);
        $estado->statusCancelacion = 1;
        $estado->statusCola = $tipo;
        $estado->nota = $justificacion;
        $estado->horaLlegada = now();
        if($estado->save()){
            echo 1;
        }
        else{
            echo 0;
        }
    }

}
