    @php $hideNavbar = true; @endphp
    @php use Carbon\Carbon; @endphp

    @extends('layouts.app')



    @section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                     <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Cadastre-se </h4>
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

                        <form method="POST" action="{{ route('register.aluno.post') }}"> 
                            @csrf 

                            <div class="mb-3">
                                <label for="name" class="form-label">Nome Completo</label>
                                <input type="text" class="form-control" id="name" name="name" required autofocus>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="cpf" class="form-label">CPF</label>
                                <input type="text" class="form-control" id="cpf" name="cpf" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="curso_id" class="form-label">Curso</label>
                                <select class="form-select" id="curso_id" name="curso_id" required>
                                    @foreach ($cursos as $curso)
                                        <option value="{{ $curso->id }}">{{ $curso->nome }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <select class="form-select" id="turma_id" name="turma_id" required>
                                @foreach ($turmas as $turma)
                                    <option value="{{ $turma->id }}">Turma {{ $turma->ano }}</option>
                                @endforeach
                            </select>
                            
                            
                            
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="password" class="form-label">Senha</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="password_confirmation" class="form-label">Confirme a Senha</label>
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="d-grid mt-4">
                              
                            </div>
                                 <div class="d-grid mt-4">
                        <button type="submit" class="btn btn-success btn-lg">
                            Cadastrar
                        </button>
                    </div>
                       
                            <div class="text-center mt-3">
                                <a href="{{ route('login.aluno') }}">Já tem cadastro? Faça login!</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection