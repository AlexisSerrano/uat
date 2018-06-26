<?php
use App\Models\BitacoraSesiones;
use Carbon\Carbon;

/*La siguiente función recibe un usuario, contraseña y grupo al que pertenece en active directory por parámetros, autentifica y 
devuelve el status: 0 = usuario o contraseña inválidos, 1 = datos correctos pero no pertenece al grupo, 2 = autentificación correcta, 
3 = sin autorización, no tiene información en el active*/
function login($usuario,$pass,$grupo) {
    $ip = "192.108.24.107";
	$dn = "OU=FGE,DC=fiscaliaveracruz,DC=gob,DC=mx";
	$dominio = '@fiscaliaveracruz.gob.mx';
	$mensaje = '';
	$conexion = ldap_connect($ip);
	ldap_set_option($conexion,LDAP_OPT_PROTOCOL_VERSION,3);
	ldap_set_option($conexion,LDAP_OPT_REFERRALS,0);
	if($bind = @ldap_bind($conexion, $usuario.$dominio, $pass)) {
		$filtro = "(sAMAccountName=".$usuario.")";
		$attr = array("memberof","extensionattribute1","extensionattribute2");
		$result = ldap_search($conexion, $dn, $filtro, $attr);
		$entries = ldap_get_entries($conexion, $result);
		ldap_unbind($conexion);
		if(isset($entries[0]['memberof'])&&isset($entries[0]['extensionattribute1'])&&isset($entries[0]['extensionattribute2'])){
			foreach($entries[0]['memberof'] as $grps) {		
				if(strpos($grps, 'CN='.$grupo)!==FALSE) {

					$sesion = BitacoraSesiones::where('usuario', $usuario)
			        ->where('deleted_at', null)
			        ->get();
			        
			        foreach ($sesion as $row) {
			        	cerrarsesion($row->idSesion);
			        	$bitacora1 = BitacoraSesiones::find($row->id);
			        	$bitacora1->deleted_at = Carbon::now()->toDateTimeString();
			        	$bitacora1->save();
			        }

			        session(['zona' => $entries[0]['extensionattribute1'][0]]);
					session(['unidad' => $entries[0]['extensionattribute2'][0]]); 
					session(['grupo' => $grupo]); 
					session(['usuario' => $usuario]);

					$bitacora = new BitacoraSesiones;
					$bitacora->zona = $entries[0]['extensionattribute1'][0];
					$bitacora->unidad = $entries[0]['extensionattribute2'][0];
					$bitacora->grupo = $grupo;
        			$bitacora->usuario = $usuario;
        			$bitacora->idSesion = session()->getId();
        			$bitacora->save();
        			session(['bisession' => $bitacora->id]);  
					$mensaje = 2;
					break;
				}
				else{
					$mensaje = 1;
				}
			}
		}
		else{
			$mensaje = 3;
		}
	} 
	else {
		$mensaje = 0;
	}
	return $mensaje;
}

function cerrarsesion($id){
	session()->getHandler()->destroy($id);
}

function formato_fecha($old){
	$new = explode(" ", $old);
	$fecha = explode("-", $new[0]);
	$hora = explode(":", $new[1]);
	switch($fecha[1]){
		case 1: $mes="Enero"; break;
		case 2: $mes="Febrero"; break;
		case 3: $mes="Marzo"; break;
		case 4: $mes="Abril"; break;
		case 5: $mes="Mayo"; break;
		case 6: $mes="Junio"; break;
		case 7: $mes="Julio"; break;
		case 8: $mes="Agosto"; break;
		case 9: $mes="Septiembre"; break;
		case 10: $mes="Octubre"; break;
		case 11: $mes="Noviembre"; break;
		case 12: $mes="Diciembre"; break;
	 }
	 $nuevafecha = $fecha[2]." de ".$mes." de ". $fecha[0]."  ".$hora[0].":".$hora[1].":".$hora[2];
	return $nuevafecha;
}

