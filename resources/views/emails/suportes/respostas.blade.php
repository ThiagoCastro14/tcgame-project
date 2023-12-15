<x-mail::message>
# Dúvida Respondida

Assunto da dúvida {{ $resposta->suporte_id }} foi respondi com <b>{{ $resposta->content }}</b>.

<x-mail::button :url="route('respostas.index', $resposta->suporte_id)">
Ver
</x-mail::button>

Obrigado,<br>
{{ config('app.name') }}
</x-mail::message>