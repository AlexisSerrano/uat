<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carpeta;
use App\Models\CatEscolaridad;
use App\Models\CatEstado;
use App\Models\CatEstadoCivil;
use App\Models\CatEtnia;
use App\Models\CatLengua;
use App\Models\CatNacionalidad;
use App\Models\CatOcupacion;
use App\Models\CatPuesto;
use App\Models\CatReligion;
use App\Models\Persona;
use App\Models\VariablesPersona;
use App\Models\ExtraDenunciado;
use App\Models\DirNotificacion;
use App\Models\Domicilio;
use App\Http\Requests\StoreDenunciado;
use App\Models\BitacoraNavCaso;
use Alert;
use DB;
use Carbon\Carbon;

class DenunciadoController extends Controller
{
    public function showForm()
    {
        $idCarpeta=session('carpeta');
        $carpetaNueva = Carpeta::where('id', $idCarpeta)->get();
        if(count($carpetaNueva)>0){ 
            $denunciados = CarpetaController::getDenunciados($idCarpeta);
            $escolaridades = CatEscolaridad::orderBy('id', 'ASC')->pluck('nombre', 'id');
            $estados = CatEstado::select('id', 'nombre')->orderBy('nombre', 'ASC')->pluck('nombre', 'id');
            $estadoscivil = CatEstadoCivil::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
            $etnias = CatEtnia::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
            $lenguas = CatLengua::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
            $nacionalidades = CatNacionalidad::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
            $ocupaciones = CatOcupacion::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
            $puestos = CatPuesto::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
            $religiones = CatReligion::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
            return view('forms.denunciado')->with('idCarpeta', $idCarpeta)
                ->with('denunciados', $denunciados)
                ->with('escolaridades', $escolaridades)
                ->with('estados', $estados)
                ->with('estadoscivil', $estadoscivil)
                ->with('etnias', $etnias)
                ->with('lenguas', $lenguas)
                ->with('nacionalidades', $nacionalidades)
                ->with('ocupaciones', $ocupaciones)
                ->with('puestos', $puestos)
                ->with('religiones', $religiones);
        }else{
            return redirect()->route('home');
        }
    }

