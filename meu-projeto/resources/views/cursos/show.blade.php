@extends('layouts.app')

@section('title', 'Detalhes do Curso')

@section('content')
<div class="container mt-5">
    <div class="card shadow rounded-4">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Detalhes do Curso</h4>
        </div>
        <div class="card-body">
            <h1 class="mb-4">Sobre o Curso</h1>

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Sigla</th>
                        <th>Nível</th>
                        <th>Eixo</th> 
                        <th>Total de Horas</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $curso->id }}</td>
                        <td>{{ $curso->nome }}</td>
                        <td>{{ $curso->sigla }}</td>
                        <td>{{ $curso->nivel->nome ?? 'Sem nível' }}</td>
                        <td>{{ $curso->eixo->nome ?? 'Sem eixo' }}</td>
                        <td>{{ $curso->total_horas }}</td>
                    </tr>
                </tbody>
            </table>

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('cursos.index') }}" class="btn btn-primary">
                    <i class="bi bi-arrow-left"></i> Voltar
                </a>
            </div>
        </div>
    </div>
</div>
@endsection