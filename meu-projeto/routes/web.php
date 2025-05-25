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
use Illuminate\Support\Facades\Auth;


Route::get('/entrada', function () {
    return view('entrada');
})->name('entrada');

Route::get('/', function () {
    return view('home');
})->middleware('auth')->name('home');


Route::get('/login', function () {
    return redirect()->route('entrada');
})->name('login');


Route::get('/aluno/login', function () {
    return view('auth.aluno-login');
})->name('login.aluno');

Route::post('/aluno/login', [AuthController::class, 'loginAluno'])->name('login.aluno.post');

Route::get('/aluno/cadastro', function () {
    return view('auth.aluno-register');
})->name('register.aluno');

Route::post('/aluno/cadastro', [AuthController::class, 'registerAluno'])->name('register.aluno.post');


Route::get('/admin/login', function () {
    return view('auth.admin-login');
})->name('login.admin');

Route::post('/admin/login', [AuthController::class, 'loginAdmin'])->name('login.admin.post');


Route::resource('nivels', NivelController::class);
Route::resource('alunos', AlunoController::class);
Route::resource('categorias', CategoriaController::class);
Route::resource('comprovantes', ComprovanteController::class);
Route::resource('cursos', CursoController::class);
Route::resource('declaracoes', DeclaracaoController::class);
Route::resource('documentos', DocumentoController::class);
Route::resource('turmas', TurmaController::class);


Route::get('/relatorios', [Relatoriocontroller::class, 'emitirRelatorio'])->name('relatorio.emitir');

