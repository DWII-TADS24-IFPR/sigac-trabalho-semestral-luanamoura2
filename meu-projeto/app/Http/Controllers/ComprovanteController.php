<?php

namespace App\Http\Controllers;

use App\Models\Comprovante;
use App\Models\Categoria;
use App\Models\Aluno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComprovanteController extends Controller
{
    public function index()
    {
        $comprovantes = Comprovante::where('status', 'pendente')
            ->with(['categoria', 'aluno'])
            ->get();
        
        dd($comprovantes);
        return view('comprovantes.index', compact('comprovantes'));
    }
    

    public function aprovar($id)
    {
        $comprovante = Comprovante::findOrFail($id);
        $comprovante->status = 'aprovado';
        $comprovante->save();

        return redirect()->route('comprovantes.index')->with('success', 'Comprovante aprovado com sucesso.');
    }
    
    public function rejeitar($id)
    {
        $comprovante = Comprovante::findOrFail($id);
        $comprovante->status = 'rejeitado';
        $comprovante->save();

        return redirect()->route('comprovantes.index')->with('success', 'Comprovante rejeitado com sucesso.');
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
            
        ]);

        $aluno = Auth::user()->aluno;

        if (!$aluno) {
            return redirect()->back()->with('error', 'Você não está cadastrado como aluno.');
        }
    
        Comprovante::create([
            'atividade' => $request->atividade,
            'horas' => $request->horas,
            'categoria_id' => $request->categoria_id,
            'aluno_id' => $aluno->id,
            'status' => 'pendente',
        ]);
    
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
