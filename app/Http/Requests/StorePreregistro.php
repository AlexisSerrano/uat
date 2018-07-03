<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePreregistro extends FormRequest
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
            /*validacion de empresa*/
            'nombre1' => 'string|min:2|max:200',
            'rfc1' => 'alpha_num|min:8',
            'representanteLegal' => 'string|min:4|max:100',
            'calle1' => 'string|min:1|max:100',
            'numExterno1' => 'nullable|string|min:1',
            'numInterno1' => 'nullable|string|min:1',
            'telefono1' => 'numeric',
            'narracion' => 'string|min:5|max:5000',

            /*validacion de persona*/

            'nombre2' => 'string|min:2|max:200',
            'primerAp' => 'string|min:2|max:50',
            'segundoAp' => 'nullable|string|min:2|max:50',
            'rfc2' => 'alpha_num|min:8',
            'curp' => 'string|min:18|max:20',
            'telefono2' => 'numeric',
            // 'docIdentificacion' => 'string|min:2|max:50',
            'numDocIdentificacion' => 'string|min:2|max:50',
            'calle2' => 'string|min:1|max:100',
            'numExterno2' =>  'nullable|string|min:1',
            'numInterno2' => 'nullable|string|min:1',
          
        ];
    }

    public function messages()
    {
        return [
            'nombresQ.boolean' => 'A title is required',
            'nombre1.min' => 'El  Nombre debe de contener al menos 2 caracteres.',
            'nombre1.max' => 'El  Nombre no debe de contener más 200 caracteres.',
            'rfc1.min' => 'El  RFC debe de contener al menos 8 caracteres.',
            'rfc1.alpha_num' => 'El RFC sólo debe contener letras y números.',
            'representanteLegal.min' => 'El Representante legal debe contener al menos 4 caracteres.',
            'representanteLegal.max' => 'El Representante legal no debe contener más de 100 caracteres.',
            'calle1.min' => 'La Calle debe contener al menos 1 caracter.',
            'calle1.max' => 'La Calle no debe contener más de 100 caracteres.',
            'numExterno1.min' => 'El Número Externo debe contener al menos un caracter.',
            'numExterno1.max' => 'El Número Externo no debe contener más de 10 caracteres.',
            'numInterno1.min' => 'El Número interno debe contener al menos un caracter.',
            'numInterno1.max' => 'El Número interno no debe contener más de 10 caracteres.',
            // 'numInterno1.alpha_num' => 'El campo NUMERO INTERNO no debe contener letras.',
            // 'numExterno1.alpha_num' => 'El campo NUMERO EXTERNO no debe contener letras.',
            'telefono1.numeric' => 'El Teléfono no debe contener letras.',
            'narracion.min' => 'La Descripción de hechos de contener al menos 5 caracteres.',
            'narracion.max' => 'La Descripción de hechos no de contener mas de 5000 caracteres.',



            /*validacion de persona*/
        

            'nombre2.min' => 'El  Nombre debe de contener al menos 2 caracteres.',
            'nombre2.max' => 'El  Nombre no de contener más de 200 caracteres.',
            'primerAp.min' => 'El Primer apellido debe contener al menos 2 caracteres.',
            'primerAp.max' => 'El Primer apellido no debe contener más de 50 caracteres.',
            'SegundoAp.min' => 'El Segundo apellido debe contener al menos 3 caracteres.',
            'SegundoAp.max' => 'El Segundo apellido no debe contener más de 50 caracteres.',
            'rfc2.min' => 'El  RFC debe de contener al menos 8 caracteres.',
            'rfc2.alpha_num' => 'El RFC sólo debe contener letras y números.',
            'curp.min' => 'El CURP no es valido.',
            'curp.max' => 'El CURP no es valido.',
            'telefono2.numeric' => 'El campo Teléfono no puede contener letras.',
            // 'docIdentificacion.min' => 'El campo IDENTIFICACION debe contener al menos 2 caracteres.',
            // 'docIdentificacion.max' => 'El campo IDENTIFICACION no debe contener mas de 50 caracteres.',
            'numDocIdentificacion.min' => 'El Número de identificación debe contener al menos 2 caracteres.',
            'numDocIdentificacion.max' => 'El Número de identificación no debe contener más de 50 caracteres.',
            'calle2.min' => 'La Calle debe contener al menos 1 caracter.',
            'calle2.max' => 'La Calle no debe contener más de 100 caracteres.',
            'numExterno2.min' => 'El Número externo debe contener al menos un caracter.',
            'numExterno2.max' => 'El Número externo no debe contener más de 10 caracteres.',
            'numInterno2.min' => 'El Número interno debe contener al menos un caracter.',
            'numInterno2.max' => 'El Número interno no debe contener más de 10 caracteres.',
            // 'numInterno2.alpha_num' => 'El campo NUMERO INTERNO no debe contener letras.',
            // 'numExterno2.alpha_num' => 'El campo NUMERO EXTERNO no debe contener letras.',

            


        ];
    }
}
