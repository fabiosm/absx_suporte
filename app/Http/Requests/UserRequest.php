<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(){
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
            'name'=>'required', 
            'email'=>'required',
            'telefone'=>'required'
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Infome o nome',
            'email.required' => 'Informe o e-mail',
            'telefone.required' => 'Informe a telefone',
        ];
    }
}
