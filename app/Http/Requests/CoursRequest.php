<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CoursRequest extends FormRequest
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
                    'type' => 'required',
                    'description' => 'required'
                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    'label' => 'required',
                    'type' => 'required',
                    'description' => 'required',
                    'nbre_ok' => 'required',
                    'nbre_ko' => 'required',
                    'nbre_vue' => 'required',
                    'en_ligne' => 'required'
                ];
            }
            default:
                break;
        }

        return [

        ];
    }
}
