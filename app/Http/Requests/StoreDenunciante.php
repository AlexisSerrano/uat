<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDenunciante extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            'nombres2' => 'string|min:3|max:200',
            'rfc2' => 'alpha_num|min:10|max:13',
            'representanteLegal' => 'string|min:4|max:100',
            'calle' => 'string|min:4|max:100',
            'numExterno' => 'string|min:1|max:10',
            'numInterno' => 'nullable|string|max:10',
            'calle3' => 'string|min:4|max:100',
            'numExterno3' => 'string|min:1|max:10',
            'numInterno3' => 'nullable|string|max:10',
            'correo' => 'email',
            'telefonoN' => 'numeric|min:7',
            'fax' => 'numeric',
            'narracion' => 'string|min:5|max:2000',

            'nombres' => 'string|min:3|max:200',
            'primerAp' => 'string|min:3|max:50',
            'segundoAp' => 'string|min:3|max:50',
            'rfc' => 'alpha_num|min:10|max:13',
            'curp' => 'alpha_num|min:17|max:18',
            'telefono' => 'numeric|min:7',
            //'motivoEstancia' => 'string|min:4|max:200',
            'docIdentificacion' => 'string|min:2|max:50',
            'numDocIdentificacion' => 'string|min:2|max:50',
            'lugarTrabajo' => 'string',
            'telefonoTrabajo' => 'numeric|min:7',
            'calle2' => 'string|min:4|max:100',
            'numExterno2' => 'string|min:1|max:10',
            'numInterno2' => 'nullable|string|max:10',
            
        ];
    }

    public function messages()
    {
        return [
            'nombresQ.boolean' => 'A title is required',
            'nombres2.min'=> 'El nombre de la empresa debe contener como minimo 2 letras',
            'nombres2.max'=> 'El nombre de la empresa debe contener como maximo 200 letras',
            'rfc2.alpha_num'=> 'El RFC solo contienen numeros y letras',
            'rfc2.min'=> 'El RFC debe de tener como minimo 10 caracteres',
            'rfc2.max'=> 'El RFC debe de tener como maximo 13 caracteres',
            'representanteLegal.min'=> 'El representante legal debe de tener como minimo 3 caracteres',
            'representanteLegal.max'=> 'El representante legal debe de tener como maximo 100 caracteres',
            'calle.min'=> 'La calle de la direccion personal debe de tener como minimo 4 caracteres',
            'calle.max'=> 'La calle de la direccion personal debe de tener como maximo 100 caracteres',
            'numExterno.max'=> 'El numero externo de la direccion personal debe de tener como maximo 10 caracteres',
            'numInterno.max'=> 'El numero interno de la direccion personal debe de tener como maximo 10 caracteres',
            'telefonoN.numeric'=>'El telefono para notificaciones solo debe de contener numeros',
            'telefonoN.min'=>'El telefono para notificaciones debe de tener como minimo 7 digitos',
            'telefono.numeric'=>'El telefono personal solo debe de contener numeros',
            'telefono.min'=>'El telefono personal debe de tener como minimo 7 digitos',

            'telefonoTrabajo.numeric'=>'El telefono del trabajo solo debe de contener numeros',
            'telefonoTrabajo.min'=>'El telefono del trabajo debe de tener como minimo 7 digitos',
            'calle2.min'=> 'La calle de la direccion del trabajo debe de tener como minimo 4 caracteres',
            'calle2.max'=> 'La calle de la direccion del trabajo debe de tener como maximo 100 caracteres',
            'numExterno2.min'=> 'El numero externo de la direccion del trabajo debe de tener como minimo 1 caracter',
            'numExterno2.max'=> 'El numero externo de la direccion del trabajo debe de tener como maximo 10 caracteres',
            'numExterno3.min'=> 'El numero externo de la direccion del trabajo debe de tener como minimo 1 caracter',
            'numExterno3.max'=> 'El numero externo de la direccion de notificaciones debe de tener como maximo 10 caracteres',
            'numInterno2.max'=> 'El numero interno de la direccion del trabajo debe de tener como maximo 10 caracteres',
            'numInterno3.max'=> 'El numero interno de la direccion de notificaciones debe de tener como maximo 10 caracteres',
            
            'nombres.min'=> 'El nombre debe contener como minimo 3 letras',
            'nombres.max'=> 'El nombre debe contener como maximo 200 letras',
            'primerAp.min'=> 'El primer apellido debe contener como minimo 2 letras',
            'primerAp.max'=> 'El primer apellido debe contener como maximo 200 letras',
            'segundoAp.min'=> 'El segundo apellido debe contener como minimo 2 letras',
            'segundoAp.max'=> 'El segundo apellido debe contener como maximo 200 letras',
            
            'rfc.alpha_num'=> 'El RFC solo contienen numeros y letras',
            'rfc.min'=> 'El RFC debe de tener como minimo 10',
            'rfc.max'=> 'El RFC debe de tener como maximo 13',
            'curp.alpha_num'=> 'El CURP solo contienen numeros y letras',
            'curp.min'=> 'El CURP debe de tener como minimo 17',
            'curp.max'=> 'El CURP debe de tener como maximo 18',
            'calle3.min'=> 'La calle de la direccion de notificaciones debe de tener como minimo 4 caracteres',
            'calle3.max'=> 'La calle de la direccion de notificaciones debe de tener como maximo 100 caracteres',
            'numExterno3.min'=> 'El numero interno de la direccion de notificaciones debe de tener como minimo 1 caracter',
            'numExterno3.max'=> 'El numero interno de la direccion de notificaciones debe de tener como maximo 10 caracteres',
        ];
    }
}
