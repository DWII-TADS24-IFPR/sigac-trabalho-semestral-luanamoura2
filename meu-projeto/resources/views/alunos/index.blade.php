@extends('layouts.app')

@section('title', 'Lista de Alunos')

@section('content')
<div class="container mt-5">
    <div class="card shadow rounded-4">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Lista de Alunos</h4>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                
                <a href="{{ route('alunos.create') }}" class="btn btn-primary">
                    <i class="bi bi-person-plus"></i> Adicionar Aluno
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
                        <th>CPF</th>
                        <th>Email</th>
                        <th>Turma</th>
                        <th>Curso</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($alunos as $aluno)
                        <tr>
                            <td>{{ $aluno->nome }}</td>
                            <td>{{ $aluno->cpf }}</td>
                            <td>{{ $aluno->email }}</td>
                            <td>{{ $aluno->turma ? $aluno->turma->ano : 'Sem turma' }}</td>
                            <td>{{ $aluno->turma ? $aluno->curso->nome : 'Sem curso' }}</td>
                            <td>
                                <a href="{{ route('alunos.show', $aluno->id) }}" class="btn btn-info btn-sm">
                                    <i class="bi bi-eye"></i> Visualizar
                                </a>
                                <a href="{{ route('alunos.edit', $aluno->id) }}" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil"></i> Editar
                                </a>
                                <form action="{{ route('alunos.destroy', $aluno->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Tem certeza que deseja excluir?')">
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
