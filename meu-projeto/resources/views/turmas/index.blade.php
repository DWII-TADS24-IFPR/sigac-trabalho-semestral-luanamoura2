@extends('layouts.app')

@section('title', 'Lista de Turmas')

@section('content')
<div class="container mt-5">
    <div class="card shadow rounded-4">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Lista de Turmas</h4>
        </div>
        <div class="card-body">

            <div class="mb-3">
                <a href="{{ route('turmas.create') }}" class="btn btn-primary">
                    <i class="bi bi-file-earmark-plus"></i> Adicionar Turma
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Ano</th>
                        <th>Período</th>
                        <th>Curso</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($turmas as $turma)
                        <tr>
                            <td>{{ $turma->ano }}</td>
                            <td>{{ $turma->periodo }}</td>
                            <td>{{ $turma->curso->nome ?? 'Sem curso' }}</td>
                            <td>
                                <a href="{{ route('turmas.show', $turma->id) }}" class="btn btn-info btn-sm">
                                    <i class="bi bi-eye"></i> Visualizar
                                </a>
                                <a href="{{ route('turmas.edit', $turma->id) }}" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil"></i> Editar
                                </a>
                                <form action="{{ route('turmas.destroy', $turma->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Tem certeza que deseja excluir?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash"></i> Deletar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection
