<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'nom' => 'required|min:3',
            'login' => 'required|min:6',
            'email' => 'required|email|unique:user,email',
            'password' => 'required|between:3,32',
            'password_confirm' => 'required|same:password',
            'tel' => 'required|min:9'
        ];
    }
}
