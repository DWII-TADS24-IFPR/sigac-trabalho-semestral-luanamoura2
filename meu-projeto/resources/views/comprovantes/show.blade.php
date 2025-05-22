@extends('layouts.app')

@section('title', 'Detalhes do Comprovante')

@section('content')
<div class="container mt-5">
  <div class="card shadow rounded-4">
    <div class="card-header bg-primary text-white">
      <h4 class="mb-0">Detalhes do Comprovante</h4>
    </div>
    <div class="card-body">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Atividade</th>
            <th>Horas</th>
            <th>Categoria</th>
            <th>Aluno</th>
            <th>Data de Criação</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{ $comprovante->id }}</td>
            <td>{{ $comprovante->atividade }}</td>
            <td>{{ $comprovante->horas }}</td>
            <td>{{ $comprovante->categoria->nome ?? '-' }}</td>
            <td>{{ $comprovante->aluno->nome ?? '-' }}</td>
            <td>{{ $comprovante->created_at->format('d/m/Y') }}</td>
          </tr>
        </tbody>
      </table>

      <div class="d-flex justify-content-between mt-4">
        <a href="{{ route('comprovantes.index') }}" class="btn btn-primary">
          <i class="bi bi-arrow-left"></i> Voltar
        </a>
      </div>
    </div>
  </div>
</div>
@endsection
