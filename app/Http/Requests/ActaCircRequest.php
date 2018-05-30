<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActaCircRequest extends FormRequest
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
            'primerAp' => 'required',
            'segundoAp' => 'required',
            'docIdentificacion' => 'required',
            'numDocIdentificacion' => 'required',
            'fecha_nac' => 'required',
            'telefono' => 'required',
            'idEstado2' => 'required',
            'idMunicipio2' => 'required',
            'idLocalidad2' => 'required',
            'cp2' => 'required',
            'idColonia2' => 'required',
            'calle2' => 'required',
            'numExterno2' => 'required',
            'estadoCivilActa1' => 'required',
            'escActa1' => 'required',
            'ocupActa1' => 'required',
          
        ];
    }
}