    public function storeDenunciado(StoreDenunciado $request){
        //dd($request->all());
        DB::beginTransaction();
        try{
            $idCarpeta=session('carpeta');
            if ($request->tipoDenunciado==1){
                
            $sql=DB::table('variables_persona')
            ->join('persona','persona.id','=','variables_persona.idPersona')
            ->join('extra_denunciado','extra_denunciado.idVariablesPersona','=','variables_persona.idPersona')
            ->where('variables_persona.idCarpeta', $idCarpeta)
            ->where('persona.nombres','QUIEN O QUIENES RESULTEN RESPONSABLES')
           // ->select('extra_denunciado.idVariablesPersona')
            ->first();
               
                if($sql){
                    Alert::warning('','Solo puedes agregar un Q.R.R');
                    return redirect()->route('new.denunciado');
                }else{
                    $persona = new Persona();
                    $persona->nombres = $request->nombresQ;
                    $persona->rfc = "SIN INFORMACION";
                    $persona->save();
                    $idPersona = $persona->id;
                
                        
        
                    $domicilio = new Domicilio();
                    $domicilio->save();
                    $idD1 = $domicilio->id;
        
                    $domicilio2 = new Domicilio();
                    $domicilio2->save();
                    $idD2 = $domicilio2->id;
        
                    $domicilio3 = new Domicilio();
                    $domicilio3->save();
                    $idD3 = $domicilio3->id;
        
                    $VariablesPersona = new VariablesPersona();
                    $VariablesPersona->idCarpeta = $request->idCarpeta;
                    $VariablesPersona->idPersona = $idPersona;
                    $VariablesPersona->idDomicilio = $idD1;
                    $VariablesPersona->idDomicilioTrabajo = $idD2;
                    $VariablesPersona->save();
                    $idVariablesPersona = $VariablesPersona->id;
        
                    $notificacion = new DirNotificacion();
                    $notificacion->idDomicilio = $idD3;
                    $notificacion->save();
                    $idNotificacion = $notificacion->id;
        
                    $ExtraDenunciado = new ExtraDenunciado();
                    $ExtraDenunciado->idVariablesPersona = $idVariablesPersona;
                    $ExtraDenunciado->idNotificacion = $idNotificacion;
                    $ExtraDenunciado->save();
                
                    $this->addbitacora();
                }
            
            
            }
            elseif ($request->tipoDenunciado==2){
                $persona = new Persona();
                $persona->nombres = $request->nombresC;
                $persona->primerAp = $request->primerApC;
                $persona->rfc = "SIN INFORMACION";
                $persona->save();
                $idPersona = $persona->id;

                $domicilio = new Domicilio();
                $domicilio->idMunicipio = $request->idMunicipioC;
                $domicilio->idLocalidad = $request->idLocalidadC;
                $domicilio->idColonia = $request->idColoniaC;
                if($request->calleC==null){
                    $domicilio->calle = 'SIN INFORMACION';
                }else{
                    $domicilio->calle = $request->calleC;
                }
                if($request->numExternoC==null){
                    $domicilio->numExterno = 'S/N';
                }else{
                    $domicilio->numExterno = $request->numExternoC;
                }
                if($request->numInternoC==null){
                    $domicilio->numInterno = 'S/N';
                }else{
                    $domicilio->numInterno = $request->numInternoC;
                }
                $domicilio->save();
                $idD1 = $domicilio->id;

                $domicilio2 = new Domicilio();
                $domicilio2->save();
                $idD2 = $domicilio2->id;

                $domicilio3 = new Domicilio();
                $domicilio3->save();
                $idD3 = $domicilio3->id;

                $VariablesPersona = new VariablesPersona();
                $VariablesPersona->idCarpeta = $request->idCarpeta;
                $VariablesPersona->idPersona = $idPersona;
                $VariablesPersona->idDomicilio = $idD1;
                $VariablesPersona->idDomicilioTrabajo = $idD2;
                $VariablesPersona->save();
                $idVariablesPersona = $VariablesPersona->id;

                $notificacion = new DirNotificacion();
                $notificacion->idDomicilio = $idD3;
                $notificacion->save();
                $idNotificacion = $notificacion->id;

                $ExtraDenunciado = new ExtraDenunciado();
                $ExtraDenunciado->idVariablesPersona = $idVariablesPersona;
                $ExtraDenunciado->idNotificacion = $idNotificacion;
                $ExtraDenunciado->alias = $request->aliasC;
                $ExtraDenunciado->senasPartic = $request->senasParticC;
                $ExtraDenunciado->save();
                $this->addbitacora();
            }
            elseif ($request->tipoDenunciado==3){
                if ($request->esEmpresa==0){
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
                    $persona->rfc = $request->rfc.$request->homo;
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
                    $persona->esEmpresa = 0;
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
                    if ($request->fax==null) {
                        $notificacion->fax = 'SIN INFORMACION';
                    } else {
                        $notificacion->fax = $request->fax;
                    }
                    $notificacion->save();
                    $idNotificacion = $notificacion->id;

                    $edad= Carbon::parse($request->fechaNacimiento)->age;
                    $VariablesPersona = new VariablesPersona();
                    $VariablesPersona->idCarpeta = $request->idCarpeta;
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

                    $ExtraDenunciado = new ExtraDenunciado();
                    $ExtraDenunciado->idVariablesPersona = $idVariablesPersona;
                    $ExtraDenunciado->idNotificacion = $idNotificacion;
                    if (!is_null($request->idPuesto)){
                        $ExtraDenunciado->idPuesto = $request->idPuesto;
                    }
                    if (!is_null($request->alias)){
                        $ExtraDenunciado->alias = $request->alias;
                    }
                    if (!is_null($request->senasPartic)){
                        $ExtraDenunciado->senasPartic = $request->senasPartic;
                    }
                    if (!is_null($request->ingreso)){
                        $ExtraDenunciado->ingreso = $request->ingreso;
                    }
                    if (!is_null($request->periodoIngreso)){
                        $ExtraDenunciado->periodoIngreso = $request->periodoIngreso;
                    }
                    if (!is_null($request->residenciaAnterior)){
                        $ExtraDenunciado->residenciaAnterior = $request->residenciaAnterior;
                    }
                    $ExtraDenunciado->idAbogado = null;
                    if (!is_null($request->personasBajoSuGuarda)){
                        $ExtraDenunciado->personasBajoSuGuarda = $request->personasBajoSuGuarda;
                    }
                    if ($request->esperseguidoPenalmente==1){
                        $ExtraDenunciado->perseguidoPenalmente = 1;
                    }
                    if (!is_null($request->vestimenta)){
                        $ExtraDenunciado->vestimenta = $request->vestimenta;
                    }
                    if (!is_null($request->narracion)){
                        $ExtraDenunciado->narracion = $request->narracion;
                    }
                    $ExtraDenunciado->save();
                    $this->addbitacora();
                }elseif($request->esEmpresa==1){
                    $persona = new Persona();
                    $persona->nombres = $request->nombres2;
                    $persona->rfc = $request->rfc2 . $request->homo2;
                    $persona->esEmpresa = 1;
                    $persona->save();
                    $idPersona = $persona->id;

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
                    if ($request->fax==null) {
                        $notificacion->fax = 'SIN INFORMACION';
                    } else {
                        $notificacion->fax = $request->fax;
                    }
                    $notificacion->save();
                    $idNotificacion = $notificacion->id;

                    $VariablesPersona = new VariablesPersona();
                    $VariablesPersona->idCarpeta = $request->idCarpeta;
                    $VariablesPersona->idPersona = $idPersona;
                    $VariablesPersona->idDomicilio = $idD1;
                    $VariablesPersona->idDomicilioTrabajo = $idD1;
                    $VariablesPersona->representanteLegal = $request->representanteLegal;
                    $VariablesPersona->save();
                    $idVariablesPersona = $VariablesPersona->id;

                    $ExtraDenunciado = new ExtraDenunciado();
                    $ExtraDenunciado->idVariablesPersona = $idVariablesPersona;
                    $ExtraDenunciado->idNotificacion = $idNotificacion;
                    $ExtraDenunciado->senasPartic = $request->senasPartic;
                    $ExtraDenunciado->narracion = $request->narracion;
                    $ExtraDenunciado->save();
                    $this->addbitacora();
                }      
            }
            DB::commit();
            Alert::success('Denunciado registrado con éxito', 'Hecho');
            return redirect()->route('new.denunciado');
        }catch (\PDOException $e){
            DB::rollBack();
            Alert::error('Se presentó un problema al guardar su los datos, intente de nuevo', 'Error');
            return back()->withInput();
        }
    }

    public function delete($id){
            $ExtraDenunciado =  ExtraDenunciado::find($id);

            $variables = DB::table('variables_persona')
            ->where('idCarpeta', '=', $id)
            ->get();

            foreach ($variables as $variable) {
                $persona=VariablesPersona::find($variable->id);
                $persona->idCarpeta = null;
                $persona->save();
            }

            ////////////////////////////////////////////////////
            $ExtraDenunciado->delete();
            $bdbitacora = BitacoraNavCaso::where('idCaso',session('carpeta'))->first();
            $bdbitacora->denunciado = $bdbitacora->denunciado-1;
            $bdbitacora->save();
            Alert::success('Registro eliminado con éxito', 'Hecho');
            return back();
        }

    public function addbitacora(){
        $bdbitacora = BitacoraNavCaso::where('idCaso',session('carpeta'))->first();
            $bdbitacora->denunciado = $bdbitacora->denunciado+1;
            $bdbitacora->save();
    }

}
