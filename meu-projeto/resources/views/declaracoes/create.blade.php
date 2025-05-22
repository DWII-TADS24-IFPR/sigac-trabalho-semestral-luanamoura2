@extends('layouts.app')

@section('title', 'Nova Declaração')

@section('content')
<div class="container mt-5">
  <div class="card shadow rounded-4">
    <div class="card-body">
      <h2 class="mb-4">Criar Nova Declaração</h2>

      @if ($errors->any())
        <div class="alert alert-danger">
          <ul class="mb-0">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form action="{{ route('declaracoes.store') }}" method="POST">
        @csrf

        <div class="mb-3">
          <label for="aluno_id" class="form-label">Aluno</label>
          <select name="aluno_id" id="aluno_id" class="form-select rounded-3" required>
            <option value="" disabled selected>Selecione um aluno</option>
            @foreach($alunos as $aluno)
              <option value="{{ $aluno->id }}" {{ old('aluno_id') == $aluno->id ? 'selected' : '' }}>
                {{ $aluno->nome }}
              </option>
            @endforeach
          </select>
        </div>

        <div class="mb-3">
          <label for="comprovante_id" class="form-label">Comprovante</label>
          <select name="comprovante_id" id="comprovante_id" class="form-select rounded-3" required>
            <option value="" disabled selected>Selecione um comprovante</option>
            @foreach($comprovantes as $comprovante)
              <option value="{{ $comprovante->id }}" {{ old('comprovante_id') == $comprovante->id ? 'selected' : '' }}>
                #{{ $comprovante->id }} - {{ $comprovante->atividade }}
              </option>
            @endforeach
          </select>
        </div>

        <div class="mb-3">
          <label for="data" class="form-label">Data</label>
          <input type="date" name="data" id="data" class="form-control rounded-3" value="{{ old('data') }}" required>
        </div>

        <button type="submit" class="btn btn-success">
          <i class="bi bi-check-circle"></i> Salvar
        </button>
        <a href="{{ route('declaracoes.index') }}" class="btn btn-secondary">
          <i class="bi bi-arrow-left"></i> Voltar
        </a>
      </form>
    </div>
  </div>
</div>
@endsection
