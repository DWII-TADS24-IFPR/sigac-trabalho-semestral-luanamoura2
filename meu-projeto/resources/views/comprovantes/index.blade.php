@extends('layouts.app')

@section('title', 'Lista de Comprovantes')

@section('content')
<div class="container mt-5">
    <div class="card shadow rounded-4">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Lista de Comprovantes</h4>
        </div>
        <div class="card-body">

            <div class="mb-3">
                <a href="{{ route('comprovantes.create') }}" class="btn btn-primary">
                    <i class="bi bi-file-earmark-plus"></i> Adicionar Comprovante
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table table-bordered table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Atividade</th>
                        <th>Horas</th>
                        <th>Categoria</th>
                        <th>Aluno</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($comprovantes as $comprovante)
                        <tr>
                            <td>{{ $comprovante->atividade }}</td>
                            <td>{{ $comprovante->horas }}</td>
                            <td>{{ $comprovante->categoria->nome ?? '-' }}</td>
                            <td>{{ $comprovante->aluno->nome ?? '-' }}</td>
                            <td>
                                @if ($comprovante->status == 'pendente')
                                    <span class="badge bg-warning text-dark">Pendente</span>
                                @elseif ($comprovante->status == 'aprovado')
                                    <span class="badge bg-success">Aprovado</span>
                                @elseif ($comprovante->status == 'rejeitado')
                                    <span class="badge bg-danger">Rejeitado</span>
                                @else
                                    <span class="badge bg-secondary">Desconhecido</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('comprovantes.show', $comprovante->id) }}" class="btn btn-info btn-sm me-1" title="Visualizar">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('comprovantes.edit', $comprovante->id) }}" class="btn btn-warning btn-sm me-1" title="Editar">
                                    <i class="bi bi-pencil"></i>
                                </a>

                                @if(auth()->user()->is_admin && $comprovante->status == 'pendente')
                                    <form action="{{ route('comprovantes.aprovar', $comprovante->id) }}" method="POST" class="d-inline me-1">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Aprovar este comprovante?')" title="Aprovar">
                                            <i class="bi bi-check-circle"></i>
                                        </button>
                                    </form>
                                    <form action="{{ route('comprovantes.rejeitar', $comprovante->id) }}" method="POST" class="d-inline me-1">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Rejeitar este comprovante?')" title="Rejeitar">
                                            <i class="bi bi-x-circle"></i>
                                        </button>
                                    </form>
                                @endif

                                <form action="{{ route('comprovantes.destroy', $comprovante->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir?')" title="Excluir">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Nenhum comprovante cadastrado.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div> 
    </div> 
</div> 
@endsection
