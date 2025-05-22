@extends('layouts.app')

@section('title', 'Detalhes do Documento')

@section('content')
<div class="container mt-5">
    <div class="card shadow rounded-4">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Detalhes do Documento</h4>
        </div>
        <div class="card-body">
            <h1 class="mb-4">Sobre o Documento</h1>

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Descrição</th>
                        <th>Status</th>
                        <th>URL</th>
                        <th>Categoria</th>
                        <th>Horas In</th>
                        <th>Horas Out</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $documento->id }}</td>
                        <td>{{ $documento->descricao }}</td>
                        <td>{{ $documento->status }}</td>
                        <td>
                            <a href="{{ $documento->url }}" target="_blank" class="text-primary">
                                {{ $documento->url }}
                            </a>
                        </td>
                        <td>{{ $documento->categoria->nome ?? 'Sem categoria' }}</td>
                        <td>{{ $documento->horas_in }}</td>
                        <td>{{ $documento->horas_out }}</td>
                    </tr>
                </tbody>
            </table>

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('documentos.index') }}" class="btn btn-primary">
                    <i class="bi bi-arrow-left"></i> Voltar
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
