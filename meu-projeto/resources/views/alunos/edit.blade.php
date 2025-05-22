@extends('layouts.app')

@section('title', 'Editar Aluno')

@section('content')
<div class="container mt-5">
  <div class="card shadow rounded-4">
    <div class="card-header bg-primary text-white">
      <h4 class="mb-0">Editar Aluno</h4>
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

      <form action="{{ route('alunos.update', $aluno->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
          <label for="nome" class="form-label">Nome</label>
          <input type="text" name="nome" id="nome" class="form-control rounded-3" value="{{ old('nome', $aluno->nome) }}" required>
          @error('nome') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
          <label for="cpf" class="form-label">CPF</label>
          <input type="text" name="cpf" id="cpf" class="form-control rounded-3" value="{{ old('cpf', $aluno->cpf) }}" required>
          @error('cpf') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">E-mail</label>
          <input type="email" name="email" id="email" class="form-control rounded-3" value="{{ old('email', $aluno->email) }}" required>
          @error('email') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
          <label for="curso_id" class="form-label">Curso</label>
          <select name="curso_id" id="curso_id" class="form-select rounded-3" required>
            @foreach ($cursos as $curso)
            <option value="{{ $curso->id }}" {{ $aluno->curso_id == $curso->id ? 'selected' : '' }}>
              {{ $curso->nome }}
            </option>
            @endforeach
          </select>
          @error('curso_id') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
          <label for="turma_id" class="form-label">Turma</label>
          <select name="turma_id" id="turma_id" class="form-select rounded-3" required>
            @foreach($turmas as $turma)
            <option value="{{ $turma->id }}" {{ $aluno->turma_id == $turma->id ? 'selected' : '' }}>
              {{ $turma->ano }}
            </option>
            @endforeach
          </select>
          @error('turma_id') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
          <label for="senha" class="form-label">Senha</label>
          <input type="password" name="senha" id="senha" class="form-control rounded-3" placeholder="Deixe em branco para manter a senha atual">
          @error('senha') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-success">Atualizar</button>
        <a href="{{ route('alunos.index') }}" class="btn btn-secondary">Cancelar</a>
      </form>
    </div>
  </div>
</div>
@endsection
