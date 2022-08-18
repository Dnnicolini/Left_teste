<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoRequest extends FormRequest
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
            'valor' => 'required',
            'descricao' => 'required',
            'categoria_produtos_id' => 'required',
            'imagem' => '',
            'quantidade'=> 'required|numeric',
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
            'required' => ':attribute é necessário',
        ];
    }
}
