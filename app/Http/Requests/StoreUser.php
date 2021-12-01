<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUser extends FormRequest
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
            'username' => 'string|unique:users|max:16',
            'email' => 'email|unique:users',
            'password' => 'confirmed|min:6',
            'email_confirm' => 'min:12|max:12',
        ];
    }

    public function messages()
    {
        return [
            'username' => 'User is required! Supports 0-16 characters',
            'email' => 'Email is required!',
            'password' => 'Password is required!, Min 6 characters'
        ];
    }

}
