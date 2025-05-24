@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header bg-primary text-white text-center">
                    <h3 class="fw-light my-4">Login do Aluno</h3>
                </div>
                <div class="card-body p-4">
                    <form method="POST" action="#"> {{-- O action será atualizado quando implementarmos o POST --}}
                        @csrf {{-- Diretiva obrigatória do Laravel para proteção CSRF --}}

                        <div class="mb-3">
                            <label for="matricula" class="form-label">Matrícula ou E-mail</label>
                            <input type="text" class="form-control" id="matricula" name="matricula" required autofocus>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Senha</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>

                        <div class="form-check mb-3">
                            <input class="form-check-input" id="remember_me" type="checkbox" name="remember">
                            <label class="form-check-label" for="remember_me">Lembrar-me</label>
                        </div>

                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-primary btn-lg">Entrar</button>
                        </div>

                        <div class="text-center mt-3">
                            <a href="{{ route('register.aluno') }}">Ainda não tem cadastro? Cadastre-se!</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection