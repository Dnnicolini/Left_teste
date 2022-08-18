<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
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
            'nome' => 'required',
            'sobrenome' => 'required',
            'telefone' => 'required',
            'email' => 'required|email',
            'data' => 'required|date',
            'documento' => 'required|cpf|unique:clientes,documento,'.$this->id
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
            'documento.unique' => 'CPF já cadastrado',
            'cpf' => 'CPF incorreto',
        ];
    }
}
