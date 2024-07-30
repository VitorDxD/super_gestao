<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index() {
        return view('site.login');
    }

    public function autenticar(Request $request) {
        $configs = [
            'usuario' => 'email',
            'senha' => 'required'
        ];

        $feedbacks = [
            'usuario.email' => 'O campo precisa ser preenchido com um e-mail válido',
            'senha.required' => 'O campo senha é obrigatório'
        ];

        $request->validate($configs, $feedbacks);

        print_r($request->all());
    }
}
