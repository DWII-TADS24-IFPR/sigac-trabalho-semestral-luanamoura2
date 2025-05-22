@extends('layouts.app')

@section('title', 'Criar Novo Comprovante')

@section('content')
<div class="container mt-5">
  <div class="card shadow rounded-4">
    <div class="card-body">
      <h2 class="mb-4">Criar Novo Comprovante</h2>

      @if ($errors->any())
        <div class="alert alert-danger">
          <ul class="mb-0">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form action="{{ route('comprovantes.store') }}" method="POST">
        @csrf

        <div class="mb-3">
          <label for="atividade" class="form-label">Atividade</label>
          <input type="text" class="form-control rounded-3" id="atividade" name="atividade" value="{{ old('atividade') }}" required>
        </div>

        <div class="mb-3">
          <label for="horas" class="form-label">Horas</label>
          <input type="number" class="form-control rounded-3" id="horas" name="horas" value="{{ old('horas', $comprovante->horas ?? '') }}" required min="0" step="1">
        </div>

        <div class="mb-3">
          <label for="categoria_id" class="form-label">Categoria</label>
          <select class="form-select rounded-3" id="categoria_id" name="categoria_id" required>
            <option value="" disabled selected>Selecione uma categoria</option>
            @foreach($categorias as $categoria)
              <option value="{{ $categoria->id }}" {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
                {{ $categoria->nome }}
              </option>
            @endforeach
          </select>
        </div>

            <div class="mb-3">
        <label for="aluno_id" class="form-label">Aluno</label>
        <select name="aluno_id" id="aluno_id" class="form-select" required>
            <option value="">Selecione um aluno</option>
            @foreach ($alunos as $aluno)
                <option value="{{ $aluno->id }}" {{ old('aluno_id') == $aluno->id ? 'selected' : '' }}>
                    {{ $aluno->nome }}
                </option>
            @endforeach
        </select>
    </div>

        <button type="submit" class="btn btn-success">
          <i class="bi bi-check-circle"></i> Salvar
        </button>
        <a href="{{ route('comprovantes.index') }}" class="btn btn-secondary">
          <i class="bi bi-arrow-left"></i> Voltar
        </a>
      </form>
    </div>
  </div>
</div>
@endsection
