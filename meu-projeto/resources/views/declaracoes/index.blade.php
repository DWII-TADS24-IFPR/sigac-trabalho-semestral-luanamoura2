@extends('layouts.app')

@section('title', 'Lista de Declarações')

@section('content')
<div class="container mt-5">
    <div class="card shadow rounded-4">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Lista de Declarações</h4>
        </div>
        <div class="card-body">

            <div class="mb-3">
                <a href="{{ route('declaracoes.create') }}" class="btn btn-primary">
                    <i class="bi bi-file-earmark-plus"></i> Nova Declaração
                </a>
            </div>

            @if (session('success'))
                <div class="alert alert-success mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Aluno</th> <!-- Exibe o nome do aluno -->
                        <th>Hash</th>
                        <th>Data</th>
                        <th>Comprovante</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($declaracoes as $declaracao)
                        <tr>
                            <td>{{ $declaracao->aluno->nome ?? 'Aluno não encontrado' }}</td>
                            <td>{{ $declaracao->hash }}</td>
                            <td>{{ \Carbon\Carbon::parse($declaracao->data)->format('d/m/Y') }}</td>
                            <td>{{ $declaracao->comprovante->atividade ?? 'N/A' }}</td>
                            <td>
                                <a href="{{ route('declaracoes.show', $declaracao->id) }}" class="btn btn-info btn-sm">
                                    <i class="bi bi-eye"></i> Visualizar
                                </a>
                                <a href="{{ route('declaracoes.edit', $declaracao->id) }}" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil"></i> Editar
                                </a>
                                <form action="{{ route('declaracoes.destroy', $declaracao->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Tem certeza que deseja excluir?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash"></i> Deletar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">Nenhuma declaração cadastrada.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection
