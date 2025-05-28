@extends('layouts.app')

@section('title', 'Minhas Solicitações')

@section('content')
<div class="container mt-5">
    <div class="card shadow rounded-4">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Minhas Solicitações</h4>
            <a href="{{ route('solicitacoes.create') }}" class="btn btn-light btn-sm">
                <i class="bi bi-plus-circle"></i> Nova Solicitação
            </a>
        </div>
        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-success mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if($solicitacoes->isEmpty())
                <p>Nenhuma solicitação encontrada.</p>
            @else
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>Descrição</th>
                            <th>Categoria</th>
                            <th>Carga Horária</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($solicitacoes as $solicitacao)
                            <tr>
                                <td>{{ $solicitacao->descricao }}</td>
                                <td>{{ $solicitacao->categoria->nome ?? 'Sem categoria' }}</td>
                                <td>{{ $solicitacao->carga_horaria }}</td>
                                <td>
                                    @if($solicitacao->status == 'pendente')
                                        <span class="badge bg-warning text-dark">Pendente</span>
                                    @elseif($solicitacao->status == 'aprovado')
                                        <span class="badge bg-success">Aprovado</span>
                                    @elseif($solicitacao->status == 'rejeitado')
                                        <span class="badge bg-danger">Rejeitado</span>
                                    @else
                                        <span class="badge bg-secondary">{{ $solicitacao->status }}</span>
                                    @endif
                                </td>
                                <td>
                                    
                                    <a href="#" class="btn btn-info btn-sm disabled">Visualizar</a>
                                    <a href="#" class="btn btn-warning btn-sm disabled">Editar</a>
                                   
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif

        </div>
    </div>
</div>
@endsection
