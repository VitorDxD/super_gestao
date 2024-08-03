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
            ->paginate(2);

        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores, 'request' => $request->all()]);
    }

    public function adicionar(Request $request) {
        $msg = '';

        // cadastrar
        if($request->input('_token') && $request->input('id') == '') {
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

        // atualizar
        if($request->input('_token') && $request->input('id') != '') {
            $fornecedor = Fornecedor::find($request->input('id'));
            $update = $fornecedor->update($request->all());

            if($update) {
                $msg = 'Registro atualizado com sucesso';
            } else {
                $msg = 'A atualização do registro falhou';
            }

            return view('app.fornecedor.adicionar', ['msg' => $msg]);
        }

        return view('app.fornecedor.adicionar', ['msg' => $msg]);
    }

    public function editar(Request $request) {
        $fornecedor = Fornecedor::find($request->id);

        return view('app.fornecedor.adicionar', ['fornecedor' => $fornecedor]);
    }
}
