<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrancheRequest extends FormRequest
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
                    'montantTranche1' => 'required|min:4',
                    'montantTranche2' => 'min:4',
                    'montantTranche3' => 'min:4'
                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    'montantTranche1' => 'required|min:4',
                    'montantTranche2' => 'min:4',
                    'montantTranche3' => 'min:4'
                ];
            }
            default:
                break;
        }

        return [

        ];
    }
}