function oldForm(){
	$valoresOld = session('_old_input');
	if(isset($valoresOld['esEmpresa'])){
		if($valoresOld['esEmpresa']==1){
			if(isset($valoresOld['esEmpresa'],$valoresOld['idEstado1'], $valoresOld['idMunicipio1'],$valoresOld['idLocalidad1'], $valoresOld['idColonia1'], $valoresOld['cp1'], $valoresOld['Violencia'], $valoresOld['narracion'])){
				$form['esEmpresa'] = $valoresOld['esEmpresa'];
				$form['idEstado1'] = $valoresOld['idEstado1'];
				$form['idMunicipio1'] = $valoresOld['idMunicipio1'];
				$form['idLocalidad1'] = $valoresOld['idLocalidad1'];
				$form['idColonia1'] = $valoresOld['idColonia1'];
				$form['Violencia'] = $valoresOld['Violencia'];
				$form['narracion'] = $valoresOld['narracion'];
				$form['cp1'] = $valoresOld['cp1'];
				$catMunicipios=DB::table('cat_municipio')
				->where('cat_municipio.idEstado','=',$form['idEstado1'])
				->orderBy('nombre','asc')
				->pluck('nombre','id');
				$catLocalidades=DB::table('cat_localidad')
				->where('cat_localidad.idMunicipio','=',$form['idMunicipio1'])
				->orderBy('nombre','asc')
				->pluck('nombre','id');
				$catColonias=DB::table('cat_colonia')
				->where('cat_colonia.codigoPostal','=',$form['cp1'])
				->orderBy('nombre','asc')
				->pluck('nombre','id');
				$catCodigoPostal=DB::table('cat_colonia')
				->where('cat_colonia.idMunicipio','=',$form['idMunicipio1'])
				->where('cat_colonia.codigoPostal','!=',0)
				->orderBy('codigoPostal','asc')
				->groupBy('codigoPostal')
				->pluck('codigoPostal','codigopostal');
				$form['catMunicipios'] = $catMunicipios;
				$form['catLocalidades'] = $catLocalidades;
				$form['catColonias'] = $catColonias;
				$form['catCodigoPostal'] = $catCodigoPostal;
				if($form['Violencia'] == 1){
					$form['violencia1'] = 'checked';
					$form['violencia2'] = '';
				}
				else{
					$form['violencia1'] = '';
					$form['violencia2'] = 'checked';
				}
				if($form['esEmpresa'] == 1){
					$form['esEmpresa1'] = 'checked';
					$form['esEmpresa2'] = '';
				}
				else{
					$form['esEmpresa1'] = '';
					$form['esEmpresa2'] = 'checked';
				}
				return $form;
			}
		}
		else{
			if(isset($valoresOld['esEmpresa'],$valoresOld['idEstado2'], $valoresOld['idMunicipio2'],$valoresOld['idLocalidad2'], $valoresOld['idColonia2'], $valoresOld['cp2'], $valoresOld['Violencia'], $valoresOld['narracion'])){
				$form['esEmpresa'] = $valoresOld['esEmpresa'];
				$form['idEstado2'] = $valoresOld['idEstado2'];
				$form['idMunicipio2'] = $valoresOld['idMunicipio2'];
				$form['idLocalidad2'] = $valoresOld['idLocalidad2'];
				$form['idColonia2'] = $valoresOld['idColonia2'];
				$form['Violencia'] = $valoresOld['Violencia'];
				$form['narracion'] = $valoresOld['narracion'];
				$form['cp2'] = $valoresOld['cp2'];
				$catMunicipios=DB::table('cat_municipio')
				->where('cat_municipio.idEstado','=',$form['idEstado2'])
				->orderBy('nombre','asc')
				->pluck('nombre','id');
				$catLocalidades=DB::table('cat_localidad')
				->where('cat_localidad.idMunicipio','=',$form['idMunicipio2'])
				->orderBy('nombre','asc')
				->pluck('nombre','id');
				$catColonias=DB::table('cat_colonia')
				->where('cat_colonia.codigoPostal','=',$form['cp2'])
				->orderBy('nombre','asc')
				->pluck('nombre','id');
				$catCodigoPostal=DB::table('cat_colonia')
				->where('cat_colonia.idMunicipio','=',$form['idMunicipio2'])
				->where('cat_colonia.codigoPostal','!=',0)
				->orderBy('codigoPostal','asc')
				->groupBy('codigoPostal')
				->pluck('codigoPostal','codigopostal');
				$form['catMunicipios'] = $catMunicipios;
				$form['catLocalidades'] = $catLocalidades;
				$form['catColonias'] = $catColonias;
				$form['catCodigoPostal'] = $catCodigoPostal;
				if($form['Violencia'] == 1){
					$form['violencia1'] = 'checked';
					$form['violencia2'] = '';
				}
				else{
					$form['violencia1'] = '';
					$form['violencia2'] = 'checked';
				}
				if($form['esEmpresa'] == 1){
					$form['esEmpresa1'] = 'checked';
					$form['esEmpresa2'] = '';
				}
				else{
					$form['esEmpresa1'] = '';
					$form['esEmpresa2'] = 'checked';
				}
				return $form;
			}
		}
	}
}

