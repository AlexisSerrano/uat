<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreDenunciante;
use DB;
use Alert;
use Carbon\Carbon;
use App\Models\Carpeta;
use App\Models\CatEscolaridad;
use App\Models\CatEstado;
use App\Models\CatEstadoCivil;
use App\Models\CatEtnia;
use App\Models\CatLengua;
use App\Models\CatNacionalidad;
use App\Models\CatOcupacion;
use App\Models\CatReligion;
use App\Models\Razon;
use App\Models\Domicilio;
use App\Models\DirNotificacion;
use App\Models\Persona;
use App\Models\VariablesPersona;
use App\Models\ExtraDenunciante;
use App\Models\BitacoraNavCaso;

class DenuncianteController extends Controller
{

public function showForm()
    {
        $idCarpeta=session('carpeta');
        $casoNuevo = Carpeta::where('id', $idCarpeta)->get();
        if(count($casoNuevo)>0){ 
            $denunciantes = CarpetaController::getDenunciantes($idCarpeta);
            $escolaridades = CatEscolaridad::orderBy('id', 'ASC')->pluck('nombre', 'id');
            $estados = CatEstado::select('id', 'nombre')->orderBy('nombre', 'ASC')->pluck('nombre', 'id');
            $estadoscivil = CatEstadoCivil::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
            $etnias = CatEtnia::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
            $lenguas = CatLengua::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
            $nacionalidades = CatNacionalidad::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
            $ocupaciones = CatOcupacion::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
            $religiones = CatReligion::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
            return view('forms.denunciante')->with('idCarpeta', $idCarpeta)
                ->with('denunciantes', $denunciantes)
                ->with('escolaridades', $escolaridades)
                ->with('estados', $estados)
                ->with('estadoscivil', $estadoscivil)
                ->with('etnias', $etnias)
                ->with('lenguas', $lenguas)
                ->with('nacionalidades', $nacionalidades)
                ->with('ocupaciones', $ocupaciones)
                ->with('religiones', $religiones);
        }
        else{
            return redirect(url('registros'));
        }
    }

    public function cancelarCaso(){
        $idCarpeta = session('carpeta');
        $comprobar= Carpeta::where('id',$idCarpeta)->get();
        if(is_null($idCarpeta)){
            Alert::info('No tiene ningún  caso en proceso.', 'Advertiencia');
            return redirect(url('registros'));    
        }
        if (count($comprobar)==0) {
            session()->forget('carpeta');
            Alert::info('No tiene ningún  caso en proceso.', 'Advertiencia');
            return redirect(url('registros'));
        }
        $carpeta = Carpeta::find($idCarpeta);
        $carpeta->delete();
        session()->forget('carpeta');
        Alert::info('El caso ha sido cancelado con éxito.', 'Hecho');
        return redirect(url('registros'));
    }


