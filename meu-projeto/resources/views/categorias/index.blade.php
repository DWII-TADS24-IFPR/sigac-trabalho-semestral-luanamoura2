@extends('layouts.app')

@section('title', 'Lista de Categorias')

@section('content')

<div class="container mt-5">
    <div class="card shadow rounded-4">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Lista de Categorias</h4>
        </div>
        <div class="card-body">
          
            <div class="mb-3">
                <a href="{{ route('categorias.create') }}" class="btn btn-primary">
                    <i class="bi bi-file-earmark-plus"></i> Adicionar Categoria
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
                        <th>Nome</th>
                        <th>Curso</th>
                        <th>Total de Horas</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categorias as $categoria)
                        <tr>
                            <td>{{ $categoria->nome }}</td>
                            <td>{{ $categoria->curso ? $categoria->curso->nome : 'Curso não encontrado' }}</td>
                            <td>{{ number_format($categoria->max_horas, 0, ',', '.') }} horas</td>
                            <td>
                                
                                <a href="{{ route('categorias.show', $categoria->id) }}" class="btn btn-info btn-sm">
                                    <i class="bi bi-eye"></i> Visualizar
                                </a>
                              
                                <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil"></i> Editar
                                </a>
                               
                                <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Tem certeza que deseja excluir?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash"></i> Deletar
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
