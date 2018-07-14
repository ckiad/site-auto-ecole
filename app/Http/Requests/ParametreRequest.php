<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParametreRequest extends FormRequest
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
                    'cle' => 'required',
                    'valeur' => 'required'
                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    'cle' => 'required',
                    'valeur' => 'required'
                ];
            }
            default:
                break;
        }

        return [

        ];
    }
}
