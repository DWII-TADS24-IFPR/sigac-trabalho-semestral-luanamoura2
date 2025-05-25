<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\{
    NivelController,
    AlunoController,
    CategoriaController,
    ComprovanteController,
    CursoController,
    DeclaracaoController,
    DocumentoController,
    Relatoriocontroller,
    TurmaController,
    AuthController,
    SolicitacaoController,
   
};

// Rotas públicas
Route::get('/entrada', fn() => view('entrada'))->name('entrada');

Route::get('/', fn() => view('home'))->middleware('auth')->name('home');

Route::get('/login', fn() => redirect()->route('entrada'))->name('login');

// Rotas de autenticação para aluno
Route::prefix('aluno')->group(function () {
    Route::get('login', fn() => view('auth.aluno-login'))->name('login.aluno');
    Route::post('login', [AuthController::class, 'loginAluno'])->name('login.aluno.post');

    Route::get('cadastro', fn() => view('auth.aluno-register'))->name('register.aluno');
    Route::post('cadastro', [AuthController::class, 'registerAluno'])->name('register.aluno.post');
});

// Rotas de autenticação para admin
Route::prefix('admin')->group(function () {
    Route::get('login', fn() => view('auth.admin-login'))->name('login.admin');
    Route::post('login', [AuthController::class, 'loginAdmin'])->name('login.admin.post');
});

// Rotas protegidas para todos os usuários autenticados
Route::middleware('auth')->group(function () {
    Route::resources([
        'nivels' => NivelController::class,
        'alunos' => AlunoController::class,
        'categorias' => CategoriaController::class,
        'comprovantes' => ComprovanteController::class,
        'cursos' => CursoController::class,
        'declaracoes' => DeclaracaoController::class,
        'documentos' => DocumentoController::class,
        'turmas' => TurmaController::class,
    ]);

    Route::get('/relatorios', [Relatoriocontroller::class, 'emitirRelatorio'])->name('relatorio.emitir');
});

Route::prefix('aluno')->middleware('auth')->group(function () {
    Route::middleware(function ($request, $next) {
        $user = Auth::user();
        if ($user && $user->is_admin === false) {
            return $next($request);
        }
        abort(403);
    })->group(function () {
        Route::get('/solicitacoes', [SolicitacaoController::class, 'index'])->name('solicitacoes.index');
        Route::get('/solicitacoes/create', [SolicitacaoController::class, 'create'])->name('solicitacoes.create');
        Route::post('/solicitacoes', [SolicitacaoController::class, 'store'])->name('solicitacoes.store');
    });
});
