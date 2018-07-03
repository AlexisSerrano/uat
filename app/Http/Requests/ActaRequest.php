<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActaRequest extends FormRequest
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
            'nombres' => 'string|min:3|max:200',
            'primerAp' => 'string|min:3|max:50',
            'segundoAp' => 'string|min:3|max:50',
            // 'fechaNacimiento' => 'required',
            'telefono' => 'numeric|min:7',
            // 'sexo' => 'required',
            'curp' => 'alpha_num|min:17|max:18',
            'rfc1' => 'alpha_num|min:8|max:13',
            // 'homo1' => 'required',
            'calle' => 'string|min:1|max:100',
            'numExterno' => 'nullable|string|min:1|max:10',
            'numInterno' => 'nullable|string|max:10',
            // 'numDocIdentificacion' => 'required',
            // 'expedido' => 'required',
            'narracion' => 'string|min:5|max:2000',

            'nombres2' => 'string|min:3|max:200',
            // 'fechaAltaEmpresa'
            'rfc2' => 'alpha_num|min:8|max:13',
            // 'homo2'
            'representanteLegal2' => 'nullable|string|min:4|max:100',
            'telefono2' => 'nullable|numeric|min:7',
            'calle2' => 'string|min:1|max:100',
            'numExterno2' => 'nullable|string|min:1|max:10',
            'numInterno2' => 'nullable|string|max:10',
            // 'numDocIdentificacion2',
            'narracion' => 'string|min:5|max:5000',

        ];  
    }

    public function messages()
    {
        return [
        //     'nombres.required' => 'Introduzca el campo Nombre',
        //     'expedido.required' => 'Introduzca el campo Expedido por',
        //     'fechaNacimiento.required' => 'Introduzca el campo Fecha de nacimiento',
        //     'telefono.required' => 'Introduzca el campo Teléfono',
        //     'idEstado2.required' => 'Introduzca el campo Estado',
        //     'idMunicipio2.required' => 'Introduzca el campo Municipio',
        //     'idLocalidad2.required' => 'Introduzca el campo Localidad',
        //     'cp2.required' => 'Introduzca el campo CP',
        //     'idColonia2.required' => 'Introduzca el campo Colonia',
        //     'calle.required' => 'Introduzca el campo Calle',
        //     'numExterno.required' => 'Introduzca el campo Número externo',
        //     'tipoActa.required' => 'Introduzca el campo Tipo acta'
         ];
    }
}
