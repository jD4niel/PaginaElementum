<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IntegrantesValidator extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required|max:255',
            'last_name'=>'required|max:255',
            'email'=>'required|max:255',
            'puesto'=>'required|max:255',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Daniel Acosta',
        ];
    }
}
