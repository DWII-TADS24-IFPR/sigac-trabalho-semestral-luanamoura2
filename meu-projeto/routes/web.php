<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NivelController;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ComprovanteController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\DeclaracaoController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\Relatoriocontroller;
use App\Http\Controllers\TurmaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SolicitacaoController;
use App\Http\Controllers\EixoController;
use App\Http\Controllers\AdminController;

Route::post('admin/login', [AdminController::class, 'loginAdmin'])->name('login.admin.post');

Route::get('/entrada', fn() => view('entrada'))->name('entrada');

Route::get('/', fn() => view('home'))->middleware('auth')->name('home');

Route::get('/login', fn() => redirect()->route('entrada'))->name('login');

Route::prefix('aluno')->group(function () {
    Route::get('login', fn() => view('auth.aluno-login'))->name('login.aluno');
    Route::post('login', [AuthController::class, 'loginAluno'])->name('login.aluno.post');

    Route::get('cadastro', fn() => view('auth.aluno-register'))->name('register.aluno');
    Route::post('cadastro', [AuthController::class, 'registerAluno'])->name('register.aluno.post');
});

Route::prefix('admin')->group(function () {
    Route::get('login', fn() => view('auth.admin-login'))->name('login.admin');
    Route::post('login', [AdminController::class, 'loginAdmin'])->name('login.admin.post');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('eixos', EixoController::class);
});

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
});

    Route::get('/relatorios', [Relatoriocontroller::class, 'emitirRelatorio'])->name('relatorio.emitir');


Route::prefix('aluno')->middleware(['auth', 'aluno'])->group(function () {
    Route::get('/solicitacoes', [SolicitacaoController::class, 'index'])->name('solicitacoes.index');
    Route::get('/solicitacoes/create', [SolicitacaoController::class, 'create'])->name('solicitacoes.create');
    Route::post('/solicitacoes', [SolicitacaoController::class, 'store'])->name('solicitacoes.store');
});
