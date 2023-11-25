<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index () {
        $fornecedores = [
            0 => [
                'name' => 'João',
                'status' => 'S',
                'ddd' => '82',
                'telefone' => '0000-0000'
            ],
            1 => [
                'name' => 'Maria',
                'status' => 'N',
                'cnpj' => '000.000.000/00',
                'ddd' => '85',
                'telefone' => '0000-0000'
            ],
            2 => [
                'name' => 'Ana',
                'status' => 'S',
                'cnpj' => '000.000.000/00',
                'ddd' => '11',
                'telefone' => '0000-0000'
            ]
        ];

        return view('app.fornecedor', compact('fornecedores'));
    }
}
