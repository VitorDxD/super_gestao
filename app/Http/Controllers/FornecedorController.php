<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedor;

class FornecedorController extends Controller
{
    public function index () {
        return view('app.fornecedor.index');
    }

    public function listar(Request $request) {
        $fornecedores = Fornecedor::where('nome', 'like', '%'.$request->nome.'%')
            ->where('site', 'like', '%'.$request->site.'%')
            ->where('uf', 'like', '%'.$request->uf.'%')
            ->where('email', 'like', '%'.$request->email.'%')
            ->get();

        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores]);
    }

    public function adicionar(Request $request) {
        $msg = '';

        if($request->input('_token')) {
            $configs = [
                'nome' => 'required|min:3|max:40',
                'site' => 'required',
                'uf' => 'required|min:2|max:2',
                'email' => 'email'
            ];
    
            $feedbacks = [
                'required' => 'O campo :attribute é obrigatório',
                'min' => 'O campo :attribute precisa ter no mínimo :min caracteres',
                'max' => 'O campo :attribute precisa ter no máximo :max caracteres',
                'email' => 'O email passado não é válido'
            ];

            $request->validate($configs, $feedbacks);

            $msg = 'Cadastro realizado com sucesso';

            Fornecedor::create($request->all());
        }

        return view('app.fornecedor.adicionar', ['msg' => $msg]);
    }
}
