@extends('layouts.app')

@section('title', 'Editar Nível')

@section('content')
<div class="container mt-5">
  <div class="card shadow rounded-4">
    <div class="card-header bg-primary text-white">
      <h4 class="mb-0">Editar Nível</h4>
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

      <form action="{{ route('nivels.update', $nivel->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
          <label for="nome" class="form-label">Nome</label>
          <input type="text" name="nome" id="nome" class="form-control rounded-3" value="{{ old('nome', $nivel->nome) }}" required>
          @error('nome') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-success">
          <i class="bi bi-check-circle"></i> Atualizar
        </button>
        <a href="{{ route('nivels.index') }}" class="btn btn-secondary">
          <i class="bi bi-arrow-left"></i> Voltar
        </a>
      </form>
    </div>
  </div>
</div>
@endsection
