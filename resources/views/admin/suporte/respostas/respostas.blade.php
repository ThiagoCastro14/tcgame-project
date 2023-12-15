@extends('admin.layouts.app')

@section('title', "Detalhes da Dúvida {$suporte->assunto}")

@section('content')
<!-- component -->
<div class="flex justify-center min-h-screen">
    <div class="md:w-3/5 w-3/4 px-10 flex flex-col gap-2 p-5">
        <div class="flex justify-between">
            <h1 class="text-lg">Detalhes da Dúvida <b>{{ $suporte->assunto }}</b></h1>
            @can('owner', $suporte->user['id'])
                <form action="{{ route('suporte.destroy', $suporte->id) }}" method="post">
                    @csrf()
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-4 border-b-4 border-red-700 hover:border-red-500 rounded">Deletar</button>
                </form>
            @endcan
        </div>
        <ul>
            <li>Status: <x-status-suporte :status="$suporte->status"/></li>
            <li>Descrição: {{ $suporte->descricao }}</li>
        </ul>

        <!-- Item Container -->
        <div class="flex flex-col gap-3 text-black">

            @forelse ($respostas as $resposta)
                <div class="flex flex-col gap-4 dark:bg-gray-900 rounded p-4">
                    <!-- Profile and Rating -->
                    <div class="flex justify justify-between">
                        <div class="flex gap-2">
                            <div class="w-7 h-7 text-center rounded-full bg-red-500">CF</div>
                            <span>{{ $resposta['user']['name'] }}</span>
                        </div>
                    </div>

                    <div>
                        {{ $resposta['descricao'] }}
                    </div>

                    <div class="flex justify-between">
                        <span>{{ $resposta['created_at'] }}</span>
                        @can('owner', $resposta['user']['id'])
                            <form action="{{ route('respostas.destroy', [$suporte->id, $resposta['id']]) }}" method="post">
                                @csrf()
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-400 text-white py-1 px-4 border-b-4 border-red-700 hover:border-red-500 rounded">Deletar</button>
                            </form>
                        @else
                        --
                        @endcan
                    </div>
                </div>
            @empty
                <p>Sem Respostas</p>
            @endforelse

            <div class="py-4">
                <form action="{{ route('respostas.store', $suporte->id) }}" method="post">
                    @csrf
                    <input type="hidden" name="suporte_id" value="{{ $suporte->id }}">
                    <textarea
                    rows="2"
                    name="descricao"
                    placeholder="Sua resposta"
                    class="w-full resize-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"></textarea>
                    <button type="submit" class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base font-semibold text-white outline-none">
                    Enviar
                  </button>                
                  <a href="{{ route('suporte.index', $suporte->id) }}" class="hover:shadow-form rounded-md bg-[#a1dca1] py-3 px-8 text-base font-semibold text-white outline-none">
                    Voltar
                </a>
                </form>
            </div>


        </div>
    </div>
</div>

@endsection