<?php

namespace App\Http\Controllers;

use App\Models\Comprovante;
use App\Models\Categoria;
use App\Models\Aluno;
use Illuminate\Http\Request;

class ComprovanteController extends Controller
{
    public function index()
    {
        $comprovantes = Comprovante::with(['categoria', 'aluno'])->get();
        return view('comprovantes.index', compact('comprovantes'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        $alunos = Aluno::all();
        return view('comprovantes.create', compact('categorias', 'alunos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'atividade' => 'required|string|max:255',
            'horas' => 'required|integer|min:0',
            'categoria_id' => 'required|exists:categorias,id',
            'aluno_id' => 'required|exists:alunos,id',
        ]);

        Comprovante::create($request->all());

        return redirect()->route('comprovantes.index')->with('success', 'Comprovante criado com sucesso!');
    }

    public function show(Comprovante $comprovante)
    {
        $comprovante->load(['categoria', 'aluno']);
        return view('comprovantes.show', compact('comprovante'));
    }

    public function edit(Comprovante $comprovante)
    {
        $categorias = Categoria::all();
        $alunos = Aluno::all();
        return view('comprovantes.edit', compact('comprovante', 'categorias', 'alunos'));
    }

    public function update(Request $request, Comprovante $comprovante)
    {
        $request->validate([
            'atividade' => 'required|string|max:255',
            'horas' => 'required|integer|min:1',
            'categoria_id' => 'required|exists:categorias,id',
            'aluno_id' => 'required|exists:alunos,id',
        ]);

        $comprovante->update($request->all());

        return redirect()->route('comprovantes.index')->with('success', 'Comprovante atualizado com sucesso!');
    }

    public function destroy(Comprovante $comprovante)
    {
        $comprovante->delete();
        return redirect()->route('comprovantes.index')->with('success', 'Comprovante excluído com sucesso!');
    }
}
