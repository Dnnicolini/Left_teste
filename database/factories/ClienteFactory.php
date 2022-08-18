<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ClienteFactory extends Factory
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
            'sobrenome' => 'teste',
            'email' => fake()->email(),
            'telefone' => fake()->randomNumber(2),
            'documento' => fake()->randomNumber(2),
            'data' => fake()->date(),
            'created_at' => now(),
        
            

        ];
    }

}
