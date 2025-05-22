@extends('layouts.app')

@section('title', 'Editar Turma')

@section('content')
 
  <div class="container mt-5">
    <div class="card shadow rounded-4">
      <div class="card-header bg-primary text-white">
        <h4 class="mb-0">Editar Turma</h4>
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

        <form action="{{ route('turmas.update', $turma->id) }}" method="POST">
          @csrf
          @method('PUT')

          <div class="mb-3">
            <label for="ano" class="form-label">Ano</label>
            <input type="text" name="ano" id="ano" class="form-control rounded-3" value="{{ old('ano', $turma->ano) }}" required>
            @error('ano') <div class="text-danger">{{ $message }}</div> @enderror
          </div>

          <div class="mb-3">
            <label for="inicio" class="form-label">Início</label>
            <input type="date" name="inicio" id="inicio" class="form-control rounded-3" value="{{ old('inicio', $turma->inicio) }}" required>
            @error('inicio') <div class="text-danger">{{ $message }}</div> @enderror
          </div>

         
          <div class="mb-3">
            <label for="fim" class="form-label">Fim</label>
            <input type="date" name="fim" id="fim" class="form-control rounded-3" value="{{ old('fim', $turma->fim) }}" required>
            @error('fim') <div class="text-danger">{{ $message }}</div> @enderror
          </div>

          
          <div class="mb-3">
            <label for="curso_id" class="form-label">Curso</label>
            <select name="curso_id" id="curso_id" class="form-select rounded-3" required>
              <option value="">Selecione o curso</option>
              @foreach($cursos as $curso)
                <option value="{{ $curso->id }}" {{ $turma->curso_id == $curso->id ? 'selected' : '' }}>
                  {{ $curso->nome }}
                </option>
              @endforeach
            </select>
            @error('curso_id') <div class="text-danger">{{ $message }}</div> @enderror
          </div>

          <button type="submit" class="btn btn-success">
            <i class="bi bi-check-circle"></i> Atualizar
          </button>
          <a href="{{ route('turmas.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Voltar
          </a>
        </form>
      </div>
    </div>
  </div>
@endsection
