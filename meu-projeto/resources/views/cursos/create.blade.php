@extends('layouts.app')

@section('content')
<div class="container mt-5">
  <div class="card shadow rounded-4">
    <div class="card-header bg-primary text-white">
      <h4 class="mb-0">Adicionar Curso</h4>
    </div>
    <div class="card-body">
      <form action="{{ route('cursos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="nome" class="form-label">Nome do Curso</label>
          <input type="text" class="form-control rounded-3" id="nome" name="nome" required>
        </div>
        <div class="mb-3">
          <label for="sigla" class="form-label">Sigla</label>
          <input type="text" class="form-control" id="sigla" name="sigla" required>
        </div>

        <div class="mb-3">
          <label for="nivel_id" class="form-label">Nível</label>
          <select name="nivel_id" id="nivel_id" class="form-control" required>
            <option value="">Selecione o nível</option>
            @foreach($nivels as $nivel)
            <option value="{{ $nivel->id }}">{{ $nivel->nome }}</option>
            @endforeach
          </select>
          @error('nivel_id')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
            <label for="eixo_id" class="form-label">Eixo</label>
            <select name="eixo_id" id="eixo_id" class="form-control" required>
                <option value="">Selecione um Eixo</option>
                @foreach($eixos as $eixo)
                    <option value="{{ $eixo->id }}">
                        {{ $eixo->nome }}
                    </option>
                @endforeach
            </select>
            @error('eixo_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
     

        <div class="mb-3">
          <label for="total_horas" class="form-label">Total de Horas</label>
          <input type="number" class="form-control" id="total_horas" name="total_horas" required>
        </div>


        <button type="submit" class="btn btn-success">
          <i class="bi bi-check-circle"></i> Salvar
        </button>
        <a href="{{ route('cursos.index') }}" class="btn btn-secondary">
          <i class="bi bi-arrow-left"></i> Voltar
        </a>
      </form>
    </div>
  </div>
</div>
@endsection