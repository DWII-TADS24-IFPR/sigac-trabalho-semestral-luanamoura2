@extends('layouts.app')

@section('title', 'Editar Declaração')

@section('content')

<div class="container mt-5">
    <div class="card shadow rounded-4">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Editar Declaração</h4>
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

            <form action="{{ route('declaracoes.update', $declaracao->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="data" class="form-label">Data</label>
                    <input type="date" name="data" id="data" class="form-control rounded-3"
                           value="{{ old('data', $declaracao->data) }}" required>
                </div>

                <div class="mb-3">
                    <label for="aluno_id" class="form-label">Aluno</label>
                    <select name="aluno_id" id="aluno_id" class="form-select rounded-3" required>
                        <option value="">Selecione o aluno</option>
                        @foreach ($alunos as $aluno)
                            <option value="{{ $aluno->id }}" {{ $declaracao->aluno_id == $aluno->id ? 'selected' : '' }}>
                                {{ $aluno->nome }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="comprovante_id" class="form-label">Comprovante</label>
                    <select name="comprovante_id" id="comprovante_id" class="form-select rounded-3" required>
                        <option value="">Selecione o comprovante</option>
                        @foreach ($comprovantes as $comprovante)
                            <option value="{{ $comprovante->id }}" {{ $declaracao->comprovante_id == $comprovante->id ? 'selected' : '' }}>
                                {{ $comprovante->atividade }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-success">
                    <i class="bi bi-check-circle"></i> Atualizar
                </button>
                <a href="{{ route('declaracoes.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Voltar
                </a>
            </form>
        </div>
    </div>
</div>

@endsection
