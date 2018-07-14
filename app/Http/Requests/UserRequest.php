<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        switch ($this->method()) {
            case 'GET':
            case 'DELETE': {
                return [];
            }
            case 'POST': {
                return [
                    'nom' => 'required|min:3',
                    'numero_cni' => 'required|min:5',
                    'nationalite' => 'required|min:5',
                    'pays' => 'required|min:6',
                    'langue' => 'required|min:6',
                    'email' => 'required|email|unique:users,email',
                    'password' => 'required|between:3,32',
                    'password_confirmation' => 'required|same:password',
                    'telephone' => 'required|min:9'
                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    'nom' => 'required|min:3',
                   // 'login' => 'required|min:6',
                   // 'email' => 'required|unique:users,email',
                    'password' => 'required|between:3,32',
                    'password_confirmation' => 'required|same:password',
                    'telephone' => 'required|min:9'
                ];
            }
            default:
                break;
        }

        return [

        ];
    }
}
