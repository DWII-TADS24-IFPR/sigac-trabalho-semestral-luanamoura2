@extends('layouts.app')

@section('title', 'Lista de Eixos')

@section('content')
<div class="container mt-5">
    <div class="card shadow rounded-4">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Lista de Eixos</h4>
        </div>
        <div class="card-body">

            <div class="mb-3">
                <a href="{{ route('eixos.create') }}" class="btn btn-primary">
                    <i class="bi bi-file-earmark-plus"></i> Novo Eixo
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table table-bordered table-striped">
                <thead class="table-dark">
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
                                <a href="{{ route('eixos.edit', $eixo->id) }}" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil"></i> Editar
                                </a>

                                <form action="{{ route('eixos.destroy', $eixo->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Tem certeza que deseja excluir este eixo?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash"></i> Excluir
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection
