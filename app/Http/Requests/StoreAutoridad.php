<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAutoridad extends FormRequest
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
                
            'nombres' => 'string|min:3|max:50',
            'primerAp' => 'string|min:3|max:50',
            'primerAp' => 'string|min:3|max:50',
            'rfc' => 'string|min:10|max:20',
            'curp' => 'string|min:17|max:18',
            'fechaNacimiento' => 'date',
            'telefono' => 'numeric',
            'motivoEstancia' => 'string|min:4|max:200',
            'docIdentificacion' => 'string|min:2|max:50',
            'numDocIdentificacion' => 'string|min:2|max:50',
            'calle' => 'string|min:4|max:100',
            'numExterno' => 'string|min:1|max:10',
            'numInterno' => 'nullable|string|min:1|max:10',
            'lugarTrabajo' => 'string',
            'telefonoTrabajo' => 'numeric',
            'calle2' => 'string|min:4|max:100',
            'numExterno2' => 'string|min:1|max:10',
            'numInterno2' => 'nullable|string|min:1|max:10',
            'horarioLaboral' => 'string',
            'narracion' => 'string|min:5|max:2000',
        ];
    }

    public function messages()
    {
        return [
            'nombresQ.boolean' => 'A title is required',
        ];
    }
}
