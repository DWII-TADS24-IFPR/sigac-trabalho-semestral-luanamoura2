@extends('layouts.app')

@section('content')
<h1>Minhas Solicitações</h1>

<a href="{{ route('solicitacoes.create') }}" class="btn btn-primary mb-3">Nova Solicitação</a>

@if($solicitacoes->isEmpty())
    <p>Você ainda não fez nenhuma solicitação.</p>
@else
    <ul>
        @foreach($solicitacoes as $solicitacao)
            <li>{{ $solicitacao->descricao }} - Status: {{ $solicitacao->status }}</li>
        @endforeach
    </ul>
@endif
@endsection
