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
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($comprovantes as $comprovante)
                        <tr>
                            <td>{{ $comprovante->atividade }}</td>
                            <td>{{ number_format($comprovante->horas, 1, ',', '.') }} horas</td>
                            <td>{{ $comprovante->categoria ? $comprovante->categoria->nome : 'Categoria não encontrada' }}</td>
                            <td>{{ $comprovante->aluno ? $comprovante->aluno->nome : 'Aluno não encontrado' }}</td>
                           
                            <td>
                                <a href="{{ route('comprovantes.show', $comprovante->id) }}" class="btn btn-info btn-sm">
                                    <i class="bi bi-eye"></i> Visualizar
                                </a>
                                <a href="{{ route('comprovantes.edit', $comprovante->id) }}" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil"></i> Editar
                                </a>
                                <form action="{{ route('comprovantes.destroy', $comprovante->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Tem certeza que deseja excluir?')">
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