    public function storeDenunciante(StoreDenunciante $request){
        //dd($request->all());
        
        DB::beginTransaction();
        try{
            $idCarpeta = session('carpeta');
            if(is_null($idCarpeta)){
                $idCarpeta = $request->idCarpeta;
            }

            if($request->esEmpresa==0){
                $comprobarPersona=Persona::where('curp',$request->curp)->get();
                if(count($comprobarPersona)>0){
                    $comprobarPersona=$comprobarPersona[0];
                    $idPersona = $comprobarPersona->id;
                }else{
                    $persona = new Persona();
                    $persona->nombres = $request->nombres;
                    $persona->primerAp = $request->primerAp;
                    $persona->segundoAp = $request->segundoAp;
                    $persona->fechaNacimiento = $request->fechaNacimiento;
                    $persona->rfc = $request->rfc;
                    $persona->curp = $request->curp;
                    if (!is_null($request->sexo)){
                        $persona->sexo = $request->sexo;
                    }
                    if (!is_null($request->idNacionalidad)){
                        $persona->idNacionalidad = $request->idNacionalidad;
                    }
                    if (!is_null($request->idEtnia)){
                        $persona->idEtnia = $request->idEtnia;
                    }
                    if (!is_null($request->idLengua)){
                        $persona->idLengua = $request->idLengua;
                    }
                    if (!is_null($request->idMunicipioOrigen)){
                        $persona->idMunicipioOrigen = $request->idMunicipioOrigen;
                    }
                    $persona->save();
                    $idPersona = $persona->id;
                }

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

                $domicilio2 = new Domicilio();
                if (!is_null($request->idMunicipio2)){
                    $domicilio2->idMunicipio = $request->idMunicipio2;
                }
                if (!is_null($request->idLocalidad2)){
                    $domicilio2->idLocalidad = $request->idLocalidad2;
                }
                if (!is_null($request->idColonia2)){
                    $domicilio2->idColonia = $request->idColonia2;
                }
                if (!is_null($request->calle2)){
                    $domicilio2->calle = $request->calle2;
                }
                if (!is_null($request->numExterno2)){
                    $domicilio2->numExterno = $request->numExterno2;
                }
                if (!is_null($request->numInterno2)){
                    $domicilio2->numInterno = $request->numInterno2;
                }
                $domicilio2->save();
                $idD2 = $domicilio2->id;

                $domicilio3 = new Domicilio();
                if (!is_null($request->idMunicipio3)){
                    $domicilio3->idMunicipio = $request->idMunicipio3;
                }
                if (!is_null($request->idLocalidad3)){
                    $domicilio3->idLocalidad = $request->idLocalidad3;
                }
                if (!is_null($request->idColonia3)){
                    $domicilio3->idColonia = $request->idColonia3;
                }
                if (!is_null($request->calle3)){
                    $domicilio3->calle = $request->calle3;
                }
                if (!is_null($request->numExterno3)){
                    $domicilio3->numExterno = $request->numExterno3;
                }
                if (!is_null($request->numInterno3)){
                    $domicilio3->numInterno = $request->numInterno3;
                }
                $domicilio3->save();
                $idD3 = $domicilio3->id;

                $notificacion = new DirNotificacion();
                $notificacion->idDomicilio = $idD3;
                $notificacion->correo = $request->correo;
                $notificacion->telefono = $request->telefono;
                $notificacion->fax = $request->fax;
                $notificacion->save();
                $idNotificacion = $notificacion->id;
                
                $edad= Carbon::parse($request->fechaNacimiento)->age;
                $alias= substr($request->nombres,0,1).substr($request->primerAp,-1,1).substr($request->nombres,-1,1).rand(1000,9999).substr($request->primerAp,0,1);
                
                $VariablesPersona = new VariablesPersona();
                $VariablesPersona->idCarpeta = $idCarpeta;
                $VariablesPersona->idPersona = $idPersona;
                $VariablesPersona->edad = $edad;
                if (!is_null($request->telefono)){
                    $VariablesPersona->telefono = $request->telefono;
                }
                if (!is_null($request->motivoEstancia)){
                    $VariablesPersona->motivoEstancia = $request->motivoEstancia;
                }
                if (!is_null($request->idOcupacion)){
                    $VariablesPersona->idOcupacion = $request->idOcupacion;
                }
                if (!is_null($request->idEstadoCivil)){
                    $VariablesPersona->idEstadoCivil = $request->idEstadoCivil;
                }
                if (!is_null($request->idEscolaridad)){
                    $VariablesPersona->idEscolaridad = $request->idEscolaridad;
                }
                if (!is_null($request->idReligion)){
                    $VariablesPersona->idReligion = $request->idReligion;
                }
                $VariablesPersona->idDomicilio = $idD1;
                if (!is_null($request->docIdentificacion)){
                    $VariablesPersona->docIdentificacion = $request->docIdentificacion;
                }
                if (!is_null($request->numDocIdentificacion)){
                    $VariablesPersona->numDocIdentificacion = $request->numDocIdentificacion;
                }
                if (!is_null($request->lugarTrabajo)){
                    $VariablesPersona->lugarTrabajo = $request->lugarTrabajo;
                }
                $VariablesPersona->idDomicilioTrabajo = $idD2;
                if (!is_null($request->telefonoTrabajo)){
                    $VariablesPersona->telefonoTrabajo = $request->telefonoTrabajo;
                }
                $VariablesPersona->representanteLegal = "NO APLICA";
                $VariablesPersona->save();
                $idVariablesPersona = $VariablesPersona->id;

                $ExtraDenunciante = new ExtraDenunciante();
                $ExtraDenunciante->idVariablesPersona = $idVariablesPersona;
                $ExtraDenunciante->idNotificacion = $idNotificacion;
                $ExtraDenunciante->idAbogado = null;
                $ExtraDenunciante->victima = $request->victima;
                if ($request->reguardarIdentidad==1){
                    $ExtraDenunciante->reguardarIdentidad = $alias;
                }
                if ($request->reguardarIdentidad==0){
                    $ExtraDenunciante->reguardarIdentidad = null;
                }
                $ExtraDenunciante->narracion = $request->narracion;
                $ExtraDenunciante->save();
                $this->addbitacora();
            }elseif($request->esEmpresa==1){
                $comprobarPersona=Persona::where('nombres',$request->nombre2)->get();
                if(count($comprobarPersona)>0){
                    $comprobarPersona=$comprobarPersona[0];
                    $idPersona = $comprobarPersona->id;
                }else{
                    $persona = new Persona();
                    $persona->nombres = $request->nombres2;
                    $persona->rfc = $request->rfc2;
                    $persona->esEmpresa = 1;
                    if (isset($request->idMunicipioOrigen)) {
                    }else{
                        $persona->idMunicipioOrigen = 2493;
                    }
                    $persona->save();
                    $idPersona = $persona->id;
                }

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

                $domicilio3 = new Domicilio();
                if (!is_null($request->idMunicipio3)){
                    $domicilio3->idMunicipio = $request->idMunicipio3;
                }
                if (!is_null($request->idLocalidad3)){
                    $domicilio3->idLocalidad = $request->idLocalidad3;
                }
                if (!is_null($request->idColonia3)){
                    $domicilio3->idColonia = $request->idColonia3;
                }
                if (!is_null($request->calle3)){
                    $domicilio3->calle = $request->calle3;
                }
                if (!is_null($request->numExterno3)){
                    $domicilio3->numExterno = $request->numExterno3;
                }
                if (!is_null($request->numInterno3)){
                    $domicilio3->numInterno = $request->numInterno3;
                }
                $domicilio3->save();
                $idD3 = $domicilio3->id;

                $notificacion = new DirNotificacion();
                $notificacion->idDomicilio = $idD3;
                $notificacion->correo = $request->correo;
                $notificacion->telefono = $request->telefonoN;
                $notificacion->fax = $request->fax;
                $notificacion->save();
                $idNotificacion = $notificacion->id;

                $VariablesPersona = new VariablesPersona();
                $VariablesPersona->idCarpeta = $idCarpeta;
                $VariablesPersona->idPersona = $idPersona;
                $VariablesPersona->idDomicilio = $idD1;
                $VariablesPersona->idDomicilioTrabajo = $idD1;
                $VariablesPersona->representanteLegal = $request->representanteLegal;
                $VariablesPersona->save();
                $idVariablesPersona = $VariablesPersona->id;

                $ExtraDenunciante = new ExtraDenunciante();
                $ExtraDenunciante->idVariablesPersona = $idVariablesPersona;
                $ExtraDenunciante->idNotificacion = $idNotificacion;
                $ExtraDenunciante->idAbogado = null;
                $ExtraDenunciante->victima = $request->victima;            
                $ExtraDenunciante->reguardarIdentidad = null;
                
                $ExtraDenunciante->narracion = $request->narracion;
                $ExtraDenunciante->save();
                $this->addbitacora();
            }
            DB::commit();
            Alert::success('Denunciante registrado con éxito', 'Hecho');
            return redirect()->route('new.denunciante');
        }catch (\PDOException $e){
            DB::rollBack();
            Alert::error('Se presentó un problema al guardar su los datos, intente de nuevo', 'Error');
            return back()->withInput();
        }
    }

    public function delete($id){

        $ExtraDenunciante =  ExtraDenunciante::find($id);
        $ExtraDenunciante->delete();
        $bdbitacora = BitacoraNavCaso::where('idCaso',session('carpeta'))->first();
            $bdbitacora->denunciante = $bdbitacora->denunciante-1;
            $bdbitacora->save();
        Alert::success('Registrado eliminado con éxito', 'Hecho');
        return back();
    }

    public function addbitacora(){
        $bdbitacora = BitacoraNavCaso::where('idCaso',session('carpeta'))->first();
            $bdbitacora->denunciante = $bdbitacora->denunciante+1;
            $bdbitacora->save();
    }
}
