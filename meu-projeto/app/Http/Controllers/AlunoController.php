<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Aluno;
use App\Models\Curso;
use App\Models\Turma;

class AlunoController extends Controller
{
   
    public function index()
    {
        $alunos = Aluno::all();
        return view('alunos.index')->with('alunos', $alunos);
    }

        public function create()
    {
        $cursos = Curso::all();   
        $turmas = Turma::all();
        return view('alunos.create', compact('cursos', 'turmas')); 
    }
public function store(Request $request)
{
    $request->validate([
        'nome' => 'required|string|max:255',
        'cpf' => 'required|string|max:14', 
        'email' => 'required|string|email|max:255|unique:alunos',
        'senha' => 'required|string|max:255',
        'turma_id' => 'required|exists:turmas,id', 
        'curso_id' => 'required|exists:cursos,id',
    ]);

    Aluno::create([
        'nome' => $request->nome,
        'cpf' => $request->cpf,
        'email' => $request->email,
        'senha' => Hash::make($request->senha),
        'turma_id' => $request->turma_id,
        'curso_id' => $request->curso_id,
        
    ]);

    return redirect()->route('alunos.index')->with('success', 'Aluno criado com sucesso.');
}

   
    public function show(string $id)
    {
        $aluno = Aluno::findOrFail($id);
        return view('alunos.show')->with('aluno', $aluno);
    }

   
    public function edit(string $id)
    {
        $aluno = Aluno::findOrFail($id);
        $turmas = Turma::all(); 
        $cursos = Curso::all(); 
        return view('alunos.edit', compact('aluno', 'turmas', 'cursos'));
    }

    
   public function update(Request $request, $id)
{
    $request->validate([
        'nome' => 'required|string|max:255',
        'cpf' => 'required|string|max:14',
        'email' => 'required|email',
        'turma_id' => 'required|integer|exists:turmas,id',
        'curso_id' => 'required|integer|exists:cursos,id', 
        'senha' => 'nullable|string|min:6'
    ]);

    $aluno = Aluno::findOrFail($id);

    $aluno->nome = $request->nome;
    $aluno->cpf = $request->cpf;
    $aluno->email = $request->email;
    $aluno->turma_id = $request->turma_id;
    $aluno->curso_id = $request->curso_id;

    if ($request->filled('senha')) {
        $aluno->senha = Hash::make($request->senha);
    }

    $aluno->save();

    return redirect()->route('alunos.index')->with('success', 'Aluno atualizado com sucesso!');
}

   
    public function destroy(string $id)
    {
        $aluno = Aluno::findOrFail($id);
        $aluno->delete();

        return redirect()->route('alunos.index')->with('success', 'Aluno excluído com sucesso.');
    }
}
