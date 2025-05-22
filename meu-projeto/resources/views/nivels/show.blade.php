@extends('layouts.app')

@section('title', 'Detalhes do Nível')

@section('content')
<div class="container mt-5">
    <div class="card shadow rounded-4">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Detalhes do Nível</h4>
        </div>
        <div class="card-body">
            <h1 class="mb-4">Informações do Nível</h1>

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $nivel->id }}</td>
                        <td>{{ $nivel->nome }}</td>
                    </tr>
                </tbody>
            </table>

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('nivels.index') }}" class="btn btn-primary">
                    <i class="bi bi-arrow-left"></i> Voltar
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
