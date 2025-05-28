<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>SIGAC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<nav class="navbar navbar-expand-lg bg-dark navbar-dark mb-3">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">SIGAC</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
      data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        @php
            $user = Auth::user();
        @endphp

        @if($user && $user->isAluno())
            {{-- MENU ALUNO --}}
            <li class="nav-item">
                <a class="nav-link" href="{{ route('solicitacoes.index') }}">Solicitações</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('declaracao.aluno') }}">Declaração</a>
            </li>

        @elseif($user && $user->isAdmin())
            {{-- MENU ADMIN --}}
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('alunos.index') }}">Alunos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('cursos.index') }}">Cursos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('turmas.index') }}">Turmas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('nivels.index') }}">Níveis</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Mais
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('comprovantes.index') }}">Comprovantes</a></li>
                <li><a class="dropdown-item" href="{{ route('declaracoes.index') }}">Declarações</a></li>
                <li><a class="dropdown-item" href="{{ route('documentos.index') }}">Documentos</a></li>
                <li><a class="dropdown-item" href="{{ route('categorias.index') }}">Categorias</a></li>
                <li><a class="dropdown-item" href="{{ route('eixos.index') }}">Eixos</a></li>
              </ul>
            </li>
        @endif

      </ul>

      <form class="d-flex me-3" role="search" action="{{ url()->current() }}" method="GET">
        <input class="form-control me-2" type="search" name="q" placeholder="Buscar" aria-label="Buscar">
        <button class="btn btn-outline-success" type="submit">Buscar</button>
      </form>

    </div>
  </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
