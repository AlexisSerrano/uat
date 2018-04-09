<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SolicitanteRequest extends FormRequest
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
            'file' => 'mimes:doc,docx,pdf|max:2048'
        ];
    }

    public function messages()
    {
        return [
            'file.mimes' => 'Solo se permiten archivos word y pdf',
            'file.max' => 'Su archivo no debe pesar más de 2mb',
        ];
    }
}
