<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class stageRequest extends FormRequest
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
            'titre' => 'required|min:3',
            'sujet' => 'required|min:3',
            'user_id' => 'required',
            'date_debut' => 'required',
            'part_id' => 'required',

        ];
    }
}
