<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedidasRequest extends FormRequest
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
            'tipoProvidencia' => 'required',
            'quienEjecuta' => 'required',
            'victima' => 'required',
            'fechaInicio' => 'required',
            'fechaFinal' => 'required',
            'ObservacionesM' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'tipoProvidencia.required' => 'Introduzca el campo Providencia precautoria',
            'quienEjecuta.required' => 'Introduzca el campo Ejecutor',
            'victima.required' => 'Introduzca el campo Victima',
            'fechaInicio.required' => 'Introduzca el campo Fecha Incial',
            'fechaFinal.required' => 'Introduzca el campo Fecha final',
            'ObservacionesM.required' => 'Introduzca el campo Observaciones',
        ];
    }
}
