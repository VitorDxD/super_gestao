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
            ],
            1 => [
                'name' => 'Maria',
                'status' => 'N',
                'cnpj' => '000.000.000/00',
            ],
            2 => [
                'name' => 'Ana',
                'status' => 'S',
                'cnpj' => '000.000.000/00',
            ]
        ];

        return view('app.fornecedor', compact('fornecedores'));
    }
}
