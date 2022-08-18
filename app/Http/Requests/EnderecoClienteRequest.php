<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnderecoClienteRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'cep' => "required",
        'rua' => "required",
        'bairro' => "required",
        'numero' => "required",
        'cidade' => "required",
        'estado' => "required",
        ];
    }

     /**
     * Custom message for validation
     *
     * @return array
     */

    public function messages()
    {
        return [
            
            'required' => 'Preenchimento Obrigatório',
            
        ];
    }
}
