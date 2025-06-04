<?php


use Illuminate\Support\Facades\Route;
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
    EixoController,
    AdminController
};
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\AlunoMiddleware;


Route::post('/logout', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');

Route::post('admin/login', [AdminController::class, 'loginAdmin'])->name('login.admin.post');

Route::get('/entrada', fn() => view('entrada'))->name('entrada');

Route::get('/', fn() => view('home'))->middleware('auth')->name('home');

Route::get('/login', fn() => redirect()->route('entrada'))->name('login');

Route::prefix('aluno')->group(function () {
    Route::get('cadastro', [AuthController::class, 'showRegisterAlunoForm'])->name('register.aluno');
    Route::post('cadastro', [AuthController::class, 'registerAluno'])->name('register.aluno.post');

    Route::get('login', fn() => view('auth.aluno-login'))->name('login.aluno');
    Route::post('login', [AuthController::class, 'loginAluno'])->name('login.aluno.post');
});

Route::prefix('admin')->group(function () {
    Route::get('login', fn() => view('auth.admin-login'))->name('login.admin');
    Route::post('login', [AdminController::class, 'loginAdmin'])->name('login.admin.post');
});

Route::middleware([AdminMiddleware::class, 'auth'])->group(function () {
    Route::resource('/eixos', EixoController::class);
    Route::get('/solicitacoes', [SolicitacaoController::class, 'adminIndex'])->name('admin.solicitacoes.index');
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
     
});
Route::post('/solicitacoes/{solicitacao}/aprovar', [SolicitacaoController::class, 'aprovar'])->name('solicitacoes.aprovar');
Route::post('/solicitacoes/{solicitacao}/rejeitar', [SolicitacaoController::class, 'rejeitar'])->name('solicitacoes.rejeitar');

Route::get('/relatorios', [Relatoriocontroller::class, 'emitirRelatorio'])->name('relatorio.emitir');

Route::prefix('aluno')->middleware(['auth', AlunoMiddleware::class])->group(function () {
    Route::get('/declaracao', [DeclaracaoController::class, 'emitirParaAluno'])->name('declaracao.aluno');

    Route::get('/solicitacoes', [SolicitacaoController::class, 'index'])->name('solicitacoes.index');
    Route::get('/solicitacoes/create', [SolicitacaoController::class, 'create'])->name('solicitacoes.create');
    Route::post('/solicitacoes', [SolicitacaoController::class, 'store'])->name('solicitacoes.store');



    Route::get('/declaracoes/emitir', [SolicitacaoController::class, 'emitirDeclaracao'])->name('declaracoes.emitir');
});
