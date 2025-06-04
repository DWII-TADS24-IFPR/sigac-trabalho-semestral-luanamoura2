@extends('layouts.app')

@section('content')
<div class="container mt-5">
  <div class="card shadow rounded-4">
    <div class="card-header bg-primary text-white">
      <h4 class="mb-0">Nova Solicitação</h4>
    </div>
    <div class="card-body">
      @if ($errors->any())
        <div class="alert alert-danger mb-4">
          <ul class="mb-0">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form action="{{ route('solicitacoes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
          <label for="categoria_id" class="form-label">Categoria</label>
          <select name="categoria_id" id="categoria_id" class="form-control" required>
            <option value="">Selecione uma categoria</option>
            @foreach ($categorias as $categoria)
              <option value="{{ $categoria->id }}" {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
                {{ $categoria->nome ?? $categoria->descricao ?? 'Categoria ' . $categoria->id }}
              </option>
            @endforeach
          </select>
          @error('categoria_id')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="descricao" class="form-label">Descrição</label>
          <textarea name="descricao" id="descricao" class="form-control" rows="3" required>{{ old('descricao') }}</textarea>
          @error('descricao')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="carga_horaria" class="form-label">Carga Horária</label>
          <input type="number" name="carga_horaria" id="carga_horaria" class="form-control" value="{{ old('carga_horaria') }}" required min="1">
          @error('carga_horaria')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="documento" class="form-label">Documento (PDF, JPG, PNG)</label>
          <input type="file" name="documento" id="documento" class="form-control" accept=".pdf,.jpg,.jpeg,.png" required>
          @error('documento')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <button type="submit" class="btn btn-success">
          <i class="bi bi-check-circle"></i> Enviar Solicitação
        </button>
        <a href="{{ route('solicitacoes.index') }}" class="btn btn-secondary">
          <i class="bi bi-arrow-left"></i> Cancelar
        </a>
      </form>
    </div>
  </div>
</div>
@endsection
