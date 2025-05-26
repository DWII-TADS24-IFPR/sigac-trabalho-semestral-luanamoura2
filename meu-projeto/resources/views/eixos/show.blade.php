@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes do Eixo</h1>

    <p><strong>ID:</strong> {{ $eixo->id }}</p>
    <p><strong>Nome:</strong> {{ $eixo->nome }}</p>

    <a href="{{ route('eixos.index') }}" class="btn btn-secondary">Voltar</a>
</div>
@endsection
