@extends('admin.layouts.app')

@section('title', "Editar a Dúvida {$suporte->assunto}")

@section('header')
<h1 class="text-lg text-black-500">Dúvida {{ $suporte->assunto }}</h1>
@endsection

@section('content')
<form action="{{ route('suporte.update', $suporte->id) }}" method="POST">
    @method('PUT')
    @include('admin.suporte.partials.form', [
        'suporte' => $suporte
    ])
</form>

@endsection