<?php

namespace App\Handlers;

use App\User as EloquentUser;
use Adldap\Models\User as LdapUser;

class LdapAttributeHandler
{
    /**
     * Synchronizes ldap attributes to the specified model.
     *
     * @param LdapUser     $ldapUser
     * @param EloquentUser $eloquentUser
     *
     * @return void
     */
    public function handle(LdapUser $ldapUser, EloquentUser $eloquentUser)
    {
        $facilitador=0;
        $orientador=0;
        $recepcion=0;
        foreach ($ldapUser->memberof as $grupo) {
        $grupo1 = 'CN=FFacilitador,OU=UAT,OU=GRUPOS DE APLICACIONES,OU=FGE,DC=fiscaliaveracruz,DC=gob,DC=mx';
        $grupo2 = 'CN=FOrientador,OU=UAT,OU=GRUPOS DE APLICACIONES,OU=FGE,DC=fiscaliaveracruz,DC=gob,DC=mx';
        $grupo3 = 'CN=Recepcion,OU=UAT,OU=GRUPOS DE APLICACIONES,OU=FGE,DC=fiscaliaveracruz,DC=gob,DC=mx';
            if ($grupo1==$grupo) {
                $facilitador=1;
            } 
            if ($grupo2==$grupo) {
                $orientador=1;
            } 
            if($grupo3==$grupo){
                $recepcion=1;
            }    
        }

        if ($facilitador==1) {
            $grupoad = 'Facilitador';
        }else{
            if ($orientador==1) {
                $grupoad = 'Orientador';
            }else {
                if ($recepcion==1) {
                    $grupoad = 'Recepcion';
                }
            }
        }
        $texto = array(
            'Sexagésimo-60' => 'sexagesimo',
            'Quincuagésimo noveno-59' => 'quincuagesimo noveno',
            'Quincuagésimo octavo-58' => 'quincuagesimo octavo',
            'Quincuagésimo séptimo-57' => 'quincuagesimo septimo',
            'Quincuagésimo sexto-56' => 'quincuagesimo sexto',
            'Quincuagésimo quinto-55' => 'quincuagesimo quinto',
            'Quincuagésimo cuarto-54' => 'quincuagesimo cuarto',
            'Quincuagésimo tercero-53' => 'quincuagesimo tercero',
            'Quincuagésimo segundo-52' => 'quincuagesimo segundo',
            'Quincuagésimo primero-51' => 'quincuagesimo primero',
            'Quincuagésimo-50' => 'quincuagesimo',
            'Cuadragésimo noveno-49' => 'cuadragesimo noveno',
            'Cuadragésimo octavo-48' => 'cuadragesimo octavo',
            'Cuadragésimo séptimo-47' => 'cuadragesimo septimo',
            'Cuadragésimo sexto-46' => 'cuadragesimo sexto',
            'Cuadragésimo quinto-45' => 'cuadragesimo quinto',
            'Cuadragésimo cuarto-44' => 'cuadragesimo cuarto',
            'Cuadragésimo tercero-43' => 'cuadragesimo tercero',
            'Cuadragésimo segundo-42' => 'cuadragesimo segundo',
            'Cuadragésimo primero-41' => 'cuadragesimo primero',
            'Cuadragésimo-40' => 'cuadragesimo',
            'Trigésimo noveno-39' => 'trigesimo noveno',
            'Trigésimo octavo-38' => 'trigesimo octavo',
            'Trigésimo séptimo-37' => 'trigesimo septimo',
            'Trigésimo sexto-36' => 'trigesimo sexto',
            'Trigésimo quinto-35' => 'trigesimo quinto',
            'Trigésimo cuarto-34' => 'trigesimo cuarto',
            'Trigésimo tercero-33' => 'trigesimo tercero',
            'Trigésimo segundo-32' => 'trigesimo segundo',
            'Trigésimo primero-31' => 'trigesimo primero',
            'Trigésimo-30' => 'trigesimo',
            'Vigésimo noveno-29' => 'vigesimo noveno',
            'Vigésimo octavo-28' => 'vigesimo octavo',
            'Vigésimo séptimo-27' => 'vigesimo septimo',
            'Vigésimo sexto-26' => 'vigesimo sexto',
            'Vigésimo quinto-25' => 'vigesimo quinto',
            'Vigésimo cuarto-24' => 'vigesimo cuarto',
            'Vigésimo tercero-23' => 'vigesimo tercero',
            'Vigésimo segundo-22' => 'vigesimo segundo',
            'Vigésimo primero-21' => 'vigesimo primero',
            'Vigésimo-20' => 'vigesimo',
            'Décimo noveno-19' => 'decimo noveno',
            'Décimo octavo-18' => 'decimo octavo',
            'Décimo séptimo-17' => 'decimo septimo',
            'Décimo sexto-16' => 'decimo sexto',
            'Décimo cuarto-15' => 'decimo quinto',
            'Décimo quinto-14' => 'decimo cuarto',
            'Décimo tercero-13' => 'decimo tercero',
            'Décimo segundo-12' => 'decimo segundo',
            'Décimo primero-11' => 'decimo primero',
            'Décimo-10' => 'decimo',
            'Noveno-9' => 'noveno',
            'Octavo-8' => 'octavo',
            'Séptimo-7' => 'septimo',
            'Sexto-6' => 'sexto',
            'Quinto-5' => 'quinto',
            'Cuarto-4' => 'cuarto',
            'Tercero-3' => 'tercero',
            'Segundo-2' => 'segundo',
            'Primero-1' => 'primero');
        $cadena = $ldapUser->title[0];
        $cadena = normaliza($cadena);
        foreach($texto as $text => $valor){
            if(strpos($cadena, $valor)){
                $numero = $text;
                $arr = explode("-",$numero);
                $letra = $arr[0];
                $numero = $arr[1];
                break;
            }
        }
        // echo $letra."<br>".$numero;
        // dd('intento');
        // dd($ldapUser);
        $eloquentUser->email = $ldapUser->userprincipalname[0];
        $eloquentUser->username  = $ldapUser->samaccountname[0];
        $eloquentUser->nombreC = $ldapUser->cn[0];
        $eloquentUser->nombres = $ldapUser->givenname[0];
        $eloquentUser->apellidos = $ldapUser->sn[0];
        $eloquentUser->idUnidad = $ldapUser->extensionattribute2[0];
        $eloquentUser->grupo = $grupoad;
        $eloquentUser->idZona = $ldapUser->extensionattribute1[0];
        $eloquentUser->puesto = $ldapUser->title[0]." de la ".$ldapUser->department[0];
        $eloquentUser->numFiscal = $numero;
        $eloquentUser->numFiscalLetras = $letra;
    }
}