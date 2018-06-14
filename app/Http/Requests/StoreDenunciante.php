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
            'rfc2' => 'alpha_num|min:8|max:13',
            'representanteLegal' => 'string|min:4|max:100',
            'calle' => 'string|min:1|max:100',
            'numExterno' => 'nullable|string|min:1|max:10',
            'numInterno' => 'nullable|string|max:10',
            'calle3' => 'string|min:1|max:100',
            'numExterno3' => 'nullable|string|min:1|max:10',
            'numInterno3' => 'nullable|string|max:10',
           // 'correo' => 'nullable|email',
            'telefonoN' => 'numeric|min:7',
            // 'fax' => 'numeric',
            'narracion' => 'string|min:5|max:2000',

            'nombres' => 'string|min:3|max:200',
            'primerAp' => 'string|min:3|max:50',
            // 'segundoAp' => 'string|min:3|max:50',
            'rfc' => 'alpha_num|min:8|max:13',
            'curp' => 'alpha_num|min:17|max:18',
            'telefono' => 'numeric|min:7',
            //'motivoEstancia' => 'string|min:4|max:200',
            'docIdentificacion' => 'string|min:2|max:200',
            'numDocIdentificacion' => 'string|min:2|max:50',
            'lugarTrabajo' => 'string',
            'telefonoTrabajo' => 'numeric|min:7',
            'calle2' => 'string|min:1|max:100',
            'numExterno2' => 'nullable|string|min:1|max:10',
            'numInterno2' => 'nullable|string|max:10',
            
        ];
    }

    public function messages()
    {
        return [
            'nombresQ.boolean' => 'A title is required',
            'nombres2.min'=> 'El Nombre de la empresa debe contener como mínimo 2 letras',
            'nombres2.max'=> 'El Nombre de la empresa debe contener como máximo 200 letras',
            'rfc2.alpha_num'=> 'El RFC solo contienen números y letras',
            'rfc2.min'=> 'El RFC debe de tener como mínimo 8 caracteres',
            'rfc2.max'=> 'El RFC debe de tener como máximo 13 caracteres',
            'representanteLegal.min'=> 'El Representante legal debe de tener como mínimo 3 caracteres',
            'representanteLegal.max'=> 'El Representante legal debe de tener como máximo 100 caracteres',
            'calle.min'=> 'La calle de la Dirección personal debe de tener como mínimo 1 caracteres',
            'calle.max'=> 'La calle de la dirección personal debe de tener como máximo 100 caracteres',
            'numExterno.max'=> 'El Número externo de la dirección personal debe de tener como máximo 10 caracteres',
            'numInterno.max'=> 'El Número interno de la dirección personal debe de tener como máximo 10 caracteres',
            'teléfonoN.numeric'=>'El Teléfono para notificaciones solo debe de contener números',
            'telefonoN.min'=>'El Teléfono para notificaciones debe de tener como mínimo 7 digitos',
            'telefono.numeric'=>'El Teléfono personal solo debe de contener números',
            'telefono.min'=>'El Teléfono personal debe de tener como mínimo 7 digitos',

            'telefonoTrabajo.numeric'=>'El Teléfono del trabajo solo debe de contener números',
            'telefonoTrabajo.min'=>'El Teléfono del trabajo debe de tener como mínimo 7 digitos',
            'calle2.min'=> 'La Calle de la dirección del trabajo debe de tener como mínimo 1 caracteres',
            'calle2.max'=> 'La Calle de la dirección del trabajo debe de tener como máximo 100 caracteres',
            'numExterno2.min'=> 'El Número externo de la dirección del trabajo debe de tener como mínimo 1 carácter',
            'numExterno2.max'=> 'El Número externo de la dirección del trabajo debe de tener como máximo 10 caracteres',
            'numExterno3.min'=> 'El Número externo de la dirección del trabajo debe de tener como mínimo 1 carácter',
            'numExterno3.max'=> 'El Número externo de la dirección de notificaciones debe de tener como máximo 10 caracteres',
            'numInterno2.max'=> 'El Número interno de la dirección del trabajo debe de tener como máximo 10 caracteres',
            'numInterno3.max'=> 'El Número interno de la dirección de notificaciones debe de tener como máximo 10 caracteres',
            
            'nombres.min'=> 'El Nombre debe contener como mínimo 3 letras',
            'nombres.max'=> 'El Nombre debe contener como máximo 200 letras',
            'primerAp.min'=> 'El Primer apellido debe contener como mínimo 2 letras',
            'primerAp.max'=> 'El Primer apellido debe contener como máximo 200 letras',
            // 'segundoAp.min'=> 'El segundo apellido debe contener como mínimo 2 letras',
            // 'segundoAp.max'=> 'El segundo apellido debe contener como máximo 200 letras',
            
            'rfc.alpha_num'=> 'El RFC solo contienen números y letras',
            'rfc.min'=> 'El RFC debe de tener como mínimo 8',
            'rfc.max'=> 'El RFC debe de tener como máximo 13',
            'curp.alpha_num'=> 'El CURP solo contienen números y letras',
            'curp.min'=> 'El CURP debe de tener como mínimo 17',
            'curp.max'=> 'El CURP debe de tener como máximo 18',
            'calle3.min'=> 'La Calle de la dirección de notificaciones debe de tener como mínimo 1 caracteres',
            'calle3.max'=> 'La Calle de la dirección de notificaciones debe de tener como máximo 100 caracteres',
            'numExterno3.min'=> 'El número interno de la dirección de notificaciones debe de tener como mínimo 1 caracter',
            'numExterno3.max'=> 'El número interno de la dirección de notificaciones debe de tener como máximo 10 caracteres',
            'narracion.min'=> 'El campo Descripción de hechos debe contener como mínimo 5 caracteres',
            'narracion.max'=> 'El campo Descripción de hechos debe contener como máximo 2000 caracteres',
        ];
    }
}
