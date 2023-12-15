@extends('admin.layouts.app')

@section('title', 'Criar Novo Tópico')

@section('header')
<h1 class="text-lg text-black-500">Nova Dúvida</h1>
@endsection

@section('content')
<form action="{{ route('suporte.store') }}" method="POST">
    @include('admin.suporte.partials.form')
</form>
@endsection