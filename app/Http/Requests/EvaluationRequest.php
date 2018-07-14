<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EvaluationRequest extends FormRequest
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
                    'date' => 'required',
                    'formation_id' => 'required'
                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    'label' => 'required',
                    'date' => 'required|date',
                    'formation_id' => 'required'
                ];
            }
            default:
                break;
        }

        return [

        ];
    }
}