function oldFormDelitos(){
	$valoresOld = session('_old_input');
	if(isset($valoresOld['idEstado'], $valoresOld['idMunicipio'],$valoresOld['idLocalidad'], $valoresOld['idColonia'], $valoresOld['cp'] )){
		$form['idEstado'] = $valoresOld['idEstado'];
		$form['idMunicipio'] = $valoresOld['idMunicipio'];
		$form['idLocalidad'] = $valoresOld['idLocalidad'];
		$form['idColonia'] = $valoresOld['idColonia'];
		$form['cp'] = $valoresOld['cp'];
		$catMunicipios=DB::table('cat_municipio')
		->where('cat_municipio.idEstado','=',$form['idEstado'])
		->orderBy('nombre','asc')
		->pluck('nombre','id');
		$catLocalidades=DB::table('cat_localidad')
		->where('cat_localidad.idMunicipio','=',$form['idMunicipio'])
		->orderBy('nombre','asc')
		->pluck('nombre','id');
		$catColonias=DB::table('cat_colonia')
		->where('cat_colonia.codigoPostal','=',$form['cp'])
		->orderBy('nombre','asc')
		->pluck('nombre','id');
		$catCodigoPostal=DB::table('cat_colonia')
		->where('cat_colonia.idMunicipio','=',$form['idMunicipio'])
		->where('cat_colonia.codigoPostal','!=',0)
		->orderBy('codigoPostal','asc')
		->groupBy('codigoPostal')
		->pluck('codigoPostal','codigopostal');
		$form['catMunicipios'] = $catMunicipios;
		$form['catLocalidades'] = $catLocalidades;
		$form['catColonias'] = $catColonias;
		$form['catCodigoPostal'] = $catCodigoPostal;
		return $form;
	}
}

