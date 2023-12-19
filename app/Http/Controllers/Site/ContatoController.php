<?php

namespace App\Http\Controllers\Site;


use App\Http\Controllers\Controller;
use App\Mail\EmailContato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContatoController extends Controller
{
    public function index()
    {
        return view('site/contato');
    }

    public function store(Request $request)
    {
       Mail::to('thiagocastro.as@gmail.com', 'Thiago')->send(new EmailContato([
        'fromName' => $request->input('name'),
        'fromEmail' => $request->input('email'),
        'subject' => $request->input('subject'),
        'message' => $request->input('message'),
       ]));
       return redirect()->route('contato.index')->with('success', 'Mensagem enviada com sucesso!');
    }
}