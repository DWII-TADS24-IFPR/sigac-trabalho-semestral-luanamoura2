@extends('layouts.app')

@section('title', 'Detalhes da Declaração')

@section('content')
<div class="container mt-5">
    <div class="card shadow rounded-4">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Detalhes da Declaração</h4>
        </div>
        <div class="card-body">
            <h1 class="mb-4">Informações da Declaração</h1>

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Data</th>
                        <th>Comprovante</th>
                        <th>Aluno</th>
                        <th>Hash</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $declaracao->id }}</td>
                        <td>{{ \Carbon\Carbon::parse($declaracao->data)->format('d/m/Y') }}</td>
                        <td>{{ $declaracao->comprovante->atividade ?? 'N/A' }}</td>
                        <td>{{ $declaracao->aluno->nome ?? 'N/A' }}</td>
                        <td>{{ $declaracao->hash }}</td>
                    </tr>
                </tbody>
            </table>

            <div class="mt-4">
                <a href="{{ route('declaracoes.index') }}" class="btn btn-primary">
                    <i class="bi bi-arrow-left"></i> Voltar
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