function oldFormActas(){
	$valoresOld = session('_old_input');
	if(isset($valoresOld['idEstado2'], $valoresOld['idMunicipio2'],$valoresOld['idLocalidad2'], $valoresOld['idColonia2'], $valoresOld['cp2'], $valoresOld['fecha_nac'] )){
		$form['idEstado2'] = $valoresOld['idEstado2'];
		$form['idMunicipio2'] = $valoresOld['idMunicipio2'];
		$form['idLocalidad2'] = $valoresOld['idLocalidad2'];
		$form['idColonia2'] = $valoresOld['idColonia2'];
		$form['cp2'] = $valoresOld['cp2'];
		$form['fecha_nac'] = $valoresOld['fecha_nac'];
		$catMunicipios=DB::table('cat_municipio')
		->where('cat_municipio.idEstado','=',$form['idEstado2'])
		->orderBy('nombre','asc')
		->pluck('nombre','id');
		$catLocalidades=DB::table('cat_localidad')
		->where('cat_localidad.idMunicipio','=',$form['idMunicipio2'])
		->orderBy('nombre','asc')
		->pluck('nombre','id');
		$catColonias=DB::table('cat_colonia')
		->where('cat_colonia.codigoPostal','=',$form['cp2'])
		->orderBy('nombre','asc')
		->pluck('nombre','id');
		$catCodigoPostal=DB::table('cat_colonia')
		->where('cat_colonia.idMunicipio','=',$form['idMunicipio2'])
		->where('cat_colonia.codigoPostal','!=',0)
		->orderBy('codigoPostal','asc')
		->groupBy('codigoPostal')
		->pluck('codigoPostal','codigopostal');
		$form['catMunicipios'] = $catMunicipios;
		$form['catLocalidades'] = $catLocalidades;
		$form['catColonias'] = $catColonias;
		$form['catCodigoPostal'] = $catCodigoPostal;
		return $form;
	}
}

function oldFormConocido(){
	$valoresOld = session('_old_input');
	if(isset($valoresOld['idEstadoC'], $valoresOld['idMunicipioC'],$valoresOld['idLocalidadC'], $valoresOld['idColoniaC'], $valoresOld['cpC'] )){
		$form['idEstadoC'] = $valoresOld['idEstadoC'];
		$form['idMunicipioC'] = $valoresOld['idMunicipioC'];
		$form['idLocalidadC'] = $valoresOld['idLocalidadC'];
		$form['idColoniaC'] = $valoresOld['idColoniaC'];
		$form['cpC'] = $valoresOld['cpC'];
		$catMunicipios=DB::table('cat_municipio')
		->where('cat_municipio.idEstado','=',$form['idEstadoC'])
		->orderBy('nombre','asc')
		->pluck('nombre','id');
		$catLocalidades=DB::table('cat_localidad')
		->where('cat_localidad.idMunicipio','=',$form['idMunicipioC'])
		->orderBy('nombre','asc')
		->pluck('nombre','id');
		$catColonias=DB::table('cat_colonia')
		->where('cat_colonia.codigoPostal','=',$form['cpC'])
		->orderBy('nombre','asc')
		->pluck('nombre','id');
		$catCodigoPostal=DB::table('cat_colonia')
		->where('cat_colonia.idMunicipio','=',$form['idMunicipioC'])
		->where('cat_colonia.codigoPostal','!=',0)
		->orderBy('codigoPostal','asc')
		->groupBy('codigoPostal')
		->pluck('codigoPostal','codigopostal');
		$form['catMunicipios'] = $catMunicipios;
		$form['catLocalidades'] = $catLocalidades;
		$form['catColonias'] = $catColonias;
		$form['catCodigoPostal'] = $catCodigoPostal;
		return $form;
	}
}



function oldFormDenunciante(){
	$valoresOld = session('_old_input');
	$form['fechaAltaEmpresa'] = $valoresOld['fechaAltaEmpresa'];
	$form['fechaNacimiento'] = $valoresOld['fechaNacimiento'];
	
		return $form;
	}


