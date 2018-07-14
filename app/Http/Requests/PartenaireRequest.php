<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PartenaireRequest extends FormRequest
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
                    'email' => 'email',
                    'mon_lien_invitation' => 'required',
                    'telephone' => 'min:9'
                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    'email' => 'email',
                    'mon_lien_invitation' => 'required',
                    'telephone' => 'min:9'
                ];
            }
            default:
                break;
        }

        return [

        ];
    }
}
