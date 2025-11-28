<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)    {
        // Validação básica do formulário
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:4',
        ]);

        $email = $request->email;
        $password = $request->password;

        // Exemplo de login fixo (para teste)
        if ($email === "admin@gmail.com" && $password === "123456") {
            return redirect('/dashbord'); // Redireciona para a página dashboard
        }

        // Se não passar, volta para a tela de login com erro
        return back()->withErrors(['msg' => 'Email ou senha inválidos']);
    }

    public function logout(Request $request){
    // Remove dados da sessão
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    // Redireciona para login ou home
    return redirect('/login')->with('success', 'Sessão terminada com sucesso!');
    }

}