function oldFormTrabajo(){
	$valoresOld = session('_old_input');
	if(isset($valoresOld['idEstado2'], $valoresOld['idMunicipio2'],$valoresOld['idLocalidad2'], $valoresOld['idColonia2'], $valoresOld['cp2'] )){
		$form['idEstado2'] = $valoresOld['idEstado2'];
		$form['idMunicipio2'] = $valoresOld['idMunicipio2'];
		$form['idLocalidad2'] = $valoresOld['idLocalidad2'];
		$form['idColonia2'] = $valoresOld['idColonia2'];
		$form['cp2'] = $valoresOld['cp2'];
		$catMunicipios=DB::table('cat_municipio')
		->where('cat_municipio.idEstado','=',$form['idEstado2'])
		->orderBy('nombre','asc')
		->pluck('nombre','id');
		$catLocalidades=DB::table('cat_localidad')
		->where('cat_localidad.idMunicipio','=',$form['idMunicipio2'])
		->orderBy('nombre','asc')
		->pluck('nombre','id');
		$catColonias=DB::table('cat_colonia')
		->where('cat_colonia.codigoPostal','=',$form['cp2'])
		->orderBy('nombre','asc')
		->pluck('nombre','id');
		$catCodigoPostal=DB::table('cat_colonia')
		->where('cat_colonia.idMunicipio','=',$form['idMunicipio2'])
		->where('cat_colonia.codigoPostal','!=',0)
		->orderBy('codigoPostal','asc')
		->groupBy('codigoPostal')
		->pluck('codigoPostal','codigopostal');
		$form['catMunicipios'] = $catMunicipios;
		$form['catLocalidades'] = $catLocalidades;
		$form['catColonias'] = $catColonias;
		$form['catCodigoPostal'] = $catCodigoPostal;
		return $form;
	}
}

function oldFormNoti(){
	$valoresOld = session('_old_input');
	if(isset($valoresOld['idEstado3'], $valoresOld['idMunicipio3'],$valoresOld['idLocalidad3'], $valoresOld['idColonia3'], $valoresOld['cp3'] )){
		$form['idEstado3'] = $valoresOld['idEstado3'];
		$form['idMunicipio3'] = $valoresOld['idMunicipio3'];
		$form['idLocalidad3'] = $valoresOld['idLocalidad3'];
		$form['idColonia3'] = $valoresOld['idColonia3'];
		$form['cp3'] = $valoresOld['cp3'];
		$catMunicipios=DB::table('cat_municipio')
		->where('cat_municipio.idEstado','=',$form['idEstado3'])
		->orderBy('nombre','asc')
		->pluck('nombre','id');
		$catLocalidades=DB::table('cat_localidad')
		->where('cat_localidad.idMunicipio','=',$form['idMunicipio3'])
		->orderBy('nombre','asc')
		->pluck('nombre','id');
		$catColonias=DB::table('cat_colonia')
		->where('cat_colonia.codigoPostal','=',$form['cp3'])
		->orderBy('nombre','asc')
		->pluck('nombre','id');
		$catCodigoPostal=DB::table('cat_colonia')
		->where('cat_colonia.idMunicipio','=',$form['idMunicipio3'])
		->where('cat_colonia.codigoPostal','!=',0)
		->orderBy('codigoPostal','asc')
		->groupBy('codigoPostal')
		->pluck('codigoPostal','codigopostal');
		$form['catMunicipios'] = $catMunicipios;
		$form['catLocalidades'] = $catLocalidades;
		$form['catColonias'] = $catColonias;
		$form['catCodigoPostal'] = $catCodigoPostal;
		return $form;
	}
}
function oldFormAbogado(){
	$valoresOld = session('_old_input');
	$form['fechaNacimiento'] = $valoresOld['fechaNacimiento'];
		return $form;
	}

	function oldFormActasCa(){
		$valoresOld = session('_old_input');
		if(isset($valoresOld['idEstado2'], $valoresOld['idMunicipio2'],$valoresOld['idLocalidad2'], $valoresOld['idColonia2'], $valoresOld['cp2'] )){
			$form['idEstado2'] = $valoresOld['idEstado2'];
			$form['idMunicipio2'] = $valoresOld['idMunicipio2'];
			$form['idLocalidad2'] = $valoresOld['idLocalidad2'];
			$form['idColonia2'] = $valoresOld['idColonia2'];
			$form['cp2'] = $valoresOld['cp2'];
			$catMunicipios=DB::table('cat_municipio')
			->where('cat_municipio.idEstado','=',$form['idEstado2'])
			->orderBy('nombre','asc')
			->pluck('nombre','id');
			$catLocalidades=DB::table('cat_localidad')
			->where('cat_localidad.idMunicipio','=',$form['idMunicipio2'])
			->orderBy('nombre','asc')
			->pluck('nombre','id');
			$catColonias=DB::table('cat_colonia')
			->where('cat_colonia.codigoPostal','=',$form['cp2'])
			->orderBy('nombre','asc')
			->pluck('nombre','id');
			$catCodigoPostal=DB::table('cat_colonia')
			->where('cat_colonia.idMunicipio','=',$form['idMunicipio2'])
			->where('cat_colonia.codigoPostal','!=',0)
			->orderBy('codigoPostal','asc')
			->groupBy('codigoPostal')
			->pluck('codigoPostal','codigopostal');
			$form['catMunicipios'] = $catMunicipios;
			$form['catLocalidades'] = $catLocalidades;
			$form['catColonias'] = $catColonias;
			$form['catCodigoPostal'] = $catCodigoPostal;
			return $form;
		}
	}


