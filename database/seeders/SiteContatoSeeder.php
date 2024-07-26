<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SiteContato;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contato = new SiteContato();
        $contato -> nome = 'Sistema SG';
        $contato -> telefone = '(11) 9999-8888';
        $contato -> email = 'contato@sg.com.br';
        $contato -> motivo_contatos_id = 1;
        $contato -> mensagem = 'Seja bem-vindo ao sistema Super Gestão';
        $contato -> save();

        SiteContato::factory()->count(100)->create();
    }
}
