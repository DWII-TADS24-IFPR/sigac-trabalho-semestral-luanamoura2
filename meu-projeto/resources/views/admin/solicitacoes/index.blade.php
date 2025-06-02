@extends('layouts.app')

@section('title', 'Solicitações - Administração')

@section('content')
<div class="container mt-5">
    <div class="card shadow rounded-4">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Solicitações</h4>
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
                            <th>Aluno</th>
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
                                <td>{{ $solicitacao->aluno->name ?? 'Sem aluno' }}</td>
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
                                    <form action="{{ route('solicitacoes.aprovar', $solicitacao->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm">Aprovar</button>
                                    </form>
                                    <form action="{{ route('solicitacoes.rejeitar', $solicitacao->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">Rejeitar</button>
                                    </form>
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