function countAtencion(){
	$atenciones=DB::table('atenciones')
		->select('id')
		->where('idUnidad',Auth::user()->idUnidad)
		->where('idUsuario',Auth::user()->id)
		->whereDate('created_at', '=', Carbon::now()->format('Y-m-d'))->get()
		->count();
	return $atenciones;
}

function getNavCaso(){
	$navCaso=DB::table('bitacora_navcaso')
		->where('idCaso',session('carpeta'))
		->first();
	$url = Request::path();
	$barra['denunciante'] = ($navCaso->denunciante>0)?'btn btn-primary':'btn btn-secondary';
	$barra['denunciante'] = ($url=="agregar-denunciante")?$barra['denunciante']." active":$barra['denunciante'];
	$barra['cdenunciante'] = ($navCaso->denunciante>0)?$navCaso->denunciante:'';
	$barra['denunciado'] = ($navCaso->denunciado>0)?'btn btn-primary':'btn btn-secondary';
	$barra['denunciado'] = ($url=="agregar-denunciado")?$barra['denunciado']." active":$barra['denunciado'];
	$barra['cdenunciado'] = ($navCaso->denunciado>0)?$navCaso->denunciado:'';
	$barra['abogado'] = ($navCaso->abogado>0)?'btn btn-primary':'btn btn-secondary';
	$barra['abogado'] = ($url=="agregar-abogado")?$barra['abogado']." active":$barra['abogado'];
	$barra['cabogado'] = ($navCaso->abogado>0)?$navCaso->abogado:'';
	$barra['autoridad'] = ($navCaso->autoridad>0)?'btn btn-primary':'btn btn-secondary';
	$barra['autoridad'] = ($url=="agregar-autoridad")?$barra['autoridad']." active":$barra['autoridad'];
	$barra['cautoridad'] = ($navCaso->autoridad>0)?$navCaso->autoridad:'';     
	$barra['delitos'] = ($navCaso->delitos>0)?'btn btn-primary':'btn btn-secondary';
	$barra['delitos'] = ($url=="agregar-delito")?$barra['delitos']." active":$barra['delitos'];
	$barra['cdelitos'] = ($navCaso->delitos>0)?$navCaso->delitos:'';  
	$barra['acusaciones'] = ($navCaso->acusaciones>0)?'btn btn-primary':'btn btn-secondary';
	$barra['acusaciones'] = ($url=="acusacion")?$barra['acusaciones']." active":$barra['acusaciones'];
	$barra['cacusaciones'] = ($navCaso->acusaciones>0)?$navCaso->acusaciones:'';
	$barra['defensa'] = ($navCaso->defensa>0)?'btn btn-primary':'btn btn-secondary';
	$barra['defensa'] = ($url=="agregar-defensa")?$barra['defensa']." active":$barra['defensa'];
	$barra['cdefensa'] = ($navCaso->defensa>0)?$navCaso->defensa:'';
	$barra['hechos'] = ($navCaso->hechos>0)?'btn btn-primary':'btn btn-secondary';
	$barra['hechos'] = ($url=="narracion")?$barra['hechos']." active":$barra['hechos'];
	$barra['chechos'] = ($navCaso->hechos>0)?$navCaso->hechos:'';
	
	$barra['medidas'] = ($navCaso->medidas>0)?'btn btn-primary':'btn btn-secondary';
	$barra['medidas'] = ($url=="medidas")?$barra['medidas']." active":$barra['medidas'];
	$barra['cmedidas'] = ($navCaso->medidas>0)?$navCaso->medidas:'';

	$barra['vehiculos'] = ($navCaso->vehiculos>0)?'btn btn-primary':'btn btn-secondary';
	$barra['vehiculos'] = ($url=="vehiculo.carpeta")?$barra['vehiculos']." active":$barra['vehiculos'];
	$barra['cvehiculos'] = ($navCaso->vehiculos>0)?$navCaso->vehiculos:'';       
	return $barra;
}


