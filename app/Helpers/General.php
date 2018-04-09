<?php
use App\Models\BitacoraSesiones;
use Carbon\Carbon;
/*La siguiente función recibe un usuario, contraseña y grupo al que pertenece en active directory por parámetros, autentifica y devuelve el status: 0 = usuario o contraseña inválidos, 1 = datos correctos pero no pertenece al grupo, 2 = autentificación correcta, 3 = sin autorización, no tiene información en el active*/
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
	if($valoresOld['esEmpresa']==1){
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
	}
	else{
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
	}
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

function countAtencion(){
	$atenciones=DB::table('atenciones')
		->select('id')
		->whereDate('created_at', '=', Carbon::now()->format('Y-m-d'))->get()
		->count();
	return $atenciones;
}