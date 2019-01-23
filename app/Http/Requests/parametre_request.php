<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class parametre_request extends FormRequest
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
            'propos' => 'required|min:10',
            'lieu' => 'required|min:10',
            'mail' => 'required',
            'tel' => 'required|min:10',
            'fax' => 'required|min:10',
            "logo" => "required",
            'img_lab' => 'required',
            'video_lab' => 'required',
        ];
    }
}
