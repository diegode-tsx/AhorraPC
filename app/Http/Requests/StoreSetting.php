<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSetting extends FormRequest
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
            'actual-password' =>  'required',
            'new_password'=> 'required|confirmed|min:6'
        ];
    }

    public function messages()
    {
        return [
            'actual-password' => 'Campo requerido',
            'new_password' => 'Su nueva contraseña debe incluir al menos 6 digitos'
        ];
    }
}
