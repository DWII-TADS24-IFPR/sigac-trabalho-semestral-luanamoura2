@extends('layouts.app')

@section('title', 'Editar Documento')

@section('content')
<div class="container mt-5">
  <div class="card shadow rounded-4">
    <div class="card-header bg-primary text-white">
      <h4 class="mb-0">Editar Documento</h4>
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

      <form action="{{ route('documentos.update', $documento->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
          <label for="descricao" class="form-label">Descrição</label>
          <input type="text" name="descricao" id="descricao" class="form-control rounded-3" value="{{ old('descricao', $documento->descricao) }}" required>
          @error('descricao') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
          <label for="comentario" class="form-label">Comentários</label>
          <input type="text" name="comentario" id="comentario" class="form-control rounded-3" value="{{ old('comentario', $documento->comentario) }}">
          @error('comentario') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
          <label for="status" class="form-label">Status</label>
          <input type="text" name="status" id="status" class="form-control rounded-3" value="{{ old('status', $documento->status) }}" required>
          @error('status') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
          <label for="url" class="form-label">URL</label>
          <input type="url" name="url" id="url" class="form-control rounded-3" value="{{ old('url', $documento->url) }}">
          @error('url') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
          <label for="categoria_id" class="form-label">Categoria</label>
          <select name="categoria_id" id="categoria_id" class="form-select rounded-3" required>
            @foreach($categorias as $categoria)
            <option value="{{ $categoria->id }}" {{ $documento->categoria_id == $categoria->id ? 'selected' : '' }}>
              {{ $categoria->nome }}
            </option>
            @endforeach
          </select>
          @error('categoria_id') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
          <label for="horas_in" class="form-label">Horas In</label>
          <input type="number" name="horas_in" id="horas_in" class="form-control rounded-3" value="{{ old('horas_in', $documento->horas_in) }}" required>
          @error('horas_in') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
          <label for="horas_out" class="form-label">Horas Out</label>
          <input type="number" name="horas_out" id="horas_out" class="form-control rounded-3" value="{{ old('horas_out', $documento->horas_out) }}" required>
          @error('horas_out') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-success">
          <i class="bi bi-check-circle"></i> Atualizar
        </button>
        <a href="{{ route('documentos.index') }}" class="btn btn-secondary">
          <i class="bi bi-arrow-left"></i> Voltar
        </a>
      </form>
    </div>
  </div>
</div>
@endsection
