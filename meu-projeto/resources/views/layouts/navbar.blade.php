<nav class="navbar navbar-expand-lg bg-dark navbar-dark mb-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">SIGAC</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
           
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
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
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Mais
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('comprovantes.index') }}">Comprovantes</a></li>
                        <li><a class="dropdown-item" href="{{ route('declaracoes.index') }}">Declarações</a></li>
                        <li><a class="dropdown-item" href="{{ route('documentos.index') }}">Documentos</a></li>
                        <li><a class="dropdown-item" href="{{ route('categorias.index') }}">Categorias</a></li>
                    </ul>
                </li>
            </ul>

       
            <form class="d-flex me-3" role="search">
                <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Buscar</button>
            </form>

        </div>
    </div>
</nav>
