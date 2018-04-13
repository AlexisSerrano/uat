<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AtencionRequest extends FormRequest
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
            'nombre' => 'required',
            'primer_ap' => 'required',
            'segundo_ap' => 'required',
            'redireccion' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'Introduzca el campo Nombre',
            'primer_ap.required' => 'Introduzca el campo Primer Apellido',
            'segundo_ap.required' => 'Introduzca el campo Segundo Apellido',
            'redireccion.required' => 'Introduzca el campo Modulo de atención',
        ];
    }
}
