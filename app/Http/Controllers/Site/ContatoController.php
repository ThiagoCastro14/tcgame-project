<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function showForm()
    {
        return view('site/contato');
    }

    public function sendForm(Request $request)
    {
        // Valide os dados do formulário
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        // Lógica para enviar e-mail, salvar no banco de dados, etc.

        // Redirecione de volta ao formulário com uma mensagem de sucesso
        return redirect()->route('contato.form')->with('success', 'Mensagem enviada com sucesso!');
    }
}

