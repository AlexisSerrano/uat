<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDenunciado extends FormRequest
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
            'nombresQ' => 'string',

            'nombresC' => 'nullable|string|min:3|max:50',
            'primerApC' => 'nullable|string|min:3|max:50',
            'aliasC' => 'string|min:1|max:50',
            'calleC' => 'nullable|string|min:1|max:100',
            'numExternoC' => 'nullable|string|min:1|max:10',
            'numInternoC' => 'nullable|string|min:1|max:10',
            'narracionC' => 'string|min:5|max:2000',
            
            'nombres2' => 'string|min:3|max:50',
            'rfc2' => 'alpha_num|min:8|max:20',
            'representanteLegal' => 'string|min:4|max:100',
            'calle' => 'string|min:1|max:100',
            'numExterno' => 'nullable|string|min:1|max:10',
            'numInterno' => 'nullable|string|min:1|max:10',
            'calle3' => 'string|min:1|max:100',
            'numExterno3' => 'nullable|string|min:1|max:10',
            'numInterno3' => 'nullable|string|min:1|max:10',
            'correo' => 'nullable|email',
            'telefonoN' => 'numeric|min:7',
            // 'fax' => 'nullable|numeric',
            'senasPartic' => 'string|min:1|max:150',
            'narracion' => 'string|min:5|max:2000',

            'nombres' => 'string|min:3|max:50',
            'primerAp' => 'string|min:3|max:50',
            'primerAp' => 'string|min:3|max:50',
            'rfc' => 'alpha_num|min:8|max:20',
            'curp' => 'alpha_num|min:17|max:18',
            'telefono' => 'nullable|numeric|min:7',
            'motivoEstancia' => 'nullable|string|min:4|max:200',
            'telefonoTrabajo' => 'nullable|numeric',
            'docIdentificacion' => 'string|min:2|max:200',
            'numDocIdentificacion' => 'string|min:2|max:50',
            'lugarTrabajo' => 'string',
            'calle2' => 'string|min:4|max:100',
            'numExterno2' => 'nullable|string|min:1|max:10',
            'numInterno2' => 'nullable|string|min:1|max:10',
            'alias' => 'string|min:1|max:50',
            'ingreso' => 'numeric',
            'residenciaAnterior' => 'nullable|string|min:4|max:100',
            'vestimenta' => 'string|min:4|max:150',
        ];
    }

    public function messages()
    {
        return [
            'nombresQ.string' => 'El nombre Q.R.R. debe ser alfabético',
            'nombres2.min'=> 'El Nombre de la empresa debe contener como mínimo 2 letras',
            'nombres2.max'=> 'El Nombre de la empresa debe contener como máximo 200 letras',
            'rfc2.alpha_num'=> 'El RFC solo contienen números y letras',
            'rfc2.min'=> 'El RFC debe de tener como mínimo 8 caracteres',
            'rfc2.max'=> 'El RFC debe de tener como máximo 13 caracteres',
            'representanteLegal.min'=> 'El Representante legal debe de tener como mínimo 3 caracteres',
            'representanteLegal.max'=> 'El Representante legal debe de tener como máximo 100 caracteres',
            'calle.min'=> 'La Calle de la dirección personal debe de tener como mínimo 1 caracter',
            'calle.max'=> 'La Calle de la dirección personal debe de tener como máximo 100 caracteres',
            'calleC.min'=> 'La Calle de la dirección conocida debe de tener como mínimo 1 caracter',
            'calleC.max'=> 'La Calle de la dirección conocida debe de tener como máximo 100 caracteres',
            'numExterno.max'=> 'El Número externo de la dirección personal debe de tener como máximo 10 caracteres',
            'numExterno.min'=> 'El Número externo de la dirección personal debe de tener como mínimo 1 caracter',
            'numExternoC.max'=> 'El Número externo de la dirección conocida debe de tener como máximo 10 caracteres',
            'numExternoC.min'=> 'El Número externo de la dirección conocida debe de tener como mínimo 1 caracter',
            'telefonoN.numeric'=>'El Teléfono para notificaciones solo debe de contener números',
            'telefonoN.min'=>'El Teléfono para notificaciones debe de tener como mínimo 7 dígitos',
            'telefono.numeric'=>'El Teléfono personal solo debe de contener números',
            'telefono.min'=>'El Teléfono personal debe de tener como mínimo 7 dígitos',
            
            'telefonoTrabajo.numeric'=>'El Teléfono del trabajo solo debe de contener números',
            'telefonoTrabajo.min'=>'El Teléfono del trabajo debe de tener como mínimo 7 dígitos',
            'telefonoTrabajo.max'=>'El Teléfono del trabajo debe de tener como máximo 13 dígitos',
            'calle2.min'=> 'La Calle de la dirección del trabajo debe de tener como mínimo 1 carácter',
            'calle2.max'=> 'La Calle de la dirección del trabajo debe de tener como máximo 100 carácteres',
            'numExterno2.min'=> 'El Número interno de la dirección del trabajo debe de tener como mínimo 1 carácter',
            'numExterno2.max'=> 'El Número interno de la dirección del trabajo debe de tener como máximo 10 caracteres',
            'numExterno.max'=> 'El Número interno de la dirección personal debe de tener como máximo 10 caracteres',
            'numExterno2.max'=> 'El Número interno de la dirección del trabajo debe de tener como máximo 10 caracteres',
            'numExterno3.max'=> 'El Número interno de la dirección de notificaciones debe de tener como máximo 10 caracteres',
            
            'nombres.min'=> 'El Nombre debe contener como mínimo 3 letras',
            'nombres.max'=> 'El Nombre debe contener como máximo 200 letras',
            // 'nombresC.min'=> 'El nombre del conocido debe contener como mínimo 3 letras',
            // 'nombresC.max'=> 'El nombre del conocido debe contener como máximo 200 letras',
            'alias.min'=> 'El Alias debe contener como mínimo 3 letras',
            'alias.max'=> 'El Alias debe contener como máximo 200 letras',
            'aliasC.min'=> 'El Alias conocido debe contener como mínimo 3 letras',
            'aliasC.max'=> 'El Alias conocido debe contener como máximo 200 letras',
            'primerAp.min'=> 'El Primer apellido debe contener como mínimo 2 letras',
            'primerAp.max'=> 'El Primer apellido debe contener como máximo 200 letras',
            // 'primerApC.min'=> 'El primer apellido conocido debe contener como mínimo 2 letras',
            // 'primerApC.max'=> 'El primer apellido conocido debe contener como máximo 200 letras',
            // 'segundoAp.min'=> 'El segundo apellido debe contener como mínimo 2 letras',
            // 'segundoAp.max'=> 'El segundo apellido debe contener como máximo 200 letras',
            // 'segundoApC.min'=> 'El segundo apellido conocido debe contener como mínimo 2 letras',
            // 'segundoApC.max'=> 'El segundo apellido conocido debe contener como máximo 200 letras',
            
            'rfc.alpha_num'=> 'El RFC solo contienen números y letras',
            'rfc.min'=> 'El RFC debe de tener como mínimo 10',
            'rfc.max'=> 'El RFC debe de tener como máximo 13',
            'curp.alpha_num'=> 'El CURP solo contienen números y letras',
            'curp.min'=> 'El CURP debe de tener como mínimo 17',
            'curp.max'=> 'El CURP debe de tener como máximo 18',
            'calle3.min'=> 'La Calle de la dirección de notificaciones debe de tener como mínimo 1 caracter',
            'calle3.max'=> 'La Calle de la dirección de notificaciones debe de tener como máximo 100 caracteres',
            'numExterno3.min'=> 'El Número interno de la dirección de notificaciones debe de tener como mínimo 1 carácter',
            'numExterno3.max'=> 'El Número interno de la dirección de notificaciones debe de tener como máximo 10 caracteres',
        ];
    }
}
