@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Novo Eixo</h1>

    <form action="{{ route('eixos.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome') }}" required>
            @error('nome')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-primary" type="submit">Salvar</button>
        <a href="{{ route('eixos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
