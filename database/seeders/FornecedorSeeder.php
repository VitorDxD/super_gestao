<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $fornecedor1 = new Fornecedor();
        $fornecedor1 -> nome = 'Fornecedor 100';
        $fornecedor1 -> site = 'fornecedor100.com.br';
        $fornecedor1 -> uf = 'SP';
        $fornecedor1 -> email = 'contato@fornecedor100.com.br';
        $fornecedor1 -> save();

        Fornecedor::create([
            'nome' => 'Fornecedor 200',
            'site' => 'fornecedor200.com.br',
            'uf' => 'AL',
            'email' => 'contato@fornecedor200.com.br'
        ]);

        DB::table('fornecedores')->insert([
            'nome' => 'Fornecedor 300',
            'site' => 'fornecedor300.com.br',
            'uf' => 'CE',
            'email' => 'contato@fornecedor300.com.br'
        ]);
    }
}
