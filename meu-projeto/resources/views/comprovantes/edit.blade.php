@extends('layouts.app')

@section('title', 'Editar Comprovante')

@section('content')
<div class="container mt-5">
  <div class="card shadow rounded-4">
    <div class="card-header bg-primary text-white">
      <h4 class="mb-0">Editar Comprovante</h4>
    </div>
    <div class="card-body">
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul class="mb-0">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form action="{{ route('comprovantes.update', $comprovante->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
          <label for="atividade" class="form-label">Atividade</label>
          <input type="text" name="atividade" class="form-control rounded-3" value="{{ old('atividade', $comprovante->atividade) }}" required>
        </div>

        <div class="mb-3">
          <label for="horas" class="form-label">Horas</label>
          <input type="number" name="horas" class="form-control rounded-3" value="{{ old('horas', $comprovante->horas) }}" required>
        </div>

        <div class="mb-3">
          <label for="categoria_id" class="form-label">Categoria</label>
          <select name="categoria_id" class="form-select rounded-3" required>
            <option value="">Selecione</option>
            @foreach($categorias as $categoria)
              <option value="{{ $categoria->id }}" {{ $comprovante->categoria_id == $categoria->id ? 'selected' : '' }}>
                {{ $categoria->nome }}
              </option>
            @endforeach
          </select>
        </div>

        <div class="mb-3">
          <label for="aluno_id" class="form-label">Aluno</label>
          <select name="aluno_id" class="form-select rounded-3" required>
            <option value="">Selecione</option>
            @foreach($alunos as $aluno)
              <option value="{{ $aluno->id }}" {{ $comprovante->aluno_id == $aluno->id ? 'selected' : '' }}>
                {{ $aluno->nome }}
              </option>
            @endforeach
          </select>
        </div>

        <button type="submit" class="btn btn-success">
          <i class="bi bi-check-circle"></i> Atualizar
        </button>
        <a href="{{ route('comprovantes.index') }}" class="btn btn-secondary">
          <i class="bi bi-arrow-left"></i> Voltar
        </a>
      </form>
    </div>
  </div>
</div>
@endsection
