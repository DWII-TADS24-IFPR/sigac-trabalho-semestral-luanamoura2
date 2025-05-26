@extends('layouts.app')

@section('title', 'Lista de Cursos')

@section('content')
<div class="container mt-5">
    <div class="card shadow rounded-4">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Lista de Cursos</h4>
        </div>
        <div class="card-body">

            <div class="mb-3">
                <a href="{{ route('cursos.create') }}" class="btn btn-primary">
                    <i class="bi bi-file-earmark-plus"></i> Adicionar Curso
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
                        <th>Nome</th>
                        <th>Sigla</th>
                        <th>Nível</th>
                        <th>Eixo</th> 
                        <th>Total de Horas</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($cursos as $curso)
                        <tr>
                            <td>{{ $curso->nome }}</td>
                            <td>{{ $curso->sigla }}</td>
                            <td>{{ $curso->nivel->nome ?? '-' }}</td>
                            <td>{{ $curso->eixo->nome ?? '-' }}</td> 
                            <td>{{ (int) $curso->total_horas }}</td>
                            <td>
                                <a href="{{ route('cursos.show', $curso->id) }}" class="btn btn-info btn-sm">
                                    <i class="bi bi-eye"></i> Visualizar
                                </a>
                                <a href="{{ route('cursos.edit', $curso->id) }}" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil"></i> Editar
                                </a>
                                <form action="{{ route('cursos.destroy', $curso->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir?')">
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
                            <td colspan="6" class="text-center">Nenhum curso cadastrado.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection