<?php

namespace Database\Factories;

use \App\Models\SiteContato;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SiteContato>
 */
class SiteContatoFactory extends Factory
{
    protected $model = SiteContato::class;

    public function definition(): array
    {
        return [
            'nome' => fake() -> name(),
            'telefone' => fake() -> cellphoneNumber(),
            'email' => fake() -> email(),
            'motivo_contatos_id' => rand(1, 3),
            'mensagem' => fake() -> text(200)
        ];
    }
}
