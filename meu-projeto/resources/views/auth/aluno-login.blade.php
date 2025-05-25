 @php $hideNavbar = true; @endphp

@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header bg-primary text-white text-center">
                     <h4 class="mb-0">Login</h4>
                </div>
                <div class="card-body p-4">
                     @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    <form method="POST" action="#"> 
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" class="form-control" id="email"  name="email" required autofocus>
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