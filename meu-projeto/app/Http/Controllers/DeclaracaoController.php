<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Declaracao;
use App\Models\Aluno;
use App\Models\Comprovante;
use Illuminate\Support\Facades\Auth;


class DeclaracaoController extends Controller
{

    public function index()
    {
        $declaracoes = Declaracao::with('comprovante')->get();
        return view('declaracoes.index', compact('declaracoes'));
    }

    public function create()
    {
        $comprovantes = Comprovante::all();
        $alunos = Aluno::all();
        return view('declaracoes.create', compact('comprovantes', 'alunos'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'aluno_id' => 'required|exists:alunos,id',
            'comprovante_id' => 'required|exists:comprovantes,id',
        ]);

        Declaracao::create([
            'hash' => bin2hex(random_bytes(10)),
            'data' => now(),
            'aluno_id' => $request->aluno_id,
            'comprovante_id' => $request->comprovante_id,
        ]);

        return redirect()->route('declaracoes.index')->with('success', 'Declaração criada com sucesso!');
    }

    public function show(string $id)
    {

        $declaracao = Declaracao::with(['comprovante', 'aluno'])->findOrFail($id);


        if (!$declaracao) {
            return redirect()->route('declaracoes.index')->with('error', 'Declaração não encontrada.');
        }

        return view('declaracoes.show', compact('declaracao'));
    }

    public function edit(string $id)
    {
        $declaracao = Declaracao::findOrFail($id);
        $alunos = Aluno::all();
        $comprovantes = Comprovante::all();

        return view('declaracoes.edit', compact('declaracao', 'alunos', 'comprovantes'));
    }


    public function update(Request $request, string $id)
    {
        $request->validate([
            'data' => 'required|date',
            'aluno_id' => 'required|exists:alunos,id',
            'comprovante_id' => 'required|exists:comprovantes,id',
        ]);

        $declaracao = Declaracao::findOrFail($id);
        $declaracao->update([
            'data' => $request->data,
            'aluno_id' => $request->aluno_id,
            'comprovante_id' => $request->comprovante_id,
        ]);

        return redirect()->route('declaracoes.index')->with('success', 'Declaração atualizada com sucesso!');
    }

    
    public function destroy(string $id)
    {
        $declaracao = Declaracao::findOrFail($id);
        $declaracao->delete();

        return redirect()->route('declaracoes.index')->with('success', 'Declaração excluída com sucesso!');
    }

public function emitirParaAluno()
{
    $user = Auth::user();
    $aluno = $user->aluno;

    if (!$aluno) {
        return redirect()->back()->with('error', 'Você não está registrado como aluno.');
    }

    
    if ($aluno->horas_complementares < 40) {
        return redirect()->back()->with('error', 'Você ainda não cumpriu as horas necessárias para emitir a declaração.');
    }

    return view('declaracoes.aluno', compact('aluno'));
}

};

