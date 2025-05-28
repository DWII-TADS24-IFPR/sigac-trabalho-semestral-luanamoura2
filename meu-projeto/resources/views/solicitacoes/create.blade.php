@extends('layouts.app') 

@section('content')
<div class="container">
    <h1>Nova Solicitação</h1>

   
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('solicitacoes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="categoria_id" class="form-label">Categoria</label>
            <select name="categoria_id" id="categoria_id" class="form-control" required>
                <option value="">Selecione uma categoria</option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
                        {{ $categoria->nome ?? $categoria->descricao ?? 'Categoria ' . $categoria->id }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea name="descricao" id="descricao" class="form-control" rows="3" required>{{ old('descricao') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="carga_horaria" class="form-label">Carga Horária</label>
            <input type="number" name="carga_horaria" id="carga_horaria" class="form-control" value="{{ old('carga_horaria') }}" required min="1">
        </div>

        <div class="mb-3">
            <label for="documento" class="form-label">Documento (PDF, JPG, PNG)</label>
            <input type="file" name="documento" id="documento" class="form-control" accept=".pdf,.jpg,.jpeg,.png" required>
        </div>

        <button type="submit" class="btn btn-primary">Enviar Solicitação</button>
        <a href="{{ route('solicitacoes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
