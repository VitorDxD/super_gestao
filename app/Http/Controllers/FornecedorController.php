<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index () {
        $fornecedores = [
            0 => ['name' => 'João', 'status' => 'N'],
            1 => ['name' => 'Maria', 'status' => 'N'],
            2 => ['name' => 'Ana', 'status' => 'S'],
        ];

        return view('app.fornecedor', compact('fornecedores'));
    }
}
