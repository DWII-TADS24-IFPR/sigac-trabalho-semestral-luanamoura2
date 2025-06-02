@extends('layouts.app')

@section('content')
    <h1>Declaração do Aluno</h1>
    <p>Aluno: {{ $aluno->nome }}</p>
    <p>Total de horas: {{ $horasTotal }}</p>
@endsection
