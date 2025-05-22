@extends('layouts.app')

@section('content')
<div class="container mt-5">
  <div class="card shadow rounded-4">
    <div class="card-body">
      <h2 class="mb-4">Criar Novo Documento</h2>

      @if ($errors->any())
        <div class="alert alert-danger">
          <ul class="mb-0">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form action="{{ route('documentos.store') }}" method="POST">
        @csrf

        <div class="mb-3">
          <label for="descricao" class="form-label">Descrição</label>
          <input type="text" class="form-control rounded-3" id="descricao" name="descricao" value="{{ old('descricao') }}" required>
        </div>

        <div class="mb-3">
          <label for="comentario" class="form-label">Comentários</label>
          <input type="text" class="form-control rounded-3" id="comentario" name="comentario" value="{{ old('comentario') }}" required>
        </div>

        <div class="mb-3">
          <label for="status" class="form-label">Status</label>
          <input type="text" class="form-control rounded-3" id="status" name="status" value="{{ old('status') }}" required>
        </div>

        <div class="mb-3">
          <label for="url" class="form-label">URL</label>
          <input type="url" class="form-control rounded-3" id="url" name="url" value="{{ old('url') }}">
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
          <label for="horas_in" class="form-label">Horas In</label>
          <input type="number" class="form-control rounded-3" id="horas_in" name="horas_in" value="{{ old('horas_in') }}" required>
        </div>

        <div class="mb-3">
          <label for="horas_out" class="form-label">Horas Out</label>
          <input type="number" class="form-control rounded-3" id="horas_out" name="horas_out" value="{{ old('horas_out') }}" required>
        </div>

        <button type="submit" class="btn btn-success">
          <i class="bi bi-check-circle"></i> Salvar
        </button>
        <a href="{{ route('documentos.index') }}" class="btn btn-secondary">
          <i class="bi bi-arrow-left"></i> Voltar
        </a>
      </form>
    </div>
  </div>
</div>
@endsection
