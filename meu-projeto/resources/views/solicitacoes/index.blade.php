@extends('layouts.app')

@section('title', 'Minhas Solicitações')

@section('content')
<div class="container mt-5">
    <div class="card shadow rounded-4">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Minhas Solicitações</h4>
            <a href="{{ route('solicitacoes.create') }}" class="btn btn-light btn-sm">
                <i class="bi bi-file-earmark-plus"></i> Nova Solicitação
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
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($solicitacoes as $solicitacao)
                            <tr>
                                <td>{{ $solicitacao->descricao }}</td>
                                <td>{{ $solicitacao->categoria->nome ?? 'Sem categoria' }}</td>
                                <td>{{ $solicitacao->carga_horaria }} horas</td>
                                <td>
                                    @if($solicitacao->status == 'pendente')
                                        <span class="badge bg-warning text-dark">Pendente</span>
                                    @elseif($solicitacao->status == 'aprovado')
                                        <span class="badge bg-success">Aprovado</span>
                                    @elseif($solicitacao->status == 'reprovado')
                                        <span class="badge bg-danger">Reprovado</span>
                                    @else
                                        <span class="badge bg-secondary">{{ ucfirst($solicitacao->status) }}</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif

        </div>
    </div>
</div>
@endsection
