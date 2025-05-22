@extends('layouts.app')

@section('title', 'Detalhes do Aluno')

@section('content')

<div class="container mt-5">
    <div class="card shadow rounded-4">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Detalhes do Aluno</h4>
        </div>
        <div class="card-body">
            <h1 class="mb-4">Sobre o Aluno</h1>

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Turma</th>
                        <th>Curso</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $aluno->id }}</td>
                        <td>{{ $aluno->nome }}</td>
                        <td>{{ $aluno->email }}</td>
                        <td>{{ $aluno->turma ? $aluno->turma->ano : 'Sem turma' }}</td>
                        <td>{{ $aluno->curso ? $aluno->curso->nome : 'Sem curso' }}</td>
                    </tr>
                </tbody>
            </table>

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('alunos.index') }}" class="btn btn-primary">
                    <i class="bi bi-arrow-left"></i> Voltar
                </a>
            </div>
        </div>
    </div>
</div>

@endsection
