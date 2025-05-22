@extends('layouts.app')

@section('title', 'Adicionar Turma')

@section('content')
<div class="container mt-4">
    <div class="card shadow rounded-4">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Adicionar Turma</h4>
        </div>
        <div class="card-body">
            <ul class="nav nav-tabs mb-3" id="turmaTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="dados-tab" data-bs-toggle="tab" data-bs-target="#dados" type="button" role="tab">Dados da Turma</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="periodo-tab" data-bs-toggle="tab" data-bs-target="#periodo" type="button" role="tab">Período</button>
                </li>
            </ul>

            <form action="{{ route('turmas.store') }}" method="POST">
                @csrf
                <div class="tab-content" id="turmaTabContent">
                    <div class="tab-pane fade show active" id="dados" role="tabpanel">
                        <div class="mb-3">
                            <label for="ano" class="form-label">Ano</label>
                            <input type="number" class="form-control" name="ano" id="ano" required>
                        </div>  
                        <div class="mb-3">
                            <label for="curso_id" class="form-label">Curso</label>
                            <select class="form-select" name="curso_id" id="curso_id" required>
                                <option value="">Selecione um curso</option>
                                @foreach($cursos as $curso)
                                    <option value="{{ $curso->id }}">{{ $curso->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="periodo" role="tabpanel">
                        <div class="mb-3">
                            <label for="inicio" class="form-label">Início</label>
                            <input type="date" class="form-control" name="inicio" id="inicio" required>
                        </div>
                        <div class="mb-3">
                            <label for="fim" class="form-label">Fim</label>
                            <input type="date" class="form-control" name="fim" id="fim" required>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-success">
                    <i class="bi bi-check-circle"></i> Salvar
                </button>
                <a href="{{ route('turmas.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Voltar
                </a>
            </form>
        </div>
    </div>
</div>
@endsection
