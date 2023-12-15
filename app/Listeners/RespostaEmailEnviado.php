<?php

namespace App\Listeners;

use App\Events\SuporteEnviado;
use App\Mail\EmailSuporteEnviado;
use Illuminate\Support\Facades\Mail;

class RespostaEmailEnviado
{
   
    public function __construct()
    {
        
    }
    
    public function handle(SuporteEnviado $event): void
    {
        $resposta = $event->resposta();

        Mail::to($resposta->user['email'])->send(
            new EmailSuporteEnviado($resposta)
        );
    }
}