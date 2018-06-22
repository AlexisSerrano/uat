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
            'nombre2' => 'required',
            'fecha_nac' => 'required',
            'telefono' => 'required',
            'idEstado2' => 'required',
            'idMunicipio2' => 'required',
            'idLocalidad2' => 'required',
            'cp2' => 'required',
            'idColonia2' => 'required',
            'calle2' => 'required',
            'numExterno2' => 'required',
            'tipoActa' => 'required',
        ];  
    }

    public function messages()
    {
        return [
            'nombre2.required' => 'Introduzca el campo Nombre',
            'expedido.required' => 'Introduzca el campo Expedido por',
            'fecha_nac.required' => 'Introduzca el campo Fecha de nacimiento',
            'telefono.required' => 'Introduzca el campo Teléfono',
            'idEstado2.required' => 'Introduzca el campo Estado',
            'idMunicipio2.required' => 'Introduzca el campo Municipio',
            'idLocalidad2.required' => 'Introduzca el campo Localidad',
            'cp2.required' => 'Introduzca el campo CP',
            'idColonia2.required' => 'Introduzca el campo Colonia',
            'calle2.required' => 'Introduzca el campo Calle',
            'numExterno2.required' => 'Introduzca el campo Número externo',
            'tipoActa.required' => 'Introduzca el campo Tipo acta'
        ];
    }
}
