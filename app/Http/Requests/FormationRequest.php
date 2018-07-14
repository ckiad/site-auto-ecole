<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormationRequest extends FormRequest
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
                    'label' => 'required',
                    'description' => 'required',
                    'montant' => 'required|min:4',
                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    'label' => 'required',
                    'description' => 'required',
                    'montant' => 'required|min:4'
                ];
            }
            default:
                break;
        }

        return [

        ];
    }
}
