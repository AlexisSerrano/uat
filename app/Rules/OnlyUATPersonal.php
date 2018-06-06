<?php

namespace App\Rules;

use Adldap\Models\User as LdapUser;
use Adldap\Laravel\Validation\Rules\Rule;

class OnlyUATPersonal extends Rule
{
    /**
     * Determines if the user is allowed to authenticate.
     *
     * Only allows users in the `Accounting` group to authenticate.
     *
     * @return bool
     */   
    public function isValid()
    {
        
        $accounting4 = 'CN=FCoordinador,OU=UAT,OU=GRUPOS DE APLICACIONES,OU=FGE,DC=fiscaliaveracruz,DC=gob,DC=mx';
        $accounting3 = 'CN=FFacilitador,OU=UAT,OU=GRUPOS DE APLICACIONES,OU=FGE,DC=fiscaliaveracruz,DC=gob,DC=mx';
        $accounting2 = 'CN=FOrientador,OU=UAT,OU=GRUPOS DE APLICACIONES,OU=FGE,DC=fiscaliaveracruz,DC=gob,DC=mx';
        $accounting1 = 'CN=Recepcion,OU=UAT,OU=GRUPOS DE APLICACIONES,OU=FGE,DC=fiscaliaveracruz,DC=gob,DC=mx';
        //dd($this->user);
        
        // $validar1= $this->user->inGroup($accounting3);
        // if ($validar1==true) {
        //     return $validar1;
        // } else {
        //     $validar2= $this->user->inGroup($accounting2);
        //     if ($validar2==true) {
        //         return $validar2;
        //     } else {
        //         $validar3= $this->user->inGroup($accounting);
        //         return $validar3;
        //     }
            
        // }

        $validar4= $this->user->inGroup($accounting4);
        if ($validar4) {
            return $validar4;
        }else{
            $validar4=0;
        }
        $validar3= $this->user->inGroup($accounting3);
        if ($validar3) {
            return $validar3;
        }else{
            $validar3=0;
        } 
        $validar2= $this->user->inGroup($accounting2);
        if ($validar2) {
            return $validar2;
        }else{
            $validar2=0;
        }
        $validar1= $this->user->inGroup($accounting1);
        if ($validar1) {
            return $validar1;
        }else{
            $validar1=0;
        }
        if ($validar1==0||$validar1==0||$validar1==0||$validar1==0) {
            return false;
        }
        
        
        //dd($validar);
        // return $this->user->inGroup($accounting);
    }
}