<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActasHechos;
use App\Models\Domicilio;
use App\Models\CatEscolaridad;
use App\Models\CatEstado;
use App\Models\CatEstadoCivil;
use App\Models\CatOcupacion;
use App\Models\CatNacionalidad;
use App\Models\Preregistro;
use App\Http\Requests\ActaRequest;
use DB;
use Alert;
use Carbon\Carbon;
use Jenssegers\Date\Date;

class ActasHechosController extends Controller
{

    public function actasPendientes(){
        $actas=Preregistro::where('tipoActa','!=',null)->get();
        return view('tables.actas-hechos')->with('actas',$actas);
    }
    
    public function actasPreregistro($id){
        //$acta=Preregistro::find($id);
        $acta=DB::table('preregistros')
        ->join('domicilio','preregistros.idDireccion','=','domicilio.id')
        ->join('cat_municipio','domicilio.idMunicipio','=','cat_municipio.id')
        ->join('cat_identificacion','cat_identificacion.id','=','preregistros.docIdentificacion')
        ->select('preregistros.id as id','idDireccion','idRazon','esEmpresa',
        'preregistros.nombre as nombre','primerAp','segundoAp','rfc','fechaNac',
        'idEscolaridad','idEstadoCivil','idOcupacion','edad','sexo','curp','telefono',
        'cat_identificacion.documento as docIdentificacion','numDocIdentificacion',
        'conViolencia','narracion','folio','tipoActa','representanteLegal',
        'statusCancelacion','statusOrigen','statusCola','cat_municipio.id as municipio',
        'idColonia','idEstado','horaLlegada','domicilio.calle as calle',
        'domicilio.numInterno as numInterno','domicilio.numExterno as numExterno' )
        ->where('preregistros.id',$id)->where('preregistros.idRazon',4)->get();
        $acta=$acta[0];
        //dd($acta);
        $estados=CatEstado::orderBy('nombre', 'ASC')
        ->pluck('nombre','id');
        $ocupaciones=CatOcupacion::orderBy('nombre', 'ASC')
        ->pluck('nombre', 'id');
        $estadocivil = CatEstadoCivil::orderBy('nombre', 'ASC')
        ->pluck('nombre', 'id');
        $escolaridades = CatEscolaridad::orderBy('id', 'ASC')
        ->pluck('nombre', 'id');
        $nacionalidades = CatNacionalidad::orderBy('nombre', 'ASC')
        ->pluck('nombre', 'id');
        return view('forms.acta-hechos',compact('ocupaciones','escolaridades','estadocivil','nacionalidades','estados','acta'));
    }
    

    public function showform(){
        $estados=CatEstado::orderBy('nombre', 'ASC')
        ->pluck('nombre','id');
        $ocupaciones=CatOcupacion::orderBy('nombre', 'ASC')
        ->pluck('nombre', 'id');
        $estadocivil = CatEstadoCivil::orderBy('nombre', 'ASC')
        ->pluck('nombre', 'id');
        $escolaridades = CatEscolaridad::orderBy('id', 'ASC')
        ->pluck('nombre', 'id');
        $nacionalidades = CatNacionalidad::orderBy('nombre', 'ASC')
        ->pluck('nombre', 'id');
        return view('forms.acta-hechos',compact('ocupaciones','escolaridades','estadocivil','nacionalidades','estados'));
    }

