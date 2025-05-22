@extends('layouts.app')

@section('content')
<div class="container mt-5">
  <div class="card shadow rounded-4">
     <div class="card-header bg-primary text-white">
      <h4 class="mb-0">Adicionar Aluno</h4>
    </div>
    <div class="card-body">
      <form action="{{ route('alunos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="nome" class="form-label">Nome</label>
          <input type="text" class="form-control rounded-3" id="nome" name="nome">
        </div>
        <div class="mb-3">
          <label for="cpf" class="form-label">CPF</label>
          <input type="text" class="form-control rounded-3" id="cpf" name="cpf">
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control rounded-3" id="email" name="email">
        </div>
        <div class="mb-3">
          <label for="senha" class="form-label">Senha</label>
          <input type="text" class="form-control rounded-3" id="senha" name="senha">
        </div>
    
        <div class="mb-3">
          <label for="turma_id" class="form-label">Turma</label>
          <select class="form-select rounded-3" id="turma_id" name="turma_id" required>
            <option value="">Selecione uma turma</option>
            @foreach($turmas as $turma)
              <option value="{{ $turma->id }}">{{ $turma->ano }}</option>
            @endforeach
          </select>
        </div>

        <div class="mb-3">
          <label for="curso_id" class="form-label">Curso</label>
          <select class="form-select rounded-3" id="curso_id" name="curso_id" required>
            <option value="">Selecione um curso</option>
            @foreach($cursos as $curso)
              <option value="{{ $curso->id }}">{{ $curso->nome }}</option>
            @endforeach
          </select>
        </div>
  
        <button type="submit" class="btn btn-success">
          <i class="bi bi-check-circle"></i> Salvar
        </button>
        <a href="{{ route('alunos.index') }}" class="btn btn-secondary">
          <i class="bi bi-arrow-left"></i> Voltar
        </a>
      </form>
    </div>
  </div>
</div>
@endsection
