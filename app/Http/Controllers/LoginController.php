<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function index(Request $request) {
        $erro = '';

        if($request->get('erro')) {
            $erro = 'Usuário e/ou senha não existe.';
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
        
        echo "Usuário: $inputUser | Senha: $inputPassword <br>";

        $user = User::where('email', $inputUser)
                    ->where('password', $inputPassword)
                    ->get()
                    ->first();
        
        if(isset($user->name)) {
            echo 'Usuário logado';
        } else {
            return redirect()->route('site.login', ['erro' => 1]);
        }
    }
}