    public function addActas(ActaRequest $request){
        //dd(Date::now()->format('l j F Y H:i:s'));
        DB::beginTransaction();
            try{
                $acta = new ActasHechos;
                $direccion = new Domicilio;
                $direccion->idMunicipio = $request->idMunicipio2;
                $direccion->idLocalidad = $request->idLocalidad2;
                $direccion->idColonia = $request->idColonia2;
                $direccion->calle = $request->calle2;   
                if($request->numInterno2!=''){
                    $direccion->numInterno = $request->numInterno2;
                }
                $direccion->numExterno = $request->numExterno2;
                $direccion->save();
                $ultimo = ActasHechos::latest()->first();
                if($ultimo){
                    $new = $ultimo->folio+1;
                }
                else{
                    $new = 1;
                }
                $acta->folio = $new;
                $acta->hora = Date::now()->format('H:i:s');
                $acta->fecha = Date::now()->format('Y-m-d');
                $acta->fiscal = "xxxxxx";
                $acta->nombre = $request->nombre2;
                $acta->primer_ap = $request->primerAp;
                $acta->segundo_ap = $request->segundoAp;
                $acta->identificacion = $request->docIdentificacion;
                $acta->num_identificacion = $request->numDocIdentificacion;
                $acta->fecha_nac = $request->fecha_nac;
                $acta->idDomicilio = $direccion->id;
                $acta->idOcupacion = $request->ocupActa1;
                $acta->idEstadoCivil = $request->estadoCivilActa1;
                $acta->idEscolaridad = $request->escActa1;
                $acta->telefono = $request->telefono;
                $acta->narracion = $request->narracion;
                $acta->expedido = $request->expedido;
                $acta->tipoActa = $request->tipoActa;
                $acta->save();
                DB::commit();
                
                $catalogos = DB::table('actas_hechos')->where('actas_hechos.id', $acta->id)
                ->join('cat_ocupacion','actas_hechos.idOcupacion','=','cat_ocupacion.id')
                ->join('cat_estado_civil','actas_hechos.idEstadoCivil','=','cat_estado_civil.id')
                ->join('cat_escolaridad','actas_hechos.idEscolaridad','=','cat_escolaridad.id')
                ->join('domicilio','actas_hechos.idDomicilio','=','domicilio.id')
                ->join('cat_municipio','domicilio.idMunicipio','=','cat_municipio.id')
                ->join('cat_localidad','domicilio.idLocalidad','=','cat_localidad.id')
                ->join('cat_colonia','domicilio.idColonia','=','cat_colonia.id')
                ->join('cat_estado','cat_municipio.idEstado','=','cat_estado.id')
                ->select('cat_ocupacion.nombre as nombreOcupacion',
                'cat_estado_civil.nombre as nombreEstadoCivil',
                'cat_escolaridad.nombre as nombreEscolaridad',
                'cat_municipio.nombre as nombreMunicipio',
                'cat_localidad.nombre as nombreLocalidad',
                'cat_colonia.nombre as nombreColonia',
                'cat_estado.nombre as nombreEstado')
                ->first();
                //dd($catalogos);
                
                $word = new \PhpOffice\PhpWord\TemplateProcessor('formatos/plantillaAH.docx');
                $word->setValue('estado', $catalogos->nombreEstado);
                $word->setValue('municipio', $catalogos->nombreMunicipio);
                $word->setValue('localidad', $catalogos->nombreLocalidad);
                $word->setValue('colonia', $catalogos->nombreColonia);
                $word->setValue('calle', $direccion->calle);
                $word->setValue('cp', $request->cp2);
                if($request->numInterno2==''){
                    $word->setValue('numExterno', $direccion->numExterno);
                }
                else{
                    $numeros = $direccion->numExterno.' interior '.$direccion->numInterno;
                    $word->setValue('numExterno', $numeros);
                }
                $word->setValue('folio', $new);
                $word->setValue('hora', Date::now()->format('H:i:'));
                $fechahum = Date::now()->format('l j').' de '.Date::now()->format('F').' del año '.Date::now()->format('Y');
                $word->setValue('fecha',$fechahum);
                $word->setValue('fiscal', $acta->fiscal);
                $word->setValue('nombre', $acta->nombre.' '.$acta->primer_ap.' '.$acta->segundo_ap);
                $word->setValue('identificacion', $acta->identificacion);
                $word->setValue('numIdentificacion', $acta->num_identificacion);
                $date = new Date($acta->fecha_nac);
                $fechanachum = $date->format('j').' de '.$date->format('F').' del año '.$date->format('Y');
                $word->setValue('fechaNacimiento', $fechanachum);
                $word->setValue('ocupacion', $catalogos->nombreOcupacion);
                $word->setValue('estadoCivil', $catalogos->nombreEstadoCivil);
                $word->setValue('escolaridad', $catalogos->nombreEscolaridad);
                $word->setValue('telefono', $acta->telefono);
                $word->setValue('narracion', $acta->narracion);
                $word->setValue('expedido', $acta->expedido);

                $fechasep = explode("-", $request->fecha_nac);
                $edad = Date::createFromDate($fechasep[0],$fechasep[1],$fechasep[2])->age;
                $word->setValue('edad', $edad);
        
                $word->saveAs('../storage/oficios/ActasHechos'.$acta->id.'.docx');
                return response()->download('../storage/oficios/ActasHechos'.$acta->id.'.docx');
            }
            catch (\PDOException $e){
                DB::rollBack();
                Alert::error('Se presentó un problema al guardar su acta de hecho, intente de nuevo', 'Error');
                return redirect('actas');
            }
    }

    public function showActas(){
        $actas = ActasHechos::orderBy('id','desc')->paginate('15');
        return view('tables.consulta-actas', compact('actas'));
    }
}
