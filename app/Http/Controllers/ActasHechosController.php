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
use DB;
use Alert;
use Carbon\Carbon;

class ActasHechosController extends Controller
{
    public function index(){
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

    public function addActas(Request $request){
        DB::beginTransaction();
            try{
                $date = Carbon::now();
                $acta = new ActasHechos;
                $direccion = new Domicilio;
                $direccion->idMunicipio = $request->idMunicipio2;
                $direccion->idLocalidad = $request->idLocalidad2;
                $direccion->idColonia = $request->idColonia2;
                $direccion->calle = $request->calle2;
                $direccion->numExterno = $request->numExterno2;
                $direccion->numInterno = $request->numInterno2;
                $direccion->save();
                $acta->folio = "yyyyy";
                $acta->hora = $date->toTimeString();
                $acta->fecha = $date->format('Y-m-d');
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
                $acta->save();
                DB::commit();
            }
            catch (\PDOException $e){
                Alert::error('Se presentó un problema al guardar su acta de hecho, intente de nuevo', 'Error');
                DB::rollBack();
            }
    }
}
