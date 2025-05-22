@extends('layouts.app')

@section('title', 'Detalhes da Categoria')

@section('content')
    <div class="container mt-5">
        <div class="card shadow rounded-4">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Detalhes da Categoria</h4>
            </div>
            <div class="card-body">
                <h1 class="mb-4">Informações da Categoria</h1>

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Máximo de Horas</th>
                            <th>Curso Associado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $categoria->id }}</td>
                            <td>{{ $categoria->nome }}</td>
                            <td>{{ intval($categoria->max_horas) }}</td> 
                            <td>
                                @if($categoria->curso)
                                    {{ $categoria->curso->nome }}
                                @else
                                    Nenhum curso associado
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('categorias.index') }}" class="btn btn-primary">
                        <i class="bi bi-arrow-left"></i> Voltar
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
