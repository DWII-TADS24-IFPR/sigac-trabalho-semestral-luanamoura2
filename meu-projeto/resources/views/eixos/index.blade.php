@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Eixos</h1>

    <a href="{{ route('eixos.create') }}" class="btn btn-primary mb-3">Novo Eixo</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($eixos as $eixo)
                <tr>
                    <td>{{ $eixo->id }}</td>
                    <td>{{ $eixo->nome }}</td>
                    <td>
                        <a href="{{ route('eixos.edit', $eixo) }}" class="btn btn-sm btn-warning">Editar</a>

                        <form action="{{ route('eixos.destroy', $eixo) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Tem certeza?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
