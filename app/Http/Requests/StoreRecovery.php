<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRecovery extends FormRequest
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
            'token'=>'required',
            'new_password'=>'required|confirmed|min:6',

        ];
    }

    public function messages()
    {
        return [
            
            'token'=>'Debe ingresar su codigo para cambiar su contraseña',
            'new_password' => 'Su nueva contraseña debe incluir al menos 6 digitos'
        ];
    }
}