function getImpresiones(){
	$navCaso=DB::table('bitacora_navcaso')
		->where('idCaso',session('carpeta'))
		->first();
		$url = Request::path();
		$oficio['vehiculos']=($navCaso->vehiculos>0)?$navCaso->vehiculos:'';


}

function getOficiosImpresos(){
	$acuerdoInicioc=DB::table('oficios_hechos')
		->join('oficios','oficios.id','=','oficios_hechos.idOficio')
		->where('idTabla',session('carpeta'))
		->where('idOficio',18)
		->count();
	$gralTransporte=DB::table('oficios_hechos')
		->join('oficios','oficios.id','=','oficios_hechos.idOficio')
		->where('idTabla',session('carpeta'))
		->where('idOficio',9)
		->count();
	$caratulaC=DB::table('oficios_hechos')
		->join('oficios','oficios.id','=','oficios_hechos.idOficio')
		->where('idTabla',session('carpeta'))
		->where('idOficio',11)
		->count();
	$policiaMinC=DB::table('oficios_hechos')
		->join('oficios','oficios.id','=','oficios_hechos.idOficio')
		->where('idTabla',session('carpeta'))
		->where('idOficio',12)
		->count();
	$cavdC=DB::table('oficios_hechos')
		->join('oficios','oficios.id','=','oficios_hechos.idOficio')
		->where('idTabla',session('carpeta'))
		->where('idOficio',4)
		->count();
	$actuacionesC=DB::table('oficios_hechos')
		->join('oficios','oficios.id','=','oficios_hechos.idOficio')
		->where('idTabla',session('carpeta'))
		->where('idOficio',13)
		->count();
	$temporalC=DB::table('oficios_hechos')
		->join('oficios','oficios.id','=','oficios_hechos.idOficio')
		->where('idTabla',session('carpeta'))
		->where('idOficio',15)
		->count();
	$finanzasC=DB::table('oficios_hechos')
		->join('oficios','oficios.id','=','oficios_hechos.idOficio')
		->where('idTabla',session('carpeta'))
		->where('idOficio',16)
		->count();

	$data=array(
		'acuerdoInicioc'=>$acuerdoInicioc,
		'gralTransporte'=>$gralTransporte,
		'caratulaC'=>$caratulaC,
		'policiaMinC'=>$policiaMinC,
		'cavdC'=>$cavdC,
		'actuacionesC'=>$actuacionesC,
		'temporalC'=>$temporalC,
		'finanzasC'=>$finanzasC

	);
		return $data;
	}
	

		



function normaliza ($cadena){
	$originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞ
ßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ';
	$modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuy
bsaaaaaaaceeeeiiiidnoooooouuuyybyRr';
	$cadena = utf8_decode($cadena);
	$cadena = strtr($cadena, utf8_decode($originales), $modificadas);
	$cadena = strtolower($cadena);
	return utf8_encode($cadena);
}