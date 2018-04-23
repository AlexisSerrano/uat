<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AcusacionRequest extends FormRequest
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
            'idDenunciante' => 'required',
            'idTipifDelito' => 'required',
            'idDenunciado' => 'required',
        ];
    }

    
    public function messages()
    {
        return [
            'idDenunciante.required' => 'Seleccione denunciante ',
            'idTipifDelito.required' => 'Seleccione delito',
            'idDenunciado.required' => 'Seleccione denunciado',
          
        ];
    }
}
