@extends('layouts.app')

@section('title', 'Editar Curso')

@section('content')
<div class="container mt-5">
  <div class="card shadow rounded-4">
    <div class="card-header bg-primary text-white">
      <h4 class="mb-0">Editar Curso</h4>
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

      <form action="{{ route('cursos.update', $curso->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
          <label for="nome" class="form-label">Nome</label>
          <input type="text" name="nome" id="nome" class="form-control rounded-3" value="{{ old('nome', $curso->nome) }}" required>
          @error('nome') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
          <label for="sigla" class="form-label">Sigla</label>
          <input type="text" class="form-control rounded-3" id="sigla" name="sigla" value="{{ old('sigla', $curso->sigla) }}" required>
          @error('sigla') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
          <label for="total_horas" class="form-label">Total de Horas</label>
          <input type="number" name="total_horas" id="total_horas" class="form-control rounded-3" value="{{ old('total_horas', $curso->total_horas) }}" required>
          @error('total_horas') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
          <label for="nivel_id" class="form-label">Nível</label>
          <select name="nivel_id" id="nivel_id" class="form-select rounded-3" required>
            <option value="">Selecione o nível</option>
            @foreach($nivels as $nivel)
            <option value="{{ $nivel->id }}" {{ $curso->nivel_id == $nivel->id ? 'selected' : '' }}>
              {{ $nivel->nome }}
            </option>
            @endforeach
          </select>
          @error('nivel_id') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

      
        <div class="mb-3">
            <label for="eixo_id" class="form-label">Eixo</label>
            <select name="eixo_id" id="eixo_id" class="form-select rounded-3" required>
                <option value="">Selecione um Eixo</option>
                @foreach($eixos as $eixo)
                    <option value="{{ $eixo->id }}" {{ $curso->eixo_id == $eixo->id ? 'selected' : '' }}>
                        {{ $eixo->nome }}
                    </option>
                @endforeach
            </select>
            @error('eixo_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
       

        <div class="mb-3">
          <label for="turma_id" class="form-label">Turma</label>
          <select name="turma_id" id="turma_id" class="form-select rounded-3">
            <option value="">Selecione a turma</option>
            @foreach($turmas as $turma)
            <option value="{{ $turma->id }}" {{ $curso->turma_id == $turma->id ? 'selected' : '' }}>
              {{ $turma->ano }} - {{ $turma->periodo }}
            </option>
            @endforeach
          </select>
          @error('turma_id') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-success">
          <i class="bi bi-check-circle"></i> Atualizar
        </button>
        <a href="{{ route('cursos.index') }}" class="btn btn-secondary">
          <i class="bi bi-arrow-left"></i> Voltar
        </a>
      </form>
    </div>
  </div>
</div>
@endsection