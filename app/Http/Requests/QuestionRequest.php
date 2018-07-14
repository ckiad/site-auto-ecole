<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
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
                    'texte_question' => 'required',
                    //'separateur' => 'required',
                    //'props' => '',
                    'niveau_difficulte' => 'required',
                    'duree_question' => 'required'

                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    'texte_question' => 'required',
                    //'liste_proposition' => 'required',
                    'niveau_difficulte' => 'required',
                    'duree_question' => 'required'
                ];
            }
            default:
                break;
        }

        return [

        ];
    }
}
