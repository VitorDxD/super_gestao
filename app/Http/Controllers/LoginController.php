<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function index() {
        return view('site.login');
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
            echo 'Usuário existe';
        } else {
            echo 'Usuário não existe';
        }
    }
}
