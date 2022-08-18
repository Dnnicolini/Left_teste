<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nome' => fake()->name(),
            'valor' => fake()->randomNumber(2),
            'quantidade' => fake()->randomNumber(2),
            'created_at' => now(),
            'descricao' => 'testing',
            'imagem' => 'fc87a95633885a819d87b0f65ea54278.png',
            'categoria_produtos_id' => '2',
        ];
    }

}
