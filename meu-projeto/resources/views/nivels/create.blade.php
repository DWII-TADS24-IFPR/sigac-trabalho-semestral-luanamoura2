@extends('layouts.app')

@section('title', 'Adicionar Nível')

@section('content')
<div class="container mt-5">
  <div class="card shadow rounded-4">
    <div class="card-header bg-primary text-white">
      <h4 class="mb-0">Adicionar Nível</h4>
    </div>
    <div class="card-body">
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul class="mb-0">
            @foreach ($errors->all() as $erro)
              <li>{{ $erro }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form action="{{ route('nivels.store') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="nome" class="form-label">Nível Escolar</label>
          <input type="text" class="form-control rounded-3 @error('nome') is-invalid @enderror" id="nome" name="nome" value="{{ old('nome') }}" required>
          @error('nome')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <button type="submit" class="btn btn-success">
          <i class="bi bi-check-circle"></i> Salvar
        </button>
        <a href="{{ route('nivels.index') }}" class="btn btn-secondary">
          <i class="bi bi-arrow-left"></i> Voltar
        </a>
      </form>
    </div>
  </div>
</div>
@endsection
