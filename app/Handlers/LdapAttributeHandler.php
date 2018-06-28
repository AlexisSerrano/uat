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
        $cordinador=0;
        // dd($ldapUser);
        if(!is_null($ldapUser->memberof)){

            foreach ($ldapUser->memberof as $grupo) {
                $grupo1 = 'CN=FFacilitador,OU=UAT,OU=GRUPOS DE APLICACIONES,OU=FGE,DC=fiscaliaveracruz,DC=gob,DC=mx';
                $grupo2 = 'CN=FOrientador,OU=UAT,OU=GRUPOS DE APLICACIONES,OU=FGE,DC=fiscaliaveracruz,DC=gob,DC=mx';
                $grupo3 = 'CN=Recepcion,OU=UAT,OU=GRUPOS DE APLICACIONES,OU=FGE,DC=fiscaliaveracruz,DC=gob,DC=mx';
                $grupo4 = 'CN=FCoordinador,OU=UAT,OU=GRUPOS DE APLICACIONES,OU=FGE,DC=fiscaliaveracruz,DC=gob,DC=mx';
                if ($grupo1==$grupo) {
                    $facilitador=1;
                }
                if ($grupo2==$grupo) {
                    $orientador=1;
                } 
                if($grupo3==$grupo){
                    $recepcion=1;
                }
                if($grupo4==$grupo){
                    $cordinador=1;
                }    
            }
        }
        // dd($facilitador);
        if ($cordinador==1) {
            $grupoad = 'coordinador';
        }else{
            if ($facilitador==1) {
                $grupoad = 'facilitador';
            }else{
                if ($orientador==1) {
                    $grupoad = 'orientador';
                }else{
                    if ($recepcion==1) {
                        $grupoad = 'recepcion';
                    }else{
                        return redirect(route('login'));
                    }
                }

            }

        }

        $texto = array(
            'Recepcion-0' => 'recepcion',
            'Coordinador-0' => 'coordinador',
            'Coordinadora-0' => 'coordinadora',
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
            
            'Quincuagésimo noveno-59' => 'quincuagesimonoveno',
            'Quincuagésimo octavo-58' => 'quincuagesimooctavo',
            'Quincuagésimo séptimo-57' => 'quincuagesimoseptimo',
            'Quincuagésimo sexto-56' => 'quincuagesimosexto',
            'Quincuagésimo quinto-55' => 'quincuagesimoquinto',
            'Quincuagésimo cuarto-54' => 'quincuagesimocuarto',
            'Quincuagésimo tercero-53' => 'quincuagesimotercero',
            'Quincuagésimo segundo-52' => 'quincuagesimosegundo',
            'Quincuagésimo primero-51' => 'quincuagesimoprimero',
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

            'Cuadragésimo noveno-49' => 'cuadragesimonoveno',
            'Cuadragésimo octavo-48' => 'cuadragesimooctavo',
            'Cuadragésimo séptimo-47' => 'cuadragesimoseptimo',
            'Cuadragésimo sexto-46' => 'cuadragesimosexto',
            'Cuadragésimo quinto-45' => 'cuadragesimoquinto',
            'Cuadragésimo cuarto-44' => 'cuadragesimocuarto',
            'Cuadragésimo tercero-43' => 'cuadragesimotercero',
            'Cuadragésimo segundo-42' => 'cuadragesimosegundo',
            'Cuadragésimo primero-41' => 'cuadragesimoprimero',
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
            
            'Trigésimo noveno-39' => 'trigesimonoveno',
            'Trigésimo octavo-38' => 'trigesimooctavo',
            'Trigésimo séptimo-37' => 'trigesimoseptimo',
            'Trigésimo sexto-36' => 'trigesimosexto',
            'Trigésimo quinto-35' => 'trigesimoquinto',
            'Trigésimo cuarto-34' => 'trigesimocuarto',
            'Trigésimo tercero-33' => 'trigesimotercero',
            'Trigésimo segundo-32' => 'trigesimosegundo',
            'Trigésimo primero-31' => 'trigesimoprimero',
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

            'Vigésimo noveno-29' => 'vigesimonoveno',
            'Vigésimo octavo-28' => 'vigesimooctavo',
            'Vigésimo séptimo-27' => 'vigesimoseptimo',
            'Vigésimo sexto-26' => 'vigesimosexto',
            'Vigésimo quinto-25' => 'vigesimoquinto',
            'Vigésimo cuarto-24' => 'vigesimocuarto',
            'Vigésimo tercero-23' => 'vigesimotercero',
            'Vigésimo segundo-22' => 'vigesimosegundo',
            'Vigésimo primero-21' => 'vigesimoprimero',
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
            
            'Décimo noveno-19' => 'decimonoveno',
            'Décimo octavo-18' => 'decimooctavo',
            'Décimo séptimo-17' => 'decimoseptimo',
            'Décimo sexto-16' => 'decimosexto',
            'Décimo cuarto-15' => 'decimoquinto',
            'Décimo quinto-14' => 'decimocuarto',
            'Décimo tercero-13' => 'decimotercero',
            'Décimo segundo-12' => 'decimosegundo',
            'Décimo primero-11' => 'decimoprimero',
            'Décimo-10' => 'decimo',
            'Noveno-9' => 'noveno',
            'Octavo-8' => 'octavo',
            'Séptimo-7' => 'septimo',
            'Sexto-6' => 'sexto',
            'Quinto-5' => 'quinto',
            'Cuarto-4' => 'cuarto',
            'Tercero-3' => 'tercero',
            'Segundo-2' => 'segundo',
            'Primero-1' => 'primero',
            'Sexagésima-60' => 'sexagesima',
            'Quincuagésima novena-59' => 'quincuagesima novena',
            'Quincuagésima octava-58' => 'quincuagesima octava',
            'Quincuagésima séptima-57' => 'quincuagesima septima',
            'Quincuagésima sexta-56' => 'quincuagesima sexta',
            'Quincuagésima quinta-55' => 'quincuagesima quinta',
            'Quincuagésima cuarta-54' => 'quincuagesima cuarta',
            'Quincuagésima tercera-53' => 'quincuagesima tercera',
            'Quincuagésima segunda-52' => 'quincuagesima segunda',
            'Quincuagésima primera-51' => 'quincuagesima primera',
            
            'Quincuagésima novena-59' => 'quincuagesimanovena',
            'Quincuagésima octava-58' => 'quincuagesimaoctava',
            'Quincuagésima séptima-57' => 'quincuagesimaseptima',
            'Quincuagésima sexta-56' => 'quincuagesimasexta',
            'Quincuagésima quinta-55' => 'quincuagesimaquinta',
            'Quincuagésima cuarta-54' => 'quincuagesimacuarta',
            'Quincuagésima tercera-53' => 'quincuagesimatercera',
            'Quincuagésima segunda-52' => 'quincuagesimasegunda',
            'Quincuagésima primera-51' => 'quincuagesimaprimera',
            'Quincuagésima-50' => 'quincuagesima',
            'Cuadragésima novena-49' => 'cuadragesima novena',
            'Cuadragésima octava-48' => 'cuadragesima octava',
            'Cuadragésima séptima-47' => 'cuadragesima septima',
            'Cuadragésima sexta-46' => 'cuadragesima sexta',
            'Cuadragésima quinta-45' => 'cuadragesima quinta',
            'Cuadragésima cuarta-44' => 'cuadragesima cuarta',
            'Cuadragésima tercera-43' => 'cuadragesima tercera',
            'Cuadragésima segunda-42' => 'cuadragesima segunda',
            'Cuadragésima primera-41' => 'cuadragesima primera',

            'Cuadragésima novena-49' => 'cuadragesimanovena',
            'Cuadragésima octava-48' => 'cuadragesimaoctava',
            'Cuadragésima séptima-47' => 'cuadragesimaseptima',
            'Cuadragésima sexta-46' => 'cuadragesimasexta',
            'Cuadragésima quinta-45' => 'cuadragesimaquinta',
            'Cuadragésima cuarta-44' => 'cuadragesimacuarta',
            'Cuadragésima tercera-43' => 'cuadragesimatercera',
            'Cuadragésima segunda-42' => 'cuadragesimasegunda',
            'Cuadragésima primera-41' => 'cuadragesimaprimera',
            'Cuadragésima-40' => 'cuadragesima',
            'Trigésima novena-39' => 'trigesima novena',
            'Trigésima octava-38' => 'trigesima octava',
            'Trigésima séptima-37' => 'trigesima septima',
            'Trigésima sexta-36' => 'trigesima sexta',
            'Trigésima quinta-35' => 'trigesima quinta',
            'Trigésima cuarta-34' => 'trigesima cuarta',
            'Trigésima tercera-33' => 'trigesima tercera',
            'Trigésima segunda-32' => 'trigesima segunda',
            'Trigésima primera-31' => 'trigesima primera',
            
            'Trigésima novena-39' => 'trigesimanovena',
            'Trigésima octava-38' => 'trigesimaoctava',
            'Trigésima séptima-37' => 'trigesimaseptima',
            'Trigésima sexta-36' => 'trigesimasexta',
            'Trigésima quinta-35' => 'trigesimaquinta',
            'Trigésima cuarta-34' => 'trigesimacuarta',
            'Trigésima tercera-33' => 'trigesimatercera',
            'Trigésima segunda-32' => 'trigesimasegunda',
            'Trigésima primera-31' => 'trigesimaprimera',
            'Trigésima-30' => 'trigesima',
            'Vigésima novena-29' => 'vigesima novena',
            'Vigésima octava-28' => 'vigesima octava',
            'Vigésima séptima-27' => 'vigesima septima',
            'Vigésima sexta-26' => 'vigesima sexta',
            'Vigésima quinta-25' => 'vigesima quinta',
            'Vigésima cuarta-24' => 'vigesima cuarta',
            'Vigésima tercera-23' => 'vigesima tercera',
            'Vigésima segunda-22' => 'vigesima segunda',
            'Vigésima primera-21' => 'vigesima primera',

            'Vigésima novena-29' => 'vigesimasnovena',
            'Vigésima octava-28' => 'vigesimasoctava',
            'Vigésima séptima-27' => 'vigesimasseptima',
            'Vigésima sexta-26' => 'vigesimassexta',
            'Vigésima quinta-25' => 'vigesimasquinta',
            'Vigésima cuarta-24' => 'vigesimascuarta',
            'Vigésima tercera-23' => 'vigesimastercera',
            'Vigésima segunda-22' => 'vigesimassegunda',
            'Vigésima primera-21' => 'vigesimasprimera',
            'Vigésima-20' => 'vigesima',
            'Décima novena-19' => 'decima novena',
            'Décima octava-18' => 'decima octava',
            'Décima séptima-17' => 'decima septima',
            'Décima sexta-16' => 'decima sexta',
            'Décima cuarta-15' => 'decima quinta',
            'Décima quinta-14' => 'decima cuarta',
            'Décima tercera-13' => 'decima tercera',
            'Décima segunda-12' => 'decima segunda',
            'Décima primera-11' => 'decima primera',
            
            'Décima noveno-19' => 'decimanovena',
            'Décima octavo-18' => 'decimaoctava',
            'Décima séptimo-17' => 'decimaseptima',
            'Décima sexto-16' => 'decimasexta',
            'Décima cuarto-15' => 'decimaquinta',
            'Décima quinto-14' => 'decimacuarta',
            'Décima tercero-13' => 'decimatercera',
            'Décima segundo-12' => 'decimasegunda',
            'Décima primero-11' => 'decimaprimera',
            'Décima-10' => 'decima',
            'Novena-9' => 'novena',
            'Octava-8' => 'octava',
            'Séptima-7' => 'septima',
            'Sexta-6' => 'sexta',
            'Quinta-5' => 'quinta',
            'Cuarta-4' => 'cuarta',
            'Tercera-3' => 'tercera',
            'Segunda-2' => 'segunda',
            'Primera-1' => 'primera'
        );

        //sacar el numero del fiscal en numero y letra
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
        //guardar los atributos del usuatio en la base de datos
        $eloquentUser->email = $ldapUser->userprincipalname[0];
        $eloquentUser->username  = $ldapUser->samaccountname[0];
        $eloquentUser->nombreC = $ldapUser->cn[0];
        $eloquentUser->nombres = $ldapUser->givenname[0];
        $eloquentUser->apellidos = $ldapUser->sn[0];
        $eloquentUser->idUnidad = $ldapUser->extensionattribute2[0];
        $eloquentUser->grupo = $grupoad;
        $eloquentUser->grecepcion = $recepcion;
        $eloquentUser->gorientador = $orientador;
        $eloquentUser->gfacilitador = $facilitador;
        $eloquentUser->gcoordinador = $cordinador;
        $eloquentUser->idZona = $ldapUser->extensionattribute1[0];
        $eloquentUser->puesto = $ldapUser->title[0]." de la ".$ldapUser->department[0];
        if(isset($numero)&&isset($letra)){
            $eloquentUser->numFiscal = $numero;
            $eloquentUser->numFiscalLetras = $letra;
        }else{
            $eloquentUser->numFiscal = 0;
            $eloquentUser->numFiscalLetras = "Sin numero";
        }
    }
}