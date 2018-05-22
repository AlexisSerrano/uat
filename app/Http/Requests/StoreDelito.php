<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDelito extends FormRequest
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
            'calle' => 'nullable|string|min:1|max:100',
            'numExterno' => 'nullable|string|min:1|max:10',
            'numInterno' => 'nullable|string|min:1|max:10',
            'entreCalle' => 'nullable|string|min:1|max:100',
            'yCalle' => 'nullable|string|min:1|max:100',
            'calleTrasera' => 'nullable|string|min:1|max:100',
            'puntoReferencia' => 'nullable|string|min:4|max:100',

        ];
    }

    public function messages()
    {
        return [
            'nombresQ.boolean' => 'A title is required',
        ];
    }
}
