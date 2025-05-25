@extends('layouts.app')

@section('content')
<div class="container py-5 text-center">
    <h1 class="mb-4">Bem-vindo ao SIGAC</h1>
    <p class="lead mb-5">Escolha seu acesso para continuar:</p>

    <div class="d-flex justify-content-center gap-3 flex-wrap">
        <a href="{{ route('register.aluno') }}" class="btn btn-lg btn-success">Cadastrar como Aluno</a>
         <a href="{{ route('login.aluno') }}" class="btn btn-lg btn-info">Login Aluno</a>
        <a href="{{ route('login.admin') }}" class="btn btn-lg btn-warning">Login Administrador</a>
    </div>
</div>
@endsection
