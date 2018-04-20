<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActasHechos;
use App\Models\Domicilio;
use DB;
use Alert;
use Carbon\Carbon;

class ActasHechosController extends Controller
{
    public function index(){
        return view();
    }

    public function addActas(Request $request){
        DB::transaction(function() {
            try{
                $acta = new ActasHechos;
                $direccion = new Domicilio;
                $direccion->idMunicipio = $request->idMunicipio;
                $direccion->idLocalidad = $request->idLocalidad;
                $direccion->idColonia = $request->idColonia;
                $direccion->calle = $request->calle;
                $direccion->numExterno = $request->numExterno;
                $direccion->numInterno = $request->numInterno;
                $direccion->save();
                $acta->folio = $request->folio;
                $acta->hora = $request->hora;
                $acta->fecha = $request->fecha;
                $acta->fiscal = "xxxxxx";
                $acta->nombre = $request->nombre;
                $acta->primer_ap = $request->primer_ap;
                $acta->segundo_ap = $request->segundo_ap;
                $acta->identificacion = $request->identificacion;
                $acta->num_identificacion = $request->num_identificacion;
                $acta->fecha_nac = $request->fecha_nac;
                $acta->idDomicilio = $domicilio->id;
                $acta->idOcupacion = $request->idOcupacion;
                $acta->idEstadoCivil = $request->idEstadoCivil;
                $acta->idEscolaridad = $request->idEscolaridad;
                $acta->telefono = $request->telefono;
                $acta->narracion = $request->narracion;
                $acta->save();
            }
            catch (\PDOException $e){
               
            }
        });
    }
}
