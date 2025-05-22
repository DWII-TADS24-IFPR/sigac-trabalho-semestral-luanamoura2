@extends('layouts.app')

@section('title', 'Detalhes da Turma')

@section('content')
<div class="container mt-5">
    <div class="card shadow rounded-4">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Detalhes da Turma</h4>
        </div>
        <div class="card-body">
            <h1 class="mb-4">Informações da Turma</h1>

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Ano</th>
                        <th>Período</th>
                        <th>Curso</th>
                        <th>Início</th>
                        <th>Fim</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $turma->id }}</td>
                        <td>{{ $turma->ano }}</td>
                        <td>{{ $turma->inicio . ' até ' . $turma->fim }}</td>
                        <td>{{ $turma->curso->nome }}</td>
                        <td>{{ \Carbon\Carbon::parse($turma->inicio)->format('d/m/Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($turma->fim)->format('d/m/Y') }}</td>
                    </tr>
                </tbody>
            </table>

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('turmas.index') }}" class="btn btn-primary">
                    <i class="bi bi-arrow-left"></i> Voltar
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
