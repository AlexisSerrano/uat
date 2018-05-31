<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLoginActive extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //


            'user' => 'string|min:3|max:200',
            
            


        ];
    }

    public function messages()
    {
        return [
            //'nombresQ.boolean' => 'A title is required',
            'user.min' => 'El Usuario debe de contener al menos 3 caracteres',
            'user.max' => 'El Usuario no debe de contener más 200 caracteres',
        ];
}
}