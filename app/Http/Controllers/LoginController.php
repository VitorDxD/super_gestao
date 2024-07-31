<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function index(Request $request) {
        $erro = '';

        if($request->get('erro') == 1) {
            $erro = 'Usuário e/ou senha não existe.';
        }

        if($request->get('erro') == 2) {
            $erro = 'Necessário realizar login para ter acesso a página.';
        }

        return view('site.login', ['erro' => $erro]);
    }

    public function autenticar(Request $request) {
        // Validação de campos do input
        $configs = [
            'usuario' => 'email',
            'senha' => 'required'
        ];

        $feedbacks = [
            'usuario.email' => 'O campo precisa ser preenchido com um e-mail válido',
            'senha.required' => 'O campo senha é obrigatório'
        ];

        $request->validate($configs, $feedbacks);

        
        // Validação de existência de usuário no banco
        $inputUser = $request->get('usuario');
        $inputPassword = $request->get('senha');

        $user = User::where('email', $inputUser)
                    ->where('password', $inputPassword)
                    ->get()
                    ->first();
        
        if(isset($user->name)) {

            session_start();
            $_SESSION['nome'] = $user->name;
            $_SESSION['email'] = $user->email;

            return redirect()->route('app.clientes');
        } else {
            return redirect()->route('site.login', ['erro' => 1]);
        }
    }
}
