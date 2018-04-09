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
            'nombre1' => 'string|min:3|max:200',
            'rfc1' => 'alpha_num|rfc|min:10|max:20',
            'representanteLegal' => 'string|min:4|max:100',
            'calle1' => 'string|min:4|max:100',
            'numExterno1' => 'string|min:1|max:9999',
            'numInterno1' => 'string|min:1|max:9999',
            'telefono1' => 'numeric',
            'narracion' => 'string|min:5|max:2000',

            /*validacion de persona*/

            'nombre2' => 'string|min:3|max:200',
            'primerAp' => 'string|min:3|max:50',
            'segundoAp' => 'string|min:3|max:50',
            'rfc2' => 'alpha_num|rfc|min:10|max:20',
            'curp' => 'string|min:18|max:20',
            'telefono2' => 'numeric',
            'docIdentificacion' => 'string|min:2|max:50',
            'numDocIdentificacion' => 'string|min:2|max:50',
            'calle2' => 'string|min:4|max:100',
            'numExterno2' =>  'string|min:1|max:9999',
            'numInterno2' => 'string|min:1|max:9999',
          
        ];
    }

    public function messages()
    {
        return [
            'nombresQ.boolean' => 'A title is required',
            'nombre1.min' => 'El  NOMBRE debe de contener al menos 3 caracteres.',
            'nombre1.max' => 'El  NOMBRE no debe de contener mas 200 caracteres.',
            'rfc1.min' => 'El  RFC debe de contener al menos 10 caracteres.',
            'rfc1.max' => 'El  RFC no debe de contener al menos 20 caracteres.',
            'rfc1.rfc' => 'El RFC no es valido.',
            'rfc1.alpha_num' => 'El RFC sólo debe contener letras y números.',
            'representanteLegal.min' => 'El REPRESENTANTE LEGAL debe contener al menos 4 caracteres.',
            'representanteLegal.max' => 'El REPRESENTANTE LEGAL no debe contener mas de 100 caracteres.',
            'calle1.min' => 'La CALLE debe contener al menos 4 caracteres.',
            'calle1.max' => 'La CALLE no debe contener mas de 100 caracteres.',
            'numExterno1.min' => 'El NUMERO EXTERNO debe contener al menos un caracter.',
            'numExterno1.max' => 'El NUMERO EXTERNO no debe contener mas de 10 caracteres.',
            'numInterno1.min' => 'El NUMERO INTERNO debe contener al menos un caracter.',
            'numInterno1.max' => 'El NUMERO INTERNO no debe contener mas de 10 caracteres.',
            // 'numInterno1.alpha_num' => 'El campo NUMERO INTERNO no debe contener letras.',
            // 'numExterno1.alpha_num' => 'El campo NUMERO EXTERNO no debe contener letras.',
            'telefono1.numeric' => 'El TELEFONO no debe contener letras.',
            'narracion.min' => 'La NARRACION de contener al menos 5 caracteres.',
            'narracion.max' => 'La NARRACION no de contener mas de 2000 caracteres.',



            /*validacion de persona*/
        

            'nombre2.min' => 'El  NOMBRE debe de contener al menos 3 caracteres.',
            'nombre2.max' => 'El  NOMBRE no de contener mas de 200 caracteres.',
            'primerAp.min' => 'El APELLIDO PATERNO debe contener al menos 3 caracteres.',
            'primerAp.min' => 'El APELLIDO PATERNO no debe contener mas de 50 caracteres.',
            'SegundoAp.min' => 'El APELLIDO MATERNO debe contener al menos 3 caracteres.',
            'SegundoAp.min' => 'El APELLIDO MATERNO no debe contener mas de 50 caracteres.',
            'rfc2.min' => 'El  RFC debe de contener al menos 10 caracteres.',
            'rfc2.max' => 'El  RFC no debe de contener al menos 20 caracteres.',
            'rfc2.rfc' => 'El RFC no es valido.',
            'rfc2.alpha_num' => 'El RFC sólo debe contener letras y números.',
            'curp.min' => 'El CURP no es valido.',
            'curp.max' => 'El CURP no es valido.',
            'telefono2.numeric' => 'El campo TELEFONO no puede contener letras.',
            'docIdentificacion.min' => 'El campo IDENTIFICACION debe contener al menos 2 caracteres.',
            'docIdentificacion.max' => 'El campo IDENTIFICACION no debe contener mas de 50 caracteres.',
            'numDocIdentificacion.min' => 'El NUMERO de IDENTIFICACION debe contener al menos 2 caracteres.',
            'numDocIdentificacion.max' => 'El NUMERO de IDENTIFICACION no debe contener mas de 50 caracteres.',
            'calle2.min' => 'La CALLE debe contener al menos 4 caracteres.',
            'calle2.max' => 'La CALLE no debe contener mas de 100 caracteres.',
            'numExterno2.min' => 'El NUMERO EXTERNO debe contener al menos un caracter.',
            'numExterno2.max' => 'El NUMERO EXTERNO no debe contener mas de 10 caracteres.',
            'numInterno2.min' => 'El NUMERO INTERNO debe contener al menos un caracter.',
            'numInterno2.max' => 'El NUMERO INTERNO no debe contener mas de 10 caracteres.',
            // 'numInterno2.alpha_num' => 'El campo NUMERO INTERNO no debe contener letras.',
            // 'numExterno2.alpha_num' => 'El campo NUMERO EXTERNO no debe contener letras.',

            


        ];
    }
}
