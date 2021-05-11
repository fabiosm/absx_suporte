<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketRequest extends FormRequest{
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
            'assunto'=>'required', 
            'descricao'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'assunto.required' => 'Infome o assunto',
            'descricao.required' => 'Informe a descrição',
        ];
    }
}
