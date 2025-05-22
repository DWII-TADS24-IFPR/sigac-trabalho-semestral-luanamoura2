@extends('layouts.app')

@section('title', 'Editar Categoria')

@section('content')
<div class="container mt-5">
  <div class="card shadow rounded-4">
    <div class="card-header bg-primary text-white">
      <h4 class="mb-0">Editar Categoria</h4>
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

      <form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
          <label for="nome" class="form-label">Nome da Categoria</label>
          <input type="text" name="nome" id="nome" class="form-control rounded-3" value="{{ old('nome', $categoria->nome) }}" required>
          @error('nome') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
          <label for="max_horas" class="form-label">Máximo de Horas</label>
          <input type="number" name="max_horas" id="max_horas" class="form-control rounded-3" value="{{ old('max_horas', $categoria->max_horas) }}" required min="1" step="1">
          @error('max_horas') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
          <label for="curso_id" class="form-label">Curso</label>
          <select name="curso_id" id="curso_id" class="form-select rounded-3" required>
            <option value="">Selecione um curso</option>
            @foreach($cursos as $curso)
            <option value="{{ $curso->id }}" {{ $categoria->curso_id == $curso->id ? 'selected' : '' }}>
              {{ $curso->nome }}
            </option>
            @endforeach
          </select>
          @error('curso_id') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-success">
          <i class="bi bi-check-circle"></i> Atualizar
        </button>
        <a href="{{ route('categorias.index') }}" class="btn btn-secondary">
          <i class="bi bi-arrow-left"></i> Voltar
        </a>
      </form>
    </div>
  </div>
</div>
@endsection
